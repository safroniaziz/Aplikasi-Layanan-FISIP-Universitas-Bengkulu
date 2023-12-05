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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <style>
        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 0.5rem;
            max-height: 80vh;
            overflow-y: auto;
            padding: 2rem;
            width: 50%;
            max-width: 250px;
        }
    </style>
</head>


<body id="home" x-data="{isShow : true}" class=" font-[Poppins] 2xl:text-xl font-nunito overflow-hidden h-screen text-slate-900
    ">
    @if ($message = Session::get('success'))
        <div x-data x-init="isShow = true"></div>
        <div x-show="isShow" style="z-index: 99;" class="fixed top-1 right-0 m-3 w-2/3 md:w-1/3" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
            <div class="bg-white border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
                <svg class="flex-shrink-0 h-6 w-6 text-green-400" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1" d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
                </svg>
                <div class="flex-1 space-y-1">
                    <p class="text-base leading-6 font-medium text-gray-700">Berhasil</p>
                    <p class="text-sm leading-5 text-gray-600">{{ $message }}</p>
                </div>
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer" x-on:click="isShow = false" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1.2" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </div>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div x-data x-init="isShow = true"></div>
        <div x-show="isShow" style="z-index: 99;" class="fixed top-1 right-0 m-3 w-2/3 md:w-1/3" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
            <div class="bg-red-100 border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
                <svg class="flex-shrink-0 h-6 w-6 text-red-400 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none fill-current text-red-500 h-4 w-4">
                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z" />
                </svg>
                <div class="flex-1 space-y-1">
                    <p class="text-base leading-6 font-medium text-red-600">Mohon Maaf!</p>
                    <p class="text-sm leading-5 text-gray-600">{{ $message }}</p>
                </div>
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer" x-on:click="isShow = false" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1.2" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </div>
        </div>
    @endif

    <div class="bg-gradient-to-r
    dark:from-[#010347] dark:to-[#001855] from-gray-100 to-gray-100">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <!-- Preloader Start -->
        <div x-data="{ show: false }" x-transition:enter="transition duration-700" style="z-index: 99;" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded p-4" x-show="show">
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
                            <img style="width:100px !important;" src="{{ asset('assets/img/logo.png') }}" class="md:w-14 md:h-14 w-12 h-12">

                            <div class="ml-3 text-gray-700 dark:text-slate-100  font-sans  ">
                                <strong class=" text-2xl md:text-3xl font-extrabold   text-sh uppercase">E-BERES FISIP</strong>
                                <p class="text-[13px] md:text-[16px]    text-yellow-500     uppercase -mt-2
                                relative">
                                    UNIVERSITAS BENGKULU</p>
                            </div>
                        </a>
                        <!-- Mobile menu button -->
                        <div class="flex lg:hidden">
                            <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-100 " aria-label="toggle menu">
                                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                </svg>
                                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                            <div x-data="{ toggle: localStorage.getItem('theme') === 'dark' }" :class="toggle ? 'dark' : ''" class=" app mx-auto py-3 lg:py-0">
                                <button title="Change Mode" id="theme-toggle" @click="toggle = !toggle" class="flex items-center w-full p-2 group text-sm text-gray-600 transition-colors duration-300 transform rounded-bl-full md:p-5 dark:text-gray-50 dark:hover:text-whitecapitalize ">
                                    <svg class="group-hover:fill-yellow-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                                        <path pathLength="1" class="moon-icon" d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
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
        <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-yellow-500 dark:hidden duration-300 transform   absolute top-1 z-30 lg:-mt-5   block">
            <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
            </path>
            <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
        </svg>
        <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-[#01052D] duration-300 transform   absolute top-0 z-30  lg:-mt-5   block">
            <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
            </path>
            <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
        </svg>

        <section class="  items-center w-full  duration-300 transform
        ">


            <div class="flex container mx-auto z-10 overflow-hidden h-screen justify-center relative">

                <div class="col-span-1 lg:mt- 2xl:mt-0 lg:block hidden ">
                    <lottie-player src="{{ asset('assets/user/src/hMbBtnOpBo.json') }}" background="transparent" speed="1" class="w-full mx-auto lottie-login px-12" loop autoplay></lottie-player>
                </div>
                <div class="col-span-1 lg:col-span-2    z-50   place-self-center  w-full     relative">
                    <div class=" mx-4 px-8 lg:px-12 text-gray-700 dark:text-white  w-full md:mx-auto bg-white bg-opacity-50 dark:bg-black dark:bg-opacity-30
                    border-t-4 border-[#0b3960] dark:border-yellow-500 pt-5 pb-8 rounded-xl  ">

                        <h2 class="font-extrabold font-[arial] text-3xl  mb-2 pb-2 border-b-2 pr-10 border-[#0b3960] dark:border-yellow-500
                    inline-block text-[#0b3960] dark:text-yellow-500 text-sh2 ">
                            BUKU TAMU!</h2>
                        <form action="{{ route('bukuTamu.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf @method('POST')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5   my-2">
                                <div class=" col-span-1  ">
                                    <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-1">Nama Lengkap</label>
                                    <input type="text" name="nama_tamu" class="   w-full rounded-lg border-2  border-[#01052D] dark:border-yellow-500
                                        bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                        placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                        dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                        focus:shadow-[-4px_4px_10px_0px_#01052D]
                                        dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Nama Lengkap Anda" />
                                        @if ($errors->has('nama_tamu'))
                                            <p class="text-red-500 text-sm">{{ $errors->first('nama_tamu') }}</p>
                                        @endif
                                </div>
                               
                                <div class=" col-span-1  ">
                                    <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-1">Bertamu Dengan</label>
                                    <select name="tujuan" class="   w-full rounded-lg border-2  border-[#01052D] dark:border-yellow-500
                                        bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                        placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                        dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                        focus:shadow-[-4px_4px_10px_0px_#01052D]
                                        dark:focus:shadow-[-4px_4px_10px_0px_#eab308] ">
                                        <option disabled selected>-- silahkan pilih --</option>
                                        @foreach ($pegawais as $pegawai)
                                            <option value="{{ $pegawai->nip }}">{{ $pegawai->nama }}</option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('tujuan'))
                                            <p class="text-red-500 text-sm">{{ $errors->first('tujuan') }}</p>
                                        @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1   gap-x-6  ">
                                <div class=" col-span-1  ">
                                    <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-1">Tuliskan Keperluan</label>
                                    <textarea name="keperluan" class="  h-20 w-full rounded-lg border-2  border-[#01052D] dark:border-yellow-500
                                        bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                        placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                        dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                        focus:shadow-[-4px_4px_10px_0px_#01052D]
                                        dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Keperluan anda disini"></textarea>
                                        @if ($errors->has('keperluan'))
                                            <p class="text-red-500 text-sm">{{ $errors->first('keperluan') }}</p>
                                        @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5   my-2 ">
                                <div class=" col-span-1  ">
                                    <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-1">Nomor HP/WA</label>
                                    <input type="text" name="no_hp" class="   w-full rounded-lg border-2  border-[#01052D] dark:border-yellow-500
                                        bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                        placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                        dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                        focus:shadow-[-4px_4px_10px_0px_#01052D]
                                        dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  " placeholder="Tuliskan nomor hp/wa anda" />
                                        @if ($errors->has('no_hp'))
                                            <p class="text-red-500 text-sm">{{ $errors->first('no_hp') }}</p>
                                        @endif
                                </div>
                                <div class=" col-span-1  ">
                                    <label class=" after:content-['*'] after:text-red-500 font-semibold  text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-1">Ambil Foto </label>
                                    <br>
                                    <button type="button" id="activateCamera" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                                        <i class="fa fa-camera"></i>&nbsp;Ambil Foto
                                    </button>
                                    <div id="cameraFeed" style="display: none;"></div>
                                    <input type="hidden" name="foto" id="photoInput" />
                                </div>
                            </div>

                            <div class="mt-5 w-full grid">
                                <button type="submit" class=" h-full  rounded-lg border-2 inline-block max-w-md  mx-auto   w-full text-white border-blue-600 dark:border-yellow-600 bg-[#091150] dark:bg-yellow-500 hover:bg-blue-600 duration-300 transform dark:hover:bg-yellow-600 font-medium tracking-widest py-2
                              text-sm text-white-700 focus:shadow-[-4px_4px_10px_0px_#01052D]
                              dark:focus:shadow-[-4px_4px_10px_0px_#eab308]  ">SIMPAN</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-yellow-500 dark:hidden duration-300 transform   absolute bottom-1 z-0 2xl:mb-0  backdrop:" style="transform: rotateY(180deg); transform: rotate(180deg);">
                <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
                </path>
                <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
            </svg>
            <svg viewBox="0 0 1522 196" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="fill-[#01052D] duration-300 transform   absolute bottom-0 z-0 2xl:mb-0  " style="transform: rotateY(180deg); transform: rotate(180deg);">
                <path d="M 0 0 C 102 0 0 -11 102 -11 L 102 -11 L 102 0 L 0 0 Z" stroke-width="0">
                </path>
                <path d="M 101 -11 C 1522 -11 101 122 1522 122 L 1522 122 L 1522 0 L 101 0 Z" stroke-width="0"></path>
            </svg>
            <footer class="absolute bottom-0         w-full ">
                <div class="px-12 mx-auto py-4   flex flex-wrap flex-col sm:flex-row bg-[#01052D]  ">
                    <p class="text-gray-300 mx-auto   text-sm text-center sm:text-left">Copyright&copy; 2023 |
                        <a href="#" class="text-yellow-500 font-bold">E-BERES FISIP</a>. All rights reserved.
                    </p>
                </div>
            </footer>
        </section>


    </div>
    <!-- Modal -->
    <div id="modal1" class="modal-background hidden">
        <div class="modal-content">
            <h2 class="text-sm font-bold mb-4" id="title">Konfirmasi Foto Anda</h2>
            <div class="overflow-y-auto max-h-64">
                <img id="capturedPhoto" style="display: none; width:200px; height:auto;">
            </div>
            <div class="flex justify-start mt-6">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="resetPhoto()">Reset</button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="font-size: 12px;" onclick="closeModal()">Simpan</button>
            </div>
        </div>
    </div>
</body>

<!-- script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/user/src/scripts.js') }}"></script>
<script src="https://kit.fontawesome.com/055120b175.js" crossorigin="anonymous"></script>

<script>
    function validateForm() {
        var photoInput = document.getElementById('photoInput');
        var photoValue = photoInput.value; // Mendapatkan nilai dari input "foto"

        if (photoValue === "") {
            alert('Anda harus mengunggah gambar sebelum mengirimkan formulir.');
            return false; // Menghentikan pengiriman formulir
        }

        return true; // Lanjutkan pengiriman formulir jika ada gambar yang sudah dipilih
    }

    document.getElementById('activateCamera').addEventListener('click', function() {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(function(stream) {
                var video = document.createElement('video');
                document.getElementById('cameraFeed').appendChild(video);
                video.srcObject = stream;
                video.play();

                // Setelah pengguna mengambil foto, Anda dapat menggunakan JavaScript
                // untuk mengambil gambar dari elemen video.
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');

                video.addEventListener('canplay', function() {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                    // Ubah gambar di dalam canvas menjadi data URL
                    var photoDataUrl = canvas.toDataURL('image/jpeg');

                    // Tampilkan gambar dalam elemen gambar
                    $("#modal1").removeClass("hidden");
                    var img = document.getElementById('capturedPhoto');
                    img.src = photoDataUrl;
                    img.style.display = 'block';

                    const photoInput = document.getElementById('photoInput');
                    photoInput.value = photoDataUrl; // Ini akan menambahkan data base64 ke input "foto"
                });
            }).catch(function(error) {
                console.error('Gagal mengakses kamera: ' + error);
            });
        } else {
            console.error('Browser tidak mendukung getUserMedia');
        }
    });

    function closeModal() {
        document.getElementById('modal1').classList.add('hidden');
    }

    function resetPhoto() {
        $("#modal1").addClass("hidden");
        var img = document.getElementById('capturedPhoto');
        img.style.display = 'none';
        img.src = ''; // Clear the image source

        // Reset juga input file
        var fileInput = document.getElementById('photoInput');
        fileInput.value = ''; // Hapus file yang sudah dipilih
    }
</script>
