@extends('layouts.user')
@section('permohonan_surat','active-menu')

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

        <div style="padding-top: 2rem" class="mx-auto container px-5   pb-48 mt-40 section-heading  text-gray-700 dark:text-gray-200 z-10 relative ">
            <h2 data-aos="fade-down"
                class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#0b3960] dark:text-yellow-500 text-sh2">
                Permohonan surat untuk mahasiswa & tendik</h2>
            <p data-aos="fade-down" class="text-[14px] leading-7 mt-4 text-center md:px-[10%]">Sistem yang praktis
                dan efisien untuk
                permohonan surat bagi mahasiswa dan tenaga kependidikan kami. Dengan platform kami yang
                user-friendly, Anda dapat dengan cepat mengajukan permohonan surat seperti surat
                keterangan, surat rekomendasi, atau surat izin dengan mudah tanpa perlu waktu yang
                lama. Kami siap membantu Anda mengurus segala keperluan surat Anda dengan cepat dan
                tanpa ribet. Ini adalah langkah kecil yang kami ambil untuk memudahkan perjalanan
                akademis dan profesional Anda..
            </p>
            <button data-aos="fade-down"
                class=" text-gray-200 rounded-lg border-2 mt-5 float-right inline-flex px-4 border-blue-600
                dark:border-yellow-600 bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform
                dark:hover:bg-yellow-600 font-medium tracking-widest py-2
                            text-sm text-white-700
                            focus:shadow-[-4px_4px_10px_0px_#2563eb]
                            dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " @click="modelOpen =!modelOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor"
                                class="bi bi-envelope-plus" viewBox="0 0 16 16">
                                <path
                                    d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                <path
                                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                            Tambah Permohonan surat</button>
                            <div class="clear-both"></div>
                <div class="flex flex-wrap  mt-5 z-30 relative ">
                    <!-- item surat -->
                    <div data-aos="fade-up"
                        class="w-full max-w-full mb-8      flex flex-col group blg">
                        <div
                            class="bg-gradient-to-r  from-blue-700 dark:from-[#df9b5b] to-cyan-500 dark:to-[#f5d105] w-full   rounded-tl-xl rounded-tr-xl
                      duration-300 transform  ">
                            <a href="#"
                                class="  text-[16px] flex   font-bold text-white   dark:hover:text-gray-700 hover:underline duration-300 transform    py-3 px-6 line-clamp-1 leading-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 my-1"  fill="currentColor"
                                    class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                20 Agustus 2023 </a>
                        </div>
                        <div class="flex flex-grow">
                            <div class="triangle"></div>
                            <div class="flex flex-col justify-between px-4 py-6 dark:bg-black dark:bg-opacity-30 border border-blue-600 dark:border-yellow-500
                        duration-300 transform   rounded-bl-xl rounded-br-xl text">
                                <div class="h-full md:flex flex-nowrap items-start pl-6">

                                    <div class="flex-grow mb-2">
                                        <div class="flex space-x-2">
                                            <h1
                                                class="  w-[90%]  font-bold text-lg text-gray-700 dark:text-gray-200 mb-3 line-clamp-2">
                                                Judul Surat</h1>

                                        </div>
                                        <h1
                                            class=" font-medium text-[14px] text-gray-700 dark:text-gray-200 mb-3 line-clamp-2">
                                            Pemberitahuan Jadwal Program Insentif Artikel Ilmiah dan Kekayaan
                                            Intelektual
                                            (KI) Dosen Vokasi Tahun 2023. Pemberitahuan Jadwal Program Insentif Artikel
                                            Ilmiah dan Kekayaan Intelektual (KI) Dosen Vokasi Tahun 2023Pemberitahuan
                                            Jadwal
                                            Program Insentif Artikel Ilmiah dan Kekayaan Intelektual (KI) Dosen Vokasi
                                            Tahun
                                            2023Pemberitahuan Jadwal Program Insentif Artikel Ilmiah dan Kekayaan
                                            Intelektual (KI) Dosen Vokasi Tahun 2023Pemberitahuan Jadwal Program
                                            Insentif
                                            Artikel Ilmiah dan Kekayaan Intelektual (KI) Dosen Vokasi Tahun
                                            2023Pemberitahuan Jadwal Program Insentif Artikel Ilmiah dan Kekayaan
                                            Intelektual (KI) Dosen Vokasi Tahun 2023</h1>
                                            <div class="md:flex flex-nowrap">
                                                <div class="lg:w-1/2 w-full">
                                                    <p
                                                        class="leading-relaxed mt-3 text-gray-700 dark:text-gray-300 line-clamp-1 text-sm">
                                                    Tertujuh Pada:</p>
                                                    <p href=""
                                                    class=" flex text-[15px] text-gray-700 dark:text-gray-300
                                                    font-bold "> Dr. Putri Suci Asriani SP. M.P. <strong
                                                        class="text-blue-500 dark:text-yellow-500 ml-3">(Sudah Didekan /
                                                        Selesai)</strong>
                                                    </p>
                                                </div>
                                                <div class="lg:w-1/2 w-full">
                                                    <p
                                                        class="leading-relaxed mt-3 text-gray-700 dark:text-gray-300 line-clamp-1 text-sm">
                                                        Lampiran:</p>
                                                    <a href=""
                                                        class="line-clamp-1 flex text-[15px] text-blue-500 hover:underline duration-300 transform"><svg
                                                            class="mr-1 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            enable-background="new 0 0 64 64" viewBox="0 0 64 64"
                                                            id="pdf-file">
                                                            <path fill="#eff2f3"
                                                                d="M58.2,3.2l0,49H5.8l0-38.4L19.6,0l35.5,0C56.8,0,58.2,1.5,58.2,3.2z">
                                                            </path>
                                                            <path fill="#dadede"
                                                                d="M16.7,13.8l-10.8,0L19.6,0l-0.1,10.8C19.6,12.5,18.3,13.8,16.7,13.8z">
                                                            </path>
                                                            <path fill="#f2786b"
                                                                d="M37.1 28c-2.9-2.8-5-6-5-6 .8-1.2 2.7-8.1-.2-10.1-2.9-2-4.4 1.7-4.4 1.7-1.3 4.6 1.8 8.8 1.8 8.8l-3.5 7.7c-.4 0-11.5 4.3-7.7 9.6 3.9 5.3 9.3-7.5 9.3-7.5 2.1-.7 8.5-1.6 8.5-1.6 2.5 3.4 5.5 4.5 5.5 4.5 4.6 1.2 5.1-2.6 5.1-2.6C46.6 27.5 37.1 28 37.1 28zM20 37.9c-.1 0-.1-.1-.1-.1-.6-1.4 4-4.1 4-4.1S21.4 38.5 20 37.9zM30.4 13.7c1.3 1.2.2 5.3.2 5.3S29.1 14.9 30.4 13.7zM29.2 29.2l1.8-4.4 2.8 3.4L29.2 29.2zM44 32.4C44 32.4 44 32.4 44 32.4L44 32.4 44 32.4c-.8 1.3-4.1-1.5-4.4-1.8l0 0c0 0 0 0 0 0 0 0 0 0 0 0l0 0C40.1 30.6 44.4 30.9 44 32.4L44 32.4zM58.2 49l0 11.8c0 1.7-1.4 3.2-3.2 3.2L8.9 64c-1.7 0-3.2-1.4-3.2-3.2l0-11.8H58.2z">
                                                            </path>
                                                            <path fill="#eff2f3"
                                                                d="M27.9 54.2c0 .8-.3 1.4-.8 1.9-.5.4-1.3.6-2.3.6h-.8v2.9h-1.3v-7.7H25c1 0 1.7.2 2.2.6C27.7 52.9 27.9 53.4 27.9 54.2zM24.1 55.7h.7c.6 0 1.1-.1 1.4-.3.3-.2.5-.6.5-1.1 0-.4-.1-.8-.4-1-.3-.2-.7-.3-1.3-.3h-.9V55.7zM35.8 55.7c0 1.3-.4 2.3-1.1 2.9-.7.7-1.7 1-3.1 1h-2.2v-7.7h2.4c1.2 0 2.2.3 2.9 1C35.4 53.5 35.8 54.5 35.8 55.7zM34.4 55.7c0-1.9-.9-2.8-2.6-2.8h-1.1v5.6h.9C33.5 58.6 34.4 57.6 34.4 55.7zM38.7 59.6h-1.3v-7.7h4.4v1.1h-3.1v2.4h2.9v1.1h-2.9V59.6z">
                                                            </path>
                                                        </svg>
                                                        <p class="line-clamp-1  ">Surat Pemberitahuan Jadwal Program
                                                            Insentif</p>
                                                    </a>
                                                </div>
                                            </div>



                                    </div>
                                    <div class="flex-nowrap space-x-2 ">
                                        <span class=" bg-gradient-to-r from-green-600 to-lime-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold
                                        rounded-md inline-flex items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                            fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                        Diterima</span>
                                    <span class=" bg-gradient-to-r from-blue-600 to-cyan-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold rounded-md inline-flex items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                            fill="currentColor" class="bi bi-exclamation-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>Terkirim</span>
                                    <span class=" bg-gradient-to-r from-orange-600 to-yellow-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold rounded-md inline-flex items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                            fill="currentColor" class="bi bi-arrow-counterclockwise"
                                            viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                            <path
                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                        </svg>

                                        Pandding</span>
                                    <span class=" bg-gradient-to-r from-red-600 to-orange-500    text-[12px] my-1 py-1
                                        px-4 text-gray-100 font-semibold rounded-md inline-flex
                                        items-center "> <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                            fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                        </svg>Ditolak</span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end item surat -->
                    <!-- item surat -->
                    <div data-aos="fade-up" class="w-full max-w-full mb-8      flex flex-col group blg">
                        <div class="bg-gradient-to-r  from-blue-700 dark:from-[#df9b5b] to-cyan-500 dark:to-[#f5d105] w-full   rounded-tl-xl rounded-tr-xl
                      duration-300 transform  ">
                            <a href="#"
                                class="  text-[16px] flex   font-bold text-white   dark:hover:text-gray-700 hover:underline duration-300 transform    py-3 px-6 line-clamp-1 leading-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 my-1"
                                    fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                20 Agustus 2023 </a>
                        </div>
                        <div class="flex flex-grow">
                            <div class="triangle"></div>
                            <div class="flex flex-col justify-between px-4 py-6 dark:bg-black dark:bg-opacity-30 border border-blue-600 dark:border-yellow-500
                        duration-300 transform   rounded-bl-xl rounded-br-xl text">
                                <div class="h-full md:flex flex-nowrap items-start pl-6">

                                    <div class="flex-grow mb-2">
                                        <div class="flex space-x-2">
                                            <h1
                                                class="  w-[90%]  font-bold text-lg text-gray-700 dark:text-gray-200 mb-3 line-clamp-2">
                                                Judul Surat</h1>

                                        </div>
                                        <h1
                                            class=" font-medium text-[14px] text-gray-700 dark:text-gray-200 mb-3 line-clamp-2">
                                            Pemberitahuan Jadwal Program Insentif Artikel Ilmiah dan Kekayaan
                                            Intelektual
                                            (KI) Dosen Vokasi Tahun 2023. Pemberitahuan Jadwal Program Insentif
                                            Artikel
                                            Ilmiah dan Kekayaan Intelektual (KI) Dosen Vokasi Tahun
                                            2023Pemberitahuan
                                            Jadwal
                                            Program Insentif Artikel Ilmiah dan Kekayaan Intelektual (KI) Dosen
                                            Vokasi
                                            Tahun
                                            2023Pemberitahuan Jadwal Program Insentif Artikel Ilmiah dan Kekayaan
                                            Intelektual (KI) Dosen Vokasi Tahun 2023Pemberitahuan Jadwal Program
                                            Insentif
                                            Artikel Ilmiah dan Kekayaan Intelektual (KI) Dosen Vokasi Tahun
                                            2023Pemberitahuan Jadwal Program Insentif Artikel Ilmiah dan Kekayaan
                                            Intelektual (KI) Dosen Vokasi Tahun 2023</h1>
                                        <div class="md:flex flex-nowrap">
                                            <div class="lg:w-1/2 w-full">
                                                <p
                                                    class="leading-relaxed mt-3 text-gray-700 dark:text-gray-300 line-clamp-1 text-sm">
                                                    Tertujuh Pada:</p>
                                                <p href="" class=" flex text-[15px] text-gray-700 dark:text-gray-300
                                                    font-bold "> Dr. Putri Suci Asriani SP. M.P. <strong
                                                        class="text-blue-500 dark:text-yellow-500 ml-3">(Sudah
                                                        Didekan /
                                                        Selesai)</strong>
                                                </p>
                                            </div>
                                            <div class="lg:w-1/2 w-full">
                                                <p
                                                    class="leading-relaxed mt-3 text-gray-700 dark:text-gray-300 line-clamp-1 text-sm">
                                                    Lampiran:</p>
                                                <a href=""
                                                    class="line-clamp-1 flex text-[15px] text-blue-500 hover:underline duration-300 transform"><svg
                                                        class="mr-1 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                        enable-background="new 0 0 64 64" viewBox="0 0 64 64"
                                                        id="pdf-file">
                                                        <path fill="#eff2f3"
                                                            d="M58.2,3.2l0,49H5.8l0-38.4L19.6,0l35.5,0C56.8,0,58.2,1.5,58.2,3.2z">
                                                        </path>
                                                        <path fill="#dadede"
                                                            d="M16.7,13.8l-10.8,0L19.6,0l-0.1,10.8C19.6,12.5,18.3,13.8,16.7,13.8z">
                                                        </path>
                                                        <path fill="#f2786b"
                                                            d="M37.1 28c-2.9-2.8-5-6-5-6 .8-1.2 2.7-8.1-.2-10.1-2.9-2-4.4 1.7-4.4 1.7-1.3 4.6 1.8 8.8 1.8 8.8l-3.5 7.7c-.4 0-11.5 4.3-7.7 9.6 3.9 5.3 9.3-7.5 9.3-7.5 2.1-.7 8.5-1.6 8.5-1.6 2.5 3.4 5.5 4.5 5.5 4.5 4.6 1.2 5.1-2.6 5.1-2.6C46.6 27.5 37.1 28 37.1 28zM20 37.9c-.1 0-.1-.1-.1-.1-.6-1.4 4-4.1 4-4.1S21.4 38.5 20 37.9zM30.4 13.7c1.3 1.2.2 5.3.2 5.3S29.1 14.9 30.4 13.7zM29.2 29.2l1.8-4.4 2.8 3.4L29.2 29.2zM44 32.4C44 32.4 44 32.4 44 32.4L44 32.4 44 32.4c-.8 1.3-4.1-1.5-4.4-1.8l0 0c0 0 0 0 0 0 0 0 0 0 0 0l0 0C40.1 30.6 44.4 30.9 44 32.4L44 32.4zM58.2 49l0 11.8c0 1.7-1.4 3.2-3.2 3.2L8.9 64c-1.7 0-3.2-1.4-3.2-3.2l0-11.8H58.2z">
                                                        </path>
                                                        <path fill="#eff2f3"
                                                            d="M27.9 54.2c0 .8-.3 1.4-.8 1.9-.5.4-1.3.6-2.3.6h-.8v2.9h-1.3v-7.7H25c1 0 1.7.2 2.2.6C27.7 52.9 27.9 53.4 27.9 54.2zM24.1 55.7h.7c.6 0 1.1-.1 1.4-.3.3-.2.5-.6.5-1.1 0-.4-.1-.8-.4-1-.3-.2-.7-.3-1.3-.3h-.9V55.7zM35.8 55.7c0 1.3-.4 2.3-1.1 2.9-.7.7-1.7 1-3.1 1h-2.2v-7.7h2.4c1.2 0 2.2.3 2.9 1C35.4 53.5 35.8 54.5 35.8 55.7zM34.4 55.7c0-1.9-.9-2.8-2.6-2.8h-1.1v5.6h.9C33.5 58.6 34.4 57.6 34.4 55.7zM38.7 59.6h-1.3v-7.7h4.4v1.1h-3.1v2.4h2.9v1.1h-2.9V59.6z">
                                                        </path>
                                                    </svg>
                                                    <p class="line-clamp-1  ">Surat Pemberitahuan Jadwal Program
                                                        Insentif</p>
                                                </a>
                                            </div>


                                        </div>



                                    </div>
                                    <div class="flex-nowrap space-x-2 ">
                                        <span class=" bg-gradient-to-r from-green-600 to-lime-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold
                                        rounded-md inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                fill="currentColor" class="bi bi-check-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Diterima</span>
                                        <span class=" bg-gradient-to-r from-blue-600 to-cyan-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold rounded-md inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                fill="currentColor" class="bi bi-exclamation-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>Terkirim</span>
                                        <span class=" bg-gradient-to-r from-orange-600 to-yellow-500 text-[12px] my-1 py-1 px-4
                                        text-gray-100 font-semibold rounded-md inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                <path
                                                    d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                            </svg>

                                            Pandding</span>
                                        <span class=" bg-gradient-to-r from-red-600 to-orange-500    text-[12px] my-1 py-1
                                        px-4 text-gray-100 font-semibold rounded-md inline-flex
                                        items-center "> <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 mr-1" fill="currentColor" class="bi bi-x-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                            </svg>Ditolak</span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end item surat -->
                </div>
        </div>
    </section>
    <!-- end Fitur  -->


    <!-- modal -->
    <div x-show="modelOpen" style="z-index: 70;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-5xl p-8 my-20 overflow-hidden text-left transition-all transform dark:bg-gray-800 bg-white rounded-lg shadow-xl  ">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-700 dark:text-gray-300 ">Permohonan Surat <span
                            class="font-bold text-[#152042]"
                            x-text="Permohonan Surat"></span></h1>

                    <button @click="modelOpen = false" class="text-gray-600 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <form class="mt-5" action=" " method="GET">

                    <label
                        class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Subject Surat</label>
                    <input type="text" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder="Subject Surat" />
                    <div class="mt-1">
                        <label
                            class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Pesan</label>
                        <textarea class="  h-20 w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Pesan"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 my-1">
                        <div class=" col-span-1  ">
                            <label
                                class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Penerima</label>
                            <input type="text" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder="Penerima" />
                        </div>
                        <div class=" col-span-1  ">
                            <label
                                class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Tanggal Surat</label>
                            <input type="date" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Tanggal Surat" />
                        </div>
                    </div>
                    <div class="mt-1">
                        <label
                            class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Lampiran</label>
                        <input type="file" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Lampiran">
                    </div>



                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-[#152042] rounded-md dark:bg-yellow-600 dark:hover:bg-yellow-500 dark:focus:bg-[#1f3882] hover:bg-[#060f2a] focus:outline-none focus:bg-[#152042] focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
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
