<!DOCTYPE html>
<html>
<head>
    <title>Laporan Produk</title>
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
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Laporan Produk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Merk Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->jenis }}</td>
                    <td>Rp.{{ number_format($k->harga_jual, 0, ',', '.') }}</td>
                    <td>Rp.{{ number_format($k->harga_beli, 0, ',', '.') }}</td>
                    <td>{{ $k->jumlah }}</td>
                    <td>
                        @if($k->foto)
                            <img src="{{ public_path('image/' . $k->foto) }}" class="product-image" alt="Foto Produk">
                        @else
                            <img src="{{ public_path('image/nophoto.jpg') }}" class="product-image" alt="Tidak Ada Foto">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dibuat pada: {{ now()->format('d M Y H:i:s') }}</p>
    </div>
</body>
</html>