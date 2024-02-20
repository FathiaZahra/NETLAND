@extends('layout.layout')
@section('title','Tambah Barang')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah Barang
                </span>
            </div>
            <div class="card-body">
                <form method="POST" action="simpan" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="validationServer" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    Please choose a username.
                                  </div>
                                {{-- @foreach ($Barang as $barang)
                                    <option value="{{$Barang->id_barang}}">
                                    {{ $Barang->barang }}
                                    </option>
                                @endforeach --}}
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input type="text" class="form-control" name="harga_barang" />
                            </div>
                            <div class="form-group">
                                <label>Stok Barang</label><br>
                                <input type="number" class="form-control" name="stok_barang" />
                                </select>
                            <div class="form-group">
                                <label>Pembayaran</label>
                                <input type="text" class="form-control" name="pembayaran_sewabarang" />
                                {{-- <select class="form-control" name="pembayaran_sewabarang">
                                    <option value="qris">Qris</option>
                                    <option value="credit_card">Kartu Kredit</option>
                                    <option value="transfer">Transfer Bank</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label>Foto Barang</label>
                                <input type="file" class="form-control" name="file" />
                            </div>
                                @csrf
                                <br>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                    <a href="http://127.0.0.1:8000/dashboard/peminjaman" onclick="window.history.back();" style="margin-left: 5px;" class="btn btn-success">KEMBALI</a>                </form>
        </div>
    </div>
</div>
@endsection