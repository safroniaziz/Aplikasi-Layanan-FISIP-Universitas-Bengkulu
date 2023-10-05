@extends('layouts.application')
@section('halaman', 'Dosen Detail')
@section('menu', 'Dosen Detail')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped">
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
                    <th>Dosen Aktif</th>
                    <td> : </td>
                    <td>{{ $prodi->jumlah_dosen_prodi }} Dosen</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="box-body">
    <div class="row">
        <div class="col-md-12 table-responsive">
            <a href="{{ route('dosen') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-circle-left"></i>&nbsp; Kembali</a>
            <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </button>
            <table class="table table-bordered table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Prodi</th>
                        <th>Nama Dosen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dosens as $index => $dosen)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $dosen->nip }}</td>
                            <td>{{ $dosen->prodi->nama_prodi }}</td>
                            <td>{{ $dosen->nama_dosen }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='editDosen("{{ $dosen->nip }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('dosen.delete',[$dosen->nip]) }}" method="POST" id="form">
                                                @csrf @method('DELETE')
                                                <input type="hidden" name="prodiKode" value="{{ $prodi->kode }}">
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
                                data dosen masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @include('backend/dosens/partials.modal_add')
            </table>
            @include('backend/dosens/partials.modal_edit')
        </div>
    </div>
</div>
@endsection

@include('backend/dosens/form')

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

        function editDosen(nip){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('dosen').'/' }}"+nip+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#nip_edit').val(data.nip);
                    $('#prodi_kode_edit').val(data.prodi_kode);
                    $('#nama_dosen_edit').val(data.nama_dosen);

                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
