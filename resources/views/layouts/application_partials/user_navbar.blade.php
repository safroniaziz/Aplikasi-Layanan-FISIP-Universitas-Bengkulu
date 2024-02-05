<!-- if menu active "active-menu" else "text-gray-600" -->
<a href="{{ route('user') }}" class="px-2 py-2 mx-2 lg:mx-0 2xl:mx-2 mt-2  @yield('home', 'text-gray-600')   lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh transition-colors  duration-300 transform rounded-md
                    lg:mt-0 hover:text-[#eed488] ">Home</a>
<a href="{{ route('bukuTamu') }}" class="px-2 py-2  @yield('poadcast','text-gray-600') lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh mx-2 lg:mx-0 2xl:mx-2 mt-2 transition-colors duration-300 transform rounded-md lg:mt-0
                    hover:text-[#eed488] ">Buku Tamu</a>
<a href="{{ route('tampilJadwalLivewire') }}" class="px-2 py-2  @yield('poadcast','text-gray-600') lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh mx-2 lg:mx-0 2xl:mx-2 mt-2 transition-colors duration-300 transform rounded-md lg:mt-0
                    hover:text-[#eed488] ">Jadwal Kuliah</a>

<a href="{{ route('permohonan_surat_livewire') }}" class="px-2 py-2 mx-2 lg:mx-0 2xl:mx-2 mt-2 @yield('permohonan_surat', 'text-gray-600') lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] ">Permohonan surat</a>
<a href="{{ route('sewa_podcast') }}" class="px-2 py-2  @yield('poadcast','text-gray-600') lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh mx-2 lg:mx-0 2xl:mx-2 mt-2 transition-colors duration-300 transform rounded-md lg:mt-0
                    hover:text-[#eed488] ">Podcast</a>
<a href="{{route('e-konseling')}}" class="px-2 py-2 mx-2 lg:mx-0 2xl:mx-2 mt-2 @yield('konseling', 'text-gray-600') lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] ">Layanan Konseling</a>
                <a href="{{ route('layanan_pengaduan') }}" class="px-2 py-2 mx-2 lg:mx-0 2xl:mx-2 mt-2 @yield('pengaduan', 'text-gray-600') lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh transition-colors
                    duration-300 transform rounded-md lg:mt-0 hover:text-[#eed488] ">Layanan Pengaduan</a>
@if( isset(Auth::user()->name) )
<div class="flex items-center mt-4 mx-4 lg:mt-0">
    <div x-data="{ isOpen: false }" class="relative inline-block ">
        <button @click="isOpen = !isOpen" type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
            <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300" src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F{{ str_replace(' ', '+', Auth::user()->name) }}/128" alt="Bordered avatar">
            <h3 class="mx-1  text-gray-100 text-[16px] ">
                {{ Auth::user()->name }}
            </h3>
        </button>
        <div x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute right-0 z-20 py-2 mt-2 -mr-16 bg-white    rounded-md shadow-xl lg:w-72 lg:mr-0 ">
            <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform hover:bg-gray-100  ">
                <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300" src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F{{ str_replace(' ', '+', Auth::user()->name) }}/128" alt="Bordered avatar">

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
            @if (auth()->check() && auth()->user()->hasRole('operator'))
            <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100  ">
                @else
                <a href="{{ route('userProfile') }}" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform hover:bg-gray-100  ">
                    @endif
                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z" fill="currentColor"></path>
                        <path d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z" fill="currentColor"></path>
                    </svg>

                    <span class="mx-1">
                        @if (auth()->check() && auth()->user()->hasRole('operator'))
                        Dashboard
                        @else
                        Profile
                        @endif
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
<a href="{{ route('login') }}" class="px-5 py-2 mx-2 mt-2 text-gray-700 lg:text-white  text-[14px] lg:text-xs 2xl:text-sm text-sh transition-colors
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
