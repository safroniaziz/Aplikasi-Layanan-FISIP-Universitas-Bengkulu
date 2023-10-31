<div class="modal fade" id="modalVerifikasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('konselingOffline.verify') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-check-circle"></i>&nbsp;Form Verifikasi</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_verifikasi">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Mulai Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_mulai">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_selesai">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Dari Jam</label>
                            <input type="time" class="form-control" name="waktu_mulai">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Sampai Jam</label>
                            <input type="time" class="form-control" name="waktu_selesai">
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