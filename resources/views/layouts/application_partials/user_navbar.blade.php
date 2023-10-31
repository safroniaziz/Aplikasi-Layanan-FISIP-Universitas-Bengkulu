<!-- if menu active "active-menu" else "text-gray-600" -->
<a href="{{ route('user') }}" class="px-2 py-2 mx-2 mt-2  @yield('home', 'text-gray-600')   lg:text-white  text-[14px] text-sh transition-colors  duration-300 transform rounded-md
                    lg:mt-0 hover:text-[#eed488] ">Home</a>
<a href="podcast.html" class="px-2 py-2 text-gray-600 lg:text-white  text-[14px] text-sh mx-2 mt-2 transition-colors duration-300 transform rounded-md lg:mt-0
                    hover:text-[#eed488] ">Sewa Podcast</a>

<a href="{{route('tampilJadwalLivewire')}}" class="px-2 py-2 mx-2 mt-2 @yield('jadwal', 'text-gray-600') lg:text-white  text-[14px] text-sh transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488]       ">Jadwal
    Matkul</a>
<a href="{{route('e-konseling')}}" class="px-2 py-2 mx-2 mt-2 @yield('konseling', 'text-gray-600') lg:text-white  text-[14px] text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] ">E-Konseling</a>
<a href="surat.html" class="px-2 py-2 mx-2 mt-2 @yield('permohonan_surat', 'text-gray-600') lg:text-white  text-[14px] text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] ">Permohonan surat</a>
<a href="{{ route('bukuTamu') }}" class="px-2 py-2 mx-2 mt-2 @yield('buku_tamu', 'text-gray-600') lg:text-white  text-[14px] text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] ">Buku Tamu</a>
@if( isset(Auth::user()->name) )
<div class="flex items-center mt-4 mx-4 lg:mt-0">
    <div x-data="{ isOpen: false }" class="relative inline-block ">
        <button @click="isOpen = !isOpen" type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
            <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300  " src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', Auth::user()->name) !!}/128" alt="Bordered avatar">
            <h3 class="mx-1  text-gray-100 text-[16px] ">
                {{ Auth::user()->name }}
            </h3>
        </button>
        <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute right-0 z-20 py-2 mt-2 -mr-16 bg-white    rounded-md shadow-xl lg:w-72 lg:mr-0 ">
            <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform hover:bg-gray-100  ">
                <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300  " src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', Auth::user()->name) !!}/128" alt="Bordered avatar">
                <div class="ml-2">
                    <h1 class="text-sm font-semibold   ">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-sm text-gray-500  ">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </a>
            <hr class="border-gray-200 ">
            <a href="data-pengguna.html" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100  ">
                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z" fill="currentColor"></path>
                    <path d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z" fill="currentColor"></path>
                </svg>

                <span class="mx-1">
                    Profile
                </span>
            </a>
            <hr class="border-gray-200 ">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100   ">
                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 21H10C8.89543 21 8 20.1046 8 19V15H10V19H19V5H10V9H8V5C8 3.89543 8.89543 3 10 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM12 16V13H3V11H12V8L17 12L12 16Z" fill="currentColor"></path>
                </svg>
                <span class="mx-1">
                    {{ __('Logout') }}
                </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>


</div>
@else
<a href="{{ route('login') }}" class="px-5 py-2 mx-2 mt-2 text-gray-700 lg:text-white  text-[14px] text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] bg-gray-900 hover:bg-slate-800  ">Login</a>
@endif
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

<!-- end navbar -->
@if($errors->any())
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Mohon Maaf!</span> Permintaan Analisis gagal diproses, silahkan ulangi dan lengkapi formulir di bawah
</div>
@endif
@if ($message = Session::get('success'))
<div x-data x-init="isShow = true"></div>
<div x-show="isShow" style="z-index: 99;" class="fixed top-24 right-0 m-3 w-2/3 md:w-1/3" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
    <div class="bg-white border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
        <svg class="flex-shrink-0 h-6 w-6 text-green-400" stroke="currentColor" viewBox="0 0 20 20">
            <path stroke-width="1" d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
        </svg>
        <div class="flex-1 space-y-1">
            <p class="text-base leading-6 font-medium text-gray-700">Successfully saved!</p>
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
<div x-show="isShow" style="z-index: 99;" class="fixed top-24 right-0 m-3 w-2/3 md:w-1/3" x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
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
