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
            <a href="{{ route('jadwalPerkuliahan.semuaJadwal') }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-list-alt"></i>&nbsp; Lihat Semua Jadwal</a>
        </div>
        <div class="col-md-12">
            <div class="alert alert-danger">Menampilkan Jadwal Perkuliahan Pada Hari <b>{{ $hariIni }}</b></div>
        </div>
        <div class="col-md-12 table-responsive">
            <form method="GET" id="pencarian">
                <div class="form-group" style="margin-bottom: 5px !important;">
                    <label for="nama" class="col-form-label">Cari Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Mata Kuliah..." value="{{$nama}}">
                </div>
                <div style="margin-bottom:10px !important;">
                    <button type="submit" class="btn btn-success btn-sm btn-flat mb-2"><i class="fa fa-search"></i>&nbsp;Cari Data</button>
                </div>
            </form>
            <table class="table table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Program Studi</th>
                        <th>Nama Ruangan Kelas</th>
                        <th>Hari</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Kehadiran</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwalPerkuliahans as $key => $jadwalPerkuliahan)
                        <tr @if ($jadwalPerkuliahan->status_dibatalkan)
                            style="background:#F08080"
                            @elseif($jadwalPerkuliahan->dialihkan()->exists())
                            style="background:#ffe787"
                        @endif>
                            <td>
                                {{ $jadwalPerkuliahans->firstItem() + $key }}
                            </td>
                            <td>{{ $jadwalPerkuliahan->mataKuliah->nama_mata_kuliah.' ('.$jadwalPerkuliahan->matakuliah->keterangan.') ' }}</td>
                            <td>{{ $jadwalPerkuliahan->mataKuliah->prodi->nama_prodi }}</td>
                            <td>{{ $jadwalPerkuliahan->ruanganKelas->nama_ruangan_kelas }}</td>
                            <td>{{ $jadwalPerkuliahan->hari }}</td>
                            <td>{{ $jadwalPerkuliahan->waktu_mulai }}</td>
                            <td>{{ $jadwalPerkuliahan->waktu_selesai }}</td>
                            <td>
                                <table>
                                    <tr>
                                        
                                        @if (!$jadwalPerkuliahan->dialihkan()->exists() && !$jadwalPerkuliahan->status_dibatalkan)
                                            <td>
                                                <a onclick="alihkan({{ $jadwalPerkuliahan->id }})" class="btn btn-info btn-sm btn-flat"><i class="fa fa-exchange"></i>&nbsp; Alihkan</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('jadwalPerkuliahan.batalkan',[$jadwalPerkuliahan->id]) }}" method="POST" id="form">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm btn-flat show_confirm"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                                                </form>
                                            </td>
                                        @endif
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                Data jadwal masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $jadwalPerkuliahans->appends(request()->has('nama') ? ['nama' => $nama] : [])->links("pagination::bootstrap-4") }}
            @include('backend/jadwalPerkuliahans/partials.modal_edit')
        </div>
        @include('backend/jadwalPerkuliahans/partials.modal_add')
    </div>
    @include('backend/jadwalPerkuliahans/partials.modal_alihkan')
</div>
@endsection

@include('backend/jadwalPerkuliahans/form')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        function alihkan(id){
            $('#modalAlihkan').modal('show');
            $('#id_alihkan').val(id);
        }
        
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
