@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div >
        <div class="col-md-12">
            <span class="h1">
                Penyewaan
            </span>
            <div >
                <div class="card-header">
                   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10">
                            <a href="peminjaman/tambah">
                                <button style="margin-left: 930px" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: #fff;" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                    Tambah Penyewaan
                                </button>
                            </a>
                            <a href="/dashboard/unduh" class="btn btn-primary" target="_blank">CETAK PDF</a>
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
                                    {{-- <th>File</th> --}}
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
                                                <button class="btn btn-primary">EDIT</button></a>
                                            <button class="btn btn-danger btnHapus"
                                                idBarang="{{ $r->id_barang }}">HAPUS</button></a>
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
    </script>
@endsection

{{-- @section('footer') --}}

{{-- @endsection --}}
