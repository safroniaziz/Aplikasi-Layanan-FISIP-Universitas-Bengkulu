<div class="modal fade" id="modalAlihkan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('jadwalPerkuliahan.alihkan') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Edit Jadwal Perkuliahan</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id_alihkan">

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Dialihkan Pada Tanggal</label>
                            <input type="date" class="form-control" readonly name="dialihkan_dari" value="{{ old('tanggal', now()->format('Y-m-d')) }}">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Dialihkan Ke Tanggal</label>
                            <input type="date" class="form-control" name="dialihkan_ke">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Waktu Mulai</label>
                            <input type="time" class="form-control" name="waktu_mulai">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Waktu Selesai</label>
                            <input type="time" class="form-control" name="waktu_selesai">
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