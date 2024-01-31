<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('suratTugas.update') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Jenis Surat</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_edit">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nomor Surat</label>
                            <input type="text" class="form-control" name="nomor_surat" id="nomor_surat_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Deskripsi Tugas</label>
                            <textarea name="deskripsi_tugas" id="deskripsi_tugas_edit" class="form-control" cols="30" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                            <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Kepala Tanda Tangan</label>
                            <input type="text" class="form-control" name="kepala_tanda_tangan" id="kepala_tanda_tangan_edit" value="{{'Bengkulu, '. $tanggalSekarang.' '.$bulanSekarang.' '.$tahunSekarang }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Jabatan Yang Bertanda Tangan</label>
                            <input type="text" class="form-control" name="jabatan_yang_bertanda_tangan" id="jabatan_yang_bertanda_tangan_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Yang Bertanda Tangan</label>
                            <input type="text" class="form-control" name="nama_yang_bertanda_tangan" id="nama_yang_bertanda_tangan_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">NIP Yang Bertanda Tangan</label>
                            <input type="text" class="form-control" name="nip_yang_bertanda_tangan" id="nip_yang_bertanda_tangan_edit">
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
