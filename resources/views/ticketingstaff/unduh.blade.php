<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan pdf</title>
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
                <th>Tanggal Pemesanan</th>
                <th>Jumlah Tiket</th>
                <th>Harga Tiket</th>
                <th>Pembayaran Tiket</th>
                <th>Foto Tiket</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ticket as $i)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $i->tanggal_pemesanan }}</td>
                <td>{{ $i->jumlah_ticket }}</td>
                <td>{{ $i->harga_ticket }}</td>
                <td>{{ $i->pembayaran_ticket }}</td>
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