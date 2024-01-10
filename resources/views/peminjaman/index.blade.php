@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div >
        <div class="col-md-12">
            <h1>
                Penyewaan
            </h1>
            <span class="h5">
                Jumlah Barang Yang Tercatat : {{$jumlahBarang}}
            </span>
            <div >
                <div>
        
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10 ">
                            <br>
                            <div class="" style="float: right;">
                                <a href="/dashboard/peminjaman/unduh" class="btn btn-primary" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f5f5f5}</style><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                                    CETAK PDF</a>
                                <a href="peminjaman/tambah" class="">
                                    <button style="margin-left: 10px" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="color: #fff;" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                        Tambah Penyewaan
                                    </button>
                                    </a>
                            </div>
                        </div>
                        <p>
                            
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Pembayaran Sewa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $r)
                                    <tr>
                                        <td>{{ $r->nama_barang }}</td>
                                        <td>{{ $r->harga_barang }}</td>
                                        <td>{{ $r->stok_barang }}</td>
                                        <td>{{ $r->pembayaran_sewabarang }}</td>
                                        {{-- <!-- <td><img src="/foto{{$r->file}}" width="200px"></td> --> --}}
                                        {{-- <td>
                                            @if ($r->file)
                                                <img src="{{ asset('foto/' . $r->file) }}"
                                                    style="max-width: 50px; height: 50px;" alt="">
                                            @endif
                                        </td> --}}
                                        <td>
                                            <a href="peminjaman/detail/{{ $r->id_barang }}">
                                                <button style="margin-left: 5px;" class="btn btn-warning">DETAIL</button>
                                            </a>
                                            <a href="peminjaman/edit/{{ $r->id_barang }}">
                                                <button class="btn btn-primary">EDIT</button>
                                            </a>
                                            
                                            <button class="btn btn-danger btnHapus" idBarang="{{ $r->id_barang }}">HAPUS</button>
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
            let idBarang = $(this).closest('.btnHapus').attr('idBarang');
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
                        url: 'peminjaman/hapus/',
                        data: {
                            id_barang: idBarang,
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

{{-- @section('footer') --}}

{{-- @endsection --}}
