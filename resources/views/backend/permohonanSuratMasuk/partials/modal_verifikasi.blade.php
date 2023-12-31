<div class="modal fade" id="modalVerifikasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('permohonan.verifikasiPost') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Verifikasi Permohonan Surat</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_verifikasi" id="id_verifikasi">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Pilih Status Verifikasi</label>
                            <select name="status" class="form-control" id="">
                                <option disabled selected>-- pilih status --</option>
                                <option value="diproses">Sedang Diproses</option>
                                <option value="ditolak">Ditolak</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea name="keterangan_status" id="" class="form-control" id="" cols="30" rows="3"></textarea>
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
