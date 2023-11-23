@extends('layouts.application')
@section('halaman', 'Mata Kuliah Detail')
@section('menu', 'Mata Kuliah Detail')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Kode Program Studi</th>
                    <td> : </td>
                    <td>{{ $prodi->kode }}</td>
                </tr>
                <tr>
                    <th>Program Studi</th>
                    <td> : </td>
                    <td>{{ $prodi->nama_prodi }}</td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td> : </td>
                    <td>{{ $prodi->nama_fakultas }}</td>
                </tr>
                <tr>
                    <th>Jumlah Mata Kuliah</th>
                    <td> : </td>
                    <td>{{ $prodi->jumlah_mata_kuliah_prodi }} Data</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <a href="{{ route('mataKuliah') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-circle-left"></i>&nbsp; Kembali</a>
            <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </button>
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Prodi Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Kode Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mataKuliahs as $index => $mataKuliah)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $mataKuliah->prodi->nama_prodi }}</td>
                            <td>{{ $mataKuliah->nama_mata_kuliah }}</td>
                            <td>{{ $mataKuliah->kode_mata_kuliah }}</td>
                            <td>{{ $mataKuliah->sks }} SKS</td>
                            <td>Semester {{ $mataKuliah->semester }}</td>
                            <td>{{ $mataKuliah->keterangan }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editMataKuliah("{{ $mataKuliah->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('mataKuliah.delete',[$mataKuliah->id]) }}" method="POST" id="form">
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
                        <td colspan="8" class="text-center text-danger">Data mata kuliah masih kosong</td>
                    </tr>
                    @endforelse
                </tbody>
                @include('backend/mataKuliahs/partials.modal_add')
            </table>
            @include('backend/mataKuliahs/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/mataKuliahs/form')

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

        function editMataKuliah(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('mata_kuliah').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#mata_kuliah_id_edit').val(data.id);
                    $('#prodi_kode_edit').val(data.prodi_kode);
                    $('#nama_mata_kuliah_edit').val(data.nama_mata_kuliah);
                    $('#kode_mata_kuliah_edit').val(data.kode_mata_kuliah);
                    $('#sks_edit').val(data.sks);
                    $('#semester_edit').val(data.semester);
                    $('#keterangan_edit').val(data.keterangan);

                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
