<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRisMa LPPM - Universitas Bengkulu</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.svg') }}">

    <!-- stylesheets tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/user/src/output.css') }}">
    <!-- alpine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <!-- tailwindcss flag-icon  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/user/src/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body id="home" class="overflow-x-hidden">
    <div class=" font-[Poppins] 2xl:text-xl font-nunito min-h-screen text-slate-900 bg-gradient-to-r overflow-x-hidden
    dark:from-[#010347] dark:to-[#001855] from-gray-200 to-gray-100
    items-center w-full ">
        <!-- Preloader Start -->
        <div x-data="{ show: false }" x-transition:enter="transition duration-700" style="z-index: 99;"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="bg-white rounded p-4" x-show="show">
            <div id="loader-wrapper">
                <div id="loader-logo">
                    <div id="loader"></div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->

        <!-- navbar  -->
        <nav id="shadow-nav" x-data="{isOpen: false }" class="fixed top-0 z-50 w-full    font-[Poppins]    ">
            <div id="navbar" class="  py-6 mx-auto duration-300 bg-transparent    ">
                <div class="lg:flex mx-auto container px-5   lg:items-center lg:justify-between">
                    <div class="flex items-center justify-between">
                        <!-- logo -->
                        <a href="/view/home.html" class="flex items-center text-black   mx-4 md:ml-6">
                            <img src="{{ asset('assets/img/logo.svg') }}" class="md:w-14 md:h-14 w-12 h-12">

                            <div class="ml-3 text-slate-100  font-sans  ">
                                <strong
                                    class=" text-2xl md:text-3xl font-extrabold   text-sh uppercase">SI-FISIP</strong>
                                <p class="text-[13px] md:text-[16px]    text-yellow-500     uppercase -mt-2
                                relative">
                                    UNIVERSITAS BENGKULU</p>
                            </div>
                        </a>
                        <!-- Mobile menu button -->
                        <div class="flex lg:hidden">
                            <button x-cloak @click="isOpen = !isOpen" type="button"
                                class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-100 "
                                aria-label="toggle menu">
                                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                </svg>
                                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                    <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-yellow-500   md:bg-none menu-navbar text-white lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto
                    lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center " id="list-menu">
                        <div class="flex flex-col -mx-6 lg:flex-row lg:items-center   text-[16px]">
                            @include('layouts.application_partials.user_navbar')
                            <div x-data="{ toggle: localStorage.getItem('theme') === 'dark' }"
                                :class="toggle ? 'dark' : ''" class=" app mx-auto py-3 lg:py-0">
                                <button title="Change Mode" id="theme-toggle" @click="toggle = !toggle"
                                    class="flex items-center w-full p-2 group text-sm text-gray-600 transition-colors duration-300 transform rounded-bl-full md:p-5 dark:text-gray-50 dark:hover:text-whitecapitalize ">
                                    <svg class="group-hover:fill-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <!-- Sun -->
                                        <circle pathLength="1" class="sun-icon" cx="12" cy="12" r="5"></circle>
                                        <line pathLength="1" class="sun-icon" x1="12" y1="1" x2="12" y2="3">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="12" y1="21" x2="12" y2="23">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="4.22" y1="4.22" x2="5.64" y2="5.64">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="18.36" y1="18.36" x2="19.78"
                                            y2="19.78">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="1" y1="12" x2="3" y2="12">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="21" y1="12" x2="23" y2="12">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="4.22" y1="19.78" x2="5.64" y2="18.36">
                                        </line>
                                        <line pathLength="1" class="sun-icon" x1="18.36" y1="5.64" x2="19.78" y2="4.22">
                                        </line>
                                        <!-- Moon -->
                                        <path pathLength="1" class="moon-icon"
                                            d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                    </svg>
                                    <span
                                        class="lg:hidden ml-2 text-gray-600 lg:text-white group-hover:text-yellow-500
                                        cursor-pointer transform">Mode</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </nav>
        <!-- end navbar -->
        <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            class="fill-[#0000006e] dark:fill-[#f5ca3c] duration-300 transform absolute top-0 z-0 hidden md:block">
            <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
            </path>
            <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
        </svg>

        <!-- slider -->
        <section id="home">
            <div
                class=" text-center overflow-hidden bg-gradient-to-r h-screen justify-center from-[#010347] to-[#111e58] ">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:svgjs="http://svgjs.dev/svgjs" class="absolute w-screen h-screen" preserveAspectRatio="none"
                    viewBox="0 0 1440 560">
                    <g mask="url(&quot;#SvgjsMask1483&quot;)" fill="none">
                        <path d="M0 0L455.68 0L0 103.22z" fill="rgba(255, 255, 255, .1)"></path>
                        <path d="M0 103.22L455.68 0L739.4300000000001 0L0 151.91z" fill="rgba(255, 255, 255, .075)">
                        </path>
                        <path d="M0 151.91L739.4300000000001 0L1023.3100000000001 0L0 391.89z"
                            fill="rgba(255, 255, 255, .05)"></path>
                        <path d="M0 391.89L1023.3100000000001 0L1162.31 0L0 473.53z" fill="rgba(255, 255, 255, .025)">
                        </path>
                        <path d="M1440 560L1337.52 560L1440 324.15z" fill="rgba(0, 0, 0, .1)"></path>
                        <path d="M1440 324.15L1337.52 560L1255.73 560L1440 296.65999999999997z"
                            fill="rgba(0, 0, 0, .075)">
                        </path>
                        <path d="M1440 296.66L1255.73 560L973.6800000000001 560L1440 255.32000000000002z"
                            fill="rgba(0, 0, 0, .05)">
                        </path>
                        <path d="M1440 255.32000000000005L973.68 560L641.98 560L1440 130.61000000000007z"
                            fill="rgba(0, 0, 0, .025)">
                        </path>
                    </g>
                    <defs>
                        <mask id="SvgjsMask1483">
                            <rect width="1440" height="560" fill="#ffffff"></rect>
                        </mask>
                    </defs>
                </svg>
                <div class="grid grid-cols-1 md:grid-cols-2  z-10 overflow-hidden h-screen justify-center relative">
                    <div class="col-span-1 px-8 lg:px-12 text-white  mx-auto     place-self-center">
                        <div data-aos="fade-left" class=" lg:mt-20 2xl:mt-0  max-w-lg 2xl:max-w-xl">
                            <h2 class="font-extrabold font-[arial] text-3xl lg:text-4xl       inline-block text-transparent
                              bg-clip-text bg-gradient-to-b from-orange-500 from-30% to-yellow-500 text-h2-sh  ">
                                FISIP - Universitas Bengkulu</h2>
                            <p class="text-gray-300 text-xs leading-6 md:leading-7 md:text-sm  ">Fakultas yang membangun
                                kajian
                                ilmu-ilmu sosial dan politik pada masyarakat pesisir berkelas regional ASEAN pada tahun
                                2025!
                            </p>


                        </div>
                    </div>
                    <div class="col-span-1 lg:mt-20 2xl:mt-0 md:block hidden ">
                        <lottie-player data-aos="fade-right" src="{{ asset('assets/user/src/animation_ln6b4eb3.json') }}"
                            style="filter: drop-shadow(10px 10px 0px #EAB308);" background="transparent" speed="1"
                            class="w-4/6 mx-auto " loop autoplay></lottie-player>
                    </div>
                </div>



            </div>
        </section>


        <div class="  ">
            <div class="slider-svg tran-svg ">
                <svg data-name="Layer 1"
                    class="svg2 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="slider-svg tran-svg ">
                <svg data-name="Layer 1"
                    class="svg1  duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>

            <div class="slider-svg">
                <svg data-name="Layer 1" class="svg3 duration-300 transform fill-gray-300 dark:fill-[#f5ca3c]  "
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>

            <div class="slider-svg-b    absolute  z-10">
                <svg data-name="Layer 1"
                    class="svg5 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="slider-svg-b tran-svg absolute z-10">
                <svg data-name="Layer 1"
                    class="svg4 duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="slider-svg-b  tran-svg absolute -mt-2 z-10">
                <svg data-name="Layer 1" class="svg6  duration-300 transform fill-gray-300 dark:fill-[#f5ca3c]  "
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>
        <!-- end slider -->


        <!-- Fitur  -->
        <section id="Fitur" class="duration-300 transform bg-pattren">

            <div class="mx-auto container px-5  py-32    text-gray-700 dark:text-gray-200 z-10 relative ">
                <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
                    <div class="col-span-1   text-gray-700 dark:text-white  mx-auto   order-2  md:order-first  ">
                        <div class="        text-center md:text-right  -mt-12    ">
                            <h2 data-aos="fade-down"
                                class="mb-3 font-sans text-3xl border-b-2 border-[#0b3960]  dark:border-yellow-500 px-3 pb-2
                                inline-block font-bold text-[#0b3960] dark:text-yellow-500
                              text-sh2 ">
                                Sewa Podcast</h2>
                            <p data-aos="fade-down"
                                class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Tersedia beragam
                                peralatan podcast terbaik untuk memenuhi kebutuhan Anda. Nikmati kualitas suara yang
                                luar biasa dengan layanan sewa alat podcast. Temukan solusi lengkap
                                untuk produksi podcast Anda dengan layanan sewa alat podcast. Dari mikrofon
                                berkualitas tinggi hingga perangkat perekam canggih, memiliki semua yang Anda
                                butuhkan untuk menciptakan konten podcast yang menarik dan profesional. Segera mulai
                                rekaman Anda dengan peralatan terbaik dalam bisnis ini.
                            </p>
                            <a href="" data-aos="fade-down"
                                class=" rounded-lg border-2 mt-5 text-white text-center w-full px-4 md:w-1/3
                                border-blue-600 dark:border-yellow-600 bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest py-2
                              text-sm   text-white-700   focus:shadow-[-4px_4px_10px_0px_#eab308] ">Sewa Podcast</a>
                        </div>
                    </div>
                    <div class="col-span-1     -mt-14">
                        <lottie-player data-aos="fade-left" src="{{ asset('assets/user/src/p2.json') }}"  background="transparent" speed="1"
                            class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
                    <div class="col-span-1     -mt-14">
                        <lottie-player data-aos="fade-right" src="{{ asset('assets/user/src/S.json') }}"  background="transparent" speed="1"
                            class="w-4/6 mx-auto lottie-sh " loop autoplay></lottie-player>
                    </div>
                    <div class="col-span-1   text-gray-700 dark:text-white  mx-auto      ">
                        <div class="        text-center md:text-left  mt-5 md:mt-20  ">
                            <h2 data-aos="fade-down"
                                class="mb-3  capitalize font-sans text-3xl  border-b-2 border-[#0b3960] dark:border-yellow-500 px-3 pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                                monitoring jadwal mata kuliah</h2>
                            <p data-aos="fade-down"
                                class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Monitoring jadwal
                                mata kuliah Anda
                                menjadi lebih mudah dan efisien dengan layanan. Aplikasi memungkinkan Anda
                                untuk dengan cepat melihat jadwal kuliah Anda, mengatur pengingat, dan mengetahui
                                perubahan jadwal dengan cepat. Tidak perlu lagi khawatir tertinggal kelas atau konflik
                                jadwal. Manfaatkan teknologi untuk merencanakan waktu Anda dengan lebih baik dan
                                tingkatkan kinerja akademis Anda.
                            </p>
                            <a href="" data-aos="fade-down"
                                class="    rounded-lg border-2 mt-5 text-white   text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm   text-white-700   focus:shadow-[-4px_4px_10px_0px_#eab308] ">Jadwal Matkul</a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
                    <div class="col-span-1   text-gray-700 dark:text-white  mx-auto   order-2  md:order-first  ">
                        <div class="        text-center md:text-right  mt-5 md:mt-20  ">
                            <h2 data-aos="fade-down"
                                class="mb-3   font-sans text-3xl  border-b-2 border-[#0b3960] dark:border-yellow-500 px-3 pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                                E-konseling</h2>
                            <p data-aos="fade-down"
                                class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">E-konseling
                                dirancang untuk
                                memberikan dukungan yang mudah diakses dan profesional untuk kebutuhan kesehatan mental
                                Anda. Dengan berbagai pilihan sesi daring yang aman dan terpercaya, Anda dapat dengan
                                nyaman berkonsultasi dengan terapis berlisensi tanpa meninggalkan kenyamanan rumah
                                Anda. Jangan biarkan stres, kecemasan, atau masalah emosional menghambat Anda. Temukan
                                keseimbangan dan dukungan yang Anda butuhkan dengan layanan E-konseling.
                            </p>
                            <a href="" data-aos="fade-down" class="   text-white rounded-lg border-2 mt-5    text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm text-white-700
                              focus:shadow-[-4px_4px_10px_0px_#eab308] ">E-konseling</a>
                        </div>
                    </div>
                    <div class="col-span-1     -mt-14">
                        <lottie-player data-aos="fade-left" src="{{ asset('assets/user/src/K.json') }}"  background="transparent" speed="1"
                            class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
                    <div class="col-span-1     -mt-14">
                        <lottie-player data-aos="fade-right" src="{{ asset('assets/user/src/m.json') }}"  background="transparent" speed="1"
                            class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
                    </div>
                    <div class="col-span-1   text-gray-700 dark:text-white  mx-auto      ">
                        <div class="        text-center md:text-left  -mt-12 md:mt-20  ">
                            <h2 data-aos="fade-down"
                                class="mb-3   font-sans text-3xl capitalize border-b-2 border-[#0b3960] dark:border-yellow-500   pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                                Permohonan surat untuk mahasiswa & tendik</h2>
                            <p data-aos="fade-down"
                                class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Sistem yang
                                praktis
                                dan efisien untuk
                                permohonan surat bagi mahasiswa dan tenaga kependidikan kami. Dengan platform kami yang
                                user-friendly, Anda dapat dengan cepat mengajukan permohonan surat seperti surat
                                keterangan, surat rekomendasi, atau surat izin dengan mudah tanpa perlu waktu yang
                                lama. Kami siap membantu Anda mengurus segala keperluan surat Anda dengan cepat dan
                                tanpa ribet. Ini adalah langkah kecil yang kami ambil untuk memudahkan perjalanan
                                akademis dan profesional Anda.
                            </p>
                            <a href="" data-aos="fade-down" class="  text-white  rounded-lg border-2 mt-5    text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm text-white-700
                              focus:shadow-[-4px_4px_10px_0px_#eab308] ">Permohonan surat</a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
                    <div class="col-span-1   text-gray-700 dark:text-white  mx-auto   order-2  md:order-first  ">
                        <div class="        text-center md:text-right  -mt-12 md:mt-20  ">
                            <h2 data-aos="fade-down"
                                class="mb-3   font-sans text-3xl  border-b-2 border-[#0b3960] dark:border-yellow-500 px-3 pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                                Buku tamu</h2>
                            <p data-aos="fade-down"
                                class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Buku tamu adalah
                                lembaran kosong
                                yang menunggu cerita Anda untuk mengisi halaman-halaman ini
                                dengan kata-kata Anda berbagi momen, ucapan terima
                                kasih, atau pesan inspiratif? Ini adalah kesempatan Anda untuk meninggalkan tanda Anda
                                dalam Buku tamu.
                            </p>
                            <a href="" data-aos="fade-down" class="  text-white  rounded-lg border-2 mt-5    text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm text-white-700
                              focus:shadow-[-4px_4px_10px_0px_#eab308] ">Buku tamu</a>
                        </div>
                    </div>
                    <div class="col-span-1     -mt-14">
                        <lottie-player data-aos="fade-left" src="{{ asset('assets/user/src/b.json') }}"  background="transparent" speed="1"
                            class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
                    </div>
                </div>

            </div>


        </section>
        <!-- end Fitur  -->


        <div class=" relative ">
            <div class="slider-svg z-20 tran-svg ">
                <svg data-name="Layer 1"
                    class="svg2 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="slider-svg z-20 tran-svg ">
                <svg data-name="Layer 1"
                    class="svg1  duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>

            <div class="slider-svg z-20">
                <svg data-name="Layer 1" class="svg3 duration-300 transform fill-gray-300 dark:fill-[#f5ca3c]  "
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>

            <div class="slider-svg-b    absolute  z-10">
                <svg data-name="Layer 1"
                    class="svg5 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="slider-svg-b tran-svg absolute z-10">
                <svg data-name="Layer 1"
                    class="svg4 duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>


            <div class="slider-svg-b  tran-svg absolute -mt-2 z-10">
                <svg data-name="Layer 1" class="svg6  duration-300 transform fill-gray-300 dark:fill-[#f5ca3c]  "
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>

        <!-- Footer  -->

        <footer class="relative         pt-32  bg-gradient-to-r  from-[#010347]  to-[#001855] ">
            <div class=" mx-auto container px-5 py-20 pt-36 pb-16   flex  items-start
            md:flex-row md:flex-nowrap flex-wrap flex-col">
                <div class="lg:w-2/4 md:w-1/2 w-full flex-shrink-0 md:mx-0 mx-auto    text-left">
                    <a href="/view/home.html" class="flex items-center text-black    ">
                        <img src="{{ asset('assets/img/logo.svg') }}" class="md:w-14 md:h-14 w-12 h-12">

                        <div class="ml-3 text-slate-100  font-sans  ">
                            <strong class=" text-2xl md:text-3xl font-extrabold   text-sh uppercase">SI-FISIP</strong>
                            <p class="text-[13px] md:text-[16px]    text-yellow-500       uppercase -mt-2
                                relative">
                                UNIVERSITAS BENGKULU</p>
                        </div>
                    </a>
                    <p class="  mt-4 text-sm text-gray-200 leading-6">Fakultas yang membangun kajian ilmu-ilmu sosial
                        dan
                        politik pada masyarakat pesisir berkelas regional ASEAN pada tahun 2025!

                    </p>
                    <a class="flex  my-3 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="fill-gray-600 group-hover:fill-yellow-500 w-5 h-5 mr-3" viewBox="0 0 16 16" id="map">
                            <path
                                d="M8 0C5.2 0 3 2.2 3 5s4 11 5 11 5-8.2 5-11-2.2-5-5-5zm0 8C6.3 8 5 6.7 5 5s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z">
                            </path>
                        </svg>


                        <span class=" text-sm text-gray-300 group-hover:text-yellow-500  duration-300 transform
                        break-normal">Jl W.R Supratman, Kandang Limun, Bengkulu 38371
                            INDONESIA</span>
                    </a>

                    <a class="flex  my-3 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="fill-gray-600 group-hover:fill-yellow-500 w-5 h-5 mr-3 " fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>

                        <span class=" text-sm text-gray-300 group-hover:text-yellow-500 duration-300 transform
                        break-normal">0736-38119</span>
                    </a>

                    <a class="flex  my-3 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="fill-gray-600 group-hover:fill-yellow-500 w-5 h-5 mr-3  " fill="currentColor"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                        <span class=" text-sm text-gray-300 group-hover:text-yellow-500  duration-300 transform
                            break-normal">fisip@unib.ac.id</span>
                    </a>
                </div>

                <div class="lg:w-2/4 md:w-1/2 w-full px-4 md:ml-12 mt-10 md:mt-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7962.469185174076!2d102.2762404243831!3d-3.7590398559004954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b1c1b47890a7%3A0xffc161c24b84e401!2sFisip+Unib!5e0!3m2!1sen!2sid!4v1521773592897"
                        class="w-full rounded-lg h-72 brightness-90 " style="box-shadow: 5px 5px 20px  5px #EAB308;"
                        frameborder="0" style="border:0" allowfullscreen=""></iframe>

                </div>
            </div>

            <div class="px-12 mx-auto py-4   flex flex-wrap flex-col sm:flex-row bg-[#101235]  ">
                <p class="text-gray-300 mx-auto   text-sm text-center sm:text-left">Copyright&copy; 2023 |
                    <a href="#" class="text-yellow-500 font-bold">SI-FISIP</a>. All rights reserved.
                </p>
            </div>
        </footer>
        <!-- end Footer -->
        <!-- back to top  -->
        <div class="" x-data="{scrollBackTop: false}" x-cloak>
            <svg x-show="scrollBackTop" @click="window.scrollTo({top: 0, behavior: 'smooth'})"
                x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
                aria-label="Back to top" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="bi bi-arrow-up-circle-fill fixed bottom-0 right-0 mx-3 my-10   w-8 dark:fill-blue-700 fill-blue-500 shadow-lg    cursor-pointer hover:fill-blue-400 bg-white       rounded-full "
                viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
            </svg>
        </div>
    </div>




</body>

<!-- script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/user/src/scripts.js') }}"></script>
