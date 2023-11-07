<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pegawai.update') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Dosen</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">NIP</label>
                            <input type="text" class="form-control" name="nip" id="nip_edit" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai_edit">
                        </div>

                        <div class="form-group col-md-12">jabatan
                            <label for="exampleInputEmail1">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nomor WhatsApp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp_edit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm btn-flat" id="btnCancel" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-flat" id="btnSubmit" ><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
