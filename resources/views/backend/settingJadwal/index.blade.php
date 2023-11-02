@extends('layouts.application')
@section('halaman', 'jadwal_settings')
@section('menu', 'Setting View Jadwal')
@section('content')
<div class="box-body">
    @livewireStyles

    @livewire('jadwal-setting-view-livewire')

    @livewireScripts

</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

@endpush
