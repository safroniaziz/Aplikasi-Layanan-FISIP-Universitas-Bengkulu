<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengampu.store') }}" method="POST" id="form">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <p style="font-weight: bold"><i class="fa fa-plus"></i>&nbsp;Form Tambah Pengampu</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Program Studi</label>
                            <select name="prodiKode" class="form-control select2" id="prodiKode">
                                <option disabled selected>-- pilih program studi --</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->kode }}">{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-control select2" id="mataKuliahId">
                                <option disabled selected>-- pilih mata kuliah --</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Nama Dosen</label>
                            <select name="dosen_nip" class="form-control select2" id="">
                                <option disabled selected>-- pilih nip dosen --</option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->nip }}">{{ $dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="is_active" class="form-control" id="">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
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

@push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('change','#prodiKode',function(){
                // alert('berhasil');
                var prodiKode = $(this).val();
                var div = $(this).parent().parent();
                var op=" ";
                $.ajax({
                type :'get',
                url: "{{ url('/cari_mata_kuliah_by_prodi') }}",
                data:{'prodiKode':prodiKode},
                    success:function(data){
                        op+='<option value="0" selected disabled>-- pilih mata kuliah --</option>';
                        for(var i=0; i<data.length;i++){
                            // alert(data['jenis_publikasi'][i].dapil_id);
                            op+='<option value="'+data[i].id+'">'+data[i].nama_mata_kuliah+' ('+data[i].keterangan+') '+'</option>';
                        }
                        div.find('#mataKuliahId').html(" ");
                        div.find('#mataKuliahId').append(op);
                    },
                        error:function(){
                    }
                });
            })
        });
    </script>
@endpush