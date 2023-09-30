<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('programStudi.update') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Tambah Program Studi</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Kode Prodi</label>
                            <input type="text" class="form-control" name="kode" id="kode_edit" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Prodi</label>
                            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Fakultas</label>
                            <input type="text" class="form-control" name="nama_fakultas" id="nama_fakultas_edit">
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