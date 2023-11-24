@extends('layouts.user')
@section('poadcast','active-menu')

@section('content')

<div x-data="app() " x-init="[initDate(), getNoOfDays()]" x-cloak>
    <div x-data="{ event_date3: '' }">
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
                <svg data-name="Layer 1" class="svg7  duration-300 transform fill-[#010347] dark:fill-[#f5ca3c]  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
        <!-- end slider -->

        <!-- Fitur  -->
        <section id="Fitur" class="duration-300 transform bg-gray-100 dark:bg-[#001344]">
            <div class="mx-auto container px-5  pt-24 pb-48   section-heading  text-gray-700 dark:text-gray-200 z-30 relative overflow-hidden">

                <div class="slider-svg-b  tran-svg absolute   z-10">
                    <svg data-name="Layer 1" class="svg7  duration-300 transform fill-gray-100 dark:fill-[#001344]  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                    </svg>
                </div>

                <div class="relative bg-white   mb-10 mt-1 dark:bg-black dark:bg-opacity-30 bg-opacity-60
                        dark:border-yellow-500 rounded-xl">
                    <img src="{{ asset('upload/foto_ruangan/'.$ruanganPoadcasts->foto) }}" alt="" class="w-full h-[400px] rounded-xl shadow-lg shadow-black object-cover bg-fill">


                    <!-- Image example  -->
                    <div class="overflow-hidden   mx-auto py-2 my-5 bg-gray-100 dark:bg-[#001344]">
                        <ul class="marquee py-3 inline-flex space-x-4 max-w-full items-center" x-data="Marquee({speed: 1, spaceX: 4, dynamicWidthElements: true})">
                            <!-- if you are putting elements that require dynamic width calculations (e.g. images), add the flex-shrink-0 class to each li element -->
                            @foreach ($alatPoadcasts as $item)
                            <li class="flex-shrink-0">
                                <img src="{{ asset('upload/foto_alat/'.$item->foto) }}" class="max-h-20 md:max-h-40 lg:max-h-52 w-auto">
                                <p class="absolute bottom-4 bg-cyan-500 bg-opacity-70 text-white     px-5 text-[12px]  ">{{ $item->nama_alat }}</p>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                    <h2 class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#0b3960] dark:text-yellow-500 text-sh2">
                        {{ $ruanganPoadcasts->nama_ruangan }}
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto px-6">
                        <div class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5 bg-cover px-5 bg-[#010347] dark:bg-[#f5ca3c] shadow-md fill-white rounded-md" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                            </svg>
                            <div class="w-2/3 p-4 md:p-4 ">
                                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Harga Sewa</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Rp. {{ number_format($ruanganPoadcasts->harga_sewa, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5 bg-cover px-5 bg-[#010347] dark:bg-[#f5ca3c] shadow-md fill-white rounded-md" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
                                <path d="M8 .95 14.61 4h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.379l.5 2A.5.5 0 0 1 15.5 17H.5a.5.5 0 0 1-.485-.621l.5-2A.5.5 0 0 1 1 14V7H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 4h.89L8 .95zM3.776 4h8.447L8 2.05 3.776 4zM2 7v7h1V7H2zm2 0v7h2.5V7H4zm3.5 0v7h1V7h-1zm2 0v7H12V7H9.5zM13 7v7h1V7h-1zm2-1V5H1v1h14zm-.39 9H1.39l-.25 1h13.72l-.25-1z" />
                            </svg>
                            <div class="w-2/3 p-4 md:p-4 ">
                                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Kapasitas</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400"> {{ $ruanganPoadcasts->kapasitas }}</p>
                            </div>
                        </div>
                        <div class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5 bg-cover px-5 bg-[#010347] dark:bg-[#f5ca3c] shadow-md fill-white rounded-md" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z" />
                                <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z" />
                            </svg>
                            <div class="w-2/3 p-4 md:p-4 ">
                                <h1 class="text-xl font-bold text-gray-800 dark:text-white">Lokasi</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400"> {{ $ruanganPoadcasts->lokasi }}</p>
                            </div>
                        </div>
                    </div>

                    <p class="p-6 leading-8 text-sm text-justify">{{ $ruanganPoadcasts->deskripsi }} </p>
                    <h2 class="mt-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#0b3960] dark:text-yellow-500 text-sh2">
                        Paket Tersedia</h2>

                    <div class="px-6    pb-12    ">
                        <!-- <button class="hidden"></button>
                        <button @click="openEventModal =!openEventModal;id_sewa =1, durasi='20 september 2023 - 30 september 2023'
                                    " class="bg-[#001344]  hover:bg-blue-500 px-4 py-3 w-full md:max-w-[200px]   duration-300 transform text-gray-200 text-sm rounded-lg">
                            20 september 2023 - 30 september 2023
                        </button> -->
                        <div>
                            <div class="container mx-auto px-4 py-2 md:py-6">

                                <!-- <div class="font-bold text-gray-800 text-xl mb-4">
                                    Schedule Tasks
                                </div> -->

                                <div class="bg-white dark:bg-[#001344] shadow-[inset_0px_0px_10px_0px_#ccc] dark:shadow-[inset_0px_0px_20px_1px_#000] rounded-lg   overflow-hidden">

                                    <div class="flex items-center justify-between py-2 px-6">
                                        <div>
                                            <span x-text="MONTH_NAMES[month]" class="text-lg font-bold dark:text-gray-200 text-gray-800"></span>
                                            <span x-text="year" class="ml-1 text-lg dark:text-gray-200 text-gray-600 font-normal"></span>
                                        </div>
                                        <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                            <button type="button" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" :class="{'cursor-not-allowed opacity-25': month == 0 }" :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                                                <svg class="h-6 w-6 dark:text-gray-200 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <div class="border-r inline-flex h-6"></div>
                                            <button type="button" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" :class="{'cursor-not-allowed opacity-25': month == 11 }" :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                                                <svg class="h-6 w-6 dark:text-gray-200 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="-mx-1 -mb-1">
                                        <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                            <template x-for="(day, index) in DAYS" :key="index">
                                                <div style="width: 14.26%" class="px-2 py-2">
                                                    <div x-text="day" class="dark:text-gray-200 text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="flex flex-wrap border-t border-l">
                                            <template x-for="blankday in blankdays">
                                                <div style="width: 14.28%; height: 130px" class="text-center border-r border-b px-4 pt-2"></div>
                                            </template>
                                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                <div style="width: 14.28%; height: 130px" class="  border-r border-b relative " :class="{'bg-yellow-200 dark:bg-yellow-800  ': isToday(date) == true, '': isToday(date) == false }">
                                                    <div class="flex px-4   bg-yellow-100 dark:bg-yellow-500  bg-opacity-20">
                                                        <div x-text=" date" class="inline-flex -ml-4  pl-4 pr-8 py-2 items-center justify-center   text-center leading-none  rounded-br-full transition ease-in-out duration-100" :class="{'bg-yellow-600 text-white': isToday(date) == true, ' dark:text-gray-200 text-gray-700  ': isToday(date) == false }"></div>
                                                        <div @click="showEventModal(date)" class="float-right px-2 mt-1 hover:bg-red-600   hover:scale-95 active:scale-90 duration-300 transform cursor-pointer  absolute right-3 rounded-md bg-red-500 text-white z-[20]">+</div>

                                                    </div>

                                                    <div style="height: 80px;" class="overflow-y-auto mt-1 px-4 ">


                                                        <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() === new Date(year, month, date).toDateString())">
                                                            <div x-init="currentDate2 = new Date().toLocaleDateString()" class="px-2 py-1 rounded-lg mt-1 overflow-hidden border cursor-pointer" :class="{
                                                                'border-blue-800 text-blue-800 bg-blue-200 shadow shadow-gray-700': new Date(currentDate2) < new Date(year, month, date),
                                                                'border-green-800 text-green-800 bg-green-200 shadow shadow-gray-700': new Date(currentDate2) > new Date(year, month, date),
                                                                'border-orange-800 text-orange-800 bg-orange-200 shadow shadow-gray-700': new Date(currentDate2).toDateString() === new Date(year, month, date).toDateString(),

                                                            }">
                                                                <div class="group">
                                                                    <p x-html="event.keperluan" class="text-sm truncate leading-tight  ">  </p>
                                                                    <span class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute    mt-0 z-[10]  w-full p-3 opacity-0   mx-auto" x-html="event.tooltip">Tooltip</span>
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>





                    </div>



                </div>

            </div>


        </section>
        <!-- end Fitur  -->
        <!-- Modal -->
        <div x-show="openEventModal" style="z-index: 70;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="openEventModal = false" x-show="openEventModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                <div x-cloak x-show="openEventModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-4xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-xl 2xl:max-w-5xl">
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-bold text-gray-700 dark:text-gray-300 ">Sewa Ruangan Podcast <span class="font-bold text-[#152042]" x-text="Pendaftaran E-Konseling"></span></h1>

                        <button @click="openEventModal = false" class="text-gray-600 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('sewaruang.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2   gap-x-6 gap-y-2 my-3">
                            <div class=" col-span-1  ">
                                <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Nama Lengkap</label>
                                <input type="text" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] read-only:bg-gray-200 read-only:dark:bg-gray-700 cursor-not-allowed" readonly  value="{{Auth::user()->name}}"  />
                            </div>
                            <div class=" col-span-1  ">
                                <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Nomor WhatsApp </label>
                                <input type="text" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]   " name="no_wa"  value="{{Auth::user()->no_hp}}"   />
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="ruangan_id" value="{{$ruanganPoadcasts->id}}">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 my-1">
                        <div class=" col-span-1 ">
                            <div class="mb-4">
                                <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Tanggal Sewa</label>
                            <input class=" w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] read-only:bg-gray-200 read-only:dark:bg-gray-700 cursor-not-allowed"  type="text" x-model="event_date2" name="tanggal_sewa" readonly>
                        </div>

                        </div>

                        <div class=" col-span-1 ">

                                <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Waktu  Tersedia</label>

                                    <select name="waktu" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308]   ">
                                    <option value=""  class="bg-white dark:bg-gray-900 dark:text-gray-300"> --- pilih waktu sewa ---</option>
                                        @for ($i = 6; $i <= 22; $i++)
                                            @php
                                                $hour = str_pad($i, 2, '0', STR_PAD_LEFT); // Pad with leading zero if needed
                                                $minute = '00';
                                                $timeOption = $hour . ":" . $minute;
                                                $disabled = in_array( '2023-11-01 ' . $timeOption . ':00', $cek_waktu) ? 'disabled' : '';
                                                $disabled = in_array( '2023-11-01 ' . $timeOption . ':00', $cek_waktu) ? 'disabled' : '';
                                                $class = $disabled ? 'bg-red-300 dark:bg-red-900' : '';

                                            @endphp
                                            <option value='{{ $hour . ":" . $minute }}' {{ $disabled }} class="{{ $class }} g-white dark:bg-gray-900 dark:text-gray-300">{{ $hour . ":" . $minute }} WIB</option>
                                        @endfor
                                    </select>
                                @error('waktu')
                                <p class="text-red-500 text-xs font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                    </div>
                        <div class="mb-4">
                            <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300 after:ml-2 text-sm pb-2">Keperluan</label>

                            <textarea class="w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent px-3 py-2.5 text-sm font-normal text-white-700 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] h-20" type="text" x-model="keperluan" name="keperluan"></textarea>
                        </div>
                        <input class="hidden  " type="text" x-model="event_date" readonly>
                        <input class="hidden  " type="text" id="event_date3" x-model="event_date3" readonly>



                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-[#152042] rounded-md dark:bg-yellow-600 dark:hover:bg-yellow-500 dark:focus:bg-[#1f3882] hover:bg-[#060f2a] focus:outline-none focus:bg-[#152042] focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                Kirim Permohonan
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <!-- /Modal -->
    </div>

</div>

<script>
    const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const DAYS = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    function app() {
        return {
            month: '',
            year: '',
            no_of_days: [],
            blankdays: [],
            days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

            events: [
                @foreach($pemesananRuangans as $item) {
                    event_date:new Date({{ date('Y', strtotime($item->tanggal_dan_waktu_mulai)) }}, {{ date('m', strtotime($item->tanggal_dan_waktu_mulai)) - 1 }}, {{ date('d', strtotime($item->tanggal_dan_waktu_mulai)) }}),
                    keperluan: `{{$item->user->name}}`+'<br>'+`{{ $item->mahasiswa_npm }}`,
                    tooltip: '<span class="text-yellow-500">Nama Penyewa : </span>'+`{{$item->user->name}}`+'<br><span class="text-yellow-500">Nomor Wa : </span>'+`{{$item->no_wa}}`+'<br>'+'<span class="text-yellow-500">Tanggal dan Waktu </span>: '+`{{$item->tanggal_dan_waktu_mulai}}`+'<br>'+'<span class="text-yellow-500">Keperluan : </span>'+`{{$item->keperluan}}`,
                    event_theme: 'blue'
                },
                @endforeach
            ],
            keperluan: '',
            tooltip: '',
            event_date: '',
            event_date2: '',
            event_date3: '',
            event_theme: 'blue',

            themes: [{
                    value: "blue",
                    label: "Blue Theme"
                },
                {
                    value: "red",
                    label: "Red Theme"
                },
                {
                    value: "yellow",
                    label: "Yellow Theme"
                },
                {
                    value: "green",
                    label: "Green Theme"
                },
                {
                    value: "purple",
                    label: "Purple Theme"
                }
            ],

            openEventModal: false,

            initDate() {
                let today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
            },

            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);

                return today.toDateString() === d.toDateString() ? true : false;
            },

            showEventModal(date) {
                // open the modal
                this.openEventModal = true;

                this.event_date = new Date(this.year, this.month, date).toDateString();

                this.event_date2 = new Date(this.year, this.month, this.date)
                    .toLocaleDateString('en-GB', {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit'
                    })
                    .replace(/\//g, '/');
                this.event_date3 = new Date(this.year, this.month - 1, this.date).toISOString()
                    .slice(0, 10);
            },

            addEvent() {
                if (this.keperluan == '') {
                    return;
                }

                this.events.push({
                    event_date: this.event_date,
                    keperluan: this.keperluan,
                    tooltip: this.tooltip,
                    event_theme: this.event_theme
                });

                console.log(this.events);

                // clear the form data
                this.tooltip = '';
                this.keperluan = '';
                this.event_date = '';
                this.event_date2 = '';
                this.event_date3 = '';
                this.event_theme = 'blue';

                //close the modal
                this.openEventModal = false;
            },

            getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                // find where to start calendar day of week
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }

                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            }
        }
    }
</script>
@endsection
