@extends('layouts.application')
@section('halaman', 'Jenis Surat')
@section('menu', 'Jenis Surat')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important;">
            <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </button>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemohon</th>
                        <th>Jenis Surat</th>
                        <th>Keperluan</th>
                        <th>Kelengkapan Surat</th>
                        <th>Status Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permohonanSurats as $index => $permohonanSurat)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $permohonanSurat->user->name }}</td>
                            <td>{{ $permohonanSurat->jenisSurat->jenis_surat }}</td>
                            <td>{{ $permohonanSurat->keperluan }}</td>
                            <td>
                                @foreach ($permohonanSurat->kelengkapanSurats as $kelengkapan)
                                    <a href="{{ route('kelengkapan.download',[$kelengkapan->id]) }}">
                                        * {{ $kelengkapan->nama_kelengkapan }} <br>
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if ($permohonanSurat->status == "terkirim")
                                    <small class="label label-warning">Belum diverifikasi</small>
                                @elseif ($permohonanSurat->status == "ditolak")
                                    <small class="label label-danger">Ditolak dengan alasan</small>
                                @elseif ($permohonanSurat->status == "selesai")
                                    <small class="label label-success">Selesai</small>
                                @else
                                    <small class="label label-primary">Sedang Diproses</small>
                                @endif
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            @if ($permohonanSurat->status != "selesai")
                                                <a onclick='verifikasi("{{ $permohonanSurat->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Verifikasi</a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">
                                Data jenis surat masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @include('backend/permohonanSuratMasuk/partials.modal_verifikasi')
            </table>
        </div>
    </div>
</div>
@endsection

@include('backend/permohonanSuratMasuk.partials.js')