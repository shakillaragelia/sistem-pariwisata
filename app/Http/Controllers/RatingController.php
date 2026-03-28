<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Wisata;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating'        => 'required|integer|min:1|max:5',
            'rateable_id'   => 'required|integer',
            'rateable_type' => 'required|in:wisata,hotel',
        ]);

        $type = $request->rateable_type === 'wisata'
            ? \App\Models\Wisata::class
            : \App\Models\Hotel::class;

        Rating::updateOrCreate(
            [
                'id_user'       => auth()->id(),
                'rateable_id'   => $request->rateable_id,
                'rateable_type' => $type,
            ],
            ['rating' => $request->rating]
        );

        return redirect()->back()->with('success', 'Rating berhasil disimpan!');
    }
}