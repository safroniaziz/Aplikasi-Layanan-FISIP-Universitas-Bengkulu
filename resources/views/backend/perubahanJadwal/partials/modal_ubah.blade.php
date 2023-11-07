<div class="modal fade" id="modalUbahJadwal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('perubahanJadwal.update') }}" method="POST" class="form">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-exchange"></i>&nbsp;Formulir Perubahan Jadwal</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="jadwal_id" id="jadwal_id_ubah">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Status Perubahan</label>
                            <select name="status" class="form-control" id="status" onchange="toggleRequired()" required>
                                <option value="dibatalkan">Dibatalkan</option>
                                <option value="dialihkan">Dialihkan</option>
                            </select>
                        </div>

                        <div id="ubah" style="display:none">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Ruangan Kuliah</label>
                                <select name="ruangan_id" class="form-control" id="ruangan_id">
                                    @foreach ($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Hari</label>
                                <select name="hari" class="form-control" id="hari">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
    
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Waktu Mulai</label>
                                <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai">
                            </div>
    
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Waktu Selesai</label>
                                <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai">
                            </div>
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
