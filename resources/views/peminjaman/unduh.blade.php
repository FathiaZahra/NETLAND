{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Data Tiket Report</h3>
    <table>
        <thead>
            <img src="data:image/png;base64,{{ $base64Image }}" width="140px">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok Barang</th>
                <th>Pembayaran Sewa</th>
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
            </tr>
            @endforeach

        </tbody>    
    </table>
</body>
</html>
 --}}

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

         <img src="{{ public_path('foto/efd3ade9-1ec4-4b99-b674-c644ecf3920b.jpg') }}" style="width: 100px; height: 100px">

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
                    <img src="{{asset('foto/'.$r->file)}}" alt="">
                </td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>