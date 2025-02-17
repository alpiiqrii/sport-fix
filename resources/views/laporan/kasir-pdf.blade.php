<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color:rgb(0, 0, 0);
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #191919;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi Kasir</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Jumlah Terjual</th>
                <th>Total Harga</th>
                <th>Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kasir as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($k->produk)
                            {{ $k->produk->nama }}
                        @else
                            <span class="text-red-500">Barang tidak ditemukan</span>
                        @endif
                    </td>
                    <td>{{ $k->jumlah_terjual }}</td>
                    <td>Rp.{{ number_format($k->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $k->tanggal_pembelian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dibuat pada: {{ now()->format('d M Y H:i:s') }}</p>
    </div>
</body>
</html>