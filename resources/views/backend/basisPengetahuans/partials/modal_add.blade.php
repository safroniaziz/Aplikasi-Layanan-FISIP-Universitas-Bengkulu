<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('basisPengetahuan.store') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Tambah Basis Pengetahuan</p>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Pertanyaan</label>
                            <textarea name="pertanyaan" class="form-control" id="pertanyaan"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Jawaban</label>
                            <textarea name="jawaban" class="form-control" id="jawaban"></textarea>
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
