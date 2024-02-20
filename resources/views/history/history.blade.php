@extends('layout.layout')
@section('title', 'History')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="card-header">
                    <span class="h1">
                        History
                    </span>
                    <hr>
                </div>
                <br>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                @foreach ($transaksi as $data)
                                    @if (Auth::user()->role == 'pengelola')
                                        @if (!Str::startsWith($data->log, 'staff_ticketing') && !Str::startsWith($data->log, 'penyewaan'))
                                            <div class="card" style="padding:10px;">
                                                <span>Log : {{ $data->log }}</span>
                                            </div>
                                        @endif
                                    @endif
                                    @if (Auth::user()->role == 'staff_ticketing')
                                        @if (!Str::startsWith($data->log, 'pengelola') && !Str::startsWith($data->log, 'penyewaan'))
                                            <div class="card" style="padding:10px;">
                                                <span>Log : {{ $data->log }}</span>
                                            </div>
                                            <br>
                                        @endif
                                    @endif

                                    @if (Auth::user()->role == 'staff_penyewaan')
                                        @if (!Str::startsWith($data->log, 'ticketing') && !Str::startsWith($data->log, 'pengelola'))
                                            <div class="card" style="padding:10px;">
                                                <span>Log : {{ $data->log }}</span>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        document.getElementById('checkAll').addEventListener('click', function() {
            var checkbox = document.querySelectorAll('.checkbox');
            for (var i = 0; i < checkbox.length; i++) {
                checkbox[i].checked = !checkbox[i].checked;
            }
        })
    </script>
@endsection
