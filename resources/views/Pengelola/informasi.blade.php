@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div>
        <div class="col-md-12">
        <span class="h1">
                        Data Informasi
                    </span>
            <div>
                {{-- <div class="card-header"> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10 ">
                        <br>
                        <div class="" style="float: right;">
                                <a href="/dashboard/informasi/unduh" class="btn btn-primary" target="_blank">CETAK PDF</a>
                                <a href="informasi/tambah" class="">
                                    <button style="margin-left: 10px" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="color: #fff;" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                        Tambah Informasi
                                    </button>
                                    </a>
                        </div>
                    </div>
                        <p>

                       <hr>
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
        $(document).ready(function() {
            $('.DataTable').DataTable();
        });
    </script>

@endsection
