@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Akomodasi
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="/dashboard/akomodasi/simpan" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" name="nama_akomodasi" />

                                </div>
                                <div class="form-group">
                                    <label>Link Maps</label>
                                    <textarea name="isi_akomodasi" class="form-control" cols="20" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto Akomodasi</label>
                                    <input type="file" name="file" class="form-control" />
                                </div>
                                <div class="mt-3 d-flex">
                                    <button type="submit" class="btn btn-primary mr-2">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
