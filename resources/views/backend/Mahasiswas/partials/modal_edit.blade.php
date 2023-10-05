<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('mahasiswa.update') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Tambah Mahasiswa</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="prodiKode" value="{{ $prodi->kode }}">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Prodi</label>
                            <input type="text" class="form-control" value="{{ $prodi->nama_prodi }}" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Npm</label>
                            <input type="text" class="form-control" name="npm" id="npm_edit" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa_edit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm btn-flat" id="btnCancel" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                <button type="submit" class="btn btn-primary btn-sm btn-flat" id="btnSubmit" ><i class="fa fa-check-circle"></i>&nbsp;Simpan Data</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
