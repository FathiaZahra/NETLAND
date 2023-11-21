@extends('layout.layout')
@section('title', 'Ticket')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Ticket
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tanggal Pemesanan</label>
                                    <input type="date" class="form-control" name="tanggal_pemesanan"
                                        value="{{ $ticket->tanggal_pemesanan }}" />

                                </div>
                                <div class="form-group">
                                    <label>Jumlah Tiket</label>
                                    <input type="number" class="form-control" name="jumlah_ticket"
                                    value="{{ $ticket->jumlah_ticket }}" />
                                </div>
                                <div class="form-group">
                                    <label>Harga Tiket</label>
                                    <input type="text" class="form-control" name="harga_ticket"
                                    value="{{ $ticket->harga_ticket }}" />
                                </div>
                                <div class="form-group">
                                    <label>Pembayaran Tiket</label>
                                    <input type="text" class="form-control" name="pembayaran_ticket"
                                    value="{{ $ticket->pembayaran_ticket }}" />
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" name="file" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_ticket" value="{{ $ticket->id_ticket }}" />
                                </div>
                                <div class="mt-3 d-flex">
                                    <button type="submit" class="btn btn-primary mr-2">SIMPAN</button>
                                    <a href="http://127.0.0.1:8000/dashboard/ticket" onclick="window.history.back();"style="margin-left: 5px" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection