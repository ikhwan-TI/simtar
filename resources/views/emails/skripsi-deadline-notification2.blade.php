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
            <h3>Notifikasi Pemberitahuan</h3>

            <p>Bahwa mahasiswa/i atas nama {{ $skripsi->mahasiswa->nama }}
                ({{ strtoupper($skripsi->mahasiswa->username) }}) belum menyelesaikan skripsi sejak 4 bulan terakhir.
            </p>
            <p style="text-align:center;">Judul tugas akhir : <br>"<b>{{ $skripsi->judul }}</b>".</p>

            <table>
                <tr>
                    <td>Dosen pembimbing 1</td>
                    <td>&nbsp;:&nbsp;&nbsp;</td>
                    <td><b>{{ $skripsi->pembimbing_1->nama }}</b></td>
                </tr>
                <tr>
                    <td>Dosen pembimbing 2</td>
                    <td>&nbsp;:&nbsp;&nbsp;</td>
                    <td><b>{{ $skripsi->pembimbing_2->nama }}</b></td>
                </tr>
            </table>

            <p>Ini adalah pesan otomatis sebagai pengingat deadline skripsi mahasiswa.</p>

            <p></p>

            <p>Terima kasih.</p>
        </div>

        <div class="email-footer">
            <p>&copy;{{ date('Y') }} SIMTAR Notifikasi</p>
        </div>
    </div>
</body>

</html>
