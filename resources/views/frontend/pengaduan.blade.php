@extends('layouts.user')
@section('layanan_pengaduan','active-menu')
@push('styles')
    <style>
        .pengaduanPattern{
            background-color: #000d4d;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56 28' width='56' height='28'%3E%3Cpath fill='%2300000' fill-opacity='0.4' d='M56 26v2h-7.75c2.3-1.27 4.94-2 7.75-2zm-26 2a2 2 0 1 0-4 0h-4.09A25.98 25.98 0 0 0 0 16v-2c.67 0 1.34.02 2 .07V14a2 2 0 0 0-2-2v-2a4 4 0 0 1 3.98 3.6 28.09 28.09 0 0 1 2.8-3.86A8 8 0 0 0 0 6V4a9.99 9.99 0 0 1 8.17 4.23c.94-.95 1.96-1.83 3.03-2.63A13.98 13.98 0 0 0 0 0h7.75c2 1.1 3.73 2.63 5.1 4.45 1.12-.72 2.3-1.37 3.53-1.93A20.1 20.1 0 0 0 14.28 0h2.7c.45.56.88 1.14 1.29 1.74 1.3-.48 2.63-.87 4-1.15-.11-.2-.23-.4-.36-.59H26v.07a28.4 28.4 0 0 1 4 0V0h4.09l-.37.59c1.38.28 2.72.67 4.01 1.15.4-.6.84-1.18 1.3-1.74h2.69a20.1 20.1 0 0 0-2.1 2.52c1.23.56 2.41 1.2 3.54 1.93A16.08 16.08 0 0 1 48.25 0H56c-4.58 0-8.65 2.2-11.2 5.6 1.07.8 2.09 1.68 3.03 2.63A9.99 9.99 0 0 1 56 4v2a8 8 0 0 0-6.77 3.74c1.03 1.2 1.97 2.5 2.79 3.86A4 4 0 0 1 56 10v2a2 2 0 0 0-2 2.07 28.4 28.4 0 0 1 2-.07v2c-9.2 0-17.3 4.78-21.91 12H30zM7.75 28H0v-2c2.81 0 5.46.73 7.75 2zM56 20v2c-5.6 0-10.65 2.3-14.28 6h-2.7c4.04-4.89 10.15-8 16.98-8zm-39.03 8h-2.69C10.65 24.3 5.6 22 0 22v-2c6.83 0 12.94 3.11 16.97 8zm15.01-.4a28.09 28.09 0 0 1 2.8-3.86 8 8 0 0 0-13.55 0c1.03 1.2 1.97 2.5 2.79 3.86a4 4 0 0 1 7.96 0zm14.29-11.86c1.3-.48 2.63-.87 4-1.15a25.99 25.99 0 0 0-44.55 0c1.38.28 2.72.67 4.01 1.15a21.98 21.98 0 0 1 36.54 0zm-5.43 2.71c1.13-.72 2.3-1.37 3.54-1.93a19.98 19.98 0 0 0-32.76 0c1.23.56 2.41 1.2 3.54 1.93a15.98 15.98 0 0 1 25.68 0zm-4.67 3.78c.94-.95 1.96-1.83 3.03-2.63a13.98 13.98 0 0 0-22.4 0c1.07.8 2.09 1.68 3.03 2.63a9.99 9.99 0 0 1 16.34 0z'%3E%3C/path%3E%3C/svg%3E");
        }
    </style>
@endpush
@section('content')
<div x-data="{ modalPendaftaranKonseling: false, modalKonseling:false, idJenisSurat: '', ShowReq : false}">
    <!-- slider -->

    <section id="home">
        <div class=" text-center overflow-hidden bg-[#010347] dark:bg-[#f5ca3c] duration-300 transform">
            <div class="   z-10   mt-20 justify-center relative">
                <div class="section-heading  px-8 lg:px-12 text-white  mx-auto     place-self-center">
                    <!-- <div data-aos="fade-left"  >
                        <h2
                            class="font-extrabold font-[arial] text-3xl md:text-4xl  mb-7 lg:mb-12 lg:text-7xl place-content-center text-center inline-block
                            text-gray-200 " style="text-shadow: 1px
                            1px 2px #383737;">
                            Data Pengguna</h2>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    @if ($message = Session::get('success'))
    <div x-data x-init="isShow = true"></div>
    <div x-show="isShow" style="z-index: 99;" class="fixed top-24 right-0 m-3 w-2/3 md:w-1/3" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
        <div class="bg-white border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
            <svg class="flex-shrink-0 h-6 w-6 text-green-400" stroke="currentColor" viewBox="0 0 20 20">
                <path stroke-width="1" d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
            </svg>
            <div class="flex-1 space-y-1">
                <p class="text-base leading-6 font-medium text-gray-700">Proses Berhasil!</p>
                <p class="text-sm leading-5 text-gray-600">{!! $message !!}</p>
            </div>
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer" x-on:click="isShow = false" stroke="currentColor" viewBox="0 0 20 20">
                <path stroke-width="1.2" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
            </svg>
        </div>
    </div>
    @endif
    <!-- end slider -->

    <!-- card item kursus-->
    <section id="pelayanan" class="relative pengaduanPattern  py-20 "   x-data="{ openMenu : false,openMenu2 : false,openMenu3 : false,openMenu4 : false }; activeTab:1" :class="openMenu || openMenu2 ||openMenu3 ||openMenu4  ? 'overflow-hidden' : 'overflow-visible' "
        >
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <div class="col-span-1 lg:col-span-2 border-r-4 border-gray-700" > <section class="container px-4 pt-12 lg:px-16  mx-auto "  >
            <h1 class="mb-4 text-center font-sans text-2xl lg:text-4xl font-bold text-yellow-500   "
                style="text-shadow:5px 5px 5px #ffffff31;">
                LAYANAN PENYAMPAIAN IDE DAN PENGADUAN</h1>
            <p class="capitalize text-gray-400 text-center text-[14px] leading-7">
                Selamat datang di Layanan Pengadugan E-BERES Fakultas Ilmu Sosial dan Ilmu Politik Universitas Bengkulu! <br>
                Punya ide atau keluhan? Ayo gunakan aplikasi pengaduan kami dan rasakan perubahan positif. Setiap tanggapan Anda membentuk pengalaman layanan ke arah yang lebih baik!
            </p>

            @if (!Auth::check())
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mt-8" role="alert">
                    <p class="font-bold">PERHATIAN</p>
                    <p>
                        Silahkan login terlebih dahulu untuk dapat membuat laporan pengaduan
                        <br>
                        <i>Catatan :  Silahkan daftar jika belum memiliki akun</i>
                    </p>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-2 mt-2 xl:mt-2 md:grid-cols-1 xl:grid-cols-1">
                @if (Auth::check())
                
                @else
                @endif

                <style>
                    .drop-shadow {
                        filter: drop-shadow(5px 5px 5px #666);
                        transition-duration: 400ms;
                    }

                    .drop-shadow:hover {
                        filter: drop-shadow(5px 5px 10px #fff000);
                    }
                </style>

            </div>
        </section>
        
        
        <section class="  pb-24  ">
            <div class="container items-center px-4 py-12 mx-auto text-center  ">
                <h2 class="  mx-auto text-2xl font-semibold tracking-tight   xl:text-3xl  text-white uppercase">
                    Lihat Proses Penyampaian Pengaduan Anda Di Sini
                </h2>
                <div class="flex mt-10 mb-5 lg:px-24 md:px-24">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa fa-key"></i>
                    </span>
                    <input type="text" name="nomorTiket" id="nomorTiket" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nomor Tiket Pengaduan Anda Disini">
                </div>
                <div style="display: none;" id="sedangMencari" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <i class="fa fa-refresh fa-spin"></i>&nbsp;<span class="font-medium">Sedang Mencari!</span> Proses Pencarian Sedang Dilakukan
                </div>
                <div style="display: none;" id="belumDiproses" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Mohon Maaf!</span> Pengaduan Anda Belum Diproses
                </div>
                <div style="display: none;" id="sudahDiproses" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Hallo, !</span> Pengaduan Anda Sudah Diproses
                </div>
                <div class="relative lg:mx-24 md:mx-20 overflow-x-auto shadow-md sm:rounded-lg" id="tableDiproses" style="display: none;">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nomor Tiket
                            </th>
                            <td class="px-6 py-4" id="tiket_pengaduan">
                            </td>
                        </tr>
                       
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pokok Permasalahan
                            </th>
                            <td class="px-6 py-4" id="pokok_permasalahan">
                            </td>
                        </tr>

                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Respon
                            </th>
                            <td class="px-6 py-4" id="respon">
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </section>
    </div>
        <div class="col-span-1 mt-8  pr-10"> 
            <h2 class="text-gray-300 text-lg uppercase font-normal px-5  ">Lengkapi formulir dibawah ini!</h2>
            <form action="{{ route('layanan_pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('POST')
                <div class="mt-5">
                    <label for="" class="text-white mx-5 after:content-['*'] after:text-red-500 after:pl-2">Pokok Permasalahan</label>
                    <textarea name="pokok_permasalahan" class=" bg-white text-sm  ring-blue-500 h-20 text-grat-700 px-5 mx-5 rounded-md w-full " placeholder="tes"></textarea>
                    @error('pokok_permasalahan')
                        <div class="text-red-300 px-5 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">

                    <label for="" class="text-white mx-5 after:content-['*'] after:text-red-500   after:pl-2">Bukti Pendukung</label>
                    <input type="file" name="bukti_pendukung" class="py-2 text-sm bg-white ring-blue-500 text-grat-700 px-5 mx-5 rounded-md w-full ">
                    @error('bukti_pendukung')
                        <div class="text-red-300 px-5 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="" class="text-white mx-5 after:content-['*'] after:text-red-500 after:pl-2">Unit Tujuan</label>
                    <select name="unit_tujuan" class="py-2 text-sm bg-white ring-blue-500 text-grat-700 px-5 mx-5 rounded-md w-full ">
                        <option value="akademik">Bagian Akademik</option>
                        <option value="kemahasiswaan">Bagaian Kemahasiswaan</option>
                        <option value="sdm">Bagian Sumber Daya</option>
                        <option value="prodi">Program Studi</option>
                        <option value="tu">Tata Usaha</option>
                        <option value="upm">UPM</option>
                        <option value="ukm">UKM</option>
                        <option value="dekan">Dekan</option>
                    </select>
                    @error('unit_tujuan')
                        <div class="text-red-300 px-5 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-5">
                    <button class="w-full rounded-md bg-[#eab308] px-5 py-2 mx-5 hover:bg-yellow-700 duration-300 transform hover:text-white">Kirim Pengaduan</button>
                </div>
            </form>

        </div>
    </div>
    

        

    </section>
    <!-- end card item kursus -->

    <!-- modal -->
    <div x-show="modelOpen" style="z-index: 70;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-5xl p-8 my-20 overflow-hidden text-left transition-all transform dark:bg-gray-800 bg-white rounded-lg shadow-xl  ">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-700 dark:text-gray-300 ">Permohonan Surat <span class="font-bold text-[#152042]" x-text="Permohonan Surat"></span></h1>

                    <button @click="modelOpen = false" class="text-gray-600 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <form class="mt-5" action=" " method="GET">

                    <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Jenis Surat</label>
                    <select name="jenis_surat_id" id="jenis_surat_id" class=" w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500 bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500 placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white dark:focus:ring-yellow-500 focus:ring-[#01052D] focus:shadow-[-4px_4px_10px_0px_#01052D] dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder=" Subject Surat">
                        <option disabled selected>-- pilih jenis surat --</option>
                  
                    </select>
                    <div x-show="ShowReq"> test</div>

                    <div class=" mt-1">
                        <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Keperluan</label>
                        <textarea name="keperluan" class="  h-20 w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Keperluan"></textarea>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-[#152042] rounded-md dark:bg-yellow-600 dark:hover:bg-yellow-500 dark:focus:bg-[#1f3882] hover:bg-[#060f2a] focus:outline-none focus:bg-[#152042] focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                            Kirim Permohonan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(document).on('keyup','#nomorTiket',function(){
            var nomorTiket = $(this).val();
            $('#ditemukan').hide();
            $("#sudahDiproses").hide();
            $("#sedangMencari").show();
            $.ajax({
            type :'get',
            url: "{{ url('cari_nomor_tiket') }}",
            data:{'nomorTiket':nomorTiket},
                success:function(data){
                    if (data.length < 1) {
                        $("#tableDiproses").hide();
                        $('#belumDiproses').hide();
                        $("#sudahDiproses").hide();
                        $("#sedangMencari").show();
                    }else{
                        if (data.respon != null) {
                            $('#sedangMencari').hide();
                            $('#belumDiproses').hide();
                            $("#defaultModal").removeClass("hidden");
                            $("#sudahDiproses").show();
                            $("#tableDiproses").show();
                            $('#tiket_pengaduan').text(data.tiket_pengaduan)
                            $('#pokok_permasalahan').text(data.pokok_permasalahan)
                            $('#respon').text(data.respon)
                        }else{
                            $('#belumDiproses').show();
                            $("#tableDiproses").hide();
                            $("#sedangMencari").hide();
                        }
                    }
                },
                    error:function(){
                }
            });
        })
    });
</script>
@endpush
