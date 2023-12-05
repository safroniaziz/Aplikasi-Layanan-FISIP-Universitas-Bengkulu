
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

<body id="home"
    class=" font-[Poppins] 2xl:text-xl font-nunito overflow-hidden h-screen text-slate-900 bg-gradient-to-r
    dark:from-[#010347] dark:to-[#001855] from-gray-100 to-gray-100">

    <!-- Preloader Start -->
    <div x-data="{ show: false }" x-transition:enter="transition duration-700" style="z-index: 99;"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        class="bg-white rounded p-4" x-show="show">
        <!-- Preloader Start -->
        <div id="loader-wrapper">
            <div id="loader-logo">
                <div id="loader"></div>
            </div>
        </div>
        <!-- Preloader Start -->
    </div>

    <!-- Preloader Start -->
    <!-- navbar  -->
    <nav id="shadow-nav" x-data="{isOpen: false }" class="fixed top-0 z-50 w-full    font-[Poppins]    ">
        <div id="navbar" class="  py-6 mx-auto duration-300 bg-transparent    ">
            <div class="lg:flex mx-auto container px-5   lg:items-center lg:justify-between">
                <div class="flex items-center justify-between">
                    <!-- logo -->
                    <a href="{{ route('user') }}" class="flex items-center text-black   mx-4 md:ml-6">
                        <img src="{{ asset('assets/img/logo.png') }}" style="width: 100px !important;" class="md:w-14 md:h-14 w-12 h-12">

                        <div class="ml-3 text-gray-700 dark:text-slate-100  font-sans  ">
                            <strong class=" text-2xl md:text-3xl font-extrabold   text-sh uppercase">E-BERES FISIP</strong>
                            <p class="text-[13px] md:text-[16px]    text-yellow-500     uppercase -mt-2
                                relative">
                                UNIVERSITAS BENGKULU</p>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-100 "
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
                        <!-- if menu active "active-menu" else "text-gray-600" -->
                        <div x-data="{ toggle: localStorage.getItem('theme') === 'dark' }" :class="toggle ? 'dark' : ''"
                            class=" app mx-auto py-3 lg:py-0">
                            <button title="Change Mode" id="theme-toggle" @click="toggle = !toggle"
                                class="flex items-center w-full p-2 group text-sm text-gray-600 transition-colors duration-300 transform rounded-bl-full md:p-5 dark:text-gray-50 dark:hover:text-whitecapitalize ">
                                <svg class="group-hover:fill-yellow-500" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <!-- Sun -->
                                    <circle pathLength="1" class="sun-icon" cx="12" cy="12" r="5"></circle>
                                    <line pathLength="1" class="sun-icon" x1="12" y1="1" x2="12" y2="3">
                                    </line>
                                    <line pathLength="1" class="sun-icon" x1="12" y1="21" x2="12" y2="23">
                                    </line>
                                    <line pathLength="1" class="sun-icon" x1="4.22" y1="4.22" x2="5.64" y2="5.64">
                                    </line>
                                    <line pathLength="1" class="sun-icon" x1="18.36" y1="18.36" x2="19.78" y2="19.78">
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
                                <span class="lg:hidden ml-2 text-gray-600 lg:text-white group-hover:text-yellow-500
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
        class="fill-yellow-500 dark:hidden duration-300 transform   absolute top-1 z-30 lg:-mt-5   block">
        <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
        </path>
        <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
    </svg>
    <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        class="fill-[#01052D] duration-300 transform   absolute top-0 z-30  lg:-mt-5   block">
            <path   d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
            </path>
            <path   d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z"
                stroke-width="0"></path>
        </svg>

    <section
        class="  items-center w-full bg-pattren duration-300 transform
        ">


        <div class="grid grid-cols-1 lg:grid-cols-2 container mx-auto z-10 overflow-hidden h-screen justify-center relative">

            <div class="col-span-1 lg:mt-20 2xl:mt-0 lg:block hidden ">
                <lottie-player  src="{{ asset('assets/user/src/animation_ln5upqe0.json') }}"
                    background="transparent" speed="1" class="w-3/6 mx-auto lottie-login"
                    loop autoplay></lottie-player>
            </div>
            <div class="col-span-1 px-8 lg:px-12 text-white  mx-4 md:mx-auto  md:mt-16 bg-white shadow-lg dark:bg-black dark:bg-opacity-30
                    border-t-4 border-[#0b3960] dark:border-yellow-500 py-10 rounded-xl place-self-center">
                <div class="   2xl:mt-0  max-w-lg 2xl:max-w-xl">
                    <h2
                        class="font-extrabold font-[arial] text-3xl lg:text-4xl 2xl:text-5xl  text-[#0b3960] dark:text-yellow-500 text-sh2 ">
                        LOGIN!</h2>
                    <p class="text-gray-700 dark:text-gray-400 text-xs leading-6 md:leading-7 md:text-sm  ">Fakultas yang membangun kajian
                        ilmu-ilmu sosial dan politik pada masyarakat pesisir berkelas regional ASEAN pada tahun 2025!
                    </p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="my-2  ">
                            <label
                                class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300
                                after:ml-2 text-sm pb-2">Email</label>
                                <input type="text" id="id_user" name="id_user"
                                class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-gray-700 dark:text-gray-300 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder="Email" />
                                <x-input-error :messages="$errors->get('id_user')" class="mt-2" />
                        </div>
                        <div class="my-2  " x-data="{ show: false }">
                            <label
                                class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300
                                after:ml-2 text-sm pb-2">Password</label>
                            <div class="relative flex items-center ">
                                <input :type=" show ? 'text': 'password' " type="password" name="password"
                                    class=" w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent
                                    px-3 py-2.5 text-sm font-normal text-gray-700 dark:text-gray-300 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] "
                                    placeholder="Password" />
                                <span
                                    class="absolute right-2 pt-1 bg-transparent flex items-center justify-center cursor-pointer "
                                    @click="show = !show">
                                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                        </path>
                                    </svg>

                                    <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="mt-6 w-full ">
                            <button class=" h-full  rounded-lg border-2   mx-auto mt-1 w-full text-white border-blue-600 dark:border-yellow-600 bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest py-2
                              text-sm   dark:text-gray-300 focus:shadow-[-4px_4px_10px_0px_#01052D]
                              dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  ">LOGIN</button>
                        </div>
                    </form>

                    <div class="mt-3 w-full ">
                        <a href="{{ route('register') }}"
                            class=" h-full inline-block text-center rounded-lg border-2 mt-1 w-full border-[#091150]
                            dark:border-yellow-600 hover:border-blue-500 dark:hover:border-yellow-400 bg-transparent
                            font-medium tracking-widest text-[#091150] hover:text-blue-500 dark:text-yellow-600
                            dark:hover:text-yellow-400 px-3 py-2
                              text-sm    transition-all duration-500

                            focus:shadow-[-4px_4px_10px_0px_#eab308]  ">REGISTER</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            class="fill-yellow-500 dark:hidden duration-300 transform   absolute bottom-1 z-0 2xl:mb-0  backdrop:"
            style="transform: rotateY(180deg); transform: rotate(180deg);">
            <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
            </path>
            <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
        </svg>
        <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            class="fill-[#01052D] duration-300 transform   absolute bottom-0 z-0 2xl:mb-0  "
            style="transform: rotateY(180deg); transform: rotate(180deg);">
            <path  d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
            </path>
            <path  d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z"
                stroke-width="0"></path>
        </svg>
        <footer class="absolute bottom-0         w-full ">
            <div class="px-12 mx-auto py-4   flex flex-wrap flex-col sm:flex-row bg-[#01052D]  ">
                <p class="text-gray-300 mx-auto   text-sm text-center sm:text-left">Copyright&copy; 2023 |
                    <a href="#" class="text-yellow-500 font-bold">E-BERES FISIP</a>. All rights reserved.
                </p>
            </div>
        </footer>
    </section>


</body>

<!-- script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/user/src/scripts.js') }}"></script>
