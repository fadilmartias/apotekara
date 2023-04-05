<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;" />
    <title>Invoice</title>
    <style>
        .kop {
            position: relative;
            padding-bottom: 30px;
            border-bottom: double;
        }

        .kanan {
            position: absolute;
            right: 0;
            top: 20px;
            font-size: 40px;
        }

        .table-transaksi th {
            border: 1px solid black;
            padding: 4px;

        }

        .table-transaksi td {
            border-right: 1px solid black;
            border-left: 1px solid black;
            text-align: center;
            padding: 4px;

        }

        .table-transaksi {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="kop">
        <div class="kiri">
            <div class="logo"></i></div>
            <div class="info-apotek">
                <div>Apotek Ara Farma</div>
                <div>No. Izin Praktek: 284647846</div>
                <div>Pekanbaru, Riau</div>
                <div>Telp. 076135357, Email: arafarma01@gmail.com</div>
            </div>
        </div>
        <div class="kanan">INVOICE</div>
    </div>
    <div class="head" style="margin: 10px 0 25px 0;">
        <table>
            <tr>
                <td style="padding-right: 20px;">Nama Pembeli</td>
                <td>:</td>
                <td style="padding-right: 600px;">{{ $data->nama_pembeli }}</td>
                <td style="padding-right: 65px;">Kasir</td>
                <td>:</td>
                <td>{{ Auth::user()->nama_user }}</td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td>:</td>
                <td>{{ $telp_pembeli }}</td>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $data->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $alamat_pembeli }}</td>
                <td>No. Faktur</td>
                <td>:</td>
                <td>{{ $data->no_transaksi }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Pembayaran</td>
                <td>:</td>
                <td>TUNAI</td>
            </tr>
        </table>
    </div>
    <div class="barang">
        <table class="table-transaksi">
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th style="width: 375px;">Nama Barang</th>
                    <th style="width: 40px;">Qty</th>
                    <th style="width: 160px;">Satuan</th>
                    <th style="width: 150px;">Harga (Rp)</th>
                    <th style="width: 50px;">Disc</th>
                    <th style="width: 150px;">Subtotal (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->details as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->obat->nama_obat }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>Botol</td>
                    <td style="text-align:right;">{{ number_format($detail->harga, 0, ',', '.') }}</td>
                    <td>0%</td>
                    <td style="text-align:right;">{{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr style="border-top: 1px solid black;">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td colspan="2" style="text-align:right; border-bottom: 1px solid black;">Total :</td>
                    <td style="text-align:right; border-bottom: 1px solid black;">{{ number_format($harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td colspan="2" style="text-align:right; border-bottom: 1px solid black;">Diskon :</td>
                    <td style="text-align:right; border-bottom: 1px solid black;">0</td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td colspan="2" style="text-align:right; border-bottom: 1px solid black;">Pajak :</td>
                    <td style="text-align:right; border-bottom: 1px solid black;">0</td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td colspan="2" style="text-align:right; border-bottom: 1px solid black;">Ongkos Kirim :</td>
                    <td style="text-align:right; border-bottom: 1px solid black;">0</td>
                </tr>
                <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td colspan="2" style="text-align:right; border-bottom: 1px solid black;"><b>Grand Total :</b></td>
                    <td style="text-align:right; border-bottom: 1px solid black;">{{ number_format($data->total_transaksi, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="foot" style="margin-top: 30px;">
        <table>
            <tr>
                <td style="padding: 0 450px 100px 150px; text-align:center;">Penerima / Pembeli</td>
                <td style="padding-bottom: 100px; text-align:center;">Apotek Ara Farma</td>
            </tr>
            <tr>
                <td style="padding: 0 450px 0 150px; text-align:center;">{{ $data->nama_pembeli }}</td>
                <td style="text-align:center;">{{ Auth::user()->nama_user }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
