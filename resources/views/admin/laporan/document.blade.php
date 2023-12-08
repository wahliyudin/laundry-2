<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>
    <h2 style="text-align: center;">Laporan Laundry Online</h2>
    <p style="text-align: center;">Dari Tanggal {{ $startDate }} Sampai Tanggal {{ $endDate }}</p>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <thead>
            <tr style="background-color: rgb(204, 204, 204);">
                <th style="padding: 5px; border: 1px solid black;">Tanggal Masuk</th>
                <th style="padding: 5px; border: 1px solid black;">Kode Transaksi</th>
                <th style="padding: 5px; border: 1px solid black;">Konsumen</th>
                <th style="padding: 5px; border: 1px solid black;">Paket</th>
                <th style="padding: 5px; border: 1px solid black;">Berat (KG)</th>
                <th style="padding: 5px; border: 1px solid black;">Grand Total</th>
                <th style="padding: 5px; border: 1px solid black;">Tanggal Ambil</th>
                <th style="padding: 5px; border: 1px solid black;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td style="padding: 5px; border: 1px solid black;">
                        {{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y') }}</td>
                    <td style="padding: 5px; border: 1px solid black;">{{ $transaksi->kode }}</td>
                    <td style="padding: 5px; border: 1px solid black;">{{ $transaksi->konsumen?->nama }}</td>
                    <td style="padding: 5px; border: 1px solid black;">{{ $transaksi->paket?->nama }}</td>
                    <td style="padding: 5px; border: 1px solid black;">{{ $transaksi->berat }}</td>
                    <td style="padding: 5px; border: 1px solid black;">
                        {{ \App\Helpers\Helper::formatRupiah($transaksi->paket?->harga * $transaksi->berat, true) }}
                    </td>
                    <td style="padding: 5px; border: 1px solid black;">
                        {{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->translatedFormat('d F Y') }}</td>
                    <td style="padding: 5px; border: 1px solid black;">{{ $transaksi->status->label() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
