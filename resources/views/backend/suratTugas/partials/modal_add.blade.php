<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('suratTugas.store') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Tambah Surat Tugas</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nomor Surat</label>
                            <input type="text" class="form-control" name="nomor_surat">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Deskripsi Tugas</label>
                            <textarea name="deskripsi_tugas" class="form-control" cols="30" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" name="tanggal_kegiatan">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Kepala Tanda Tangan</label>
                            <input type="text" class="form-control" name="kepala_tanda_tangan" value="{{'Bengkulu, '. $tanggalSekarang.' '.$bulanSekarang.' '.$tahunSekarang }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Jabatan Yang Bertanda Tangan</label>
                            <input type="text" class="form-control" name="jabatan_yang_bertanda_tangan">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Yang Bertanda Tangan</label>
                            <input type="text" class="form-control" name="nama_yang_bertanda_tangan">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">NIP Yang Bertanda Tangan</label>
                            <input type="text" class="form-control" name="nip_yang_bertanda_tangan">
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
