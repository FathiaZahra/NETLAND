@extends('layout.layout')
@section('title', 'Tiket')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <span class="h1">
                Data Tiket
            </span>
            <div>
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10">
                            <a href="ticket/tambah">
                                <button style="margin-left: 1000px" class="btn btn-success">Tambah Tiket</button>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>TANGGAL PEMESANAN</th>
                                    <th>JUMLAH TIKET</th>
                                    <th>HARGA TIKET</th>
                                    <th>PEMBAYARAN TIKET</th>
                                    {{-- <th>FILE</th> --}}
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ticket as $r)
                                    <tr>
                                        <td>{{ $r->tanggal_pemesanan }}</td>
                                        <td>{{ $r->jumlah_ticket }}</td>
                                        <td>{{ $r->harga_ticket }}</td>
                                        <td>{{ $r->pembayaran_ticket }}</td>
                                        {{-- <td >
                                            @if ($r->file)
                                                <img src="{{ url('foto') . '/' . $r->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td> --}}
                                    <td>
                                        <a href="ticket/detail/{{ $r->id_ticket }}">
                                            <button class="btn btn-warning">DETAIL</button>
                                        </a>
                                            <a href="ticket/edit/{{ $r->id_ticket }}">
                                                <button class="btn btn-primary">EDIT</button>
                                            </a>
                                            <button class="btn btn-danger btnHapus" idTicket="{{ $r->id_ticket }}">HAPUS
                                            </button>
                                    </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Log Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($log as $r)
                                    <tr>
                                        <td>{{ $r->log }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idTicket = $(this).closest('.btnHapus').attr('idTicket');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'ticket/hapus',
                        data: {
                            id_ticket: idTicket,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
        $(document).ready(function() {
            $('.DataTable').DataTable();
        });
    </script>
    
@endsection

{{-- @section('footer')
    
@endsection --}}
