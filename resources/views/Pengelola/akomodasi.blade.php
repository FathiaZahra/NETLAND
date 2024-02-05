@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div>
            <div class="col-md-12">
            <span class="h1">
                        Data Akomodasi
            </span>
                <div>
                    <span class="h5">
                        Jumlah Akomodasi Yang Tercatat : {{$jumlahAkomodasi}}
                    </span>
                <div >
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10">
                        <br>
                        <div class="" style="float: right;">
                                <a href="/dashboard/akomodasi/unduh" class="btn btn-primary" target="_blank">CETAK PDF</a>
                                <a href="akomodasi/tambah" class="">
                                    <button style="margin-left: 10px" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="color: #fff;" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                        Tambah Akomodasi
                                    </button>
                                    </a>
                        </div>
                        </div>
                        <p>
                            
                        <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Link Maps</th>
                                    <th>Gambar</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akomodasi as $item)
                                    <tr>
                                        <td>{{ $item->nama_akomodasi }}</td>
                                        <td>{{$item->isi_akomodasi}}</td>
                                        <td class="text-center">
                                            @if ($item->file)
                                                <img src="{{ url('foto_akomodasi') . '/' . $item->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
                                        <a href="akomodasi/detail/{{ $item->id_akomodasi }}">
                                                <button class="btn btn-warning">DETAIL</button>
                                            </a>
                                            <a href="akomodasi/edit/{{ $item->id_akomodasi }}">
                                                <button class="btn btn-primary">EDIT</button>
                                            </a>
                                            <button class="btn btn-danger btnHapus" idInfo="{{ $item->id_akomodasi }}">HAPUS
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
                        url: 'akomodasi/hapus',
                        data: {
                            id_akomodasi: idInfo,
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
