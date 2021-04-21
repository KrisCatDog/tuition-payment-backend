<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembayaran SPP</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            display: flex;
            flex-direction: row;
            margin-bottom: 16px;
        }

        .header-logo {
            position: absolute;
            top: -16px;
            width: 140px;
        }

        .header-content {
            margin-left: 150px;
        }

        .header-text {
            text-align: center;
            margin: 0;
            margin-bottom: 2px;
            font-size: 14px;
        }

        .payments {
            margin-top: 24px;
            margin-bottom: 24px;
            border-collapse: collapse;
            width: 100%;
        }

        .payments td,
        .payments th {
            font-size: 14px;
            border: 1px solid #ddd;
            padding: 8px;
        }

        .payments tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .payments th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ $logo }}" class="header-logo">

        <div class="header-content">
            <h3 style="text-align: center; margin: 0; margin-bottom: 2px;">
                PEMERINTAH DAERAH PROVINSI JAWA BARAT
            </h3>
            <h3 style="text-align: center; margin: 0; margin-bottom: 2px;">
                DINAS PENDIDIKAN
            </h3>
            <h3 style="text-align: center; margin: 0; margin-bottom: 2px;">
                SEKOLAH MENENGAH KEJURUAN NEGERI 13
            </h3>
            <p class="header-text">
                Jalan Soekarno - Hatta Km. 10 Telepon (022) 7318960: Ext. 114
            </p>
            <p class="header-text">
                Telepon/Faksimili: (022) 7332252 - Bandung 40286 Email: smk13bdg@gmail.com
            </p>
            <p class="header-text">
                Home Page: http://www.smkn-13bdg.sch.id
            </p>
        </div>
    </div>

    <hr style="border: 2px solid #000;">

    <div>
        <h2 style="margin-bottom: 32px; text-align: center;">Laporan Pembayaran SPP</h2>

        <table>
            <tr style="font-size: 14px; margin: 0; margin-bottom: 2px;">
                <td>Dari Tanggal</td>
                <td>:</td>
                <td>{{ $startDate }}</td>
            </tr>
            <tr style="font-size: 14px; margin: 0; margin-bottom: 2px;">
                <td>Sampai Tanggal</td>
                <td>:</td>
                <td>{{ $endDate }}</td>
            </tr>
        </table>

        <table class="payments">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Petugas</th>
                <th>SPP Bulan</th>
                <th>Jumlah Bayar</th>
                <th>Di Bayar Tanggal</th>
                <th>Di Bayar Jam</th>
            </tr>
            @foreach ($payments as $index => $payment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $payment->student->user->name }}</td>
                <td>{{ $payment->officer->user->name }}</td>
                <td>{{ $payment->bills_date->isoFormat('MMMM Y') }}</td>
                <td>Rp. {{ $payment->amount_paid }}</td>
                <td>{{ $payment->paid_at->isoFormat('dddd, D MMMM Y') }}</td>
                <td>{{ $payment->paid_at->format('H:i:s') }}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr style="font-size: 14px; margin: 0; margin-bottom: 2px;">
                <td>Di Export Pada</td>
                <td>:</td>
                <td>{{ $createdAt }}</td>
            </tr>
            <tr style="font-size: 14px; margin: 0; margin-bottom: 2px;">
                <td>Oleh</td>
                <td>:</td>
                <td>{{ $user->name }}</td>
            </tr>
        </table>
    </div>
</body>

</html>