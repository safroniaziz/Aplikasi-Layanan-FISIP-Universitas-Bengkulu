@extends('layouts.application')
@section('halaman', 'Create Ruangan Poadcast')
@section('menu', 'Create Ruangan Poadcast')
@section('content')
    <form action="{{ route('ruanganPoadcast.store') }}" method="POST" id="form" enctype="multipart/form-data">
        @csrf @method('POST')
        <div class="box-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">Kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="">Harga Sewa</label>
                    <input type="text" name="harga_sewa" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>
        </div>
        <div class="box-footer text-center">
            <a href="{{ route('ruanganPoadcast') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-circle-left"></i>&nbsp; Kembali</a>
            <button type="reset" name="reset" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Reset</button>
            <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
        </div>
    </form>
@endsection

@include('backend/ruanganPoadcasts/form')