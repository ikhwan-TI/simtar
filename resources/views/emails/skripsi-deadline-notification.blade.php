<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMTAR | Sistem Monitoring Tugas Akhir</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .email-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            letter-spacing: 4px;
        }

        .email-content {
            padding: 20px;
        }

        .email-footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h2>SIMTAR</h2>
        </div>

        <div class="email-content">
            <h3>Halo, {{ $skripsi->mahasiswa->nama }} ({{ strtoupper($skripsi->mahasiswa->username) }})</h3>
            <p>Skripsi Anda telah berlangsung selama 4 bulan. Mohon untuk segera diselesaikan atau silahkan konsultasi
                ke dosen pembimbing terkait progress skripsi Anda.
            </p>
            <p>Terima kasih, tetap semangat para pejuang skripsi!</p>
        </div>

        <div class="email-footer">
            <p>&copy;{{ date('Y') }} SIMTAR Notifikasi</p>
        </div>
    </div>
</body>

</html>
