<div>
    <span class=" text-gray-200 text-right absolute right-4 text-[10px] lg:text-lg 2xl:text-2xl font-bold top-2"> {{ $tanggal }}<br>{{ $jam }}</span>
    <section class="    h-[84.5vh] bg-white duration-300 transform ">
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
        <div class="  mx-auto relative z-50  aspect-auto p-4">
            <div class="grid grid-cols-1 lg:grid-cols-2  gap-6  mb-6  ">
                <div wire:poll.2000ms="jadwalBerlangsung" class="col-span-1   overflow-hidden   ml-3 ">
                    <div class="bg-white   bg-opacity-70   w-full   overflow-hidden    ">
                        <div class="overflow-hidden   mx-auto      ">

                            <!-- this.active === 2, 2 diubah dengan jumlah slide yang ditampilkan -->
                            @if($cekJadwal!=0)
                            <div class="relative w-full h-[39vh]   " x-data="{ active: 1, loop() { setInterval(() => {
                                    this.active = this.active === {{ $jumlahLoop }} ? 1 : this.active+1 }, 3000) }, }" x-init="loop">
                                <div class="flex overflow-x-hidden w-full">
                                    @php
                                    $iteration = 1;
                                    $i = 1;
                                    @endphp

                                    @foreach ($jadwalPerProdiBerlangsung as $prodiData)
                                    @php
                                    $prodiId = $prodiData['prodi_kode'];
                                    $prodiNama = $prodiData['nama_prodi'];
                                    $jadwalsProdi = $prodiData['jadwal'];
                                    @endphp

                                    @foreach ($jadwalsProdi as $index => $jadwal)
                                    @if (($index + 1) % 5 == 0)
                                    <!-- Tampilkan elemen hanya ketika $i adalah kelipatan 5 -->
                                    <div class="  absolute w-full" x-show="active == {{ $i }}" x-transition:enter="transition duration-1000" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0" x-transition:leave="transition duration-1000" x-transition:leave-start="transform" x-transition:leave-end="transform -translate-x-full">
                                        <h1 class="font-bold border-l-4 lg:text-lg 2xl:text-2xl py-3001344] pl-2 mb-2">
                                            Jadwal Yang Sedang Berlangsung <span class="text-red-500">({{ $prodiNama }})</span>

                                        </h1>
                                        <table class="w-full   table-jadwal rounded-lg overflow-hidden  ">
                                            <thead class="z-10    ">
                                                <tr class="bg-[#010347] border-b border-gray-200 ">
                                                    <!-- <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                            No</th> -->
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Jam</th>
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Ruang</th>
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Mata Kuliah</th>
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Dosen</th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                @foreach ($jadwalsProdi as $index2 => $jadwal)

                                                @if($index2> $index-5 && $index2 <=$index) <tr class=" {{$jadwal['batal']==1?'bg-red-100': ''}}  ">
                                                    <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                        @if($jadwal['batal']==1)
                                                        <br><span class="bg-red-500 text-white font-normal text-lg py-2 px-4 mt-1 rounded-full">Dibatalkan</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_ruangan_kelas'] }}
                                                    </td>
                                                    <td class="px-4     lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_mata_kuliah'] }}
                                                    </td>
                                                    <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['pengampuh'] }}
                                                    </td>
                                                    </tr>

                                                    @endif

                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @php
                                    $i++;
                                    @endphp
                                    @elseif (($index + 1) == count($jadwalsProdi))
                                    <!-- Tampilkan elemen hanya ketika $i adalah kelipatan 5 -->
                                    <div class="  absolute w-full" x-show="active == {{ $i }}" x-transition:enter="transition duration-1000" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0" x-transition:leave="transition duration-1000" x-transition:leave-start="transform" x-transition:leave-end="transform -translate-x-full">
                                        <h1 class="font-bold border-l-4 lg:text-lg 2xl:text-2xl py-3001344] pl-2 mb-2">
                                            Jadwal Yang Sedang Berlangsung <span class="text-red-500">({{ $prodiNama }})</span>

                                        </h1>
                                        <table class="w-full   table-jadwal rounded-lg overflow-hidden  ">
                                            <thead class="z-10    ">
                                                <tr class="bg-[#010347] border-b border-gray-200 ">
                                                    <!-- <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                            No</th> -->
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Jam</th>
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Ruang</th>
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Mata Kuliah</th>
                                                    <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                        Dosen</th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                @foreach ($jadwalsProdi as $index2 => $jadwal)

                                                @if($index2> $index-( ($index + 1) % 5) && $index2 <=$index) <tr class=" {{$jadwal['batal']==1?'bg-red-100': ''}}  ">
                                                    <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                        @if($jadwal['batal']==1)
                                                        <br><span class="bg-red-500 text-white font-normal text-lg py-2 px-4 mt-1 rounded-full">Dibatalkan</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_ruangan_kelas'] }}
                                                    </td>
                                                    <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_mata_kuliah'] }}
                                                    </td>
                                                    <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['pengampuh'] }}
                                                    </td>
                                                    </tr>


                                                    @endif

                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @php
                                    $i++;
                                    @endphp
                                    @endif
                                    @endforeach

                                    @php
                                    $iteration++;
                                    @endphp
                                    @endforeach





                                    <!-- end table slider -->





                                </div>
                            </div>
                            @else
                            <div class="relative w-full  h-[39vh] grid bg-orange-100 rounded-lg opacity-60">
                                <div class="text-gray-900  grid  text-center  place-content-center   w-full duration-300 transform ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 mx-auto" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                    </svg>
                                    <h2 class="text-3xl font-bold mt-4">Tidak Ada Jadwal yang <strong class="text-red-700 font-extrabold">SEDANG BERLANGSUNG</strong>
                                        <!-- pada hari <strong class="text-red-700 font-extrabold">{{ $tanggal }}</strong> -->
                                    </h2>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div wire:poll.10000ms="link" class="col-span-1 w-full  rounded-md overflow-hidden ">
                    <div class="bg-[#010347] p-3 w-full h-full      ">
                        <iframe class="w-full h-full " src="https://www.youtube.com/embed/{{ $link }}?autoplay=1&controls=1&loop=1&mute=1" frameborder="0" allow="  autoplay;  " allowfullscreen></iframe>
                    </div>

                </div>

            </div>
            <div class="w-full   overflow-hidden  ">
                <div wire:poll.2000ms="jadwalBelumMulai" class="bg-white bg-opacity-70 h-[40vh]    w-full pl-3  ">
                    <div class="overflow-hidden   mx-auto ">
                        <!-- this.active === 4, 4 diubah dengan jumlah slide yang ditampilkan -->
                        @if($cekJadwalBelumMulai!=0)
                        <div class="relative w-full h-[40vh]   " x-data="{ active: 1, loop() { setInterval(() => {
                                    this.active = this.active === {{ $jumlahLoopBelumMulai }} ? 1 : this.active+1 }, 3000) }, }" x-init="loop">
                            <div class="flex overflow-x-hidden w-full">
                                @php
                                $iteration = 1;
                                $i = 1;
                                @endphp

                                @foreach ($jadwalPerProdiBelumMulai as $prodiData)
                                @php
                                $prodiId = $prodiData['prodi_kode'];
                                $prodiNama = $prodiData['nama_prodi'];
                                $jadwalsProdi = $prodiData['jadwal'];
                                @endphp

                                @foreach ($jadwalsProdi as $index => $jadwal)
                                @if (($index + 1) % 5 == 0)
                                <!-- Tampilkan elemen hanya ketika $i adalah kelipatan 5 -->
                                <div class="  absolute w-full" x-show="active == {{ $i }}" x-transition:enter="transition duration-1000" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0" x-transition:leave="transition duration-1000" x-transition:leave-start="transform" x-transition:leave-end="transform -translate-x-full">
                                    <h1 class="font-bold border-l-4 lg:text-lg 2xl:text-2xl py-3001344] pl-2 mb-2">
                                        Jadwal Belum Dimulai <span class="text-red-500">({{ $prodiNama }})</span>

                                    </h1>
                                    <table class="w-full   table-jadwal rounded-lg overflow-hidden  ">
                                        <thead class="z-10    ">
                                            <tr class="bg-[#010347] border-b border-gray-200 ">
                                                <!-- <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                            No</th> -->
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Jam</th>
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Ruang</th>
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Mata Kuliah</th>
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Dosen</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($jadwalsProdi as $index2 => $jadwal)

                                            @if($index2> $index-5 && $index2 <=$index) <tr class=" {{$jadwal['batal']==1?'bg-red-100': ''}}  ">
                                                <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                    @if($jadwal['batal']==1)
                                                    <span class="bg-red-500 text-white font-normal text-lg py-2 px-4 ml-3 rounded-full">Dibatalkan</span>
                                                    @endif
                                                </td>
                                                <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['nama_ruangan_kelas'] }}
                                                </td>
                                                <td class="px-4     lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['nama_mata_kuliah'] }}
                                                </td>
                                                <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['pengampuh'] }}
                                                </td>
                                                </tr>

                                                @endif

                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @elseif (($index + 1) == count($jadwalsProdi))
                                <!-- Tampilkan elemen hanya ketika $i adalah kelipatan 5 -->
                                <div class="  absolute w-full" x-show="active == {{ $i }}" x-transition:enter="transition duration-1000" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0" x-transition:leave="transition duration-1000" x-transition:leave-start="transform" x-transition:leave-end="transform -translate-x-full">
                                    <h1 class="font-bold border-l-4 lg:text-lg 2xl:text-2xl py-3001344] pl-2 mb-2">
                                        Jadwal Belum Dimulai <span class="text-red-500">({{ $prodiNama }})</span>

                                    </h1>
                                    <table class="w-full   table-jadwal rounded-lg overflow-hidden  ">
                                        <thead class="z-10    ">
                                            <tr class="bg-[#010347] border-b border-gray-200 ">
                                                <!-- <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                            No</th> -->
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Jam</th>
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Ruang</th>
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Mata Kuliah</th>
                                                <th scope="col" class="px-4 py-2 text-left lg:text-lg 2xl:text-2xl font-bold text-white  ">
                                                    Dosen</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach ($jadwalsProdi as $index2 => $jadwal)

                                            @if($index2> $index-( ($index + 1) % 5) && $index2 <=$index) <tr class=" {{$jadwal['batal']==1?'bg-red-100': ''}}  ">
                                                <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                <td class=" px-4 whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                    @if($jadwal['batal']==1)
                                                    <span class="bg-red-500 text-white font-normal text-lg py-2 px-4 ml-3 rounded-full">Dibatalkan</span>
                                                    @endif
                                                </td>
                                                <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['nama_ruangan_kelas'] }}
                                                </td>
                                                <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['nama_mata_kuliah'] }}
                                                </td>
                                                <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                    {{ $jadwal['pengampuh'] }}
                                                </td>
                                                </tr>


                                                @endif

                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php
                                $i++;
                                @endphp
                                @endif
                                @endforeach

                                @php
                                $iteration++;
                                @endphp
                                @endforeach





                                <!-- end table slider -->





                            </div>
                        </div>
                        @else
                        <div class="relative w-full  h-[40vh] grid bg-orange-100 rounded-lg opacity-60">
                            <div class="text-gray-900  grid  text-center  place-content-center   w-full duration-300 transform ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 mx-auto" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                </svg>
                                <h2 class="text-3xl font-bold mt-4">Tidak Ada Jadwal yang <strong class="text-red-700 font-extrabold">BELUM DIMULAI</strong>
                                    <!-- pada hari <strong class="text-red-700 font-extrabold">{{ $tanggal }}</strong> -->
                                </h2>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>




    </section>

    <footer class="  ">


        <div class="      flex   bg-[#010347] text-gray-300 whitespace-nowrap text-2xl font-semibold ">
            <!-- <p class=" px-5 bg-[#050616] py-2 lg:py-3 2xl:py-2  h-screen text-left">Copyright&copy; 2023 |
                <a href="#" class="text-yellow-500 font-bold ">SI-FISIP</a>. All rights reserved.
            </p> -->
            <marquee class="py-2" loop="infinite" scrollamount="5">{{ $footer }}
            </marquee>
        </div>

    </footer>



</div>
