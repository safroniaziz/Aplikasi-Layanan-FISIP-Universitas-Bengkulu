@extends('layouts.application')
@section('halaman', 'JadwalPerkuliahan')
@section('menu', 'JadwalPerkuliahan')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-6" style="margin-bottom: 10px !important;">
            <a href="{{ route('jadwalPerkuliahan') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-list-alt"></i>&nbsp; Kembali</a>
            <table class="table table-hover table-striped" style="margin-top: 10px !important;">
                <tbody>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td> : </td>
                        <td>{{ $jadwalPerkuliahan->matakuliah->nama_mata_kuliah }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td> : </td>
                        <td>{{ $jadwalPerkuliahan->mataKuliah->prodi->nama_prodi }}</td>
                    </tr>
                    <tr>
                        <th>Hari</th>
                        <td> : </td>
                        <td>{{ $jadwalPerkuliahan->hari }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Mulai</th>
                        <td> : </td>
                        <td>{{ $jadwalPerkuliahan->waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Selesai</th>
                        <td> : </td>
                        <td>{{ $jadwalPerkuliahan->waktu_selesai }}</td>
                    </tr>
                    <tr>
                        <th>Status Jadwal</th>
                        <td> : </td>
                        <td>
                            @php
                                try {
                                    $waktuMulai = \Carbon\Carbon::createFromFormat('H:i', $jadwalPerkuliahan->waktu_mulai);
                                } catch (\Exception $e) {
                                    $waktuMulai = null;
                                }
                            @endphp

                            @if ($waktuMulai && now() <= $waktuMulai)
                                <small class="label label-success">Tidak Sedang Berlangsung</small>
                            @else
                                <small class="label label-danger">Tidak Sedang Berlangsung</small>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6" style="margin-bottom: 10px !important;">
            {{-- {!! QrCode::generate('Make me into a QrCode!'); !!} --}}
            {{-- {!! QrCode::generate(route('scan-qr-code', [$jadwalPerkuliahan->id])); !!} --}}
            {!! QrCode::generate(route('scan-qr-code', [$jadwalPerkuliahan->id], true)); !!}

        </div>
    </div>
</div>
@endsection

