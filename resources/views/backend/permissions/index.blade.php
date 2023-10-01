@extends('layouts.application')
@section('halaman', 'Permission')
@section('menu', 'Permission')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important;">
            <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </button>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-bordered" style="width:100%;">
                <thead class="bg-primary">
                    <tr>
                        <th style=" vertical-align:middle">No</th>
                        <th style=" vertical-align:middle">Nama Permission</th>
                        <th style="text-align:center; vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick="editPermission({{ $permission->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('permission.delete',[$permission->id]) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @include('backend/permissions/partials.modal_add')
            </table>
            @include('backend/permissions/partials.modal_edit')
        </div>
    </div>       
</div>
@endsection

@include('backend/permissions/form')

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

        function editPermission(kode){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('permission').'/' }}"+kode+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#permission_id_edit').val(data.id);
                    $('#name_edit').val(data.name);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush