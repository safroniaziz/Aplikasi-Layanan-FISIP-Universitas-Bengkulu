@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
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

        function editAnggota(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "{{ url('surat_tugas/anggota').'/' }}"+id+'/edit';
            $.ajax({
                url : url,
                type : 'GET',
                success : function(data){
                    $('#modalEdit').modal('show');
                    $('#id_edit').val(data.id);
                    $('#nama_yang_bertugas_edit').val(data.nama_yang_bertugas);
                    $('#keterangan_tugas_edit').val(data.keterangan_tugas);
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
