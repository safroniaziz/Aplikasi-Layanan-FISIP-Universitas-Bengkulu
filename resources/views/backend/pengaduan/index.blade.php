@extends('layouts.application')
@section('halaman', 'Pegawai Detail')
@section('menu', 'Pegawai Detail')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <a href="{{ route('pegawai') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-circle-left"></i>&nbsp; Kembali</a>
            <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </button>
            <table class="table table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Kode Tiket</th>
                        <th>Pokok Permasalahan</th>
                        <th>Bukti Pendukung</th>
                        <th>Unit Dituju</th>
                        <th>Tanggapan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengaduans as $index => $pengaduan)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $pengaduan->user->name }}</td>
                            <td>{{ $pengaduan->tiket_pengaduan }}</td>
                            <td>{{ $pengaduan->pokok_permasalahan }}</td>
                            <td>
                                @if ($pengaduan->bukti_pendukung != null || $pengaduan->bukti_pendukung != "")
                                    <a href="{{ route('pengaduan.download',[$pengaduan->id]) }}">{{ $pengaduan->bukti_pendukung }}</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $pengaduan->unit_tujuan }}</td>
                            <td>{{ $pengaduan->respon ? $pengaduan->respon : '-' }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            @if ($pengaduan->respon == null || $pengaduan->respon == "")
                                                <a onclick='respon("{{ $pengaduan->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-comment"></i>&nbsp; Tanggapi</a>
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-danger text-center">
                                data pegawai masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @include('backend/pengaduan/partials.modal_respon')
        </div>
    </div>
</div>
@endsection
@include('backend/pengaduan/form')

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

        function respon(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('laporan_pengaduan').'/' }}"+id+'/respon';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalRespon').modal('show');
                    $('#id_respon').val(data.id);
                    $('#tiket_pengaduan').val(data.tiket_pengaduan);
                    $('#pokok_permasalahan').val(data.pokok_permasalahan);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
