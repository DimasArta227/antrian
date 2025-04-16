<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .struk {
            border: 1px solid #333;
            padding: 20px;
            width: 300px;
            margin: auto;
            background: #f8f9fa;
        }
        h2 {
            margin: 0;
            padding: 10px 0;
            font-size: 24px;
        }
        .info {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .bold {
            font-weight: bold;
        }
        .footer {
            font-size: 12px;
            margin-top: 10px;
            border-top: 1px dashed #333;
            padding-top: 5px;
        }
    </style>
</head>
<body onload="window.print()"> <!-- Auto Print -->
    <div class="struk">
        <h2>Antrian No: <span class="bold">{{ $antrian->no_antrian }}</span></h2>
        <p class="info"><span class="bold">Nama:</span> {{ $antrian->user->name }}</p>
        <p class="info"><span class="bold">Tanggal:</span> {{ date('d-m-Y', strtotime($antrian->tgl)) }}</p>
        <br>
        <div class="footer">Terima kasih telah menunggu</div>
    </div>
</body>
</html>
