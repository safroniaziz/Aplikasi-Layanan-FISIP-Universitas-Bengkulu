@extends('layouts.application')
@section('halaman', 'JadwalPerkuliahan')
@section('menu', 'JadwalPerkuliahan')
@section('content')
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">Menampilkan Jadwal Perkuliahan Pada Hari <b>{{ $hariIni }}</b></div>
        </div>
        <div class="col-md-12 table-responsive">
            <form method="GET" id="pencarian">
                <div class="form-group" style="margin-bottom: 5px !important;">
                    <label for="nama" class="col-form-label">Cari Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Mata Kuliah..." value="{{$nama}}">
                </div>
                <div style="margin-bottom:10px !important;">
                    <button type="submit" class="btn btn-success btn-sm btn-flat mb-2"><i class="fa fa-search"></i>&nbsp;Cari Data</button>
                </div>
            </form>
            <table class="table table-hover table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Prodi</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Nama Ruangan Kelas</th>
                        <th>Hari</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Perubahan Jadwal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwalBerlangsungs as $key => $jadwalPerkuliahan)
                        <tr>
                            <td>
                                {{ $jadwalBerlangsungs->firstItem() + $key }}
                            </td>
                            <td>{{ $jadwalPerkuliahan->matakuliah->prodi->nama_prodi }}</td>
                            <td>{{ $jadwalPerkuliahan->mataKuliah->nama_mata_kuliah }}</td>
                            <td>{{ $jadwalPerkuliahan->ruanganKelas->nama_ruangan_kelas }}</td>
                            <td>{{ $jadwalPerkuliahan->hari }}</td>
                            <td>{{ $jadwalPerkuliahan->waktu_mulai }}</td>
                            <td>{{ $jadwalPerkuliahan->waktu_selesai }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a onclick='ubahJadwal("{{ $jadwalPerkuliahan->id }}")' class="btn btn-success btn-sm btn-flat"><i class="fa fa-exchange"></i>&nbsp; Peruabahan Jadwal</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                Data jadwal masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $jadwalBerlangsungs->appends(request()->has('nama') ? ['nama' => $nama] : [])->links("pagination::bootstrap-4") }}
            @include('backend/perubahanJadwal/partials.modal_ubah')
        </div>
    </div>
</div>
@endsection

{{-- @include('backend/jadwalPerkuliahans/form') --}}

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select2').select2();
        });

        function toggleRequired() {
            const status = document.getElementById('status').value;
            const ruanganInput = document.getElementById('ruangan_id');
            const hariInput = document.getElementById('hari');
            const waktuMulaiInput = document.getElementById('waktu_mulai');
            const waktuSelesaiInput = document.getElementById('waktu_selesai');

            if (status === 'dibatalkan') {
                $('#ubah').hide(300);
                // Set required to false for all inputs except "status"
                ruanganInput.removeAttribute('required');
                hariInput.removeAttribute('required');
                waktuMulaiInput.removeAttribute('required');
                waktuSelesaiInput.removeAttribute('required');
            } else {
                $('#ubah').show(300);
                // Set required to true for all inputs
                ruanganInput.setAttribute('required', 'required');
                hariInput.setAttribute('required', 'required');
                waktuMulaiInput.setAttribute('required', 'required');
                waktuSelesaiInput.setAttribute('required', 'required');
            }
        }
        
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah Anda Yakin?`,
                text: "Harap untuk memeriksa kembali sebelum menghapus data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });

        function ubahJadwal(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('perubahan_jadwal').'/' }}"+id+'/get_data';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalUbahJadwal').modal('show');
                    $('#jadwal_id_ubah').val(data.id);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }
    </script>
@endpush
