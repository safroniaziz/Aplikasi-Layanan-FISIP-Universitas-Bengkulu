@extends('layouts.application')
@section('halaman', 'Role')
@section('menu', 'Role')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-striped" style="width: 100%">
                <tbody>
                    <tr>
                        <th>Nama Role</th>
                        <td>
                            {{ $role->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('role.assign',[$role->id]) }}" method="POST">
                @csrf @method('POST')
                <div class="form-group">
                    <select name="permission_id" class="form-control select2" id="">
                        <option selected disabled>-- pilih permission --</option>
                        @foreach ($unassignedPermissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 10px !important;">
                    <a href="{{ route('role') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-circle-left"></i>&nbsp; Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                </div>
            </form>
        </div>
        <div class="col-md-12 table-responsive">
            <table class="table table-hover table-striped" style="width: 100%">
                <thead class="bg-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Permission</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($role->permissions as $index => $permission)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <form action="{{ route('role.revoke',[$role->id,$permission->id]) }}" method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <a class="text-danger">Data Kosong</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @include('backend/roles/partials.modal_add')
            </table>
            @include('backend/roles/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        $(".selectPermission").select2({
            placeholder: 'Masukan Nama Permission',
        });

        $(document).ready(function() {
            $('.select2').select2();
        });

    </script>
@endpush
