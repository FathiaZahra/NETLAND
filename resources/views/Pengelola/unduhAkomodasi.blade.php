<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<table class='table table-bordered'>
		<thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Link Maps</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($akomodasi as $i)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $i->nama_akomodasi }}</td>
                <td>{{ $i->isi_akomodasi }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
 
</body>
</html>