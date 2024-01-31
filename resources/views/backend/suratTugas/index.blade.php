@extends('layouts.application')
@section('halaman', 'Surat Tugas')
@section('menu', 'Surat Tugas')
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
                        <th>Nomor Surat</th>
                        <th>Deskripsi Tugas</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Kepala Tanda Tangan</th>
                        <th>Jabatan Yang Bertanda Tangan</th>
                        <th>Nama Yang Bertanda Tangan</th>
                        <th>NIP Yang Bertanda Tangan</th>
                        <th style="text-align: center">Jumlah Yang Bertugas</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suratTugass as $index => $suratTugas)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $suratTugas->nomor_surat }}</td>
                            <td>{{ $suratTugas->deskripsi_tugas ? $suratTugas->deskripsi_tugas : '-' }}</td>
                            <td>{{ $suratTugas->tanggal_kegiatan ? $suratTugas->tanggal_kegiatan : '-' }}</td>
                            <td>{{ $suratTugas->kepala_tanda_tangan ? $suratTugas->kepala_tanda_tangan : '-' }}</td>
                            <td>{{ $suratTugas->jabatan_yang_tanda_tangan ? $suratTugas->jabatan_yang_tanda_tangan : '-' }}</td>
                            <td>{{ $suratTugas->nama_yang_tanda_tangan ? $suratTugas->nama_yang_tanda_tangan : '-' }}</td>
                            <td>{{ $suratTugas->nip_yang_tanda_tangan ? $suratTugas->nip_yang_tanda_tangan : '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('suratTugas.anggota',[$suratTugas->id]) }}" class="btn btn-info btn-sm btn-flat">{{ $suratTugas->anggotas_count }}</a>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{ route('suratTugas.cetak',[$suratTugas->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak</a>
                                        </td>
                                        <td>
                                            <a onclick='editSuratTugas("{{ $suratTugas->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('suratTugas.delete',[$suratTugas->id]) }}" method="POST" class="form">
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
                @include('backend/suratTugas/partials.modal_add')
            </table>
            @include('backend/suratTugas/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/suratTugas.partials.js')
