<!DOCTYPE html>
<html>

<head>
    <title>Pesan Kontak Baru</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #612F73;">Pesan Baru dari Website Sekolah</h2>
        <p>Anda menerima pesan baru dari form kontak website.</p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; width: 120px; font-weight: bold;">Nama:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Email:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Subjek:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['subject'] }}</td>
            </tr>
        </table>

        <div
            style="margin-top: 20px; background: #f9f9f9; padding: 15px; border-radius: 5px; border-left: 4px solid #8C51A5;">
            <strong>Pesan:</strong><br><br>
            {!! nl2br(e($data['message'])) !!}
        </div>

        <p style="margin-top: 30px; font-size: 12px; color: #777;">Email ini dikirim otomatis dari Website Sekolah.</p>
    </div>
</body>

</html>