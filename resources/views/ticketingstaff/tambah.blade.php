@extends('layout.layout')
@section('title', 'Ticket')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Tiket
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan/" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>tanggal pemesanan</label>
                                    <input type="date" class="form-control" name="tanggal_pemesanan" />

                                </div>
                                <div class="form-group">
                                    <label>jumlah tiket</label>
                                    <input type="number" class="form-control" name="jumlah_ticket" />
                                </div>
                                <div class="form-group">
                                    <label>harga tiket</label>
                                    <input type="decimal" class="form-control" name="harga_ticket" />
                                </div>
                                <div class="form-group">
                                    <label>Pembayaran</label>
                                    {{-- <input type="text" class="form-control" name="pembayaran_sewabarang" /> --}}
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
                                <div class="mt-3 d-flex">
                                    <button type="submit" class="btn btn-primary mr-2">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();"style="margin-left: 5px" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection