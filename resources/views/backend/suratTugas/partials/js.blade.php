@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

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

        function editSuratTugas(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('surat_tugas').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#id_edit').val(data.id);
                    $('#nomor_surat_edit').val(data.nomor_surat);
                    $('#deskripsi_tugas_edit').val(data.deskripsi_tugas);
                    $('#tanggal_kegiatan_edit').val(data.tanggal_kegiatan);
                    $('#kepala_tanda_tangan_edit').val(data.kepala_tanda_tangan);
                    $('#jabatan_yang_bertanda_tangan_edit').val(data.jabatan_yang_tanda_tangan);
                    $('#nama_yang_bertanda_tangan_edit').val(data.nama_yang_tanda_tangan);
                    $('#nip_yang_bertanda_tangan_edit').val(data.nip_yang_tanda_tangan);
                },
                error:function(){
                    $('#gagal').show(100);
                }
            });
            return false;
        }

        $(document).on('submit','.form',function (event){
            event.preventDefault();
            $(".btnSubmit"). attr("disabled", true);
            $('.btnSubmit').html('<i class="fa fa-check-circle"></i>&nbsp; Menyimpan');  // Mengembalikan teks tombol

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData:false,
                contentType:false,
                success : function(res) {
                    $(".btnSubmit"). attr("disabled", true);
                    toastr.success(res.text, 'Success: Submit data berhasil');
                    setTimeout(function () {
                        window.location.href=res.url;
                    } , 500);
                },
                error:function(xhr){
                    toastr.error(xhr.responseJSON.text, 'Oops, An Error Occurred');
                    setTimeout(function() {
                        $(".btnSubmit").prop('disabled', false);  // Mengaktifkan tombol kembali
                        $(".btnSubmit").html('<i class="fa fa-check-circle"></i>&nbsp; Simpan');  // Mengembalikan teks tombol
                    }, 1000); // Waktu dalam milidetik (2000 ms = 2 detik)
                }
            })
        });
    </script>
@endpush
