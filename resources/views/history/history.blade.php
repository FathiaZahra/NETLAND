@extends('layout.layout')
@section('title','content')
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
                                @foreach ($log as $data)
                                <div class="card" style="padding:10px;">
                                    <span>Log : {{ $data->log }}</span>
                                </div>
                                <br> 
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
