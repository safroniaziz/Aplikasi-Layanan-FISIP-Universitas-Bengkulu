<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('jadwalPerkuliahan.update') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Jadwal Perkuliahan</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" id="id_edit">
                            <label for="exampleInputEmail1">Nama Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-control" id="mata_kuliah_id_edit">
                                <option disabled selected>-- pilih mata kuliah --</option>
                                @foreach ($mataKuliahs as $mataKuliah)
                                    <option value="{{ $mataKuliah->id }}">{{ $mataKuliah->nama_mata_kuliah }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Ruangan Kelas</label>
                            <select name="ruangan_kelas_id" class="form-control" id="ruangan_kelas_id_edit">
                                <option disabled selected>-- pilih Nama Ruangan Kelas --</option>
                                @foreach ($ruanganKelas as $ruanganKelas)
                                    <option value="{{ $ruanganKelas->id }}">{{ $ruanganKelas->nama_ruangan_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Hari</label>
                            <input type="text" class="form-control" name="hari" id="hari_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Waktu Mulai</label>
                            <input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai_edit">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Waktu Selesai</label>
                            <input type="text" class="form-control" name="waktu_selesai" id="waktu_selesai_edit">
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
