<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Fisip - Universitas Bengkulu</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.svg') }}">

    <!-- stylesheets tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/user/src/output.css') }}">

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
    @vite(['resources/css/app.css' ])

    @livewireStyles
</head>
<style>
    .fadeInRight {
        animation: fadeInRight 1s ease forwards;
    }

    .fadeInLeft {
        animation: fadeInLeft 1s ease forwards;
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<body id="home" class="overflow-x-hidden ">
    <div class=" font-[Poppins] 2xl:text-xl font-nunito min-h-screen   text-slate-900 bg-gradient-to-r overflow-x-hidden
    dark:from-[#010347] dark:to-[#001855] from-gray-200 to-gray-100
    items-center w-full ">
        <!-- Preloader Start -->
        <div x-data="{ show: false }" x-transition:enter="transition duration-700" style="z-index: 99;" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded p-4" x-show="show">
            <div id="loader-wrapper">
                <div id="loader-logo">
                    <div id="loader"></div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->

        {{ $slot }}


    </div>




</body>

<!-- script -->
@livewireScripts

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/scripts.js') }}"></script>
