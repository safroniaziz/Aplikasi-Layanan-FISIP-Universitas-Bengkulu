@extends('layouts.application')
@section('halaman', 'Buku Tamu')
@section('menu', 'Buku Tamu')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <form method="GET" id="pencarian">
                <div class="form-group" style="margin-bottom: 5px !important;">
                    <label for="nama" class="col-form-label">Cari Nama Tamu</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Tamu..." value="{{$nama}}">
                </div>
                <div style="margin-bottom:10px !important;">
                    <button type="submit" class="btn btn-success btn-sm btn-flat mb-2"><i class="fa fa-search"></i>&nbsp;Cari Data</button>
                </div>
            </form>
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tamu</th>
                        <th>Tanggal Bertamu</th>
                        <th>Waktu Bertamu</th>
                        <th>Yang Ditemui</th>
                        <th>Keperluan</th>
                        <th>No HP</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukuTamus as $key => $bukuTamu)
                        <tr>
                            <td>
                                {{ $bukuTamus->firstItem() + $key }}
                            </td>
                            <td>{{ $bukuTamu->nama_tamu }}</td>
                            <td>{{ $bukuTamu->tanggal->isoFormat('dddd, DD MMMM YYYY') }}</td>
                            <td>{{ $bukuTamu->tanggal->isoFormat('HH:mm:ss') }}</td>
                            <td>{{ $bukuTamu->tujuan }}</td>
                            <td>{{ $bukuTamu->keperluan }}</td>
                            <td>{{ $bukuTamu->no_hp }}</td>
                            <td>
                                <a href="{{ route('manajemenBukuTamu.download',[$bukuTamu->id]) }}">
                                    <img src="{{ asset('storage/' . $bukuTamu->foto) }}" style="width: 80px; height:auto" class="user-image rounded" alt="User Image">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $bukuTamus->appends(request()->has('nama') ? ['nama' => $nama] : [])->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection

@include('backend/alatPoadcasts/form')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@endpush
