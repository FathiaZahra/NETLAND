@extends('layout.layout')
@section('title', 'ticket')
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
                        Detail Data Ticket
                    </span>
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                <div class="container">
                                    @foreach ($ticket as $i)
                                        @if ($i->file)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $i->file }} "style="max-width: 170px; height: auto;" />                                </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Pemesanan</td>
                                                    <td>: {{$i->tanggal_pemesanan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Jumlah Tiket</td>
                                                    <td>: {{$i->jumlah_ticket}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Harga Tiket</td>
                                                    <td>: {{$i->harga_ticket}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Pembayaran Tiket</td>
                                                    <td>: {{$i->pembayaran_ticket}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3">
                                            <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
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