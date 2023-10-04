@extends('layouts.application')
@section('halaman', 'Create Alat Poadcast')
@section('menu', 'Create Alat Poadcast')
@section('content')
    <form action="{{ route('alatPoadcast.update',[$alatPoadcast->id]) }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="box-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Nama Alat</label>
                    <input type="text" name="nama_alat" value="{{ $alatPoadcast->nama_alat }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">Jumlah Alat</label>
                    <input type="text" name="jumlah_alat" value="{{ $alatPoadcast->jumlah_alat }}" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="3">{{ $alatPoadcast->deskripsi }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-danger">
                        File Lama : {{ $alatPoadcast->foto }}
                    </small>
                </div>
            </div>
        </div>
        <div class="box-footer text-center">
            <a href="{{ route('alatPoadcast') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-circle-left"></i>&nbsp; Kembali</a>
            <button type="reset" name="reset" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Reset</button>
            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
        </div>
    </form>
@endsection

@include('backend/alatPoadcasts/form')
