@extends('layouts.application')
@section('halaman', 'MahasiswaMataKuliah')
@section('menu', 'MahasiswaMataKuliah')
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
                        <th>Npm Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswaMataKuliahs as $index => $mahasiswaMataKuliah)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $mahasiswaMataKuliah->mataKuliah->nama_mata_kuliah }}</td>
                            <td>{{ $mahasiswaMataKuliah->mahasiswa->npm }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editMahasiswaMataKuliah("{{ $mahasiswaMataKuliah->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('mahasiswaMataKuliah.delete',[$mahasiswaMataKuliah->id]) }}" method="POST" id="form">
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
                @include('backend/mahasiswaMataKuliahs/partials.modal_add')
            </table>
            @include('backend/mahasiswaMataKuliahs/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/mahasiswaMataKuliahs/form')

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

        function editMahasiswaMataKuliah(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('mahasiswa_mata_kuliah').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#id_edit').val(data.id);
                    $('#mata_kuliah_id_edit').val(data.mata_kuliah_id);
                    $('#mahasiswa_npm_edit').val(data.mahasiswa_npm);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
