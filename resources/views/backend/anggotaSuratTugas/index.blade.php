@extends('layouts.application')
@section('halaman', 'Anggota Surat Tugas')
@section('menu', 'Anggota Surat Tugas')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important;">
            <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </button>
        </div>
        <div class="col-md-12">
            <div class="alert alert-danger">Anda Akan Menambahkan Anggota Yang Bertugas : <br> {{ $suratTugas->deskripsi_tugas }}</div>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Yang Bertugas</th>
                        <th>Keterangan Tugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggotas as $index => $anggota)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $anggota->nama_yang_bertugas }}</td>
                            <td>{{ $anggota->keterangan_tugas ? $anggota->keterangan_tugas : '-' }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editAnggota("{{ $anggota->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('suratTugas.anggota.delete',[$suratTugas->id,$anggota->id]) }}" method="POST" class="form">
                                                @csrf @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm btnSubmit"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @include('backend/anggotaSuratTugas/partials.modal_add')
            </table>
            @include('backend/anggotaSuratTugas/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/anggotaSuratTugas.partials.js')
