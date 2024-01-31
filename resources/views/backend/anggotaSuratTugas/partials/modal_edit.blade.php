<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('suratTugas.anggota.update',[$suratTugas->id]) }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Anggota Surat Tugas</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_edit">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Yang Bertugas</label>
                            <input type="text" name="nama_yang_bertugas" id="nama_yang_bertugas_edit" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Keterangan Tugas</label>
                            <input type="text" name="keterangan_tugas" id="keterangan_tugas_edit" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm btn-flat" id="btnCancel" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                <button type="submit" class="btn btn-primary btn-sm btn-flat btnSubmit"><i class="fa fa-check-circle"></i>&nbsp;Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
