<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('mataKuliah.update') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Mata Kuliah</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="mata_kuliah_id" id="mata_kuliah_id_edit">
                            <label for="exampleInputEmail1">Nama Prodi</label>
                            <select name="prodi_kode" class="form-control" id="prodi_kode_edit">
                                <option disabled selected>-- pilih prodi --</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->kode }}">{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" name="nama_mata_kuliah" id="nama_mata_kuliah_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" name="kode_mata_kuliah" id="kode_mata_kuliah_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">SKS</label>
                            <input type="text" class="form-control" name="sks" id="sks_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Semester</label>
                            <input type="text" class="form-control" name="semester" id="semester_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan_edit">
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
