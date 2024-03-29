
 <!DOCTYPE html>
<html>
<head>
	{{-- <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title> --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <h3 class="text-center">Data Tiket Report</h3>
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok Barang</th>
                <th>Pembayaran Sewa</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $r)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $r->nama_barang }}</td>
                <td>{{ $r->harga_barang }}</td>
                <td>{{ $r->stok_barang }}</td>
                <td>{{ $r->pembayaran_sewabarang }}</td>
                <td>
                    @if(!empty($imageDataArray[$loop->index]))
                        <img src="{{$imageDataArray[$loop->index]['src']}}" alt="{{$imageDataArray[$loop->index]['alt']}}" width="100px" style="height: auto">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>