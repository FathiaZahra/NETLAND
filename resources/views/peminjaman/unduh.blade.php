<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<style>
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        table {
            display: block;
        }

        @page {
            suze : A4 landscape;
        }
	</style>
</head>
<body>      
        <h3 class="text-center">Data Penyewaan Report</h3>
        <td>
            <img src={{'data:foto/png;base64,'.'base64Image'}} />
        </td>
	<table class='table table-bordered'>
		<head>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok Barang</th>
                <th>Pembayaran Sewa</th>
                <th>File</th>
            </tr>
        </head>
        <body>
            @foreach ($barang as $r)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $r->nama_barang }}</td>
                <td>{{ $r->harga_barang }}</td>
                <td>{{ $r->stok_barang }}</td>
                <td>{{ $r->pembayaran_sewabarang }}</td>
                <td>{{ $r->file }}</td>
            </tr>
            @endforeach
        </body>
	</table>
 
</body>
</html>