<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Fisip - Universitas Bengkulu</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}">

    <!-- stylesheets tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/output.css') }}">
    <!-- alpine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <!-- tailwindcss flag-icon  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body id="home" class=" font-[arial] 2xl:text-xl font-nunito    text-slate-900 ">
    <div class=" lg:h-screen  m-0  overflow-hidden  bg-[#010347] ">
        <!-- Preloader Start -->
        <div x-data="{ show: false }" x-transition:enter="transition duration-700" style="z-index: 99;" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded p-4" x-show="show">
            <div id="loader-wrapper">
                <div id="loader-logo">
                    <div id="loader"></div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->

        <!-- header -->
        <header class=" bg-[#010347] grid">
            <div class="  flex w-full         font-[arial] mx-auto pt-3 pb-6 ">
                <a href="{{ route('user') }}" class="flex items-center   z-50 relative   mx-4 md:ml-6">
                    <img src="{{ asset('assets/img/logo.png') }}" class=" lg:h-20 2xl:h-20 h-10 aspect-square">
                </a>
                <div class="text-center absolute font-extrabold text-[10px] lg:text-lg 2xl:text-2xl text-gray-200 w-full">
                    <h2 class=" lg:leading-6">JADWAL MATA KULIAH <br> FAKULTAS ILMU SOSIAL DAN POLITIK <br>UNIVERSITAS BENGKULU</h2>
                </div>


            </div>
        </header>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>


        {{ $slot }}

    </div>



</body>
@livewireScripts
<!-- script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="{{ asset('assets/scripts.js') }}"></script>
