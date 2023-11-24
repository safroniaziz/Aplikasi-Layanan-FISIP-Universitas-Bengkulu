@extends('layouts.application')
@section('halaman', 'Pemesanan Ruangan Poadcast')
@section('menu', 'Pemesanan Ruangan Poadcast')
@section('content')
<div class="box-body">
    <div class="row">
        <!-- <div class="col-md-12" style="margin-bottom: 10px !important;">
            <a href="{{ route('ruanganPoadcast.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
        </div> -->
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>No Wa</th>
                        <th>Keperluan</th>
                        <th>Tanggal dan Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($PemesananRuangan as $index => $data)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->no_wa }}</td>
                        <td>{{ $data->keperluan }}</td>
                        <td>{{ $data->tanggal_dan_waktu_mulai }}</td>
                        <td>@if( $data->status==0)
                            <span class="label label-warning">Belum DiKonformasi</span>
                            @else
                            <span class="label label-success">Dikonfirmasi</span>
                            @endif
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        @if ($data->status == 1)
                                            <a href="" disabled class="btn btn-success btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Konfirmasi</a>
                                            @else
                                            <a href="{{ route('sewaRuangan.konfirmasi',[$data->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Konfirmasi</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('sewaRuangan.delete',[$data->id]) }}" method="POST" id="form">
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
        var form = $(this).closest("form");
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
