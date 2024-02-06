@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <h1 style="padding-left: 50px">DASHBOARD</h1>
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-4">
                <div class="card mb-4 rounded-3 shadow-sm">
                    {{-- <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Free</h4>
          </div> --}}
                    <div class="card-body">
                        <h1>{{ $jumlahAkomodasi }}</h1>
                        <h3>
                            AKOMODASI
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4 rounded-3 shadow-sm">
                    {{-- <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Pro</h4>
          </div> --}}
                    <div class="card-body">
                        <h1>{{ $jumlahTicket }}</h1>
                        <h3>
                            TICKETING
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4 rounded-3 shadow-sm">
                    {{-- <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pro</h4>
                    </div> --}}
                    <div class="card-body">
                        <h1>{{ $jumlahPenyewaan }}</h1>
                        <h3>
                            PENYEWAAN
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="script.js"></script> --}}
@endsection
