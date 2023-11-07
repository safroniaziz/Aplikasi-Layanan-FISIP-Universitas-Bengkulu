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
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>No WA</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pegawais as $index => $pegawai)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $pegawai->nip }}</td>
                            <td>{{ $pegawai->nama_pegawai }}</td>
                            <td>{{ $pegawai->jabatan }}</td>
                            <td>{{ $pegawai->no_hp ? $pegawai->no_hp : '-' }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editPegawai("{{ $pegawai->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('pegawai.delete',[$pegawai->id]) }}" method="POST" id="form">
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
                            <td colspan="5" class="text-danger text-center">
                                data pegawai masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @include('backend/pegawai/partials.modal_add')
            </table>
            @include('backend/pegawai/partials.modal_edit')
        </div>
    </div>
</div>
@endsection
@include('backend/pegawai/form')

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

        function editPegawai(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('pegawai').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#nip_edit').val(data.nip);
                    $('#nama_pegawai_edit').val(data.nama_pegawai);
                    $('#jabatan_edit').val(data.jabatan);
                    $('#no_hp_edit').val(data.no_hp);

                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
