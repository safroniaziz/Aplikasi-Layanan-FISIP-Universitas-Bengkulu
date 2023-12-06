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
                        <th>Nama Unit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($units as $index => $unit)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $unit->nama_unit }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editUnit("{{ $unit->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('unit.delete',[$unit->id]) }}" method="POST" class="form">
                                                @csrf @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm btnSubmit"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                            </form>
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
                @include('backend/units/partials.modal_add')
            </table>
            @include('backend/units/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/units.partials.js')