<div>
        <style>
            .pengaduanPattern{
                background-color: #000d4d;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56 28' width='56' height='28'%3E%3Cpath fill='%2300000' fill-opacity='0.4' d='M56 26v2h-7.75c2.3-1.27 4.94-2 7.75-2zm-26 2a2 2 0 1 0-4 0h-4.09A25.98 25.98 0 0 0 0 16v-2c.67 0 1.34.02 2 .07V14a2 2 0 0 0-2-2v-2a4 4 0 0 1 3.98 3.6 28.09 28.09 0 0 1 2.8-3.86A8 8 0 0 0 0 6V4a9.99 9.99 0 0 1 8.17 4.23c.94-.95 1.96-1.83 3.03-2.63A13.98 13.98 0 0 0 0 0h7.75c2 1.1 3.73 2.63 5.1 4.45 1.12-.72 2.3-1.37 3.53-1.93A20.1 20.1 0 0 0 14.28 0h2.7c.45.56.88 1.14 1.29 1.74 1.3-.48 2.63-.87 4-1.15-.11-.2-.23-.4-.36-.59H26v.07a28.4 28.4 0 0 1 4 0V0h4.09l-.37.59c1.38.28 2.72.67 4.01 1.15.4-.6.84-1.18 1.3-1.74h2.69a20.1 20.1 0 0 0-2.1 2.52c1.23.56 2.41 1.2 3.54 1.93A16.08 16.08 0 0 1 48.25 0H56c-4.58 0-8.65 2.2-11.2 5.6 1.07.8 2.09 1.68 3.03 2.63A9.99 9.99 0 0 1 56 4v2a8 8 0 0 0-6.77 3.74c1.03 1.2 1.97 2.5 2.79 3.86A4 4 0 0 1 56 10v2a2 2 0 0 0-2 2.07 28.4 28.4 0 0 1 2-.07v2c-9.2 0-17.3 4.78-21.91 12H30zM7.75 28H0v-2c2.81 0 5.46.73 7.75 2zM56 20v2c-5.6 0-10.65 2.3-14.28 6h-2.7c4.04-4.89 10.15-8 16.98-8zm-39.03 8h-2.69C10.65 24.3 5.6 22 0 22v-2c6.83 0 12.94 3.11 16.97 8zm15.01-.4a28.09 28.09 0 0 1 2.8-3.86 8 8 0 0 0-13.55 0c1.03 1.2 1.97 2.5 2.79 3.86a4 4 0 0 1 7.96 0zm14.29-11.86c1.3-.48 2.63-.87 4-1.15a25.99 25.99 0 0 0-44.55 0c1.38.28 2.72.67 4.01 1.15a21.98 21.98 0 0 1 36.54 0zm-5.43 2.71c1.13-.72 2.3-1.37 3.54-1.93a19.98 19.98 0 0 0-32.76 0c1.23.56 2.41 1.2 3.54 1.93a15.98 15.98 0 0 1 25.68 0zm-4.67 3.78c.94-.95 1.96-1.83 3.03-2.63a13.98 13.98 0 0 0-22.4 0c1.07.8 2.09 1.68 3.03 2.63a9.99 9.99 0 0 1 16.34 0z'%3E%3C/path%3E%3C/svg%3E");
            }
        </style>
    @section('permohonan_surat','active-menu')

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

        <!-- end slider -->
        @if ($notif)
            <div x-data x-init="isShow = true"></div>
            <div x-show="isShow" style="z-index: 99;" class="fixed top-1 right-0 m-3 w-2/3 md:w-1/3" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
                <div class="bg-white border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
                    <svg class="flex-shrink-0 h-6 w-6 text-green-400" stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-width="1" d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
                    </svg>
                    <div class="flex-1 space-y-1">
                        <p class="text-base leading-6 font-medium text-gray-700">Berhasil</p>
                        <p class="text-sm leading-5 text-gray-600">Permohonan Surat Berhasil Dikirim</p>
                    </div>
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer" x-on:click="isShow = false" stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-width="1.2" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                    </svg>
                </div>
            </div>
        @endif
        <!-- Fitur  -->
        <section id="Fitur" class="duration-300 pengaduanPattern w-full grid">

            <div style="padding-top: 7rem" class="mx-auto container px-5   pb-48 section-heading  text-gray-700 dark:text-gray-200 z-10 relative ">
                <h2 class="mb-6 text-center font-sanstext-3xl font-semibold text-3xl  xl:text-3xl  text-white uppercase">
                    Permohonan surat untuk mahasiswa</h2>
                <p class="capitalize text-gray-400 text-center text-[14px] leading-7">Sistem yang praktis
                    dan efisien untuk
                    permohonan surat bagi mahasiswa. solusi modern untuk memudahkan proses pengajuan surat Anda. Ini adalah langkah kecil yang kami ambil untuk memudahkan perjalanan
                    akademis dan profesional Anda.
                </p>
                <div class="grid w-full">
                    <button data-aos="fade-down" class=" max-w-2xl place-self-center text-gray-200 rounded-lg mx-auto  border-2 mt-5 inline-flex px-4 border-grey-600
                dark:border-yellow-600 bg-[#091150] dark:bg-yellow-500 hover:bg-grey-600 duration-300 transform
                dark:hover:bg-yellow-600 font-medium tracking-widest py-2
                            text-sm text-white-700
                            focus:shadow-[-4px_4px_10px_0px_#2563eb]
                            dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " @click="modelOpen =!modelOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                    </svg>
                    Tambah Permohonan surat</button>
                </div>
                
                <div class="clear-both"></div>


                <section class="  pb-24  ">
                    <div class="container items-center px-4 py-12 mx-auto text-center  ">
                        <h2 class="  mx-auto text-2xl font-semibold tracking-tight   xl:text-3xl  text-white uppercase">
                            Lihat Proses Permohonan Surat Anda Di Sini
                        </h2>
                        <div class="flex mt-10 mb-5 lg:px-24 md:px-24">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa fa-key"></i>
                            </span>
                            <input type="text" wire:model.live="search" wire:keyup="searchResult" name="nomorTiket" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nomor Tiket Pengaduan Anda Disini">
                        </div>
                        <div style="display: none;" id="sedangMencari" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <i class="fa fa-refresh fa-spin"></i>&nbsp;<span class="font-medium">Sedang Mencari!</span> Proses Pencarian Sedang Dilakukan
                        </div>
                        <div style="display: none;" id="belumDiproses" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Mohon Maaf!</span> Pengaduan Anda Belum Diproses
                        </div>
                        
                        @if($records)
                            <div id="sudahDiproses" class="p-4 mb-4 lg:mx-24 md:mx-20 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">Hallo, !</span> Pengaduan Anda ditemukan
                            </div>
                        @endif
                        @if($records)

                        <div class=" relative w-full border border-gray-200 dark:border-gray-900  z-50 mt-1 bg-white dark:bg-gray-800 text-sm rounded-md overflow-hidden">
                                @if($records)
                                    <div class="relative lg:mx-20 md:mx-20 overflow-x-auto shadow-md sm:rounded-lg" id="tableDiproses">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Nomor Tiket
                                                </th>
                                                <td class="px-6 py-4" id="tiket_pengaduan">
                                                    {{ $records->nomor_tiket }}
                                                </td>
                                            </tr>
                                        
                                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Status Permohonan Surat
                                                </th>
                                                <td class="px-6 py-4" id="pokok_permasalahan">
                                                    {{ $records->status }}
                                                </td>
                                            </tr>
                    
                                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    Keterangan
                                                </th>
                                                <td class="px-6 py-4" id="pokok_permasalahan">
                                                    {{ $records->keterangan_status }}
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                @else
                                @endif
                        </div>
                        @endif
                    </div>
                </section>

                {{-- <div class="flex flex-wrap  mt-5 z-30 relative ">
                    <!-- item surat -->
                    @foreach ($permohonans as $permohonan)
                    <div class="w-full max-w-full mb-8      flex flex-col group blg">
                        <div class="bg-gradient-to-r  from-blue-700 dark:from-[#df9b5b] to-cyan-500 dark:to-[#f5d105] w-full   rounded-tl-xl rounded-tr-xl
                      duration-300 transform  ">
                            <a href="#" class="  text-[16px] flex   font-bold text-white   dark:hover:text-gray-700 hover:underline duration-300 transform    py-3 px-6 line-clamp-1 leading-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 my-1" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                20 Agustus 2023 </a>
                        </div>
                        <div class="flex flex-grow w-full">
                            <div class="triangle"></div>
                            <div class="flex flex-col w-full justify-between px-4 py-6 dark:bg-black dark:bg-opacity-30 border border-blue-600 dark:border-yellow-500
                        duration-300 transform   rounded-bl-xl rounded-br-xl text">
                                <div class="h-full md:flex flex-nowrap items-start pl-6">

                                    <div class="flex-grow mb-2">
                                        <div class="flex space-x-2">
                                            <h1 class="  w-[90%]  font-bold text-lg text-gray-700 dark:text-gray-200 mb-3 line-clamp-2">
                                                {{ $permohonan->jenisSurat->jenis_surat }}
                                            </h1>

                                        </div>
                                        <h1 class=" font-medium text-[14px] text-gray-700 dark:text-gray-200 mb-3 line-clamp-2">
                                            {{ $permohonan->keperluan }}
                                        </h1>
                                        <div class="md:flex flex-nowrap">
                                            <div class="lg:w-1/2 w-full">
                                                <p class="leading-relaxed mt-3 text-gray-700 dark:text-gray-300 line-clamp-1 text-sm">
                                                    Lampiran:</p>
                                                <a href="" class="line-clamp-1 flex text-[15px] text-blue-500 hover:underline duration-300 transform"><svg class="mr-1 w-6 h-6" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="pdf-file">
                                                        <path fill="#eff2f3" d="M58.2,3.2l0,49H5.8l0-38.4L19.6,0l35.5,0C56.8,0,58.2,1.5,58.2,3.2z">
                                                        </path>
                                                        <path fill="#dadede" d="M16.7,13.8l-10.8,0L19.6,0l-0.1,10.8C19.6,12.5,18.3,13.8,16.7,13.8z">
                                                        </path>
                                                        <path fill="#f2786b" d="M37.1 28c-2.9-2.8-5-6-5-6 .8-1.2 2.7-8.1-.2-10.1-2.9-2-4.4 1.7-4.4 1.7-1.3 4.6 1.8 8.8 1.8 8.8l-3.5 7.7c-.4 0-11.5 4.3-7.7 9.6 3.9 5.3 9.3-7.5 9.3-7.5 2.1-.7 8.5-1.6 8.5-1.6 2.5 3.4 5.5 4.5 5.5 4.5 4.6 1.2 5.1-2.6 5.1-2.6C46.6 27.5 37.1 28 37.1 28zM20 37.9c-.1 0-.1-.1-.1-.1-.6-1.4 4-4.1 4-4.1S21.4 38.5 20 37.9zM30.4 13.7c1.3 1.2.2 5.3.2 5.3S29.1 14.9 30.4 13.7zM29.2 29.2l1.8-4.4 2.8 3.4L29.2 29.2zM44 32.4C44 32.4 44 32.4 44 32.4L44 32.4 44 32.4c-.8 1.3-4.1-1.5-4.4-1.8l0 0c0 0 0 0 0 0 0 0 0 0 0 0l0 0C40.1 30.6 44.4 30.9 44 32.4L44 32.4zM58.2 49l0 11.8c0 1.7-1.4 3.2-3.2 3.2L8.9 64c-1.7 0-3.2-1.4-3.2-3.2l0-11.8H58.2z">
                                                        </path>
                                                        <path fill="#eff2f3" d="M27.9 54.2c0 .8-.3 1.4-.8 1.9-.5.4-1.3.6-2.3.6h-.8v2.9h-1.3v-7.7H25c1 0 1.7.2 2.2.6C27.7 52.9 27.9 53.4 27.9 54.2zM24.1 55.7h.7c.6 0 1.1-.1 1.4-.3.3-.2.5-.6.5-1.1 0-.4-.1-.8-.4-1-.3-.2-.7-.3-1.3-.3h-.9V55.7zM35.8 55.7c0 1.3-.4 2.3-1.1 2.9-.7.7-1.7 1-3.1 1h-2.2v-7.7h2.4c1.2 0 2.2.3 2.9 1C35.4 53.5 35.8 54.5 35.8 55.7zM34.4 55.7c0-1.9-.9-2.8-2.6-2.8h-1.1v5.6h.9C33.5 58.6 34.4 57.6 34.4 55.7zM38.7 59.6h-1.3v-7.7h4.4v1.1h-3.1v2.4h2.9v1.1h-2.9V59.6z">
                                                        </path>
                                                    </svg>
                                                    <p class="line-clamp-1  ">Surat Pemberitahuan Jadwal Program
                                                        Insentif</p>
                                                </a>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="flex-nowrap space-x-2 ">
                                        @if ($permohonan->status == "terkirim")
                                        <span class=" bg-gradient-to-r from-green-600 to-lime-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold
                                        rounded-md inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Terkirim</span>
                                        @elseif($permohonan->status == "diproses")
                                        <span class=" bg-gradient-to-r from-blue-600 to-cyan-500 text-[12px] my-1 py-1 px-4
                                            text-gray-100 font-semibold rounded-md inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>Diproses</span>
                                        @elseif($permohonan->status == "selesai")
                                        <span class=" bg-gradient-to-r from-orange-600 to-yellow-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold rounded-md inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                            </svg>
                                            Selesai</span>
                                        @else
                                        <span class=" bg-gradient-to-r from-red-600 to-orange-500    text-[12px] my-1 py-1
                                        px-4 text-gray-100 font-semibold rounded-md inline-flex
                                        items-center "> <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                            </svg>Ditolak</span>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end item surat -->
                </div> --}}
            </div>
        </section>
        <!-- end Fitur  -->


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

                    <form class="mt-5" wire:submit.prevent="submitReq" method="POST" enctype="multipart/form-data">
                        @csrf @method('POST')
                        <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Jenis Surat</label>
                        <select required name="jenis_surat_id" wire:model="jenis_surat_id" wire:change="handle_jenis_surat" id="jenis_surat_id" class=" w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500 bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500 placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white dark:focus:ring-yellow-500 focus:ring-[#01052D] focus:shadow-[-4px_4px_10px_0px_#01052D] dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder=" Subject Surat">
                            <option selected>-- pilih jenis surat --</option>
                            @foreach ($jenisSurats as $jenisSurat)
                            <option @click="ShowReq = true ,idJenisSurat = `{{ $jenisSurat->id }}`" value="{{ $jenisSurat->id }}">{{ $jenisSurat->jenis_surat }}</option>
                            @endforeach
                        </select>
                        @error('jenis_surat_id')
                            <div class="text-xs text-red-500">{{ $message }}</div>
                        @enderror

                        <div class="mt-1">
                            @if($showDiv)
                            @foreach ($requirementSurats as $req)
                            <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">{{ $req->requirement }}</label>
                                <input type="file" wire:model="files.{{$req->id}}" required="" class=" w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                            bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                            placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                            dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                            focus:shadow-[-4px_4px_10px_0px_#01052D]
                                            dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  ">
                            @endforeach
                            @endif
                        </div>

                        <div class=" mt-1">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Keperluan</label>
                            <textarea wire:model="keperluan" class="  h-20 w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Keperluan"></textarea>
                            @error('keperluan')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror

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
</div>