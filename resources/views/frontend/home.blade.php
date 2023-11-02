@extends('layouts.user')
@section('home','active-menu')

@section('content')
<svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-[#0000006e] dark:fill-[#f5ca3c] duration-300 transform absolute top-0 z-0 hidden md:block">
    <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
    </path>
    <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
</svg>

<!-- slider -->
<section id="home">
    <div class=" text-center overflow-hidden bg-gradient-to-r h-screen justify-center from-[#010347] to-[#111e58] ">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" class="absolute w-screen h-screen" preserveAspectRatio="none" viewBox="0 0 1440 560">
            <g mask="url(&quot;#SvgjsMask1483&quot;)" fill="none">
                <path d="M0 0L455.68 0L0 103.22z" fill="rgba(255, 255, 255, .1)"></path>
                <path d="M0 103.22L455.68 0L739.4300000000001 0L0 151.91z" fill="rgba(255, 255, 255, .075)">
                </path>
                <path d="M0 151.91L739.4300000000001 0L1023.3100000000001 0L0 391.89z" fill="rgba(255, 255, 255, .05)"></path>
                <path d="M0 391.89L1023.3100000000001 0L1162.31 0L0 473.53z" fill="rgba(255, 255, 255, .025)">
                </path>
                <path d="M1440 560L1337.52 560L1440 324.15z" fill="rgba(0, 0, 0, .1)"></path>
                <path d="M1440 324.15L1337.52 560L1255.73 560L1440 296.65999999999997z" fill="rgba(0, 0, 0, .075)">
                </path>
                <path d="M1440 296.66L1255.73 560L973.6800000000001 560L1440 255.32000000000002z" fill="rgba(0, 0, 0, .05)">
                </path>
                <path d="M1440 255.32000000000005L973.68 560L641.98 560L1440 130.61000000000007z" fill="rgba(0, 0, 0, .025)">
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
                <lottie-player data-aos="fade-right" src="{{ asset('assets/user/src/animation_ln6b4eb3.json') }}" style="filter: drop-shadow(10px 10px 0px #EAB308);" background="transparent" speed="1" class="w-4/6 mx-auto " loop autoplay></lottie-player>
            </div>
        </div>



    </div>
</section>


<div class="  ">
    <div class="slider-svg tran-svg ">
        <svg data-name="Layer 1" class="svg2 duration-300 transform fill-gray-300 dark:fill-[#927207] opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="slider-svg tran-svg ">
        <svg data-name="Layer 1" class="svg1  duration-300 transform fill-gray-300 dark:fill-[#d6ad26] opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <div class="slider-svg">
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
<!-- end slider -->


<!-- Fitur  -->
<section id="Fitur" class="duration-300 transform bg-pattren">

    <div class="mx-auto container px-5  py-32    text-gray-700 dark:text-gray-200 z-10 relative ">
        <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
            <div class="col-span-1   text-gray-700 dark:text-white  mx-auto   order-2  md:order-first  ">
                <div class="        text-center md:text-right  -mt-12    ">
                    <a href="{{ route('poadcast') }}" data-aos="fade-down" class="mb-3 font-sans text-3xl border-b-2 border-[#0b3960]  dark:border-yellow-500 px-3 pb-2
                                inline-block font-bold text-[#0b3960] dark:text-yellow-500
                              text-sh2 ">
                        Sewa Podcast</a>
                    <p data-aos="fade-down" class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Tersedia beragam
                        peralatan podcast terbaik untuk memenuhi kebutuhan Anda. Nikmati kualitas suara yang
                        luar biasa dengan layanan sewa alat podcast. Temukan solusi lengkap
                        untuk produksi podcast Anda dengan layanan sewa alat podcast. Dari mikrofon
                        berkualitas tinggi hingga perangkat perekam canggih, memiliki semua yang Anda
                        butuhkan untuk menciptakan konten podcast yang menarik dan profesional. Segera mulai
                        rekaman Anda dengan peralatan terbaik dalam bisnis ini.
                    </p>
                    <a href="{{ route('poadcast') }}" data-aos="fade-down" class=" rounded-lg border-2 mt-5 text-white text-center w-full px-4 md:w-1/3
                                border-blue-600 dark:border-yellow-600 bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest py-2
                              text-sm   text-white-700   focus:shadow-[-4px_4px_10px_0px_#eab308] ">Sewa Podcast</a>
                </div>
            </div>
            <div class="col-span-1     -mt-14">
                <lottie-player data-aos="fade-left" src="{{ asset('assets/user/src/p2.json') }}" background="transparent" speed="1" class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
            <div class="col-span-1     -mt-14">
                <lottie-player data-aos="fade-right" src="{{ asset('assets/user/src/S.json') }}" background="transparent" speed="1" class="w-4/6 mx-auto lottie-sh " loop autoplay></lottie-player>
            </div>
            <div class="col-span-1   text-gray-700 dark:text-white  mx-auto      ">
                <div class="        text-center md:text-left  mt-5 md:mt-20  ">
                    <h2 data-aos="fade-down" class="mb-3  capitalize font-sans text-3xl  border-b-2 border-[#0b3960] dark:border-yellow-500 px-3 pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                        monitoring jadwal mata kuliah</h2>
                    <p data-aos="fade-down" class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Monitoring jadwal
                        mata kuliah Anda
                        menjadi lebih mudah dan efisien dengan layanan. Aplikasi memungkinkan Anda
                        untuk dengan cepat melihat jadwal kuliah Anda, mengatur pengingat, dan mengetahui
                        perubahan jadwal dengan cepat. Tidak perlu lagi khawatir tertinggal kelas atau konflik
                        jadwal. Manfaatkan teknologi untuk merencanakan waktu Anda dengan lebih baik dan
                        tingkatkan kinerja akademis Anda.
                    </p>
                    <a href="{{route('tampilJadwalLivewire')}}" data-aos="fade-down" class="    rounded-lg border-2 mt-5 text-white   text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm   text-white-700   focus:shadow-[-4px_4px_10px_0px_#eab308] ">Jadwal Matkul</a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
            <div class="col-span-1   text-gray-700 dark:text-white  mx-auto   order-2  md:order-first  ">
                <div class="        text-center md:text-right  mt-5 md:mt-20  ">
                    <h2 data-aos="fade-down" class="mb-3   font-sans text-3xl  border-b-2 border-[#0b3960] dark:border-yellow-500 px-3 pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                        E-konseling</h2>
                    <p data-aos="fade-down" class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">E-konseling
                        dirancang untuk
                        memberikan dukungan yang mudah diakses dan profesional untuk kebutuhan kesehatan mental
                        Anda. Dengan berbagai pilihan sesi daring yang aman dan terpercaya, Anda dapat dengan
                        nyaman berkonsultasi dengan terapis berlisensi tanpa meninggalkan kenyamanan rumah
                        Anda. Jangan biarkan stres, kecemasan, atau masalah emosional menghambat Anda. Temukan
                        keseimbangan dan dukungan yang Anda butuhkan dengan layanan E-konseling.
                    </p>
                    <a href="{{route('e-konseling')}}" data-aos="fade-down" class="   text-white rounded-lg border-2 mt-5    text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm text-white-700
                              focus:shadow-[-4px_4px_10px_0px_#eab308] ">E-konseling</a>
                </div>
            </div>
            <div class="col-span-1     -mt-14">
                <lottie-player data-aos="fade-left" src="{{ asset('assets/user/src/K.json') }}" background="transparent" speed="1" class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2  my-36 ">
            <div class="col-span-1     -mt-14">
                <lottie-player data-aos="fade-right" src="{{ asset('assets/user/src/m.json') }}" background="transparent" speed="1" class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
            </div>
            <div class="col-span-1   text-gray-700 dark:text-white  mx-auto      ">
                <div class="        text-center md:text-left  -mt-12 md:mt-20  ">
                    <h2 data-aos="fade-down" class="mb-3   font-sans text-3xl capitalize border-b-2 border-[#0b3960] dark:border-yellow-500   pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                        Permohonan surat untuk mahasiswa & tendik</h2>
                    <p data-aos="fade-down" class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Sistem yang
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
                    <h2 data-aos="fade-down" class="mb-3   font-sans text-3xl  border-b-2 border-[#0b3960] dark:border-yellow-500 px-3 pb-2 inline-block font-bold text-[#0b3960] dark:text-yellow-500 text-sh2  ">
                        Buku tamu</h2>
                    <p data-aos="fade-down" class="text-gray-700 dark:text-gray-300 text-sm  leading-8 mb-5     ">Buku tamu adalah
                        lembaran kosong
                        yang menunggu cerita Anda untuk mengisi halaman-halaman ini
                        dengan kata-kata Anda berbagi momen, ucapan terima
                        kasih, atau pesan inspiratif? Ini adalah kesempatan Anda untuk meninggalkan tanda Anda
                        dalam Buku tamu.
                    </p>
                    <a href="{{ route('bukuTamu') }}" data-aos="fade-down" class="  text-white  rounded-lg border-2 mt-5    text-center w-full px-4 md:w-1/3 border-blue-600 dark:border-yellow-600  bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest  py-2
                              text-sm text-white-700
                              focus:shadow-[-4px_4px_10px_0px_#eab308] ">Buku tamu</a>
                </div>
            </div>
            <div class="col-span-1     -mt-14">
                <lottie-player data-aos="fade-left" src="{{ asset('assets/user/src/b.json') }}" background="transparent" speed="1" class="w-5/6 mx-auto lottie-sh" loop autoplay></lottie-player>
            </div>
        </div>

    </div>


</section>
<!-- end Fitur  -->
@endsection
