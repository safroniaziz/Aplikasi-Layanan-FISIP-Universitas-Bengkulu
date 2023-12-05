<div class="modal fade" id="modalRespon">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengaduan.responPost') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Respon Pengaduan</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_respon" id="id_respon">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nomor Tiket Pengaduan</label>
                            <input type="text" id="tiket_pengaduan" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Pokok Permasalahan</label>
                            <textarea name="" id="pokok_permasalahan" class="form-control" cols="30" rows="3" disabled></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Respon</label>
                            <textarea name="respon" id="" class="form-control" id="" cols="30" rows="3"></textarea>
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
