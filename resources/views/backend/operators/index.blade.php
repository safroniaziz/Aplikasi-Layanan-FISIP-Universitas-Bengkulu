@extends('layouts.application')
@section('halaman', 'Operator')
@section('menu', 'Operator')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <div style="margin-bottom: 5px !important">
                <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Data
                </button>
            </div>
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead class="bg-primary">
                    <tr>
                        <th style=" vertical-align:middle">No</th>
                        <th style=" vertical-align:middle">Nama Operator</th>
                        <th style=" vertical-align:middle">Username</th>
                        <th style=" vertical-align:middle">Email</th>
                        <th style=" vertical-align:middle; text-align:center">Ubah Password</th>
                        <th style=" vertical-align:middle">Terdaftar Sejak</th>
                        <th style="text-align:center; vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($operators as $index => $operator)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $operator->name }}</td>
                            <td>{{ $operator->username }}</td>
                            <td>{{ $operator->email }}</td>
                            <td>{{ $operator->created_at }}</td>
                            <td class="text-center">
                                <a onclick="ubahPassword({{ $operator->id }})" class="btn btn-primary btn-sm btn-flat" style="color:white; cursor:pointer;"><i class="fa fa-key"></i></a>
                            </td>
                            <td>
                            <table>
                                <tr>
                                    <td>
                                        <a onclick="editOperator({{ $operator->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('operator.delete',[$operator->id]) }}" method="POST">
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
            </table>
            @include('backend/operators.partials.modal_ubah_password')
        </div>
        @include('backend/operators.partials.modal_add')
    </div>
    @include('backend/operators.partials.modal_edit')
</div>
@endsection

@include('backend/operators/form')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        function ubahPassword(id){
            $('#modalubahpassword').modal('show');
            $('#id_password').val(id);
        }

        function editOperator(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('operator').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#operator_id_edit').val(data.id);
                    $('#name_edit').val(data.name);
                    $('#email_edit').val(data.email);
                    $('#username_edit').val(data.username);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
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
    </script>
@endpush
