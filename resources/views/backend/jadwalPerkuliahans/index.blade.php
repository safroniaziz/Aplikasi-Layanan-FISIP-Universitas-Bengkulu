@extends('layouts.application')
@section('halaman', 'JadwalPerkuliahan')
@section('menu', 'JadwalPerkuliahan')
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
                        <th>Nama Mata Kuliah</th>
                        <th>Nama Ruangan Kelas</th>
                        <th>Hari</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalPerkuliahans as $index => $jadwalPerkuliahan)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $jadwalPerkuliahan->mataKuliah->nama_mata_kuliah }}</td>
                            <td>{{ $jadwalPerkuliahan->ruanganKelas->nama_ruangan_kelas }}</td>
                            <td>{{ $jadwalPerkuliahan->hari }}</td>
                            <td>{{ $jadwalPerkuliahan->waktu_mulai }}</td>
                            <td>{{ $jadwalPerkuliahan->waktu_selesai }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editJadwalPerkuliahan("{{ $jadwalPerkuliahan->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('jadwalPerkuliahan.delete',[$jadwalPerkuliahan->id]) }}" method="POST" id="form">
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
                @include('backend/jadwalPerkuliahans/partials.modal_add')
            </table>
            @include('backend/jadwalPerkuliahans/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/jadwalPerkuliahans/form')

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

        function editJadwalPerkuliahan(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('jadwal_perkuliahan').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#id_edit').val(data.id);
                    $('#mata_kuliah_id_edit').val(data.mata_kuliah_id);
                    $('#ruangan_kelas_id_edit').val(data.ruangan_kelas_id);
                    $('#hari_edit').val(data.hari);
                    $('#waktu_mulai_edit').val(data.waktu_mulai);
                    $('#waktu_selesai_edit').val(data.waktu_selesai);

                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush