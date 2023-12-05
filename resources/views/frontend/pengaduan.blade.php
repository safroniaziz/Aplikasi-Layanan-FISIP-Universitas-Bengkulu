@extends('layouts.user')
@section('permohonan_surat','active-menu')

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

    <div class="bg-[#010347] dark:bg-[#f5ca3c] relative ">
        <div class="slider-svg-b  tran-svg absolute -mt-1 z-10">
            <svg data-name="Layer 1" class="svg6  duration-300 transform fill-[#010347] dark:fill-[#f5ca3c]  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <!-- end slider -->
    
    <!-- card item kursus-->
    <section id="pelayanan" class="relative  bg-[#152042] pattren   mt-6  py-10 "  x-data="{ openMenu : false,openMenu2 : false,openMenu3 : false,openMenu4 : false }; activeTab:1" :class="openMenu || openMenu2 ||openMenu3 ||openMenu4  ? 'overflow-hidden' : 'overflow-visible' "
        style="box-shadow: -40px 0px 50px 2px #7a7a7a !important">

        <section class="container px-4 py-20 mx-auto"  >
            <h1 class="mb-4 text-left font-sans text-2xl lg:text-4xl font-bold text-yellow-500   "
                style="text-shadow:5px 5px 5px #ffffff31;">
                LAYANAN PENDAMPINGAN DAN KONSULTASI</h1>
            <p class="capitalize text-gray-400 text-justify text-[14px] leading-7">
                Selamat datang di Layanan Pendampingan dan Konsultasi SIJAK PELUK! Dapatkan panduan terbaik untuk pertumbuhan UMKM Anda. Pilih layanan yang Anda butuhkan sekarang dan dorong kesuksesan bisnis Anda ke level berikutnya!
            </p>

            @if (!Auth::check())
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mt-8" role="alert">
                    <p class="font-bold">PERHATIAN</p>
                    <p>
                        Silahkan Login Untuk Layanan Dokumen dan Layanan Pendampingan UMKM Khusus Dinas Perdagangan
                        <br>
                        <i>Catatan :  Silahkan Daftar Jika Belum Memiliki Akun</i>
                    </p>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-2 mt-2 xl:mt-16 md:grid-cols-3 xl:grid-cols-3">

                @if (Auth::check())
                <button data-aos-delay="800" x-on:click="activeTab = 2" @click="openMenu4 = !openMenu4" :aria-expanded="openMenu4" aria-controls="mobile-navigation" aria-label="Navigation Menu" class="flex flex-col items-center p-8 transition-colors duration-300  transform cursor-pointer group hover:bg-gray-100 rounded-xl">
                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500"></h1>

                    <img class="object-cover w-52 h-52 drop-shadow " src="{{ asset('assets/frontend/img/konsultasi.svg') }}" alt="">

                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">Ajukan UMKM</h1>

                    <div class="flex mt-3 -mx-2">

                    </div>
                </button>
                @else
                <button data-aos-delay="800" x-on:click="activeTab = 2" @click="openMenu2 = !openMenu2" :aria-expanded="openMenu2" aria-controls="mobile-navigation" aria-label="Navigation Menu" class="flex flex-col items-center p-8 transition-colors duration-300  transform cursor-pointer group hover:bg-gray-100 rounded-xl">
                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">Khusus Masyarakat</h1>

                    <img class="object-cover w-52 h-52 drop-shadow " src="{{ asset('assets/frontend/img/konsultasi.svg') }}" alt="">

                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">LAYANAN KONSULTASI MASYARAKAT</h1>

                    <div class="flex mt-3 -mx-2">

                    </div>
                </button>
                @endif

                @if (Auth::check())
                <button data-aos-delay="1000" x-on:click="activeTab = 3" @click="openMenu3 = !openMenu3" :aria-expanded="openMenu3" aria-controls="mobile-navigation" aria-label="Navigation Menu" class="flex flex-col items-center p-8 transition-colors duration-300  transform cursor-pointer group hover:bg-gray-100 rounded-xl">
                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500"></h1>

                    <img class="object-cover w-52 h-52 drop-shadow " src="https://sipedemas.risetsetiawan.org/assets/frontend/img/dokumen.svg" alt="">

                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">DOKUMEN</h1>

                    <div class="flex mt-3 -mx-2">

                    </div>
                </button>
                @else
                <button aria-label="Navigation Menu" class="flex flex-col items-center p-8 transition-colors duration-300  transform cursor-pointer group hover:bg-gray-100 rounded-xl">
                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">Khusus Dinas Perdagangan</h1>

                    <img class="object-cover w-52 h-52 drop-shadow " src="https://sipedemas.risetsetiawan.org/assets/frontend/img/dokumen.svg" alt="">

                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">DOKUMEN</h1>

                    <div class="flex mt-3 -mx-2">

                    </div>
                </button>
                @endif


                @if (Auth::check())
                <button @click="openMenu = !openMenu " x-on:click="activeTab = 1" :aria-expanded="openMenu" aria-controls="mobile-navigation" aria-label="Navigation Menu" class="flex flex-col items-center p-8 transition-colors duration-300  transform cursor-pointer group hover:bg-gray-100 rounded-xl">

                    <img class="object-cover w-52 h-52 drop-shadow " src="{{ asset('assets/frontend/img/pendampingan.svg') }}" alt="">

                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">LAYANAN PENDAMPINGAN UMKM</h1>

                    <div class="flex mt-3 -mx-2">

                    </div>
                </button>
                @else
                <button aria-label="Navigation Menu" class="flex flex-col items-center p-8 transition-colors duration-300  transform cursor-pointer group hover:bg-gray-100 rounded-xl">
                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">Khusus Dinas Perdagangan</h1>

                    <img class="object-cover w-52 h-52 drop-shadow " src="{{ asset('assets/frontend/img/pendampingan.svg') }}" alt="">
                    <h1 class="mt-4 text-2xl font-semibold text-gray-200 hover:text-gray-100 capitalize   group-hover:text-yellow-500">LAYANAN PENDAMPINGAN UMKM</h1>

                    <div class="flex mt-3 -mx-2">

                    </div>
                </button>
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
            {{-- @include('frontend.partials.all_pelayanan') --}}

        <section class=" pt-10 mt-16 pb-2 bg-[#152042]">
            <div class="container items-center px-4 py-12 mx-auto text-center  ">
                <h2 data-aos="zoom-in" class="  mx-auto text-2xl font-semibold tracking-tight   xl:text-3xl  text-white uppercase">
                    Lihat Proses Layanan Konsultasi Anda Di Sini
                </h2>
                <div class="flex mt-10 mb-5 lg:px-24 md:px-24">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa fa-key"></i>
                    </span>
                    <input type="text" name="nomorTiket" id="nomorTiket" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nomor Tiket Laporan Anda Disini">
                </div>
                <div style="display: none;" id="sedangMencari" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <i class="fa fa-refresh fa-spin"></i>&nbsp;<span class="font-medium">Sedang Mencari!</span> Proses Pencarian Sedang Dilakukan
                </div>
                <div style="display: none;" id="belumDiproses" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Mohon Maaf!</span> Layanan Konsultasi Anda Belum Diproses
                </div>
                <div style="display: none;" id="sudahDiproses" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Hallo, !</span> Layanan Konsultasi Anda Sudah Diproses
                  </div>

                <div class="relative lg:mx-24 md:mx-20 overflow-x-auto shadow-md sm:rounded-lg" id="tableDiproses" style="display: none;">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        {{--  <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                kategori_umkm
                            </th>
                            <td class="px-6 py-4" id="kategori_umkm_id_text">
                            </td>
                        </tr>  --}}
                        {{--  <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Permasalahan Konsultasi
                            </th>
                            <td class="px-6 py-4" id="permintaan_konsultasi_id">
                            </td>
                        </tr>  --}}
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                pembahasan
                            </th>
                            <td class="px-6 py-4" id="pembahasan">
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </section>

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

            </div>
        </div>
    </div>
    <!-- end modal -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('change', '#jenisSuratId', function() {
            var jenisSuratId = $(this).val();
            var div = $(this).parent().parent();
            var op = " ";
            $.ajax({
                type: 'get',
                url: "{{ url('/cari_mata_kuliah_by_prodi') }}",
                data: {
                    'jenisSuratId': jenisSuratId
                },
                success: function(data) {
                    op += '<option value="0" selected disabled>-- pilih mata kuliah --</option>';
                    for (var i = 0; i < data.length; i++) {
                        // alert(data['jenis_publikasi'][i].dapil_id);
                        op += '<option value="' + data[i].id + '">' + data[i].nama_mata_kuliah + ' (' + data[i].keterangan + ') ' + '</option>';
                    }
                    div.find('#mataKuliahId').html(" ");
                    div.find('#mataKuliahId').append(op);
                },
                error: function() {}
            });
        })
    });
</script>
@endpush
