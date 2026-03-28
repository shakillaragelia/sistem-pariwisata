<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { background: white; padding: 30px; border-radius: 8px; max-width: 600px; margin: auto; }
        .header { background: #e8531d; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
        .header h2 { color: white; margin: 0; }
        .content { padding: 20px 0; }
        .label { font-weight: bold; color: #555; }
        .box { background: #f9f9f9; padding: 15px; border-left: 4px solid #e8531d; border-radius: 4px; margin: 10px 0; }
        .footer { text-align: center; color: #999; font-size: 12px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>DISPAR BUKITTINGGI</h2>
        </div>
        <div class="content">
            <p>Terima kasih telah menyampaikan kritik dan saran Anda kepada kami.</p>
            
            <p class="label">Subjek:</p>
            <div class="box">{{ $subjek }}</div>

            <p class="label">Pesan Anda:</p>
            <div class="box">{{ $konten }}</div>

            <p class="label">Balasan dari Admin:</p>
            <div class="box">{{ $balasan }}</div>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} DISPAR Bukittinggi. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>