@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
<style>
    table{
        border:1px solid transparent !important;
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Detail Data Penyewaan
                    </span>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                <div class="container">
                                    @foreach ($barang as $i)
                                        @if ($i->file)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $i->file }} "style="max-width: 170px; height: auto;" />                                </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder">Nama Barang</td>
                                                    <td>: {{$i->nama_barang}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Harga Barang</td>
                                                    <td>: {{$i->harga_barang}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Stok Barang</td>
                                                    <td>: {{$i->stok_barang}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Pembayaran Sewa</td>
                                                    <td>: {{$i->pembayaran_sewabarang}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3">
                                            <a href="http://127.0.0.1:8000/dashboard/peminjaman" onclick="window.history.back();" style="margin-left: 5px" class="btn btn-success">KEMBALI</a>
                                        </div>
                                    </div>

                                    @csrf
                                </div>

                            </div>
                        </div>
                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection