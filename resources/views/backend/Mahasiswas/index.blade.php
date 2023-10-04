@extends('layouts.application')
@section('halaman', 'Mahasiswa')
@section('menu', 'Mahasiswa')
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
                        <th>Npm</th>
                        <th>Nama Prodi</th>
                        <th>Nama Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $index => $mahasiswa)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $mahasiswa->npm }}</td>
                            <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
                            <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editMahasiswa("{{ $mahasiswa->npm }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('mahasiswa.delete',[$mahasiswa->npm]) }}" method="POST" id="form">
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
                @include('backend/mahasiswas/partials.modal_add')
            </table>
            @include('backend/mahasiswas/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/mahasiswas/form')

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

        function editMahasiswa(npm){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('mahasiswa').'/' }}"+npm+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#npm_edit').val(data.npm);
                    $('#prodi_kode_edit').val(data.prodi_kode);
                    $('#nama_mahasiswa_edit').val(data.nama_mahasiswa);

                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
