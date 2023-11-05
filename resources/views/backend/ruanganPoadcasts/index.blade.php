@extends('layouts.application')
@section('halaman', 'Ruangan Poadcast')
@section('menu', 'Ruangan Poadcast')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important;">
            <a href="{{ route('ruanganPoadcast.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Deskripsi</th>
                        <th>Kapasitas</th>
                        <th>Lokasi</th>
                        <th>Harga Sewa</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruanganPoadcasts as $index => $ruanganPoadcast)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $ruanganPoadcast->nama_ruangan }}</td>
                            <td>{{ $ruanganPoadcast->deskripsi }}</td>
                            <td>{{ $ruanganPoadcast->kapasitas }}</td>
                            <td>{{ $ruanganPoadcast->lokasi }}</td>
                            <td>{{ $ruanganPoadcast->harga_sewa }}</td>
                            <td>
                                <img src="{{ asset('upload/foto_ruangan/'.$ruanganPoadcast->foto) }}" alt="" height="100">
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{ route('ruanganPoadcast.edit',[$ruanganPoadcast->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('ruanganPoadcast.delete',[$ruanganPoadcast->id]) }}" method="POST" id="form">
                                                @csrf @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                            </form>
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

@include('backend/ruanganPoadcasts/form')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah Anda Yakin?`,
                text: "Harap untuk memeriksa kembali sebelum menghapus data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    </script>
@endpush
