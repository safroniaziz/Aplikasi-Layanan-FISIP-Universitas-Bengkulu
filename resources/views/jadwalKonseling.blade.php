@extends('layouts.application')
@section('halaman', 'jadwalKonseling')
@section('menu', 'jadwalKonseling')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <div id='calendar'></div>
        </div>
    </div>
</div>

<div id="modal-action" class="modal" tabindex="-1">

</div>

@endsection
