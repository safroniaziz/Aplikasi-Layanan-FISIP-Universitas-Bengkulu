@extends('layouts.application')
@section('halaman', 'Dosen')
@section('menu', 'Dosen')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Prodi</th>
                        <th style="text-align: center">Jumlah Dosen</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodis as $index => $prodi)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $prodi->nama_prodi }}</td>
                            <td class="text-center">
                               {{ $prodi->dosens_count }}
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{ route('dosen.detail',[$prodi->kode]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-search"></i>&nbsp; Detail</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection