@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Peminjaman
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang"
                                        value="{{ $barang->nama_barang }}" />

                                </div>
                                <div class="form-group">
                                    <label>Harga Barang</label>
                                    <input type="text" class="form-control" name="harga_barang"
                                    value="{{ $barang->harga_barang }}" />                               
                                </div>
                                <div class="form-group">
                                    <label>Stok Barang</label>
                                    <input type="text" class="form-control" name="stok_barang"
                                    value="{{ $barang->stok_barang }}" />                               
                                </div>
                                <div class="form-group">
                                    <label>Pembayaran Sewa</label>
                                    {{-- <input type="text" class="form-control" name="pembayaran_sewabarang"
                                    value="{{ $barang->pembayaran_sewabarang }}" />                                 --}}
                                    <select class="form-control" name="pembayaran_sewabarang">
                                        <option value="qris">Qris</option>
                                        {{-- <option value="credit_card">Kartu Kredit</option> --}}
                                        <option value="bank_transfer">Transfer Bank</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" name="file" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}" />
                                </div>
                                <div class="mt-3 d-flex">
                                    <button type="submit" class="btn btn-primary mr-2">SIMPAN</button><br>
                                    <a href="http://127.0.0.1:8000/dashboard/peminjaman" onclick="window.history.back();" style="margin-left: 5px; " class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection