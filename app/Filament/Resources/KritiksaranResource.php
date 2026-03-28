<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KritiksaranResource\Pages;
use App\Models\Kritiksaran;
use App\Mail\BalasSaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class KritiksaranResource extends Resource
{
    protected static ?string $model = Kritiksaran::class;
    protected static ?string $navigationGroup = 'Data Pariwisata';
    protected static ?string $navigationLabel = 'Kritik Saran';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subjek')->required(),
                Forms\Components\TextInput::make('konten')->required(),
                Forms\Components\Hidden::make('id_user')
                    ->default(auth()->user()->id),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('nama_pengirim')
                    ->label('Nama Pengirim')
                    ->default('Anonim'),
                TextColumn::make('email_pengirim')
                    ->label('Email')
                    ->default('-'),
                TextColumn::make('subjek')
                        ->badge()
                        ->color(fn ($state) => match($state) {
                            'Kritik'     => 'danger',
                            'Saran'      => 'success',
                            'Pertanyaan' => 'info',
                            'Kerja Sama' => 'warning',
                            default      => 'gray',
                        }),
                TextColumn::make('konten')->limit(50),
                TextColumn::make('balasan')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state ? '✅ Sudah Dibalas' : '⏳ Belum Dibalas')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'warning'),
            ])
            ->actions([
                Tables\Actions\Action::make('balas')
                    ->label('Balas')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('primary')
                    ->form([
                        Forms\Components\TextInput::make('email_pengirim')
                            ->label('Email Pengirim')
                            ->email()
                            ->required()
                            ->default(fn ($record) => $record->email_pengirim),
                        Forms\Components\Textarea::make('balasan')
                            ->label('Isi Balasan')
                            ->required()
                            ->rows(5),
                    ])
                    ->action(function ($record, array $data) {
                        
                        // Kirim email
                        Mail::to($data['email_pengirim'])
                            ->send(new BalasSaran(
                                $record->subjek,
                                $record->konten,
                                $data['balasan']
                            ));

                        // Simpan balasan ke DB
                        $record->update([
                            'email_pengirim' => $data['email_pengirim'],
                            'balasan'        => $data['balasan'],
                            'dibalas_at'     => now(),
                        ]);

                        Notification::make()
                            ->title('Balasan berhasil dikirim!')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListKritiksarans::route('/'),
            'create' => Pages\CreateKritiksaran::route('/create'),
            'edit'   => Pages\EditKritiksaran::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}