@extends('layouts.user')
@section('konseling','active-menu')

@section('content')
<div x-data="{ modalPendaftaranKonseling: false, modalKonseling:false}">
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

    <!-- Fitur  -->
    <section id="Fitur" class="duration-300 transform bg-pattren">
        <div class="mx-auto container px-5  pt-40 pb-48   section-heading  text-gray-700 dark:text-gray-200 z-30 relative ">
            <h2 data-aos="fade-down" class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#0b3960] dark:text-yellow-500 text-sh2">
                E-konseling</h2>
            <p data-aos="fade-down" class="text-[14px] leading-7 mt-4 text-center md:px-[10%]">E-konseling
                dirancang untuk
                memberikan dukungan yang mudah diakses dan profesional untuk kebutuhan kesehatan mental
                Anda. Dengan berbagai pilihan sesi daring yang aman dan terpercaya, Anda dapat dengan
                nyaman berkonsultasi dengan terapis berlisensi tanpa meninggalkan kenyamanan rumah
                Anda. Jangan biarkan stres, kecemasan, atau masalah emosional menghambat Anda. Temukan
                keseimbangan dan dukungan yang Anda butuhkan dengan layanan E-konseling.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 z-50 relative mb-10 mt-5">
                <button data-aos="fade-left" class="text-gray-200 rounded-lg   float-right py-4 px-4
                     bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform
                    dark:hover:bg-yellow-600   tracking-widest  w-full text-center
                                text-sm text-white-700 font-bold
                                focus:shadow-[-4px_4px_10px_0px_#2563eb]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308]" @click="modalPendaftaranKonseling =!modalPendaftaranKonseling">
                    Pendaftaran E-Konseling
                </button>
                <button data-aos="fade-right" class="text-gray-200 rounded-lg   float-right py-4 px-4
                     bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform
                    dark:hover:bg-yellow-600 font-bold tracking-widest  w-full text-center
                                text-sm text-white-700
                                focus:shadow-[-4px_4px_10px_0px_#2563eb]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308]" @click="modalKonseling =!modalKonseling">
                    Konseling
                </button>
            </div>

            <div class="flex flex-col mb-20 mx-4 md:mx-0  ">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700  rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            No
                                        </th>

                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            contact
                                        </th>


                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Tanggal Konsultasi (Mulai)
                                        </th>
                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Tanggal Konsultasi (Selesai)
                                        </th>

                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Status Pendaftaran</th>
                                        <!-- <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Aksi</th> -->


                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($pendaftaran as $index => $item )
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $index+1 }}</h2>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ Auth::user()->name }}</h2>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ Auth::user()->no_hp }}</h2>
                                            <p class="text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>

                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->tanggal_dan_waktu_mulai }}</h2>

                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->tanggal_dan_waktu_selesai }}</h2>
                                        </td>
                                        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                            @if($item->status=='selesai')
                                            <div class="inline px-3 py-1 text-sm font-normal rounded-full capitalize  text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                @elseif($item->status=='terjadwal')
                                                <div class="inline px-3 py-1 text-sm font-normal rounded-full capitalize  text-orange-500 gap-x-2 bg-orange-100/60 dark:bg-gray-800">
                                                    @else
                                                    <div class="inline px-3 py-1 text-sm font-normal rounded-full capitalize  text-red-500 gap-x-2 bg-red-100/60 dark:bg-gray-800">

                                                        @endif
                                                        {{ $item->status }}
                                                    </div>

                                        </td>

                                        <!-- <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <a class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">

                                            </a>
                                        </td> -->
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>




    </section>


    <!-- end Fitur  -->


    <div class=" relative ">
        <div class="slider-svg z-20 tran-svg ">
            <svg data-name="Layer 1" class="svg2 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="slider-svg z-20 tran-svg ">
            <svg data-name="Layer 1" class="svg1  duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>

        <div class="slider-svg z-20">
            <svg data-name="Layer 1" class="svg3 duration-300 transform fill-gray-300 dark:fill-[#f5ca3c]  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>

        <div class="slider-svg-b    absolute  z-10">
            <svg data-name="Layer 1" class="svg5 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="slider-svg-b tran-svg absolute z-10">
            <svg data-name="Layer 1" class="svg4 duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>


        <div class="slider-svg-b  tran-svg absolute -mt-2 z-10">
            <svg data-name="Layer 1" class="svg6  duration-300 transform fill-gray-300 dark:fill-[#f5ca3c]  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <!-- modal pendaftaran E-Konseling -->
    <div x-show="modalPendaftaranKonseling" style="z-index: 70;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modalPendaftaranKonseling = false" x-show="modalPendaftaranKonseling" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modalPendaftaranKonseling" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-4xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-xl 2xl:max-w-5xl">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-bold text-gray-700 dark:text-gray-300 ">Pendaftaran E-Konseling <span class="font-bold text-[#152042]" x-text="Pendaftaran E-Konseling"></span></h1>

                    <button @click="modalPendaftaranKonseling = false" class="text-gray-600 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <form class="mt-5" action="{{ route('e-konseling.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2   gap-x-6 gap-y-2 my-3">
                        <div class=" col-span-1  ">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Nama Lengkap</label>
                            <input type="text" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308] disabled:bg-gray-200 disabled:dark:bg-gray-900 cursor-not-allowed " disabled value="{{Auth::user()->name}}" placeholder="Nama Lengkap" />
                        </div>
                        <div class=" col-span-1  ">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Nomor Telepon</label>
                            <input type="text" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  disabled:bg-gray-200 disabled:dark:bg-gray-900 cursor-not-allowed" disabled value="{{Auth::user()->no_hp}}" placeholder="Nomor Telepon" />
                        </div>
                        <div class=" col-span-1  ">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Email</label>
                            <input type="email" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308] disabled:bg-gray-200 dark:disabled:bg-gray-900 dark:disabled:text-gray-900 cursor-not-allowed " disabled value="{{Auth::user()->email}}" placeholder="Email" />
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 my-1">
                        <div class=" col-span-1  ">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Tanggal Mulai</label>
                            <input type="date" name="tgl_start" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308]   " placeholder="Tanggal Mulai" />
                            @error('tgl_start')
                            <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" col-span-1  ">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Tanggal Selesai</label>
                            <input type="date" name="tgl_end" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308]   " placeholder="Tanggal Selesai" />
                            @error('tgl_end')
                            <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
                            @enderror
                        </div>
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
    <!-- end modal pendaftaran E-Konseling -->

    <!-- modal Konseling -->
    <div x-show="modalKonseling" style="z-index: 70;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center h-screen overflow-hidden px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modalKonseling = false" x-show="modalKonseling" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modalKonseling" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full  p-8  container   text-left transition-all transform dark:bg-gray-800 h-screen overflow-auto bg-white rounded-lg shadow-xl  ">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-bold text-gray-700 dark:text-gray-300 ">Konseling Online <span class="font-bold text-[#152042]" x-text="Konseling Online"></span></h1>

                    <button @click="modalKonseling = false" class="text-gray-600 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 mt-6">
                    <div class="col-span-1">
                        <lottie-player src="{{ asset('assets/user/src/konseling.json') }}" background="transparent" speed="1" class="w-full mx-auto lottie-login " loop autoplay></lottie-player>
                        <h2 class="text-center text-gray-700 text-2sh  font-extrabold relative -mt-10 text-2xl font-[arial]">E-Konseling </h2>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex flex-col space-y-2   text-xs md:text-sm">
                            <div x-data="{penjelasan: ''}">
                                <select class="flex w-full text-white border p-4 bg-[#010347] dark:bg-yellow-500 rounded-lg" x-model="penjelasan">
                                    <option value="">--- Pilih Konseling ---</option>
                                    @foreach ( $basisPengetahuans as $data )
                                    <option value="{{$data->jawaban}}">
                                        {{$data->pertanyaan}}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="w-full min-h-[350px] border border-gray-300 p-5 mt-5 leading-7 text-sm text-justify rounded-md shadow-md">
                                    <template x-if="penjelasan==''">
                                        <div class="text-gray-800 dark:text-gray-300 font-semibold grid  text-center my-20  w-full duration-300 transform ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 mx-auto" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                            <h2 class="text-lg mt-4">Harap pilih Pertanyaan yang ingin di ajukan terlebih dahulu</h2>
                                        </div>
                                    </template>
                                    <h3 x-text="penjelasan" class="text-gray-800 dark:text-gray-300"> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal Konseling -->
</div>
@endsection
