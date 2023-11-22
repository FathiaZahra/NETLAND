@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data informasi
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="/dashboard/informasi/simpan" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Informasi</label>
                                    <input type="text" class="form-control" name="nama_informasi" />

                                </div>
                                <div class="form-group">
                                    <label>Isi Informasi</label>
                                    <textarea name="isi_informasi" class="form-control" cols="20" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto Informasi</label>
                                    <input type="file" name="file" class="form-control" />
                                </div>
                                <div class="mt-3 d-flex">
                                    <button type="submit" class="btn btn-primary mr-2">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" style="margin-left: 10px;"class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
