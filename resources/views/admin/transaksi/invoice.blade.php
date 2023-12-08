<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - {{ $transaksi->kode }}</title>
</head>

<body>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>
                    <h2>Londri Online</h2>
                </td>
                <td style="text-align: right;">
                    <h2>Invoice</h2>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="margin-top: 1rem;">
        <tbody>
            <tr>
                <td colspan="3">{{ config('app.name') }}</td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td style="padding: 0 5px;">:</td>
                <td>0858 xx xxx xxx</td>
            </tr>
            <tr>
                <td>Email</td>
                <td style="padding: 0 5px;">:</td>
                <td>londrionline@gmail.com</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 50%;">
                    <table>
                        <tbody>
                            <tr>
                                <td style="font-weight: 700;">Customer</td>
                                <td style="padding: 0 5px;">:</td>
                                <td>{{ $transaksi->konsumen->nama }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding: 0 5px;">:</td>
                                <td>{{ $transaksi->konsumen->alamat }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding: 0 5px;">:</td>
                                <td>{{ $transaksi->konsumen->no_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 50%;">
                    <table>
                        <tbody>
                            <tr>
                                <td style="font-weight: 700;">Kode Transaksi</td>
                                <td style="padding: 0 5px;">:</td>
                                <td>{{ $transaksi->kode }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700;">Tanggal Masuk</td>
                                <td style="padding: 0 5px;">:</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: 700;">Tanggal Ambil</td>
                                <td style="padding: 0 5px;">:</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table style="border: 2px solid black; width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="border: 2px solid black;">
                <th style="border: 2px solid black; text-align: center; padding: 10px;">Paket Londri</th>
                <th style="border: 2px solid black; text-align: center; padding: 10px;">Berat (KG)</th>
                <th style="border: 2px solid black; text-align: center; padding: 10px;">Harga</th>
                <th style="border: 2px solid black; text-align: center; padding: 10px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border: 2px solid black;">
                <td style="border: 2px solid black; padding: 10px;">{{ $transaksi->paket->nama }}</td>
                <td style="border: 2px solid black; padding: 10px;">{{ $transaksi->berat }}</td>
                <td style="border: 2px solid black; padding: 10px;">
                    {{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga, true) }}
                </td>
                <td style="border: 2px solid black; padding: 10px;">
                    {{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga * $transaksi->berat, true) }}
                </td>
            </tr>
            <tr style="border: 2px solid black;">
                <td style="border: 2px solid black; text-align: right; padding: 10px; font-weight: 700;" colspan="3">
                    Total</td>
                <td style="border: 2px solid black; padding: 10px;">
                    {{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga * $transaksi->berat, true) }}
                </td>
            </tr>
        </tbody>
    </table>
    <h4 style="font-weight: 700; margin-top: 2rem;">Keterangan</h4>
    <ol>
        <li>Pengambilan cucian harus membawa nota</li>
        <li>Cuci luntuk bukan tanggung jawab kami</li>
        <li>Hitung dan periksa sebelum pergi</li>
        <li>Klaim kekurangan/kehilangan cucian setelah meninggalkan laundry tidak dilayani</li>
    </ol>
</body>

</html>
