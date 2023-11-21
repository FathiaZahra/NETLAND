@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div>
        <div class="col-md-12">
        <span class="h1">
                        Data Informasi
                    </span>
            <div>
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10 ">
                            <a href="informasi/tambah">
                                <button style="margin-left: 970px;"class="btn btn-success my-3">Tambah Informasi</button>
                            </a>
                        </div>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>Nama Informasi</th>
                                    <th>Isi Informasi</th>
                                    <th>Foto</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($informasi as $item)
                                    <tr>
                                        <td>{{ $item->nama_informasi }}</td>
                                        <td>{{ $item->isi_informasi }}</td>
                                        <td class="text-center">
                                            @if ($item->file)
                                                <img src="{{ url('foto_informasi') . '/' . $item->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="informasi/detail/{{ $item->id_informasi }}">
                                                <button class="btn btn-warning">DETAIL</button>
                                            </a>
                                            <a href="informasi/edit/{{ $item->id_informasi }}">
                                                <button class="btn btn-primary">EDIT</button>
                                            </a>
                                            <button class="btn btn-danger btnHapus" idInfo="{{ $item->id_informasi }}">HAPUS
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idInfo = $(this).closest('.btnHapus').attr('idInfo');
            swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda tidak dapat mengembalikan nya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus!",
                cancelButtonText: "Batalkan!"
            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'informasi/hapus',
                        data: {
                            id_informasi: idInfo,
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
    </script>

@endsection
