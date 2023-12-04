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
</head>

<body id="home" class=" font-[arial] 2xl:text-xl font-nunito    text-slate-900 ">
    <div class=" lg:h-screen  m-0  overflow-hidden  bg-[#010347] ">
        <!-- Preloader Start -->

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
                <span class=" text-white text-right absolute right-4 text-2xl font-bold"> {{ $tanggal }}</span>
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

        <section class="    h-[83vh] bg-white duration-300 transform ">
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
                    <div class="col-span-1   overflow-hidden   ml-3 ">
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

                                                    @if($index2> $index-5 && $index2 <=$index) <tr class="   ">
                                                        <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                        <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                            {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                        </td>
                                                        <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                            {{ $jadwal['nama_ruangan_kelas'] }}
                                                        </td>
                                                        <td class="px-4     lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                            {{ $jadwal['nama_mata_kuliah'] }}
                                                        </td>
                                                        <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
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

                                                    @if($index2> $index-( ($index + 1) % 5) && $index2 <=$index) <tr class="   ">
                                                        <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                        <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                            {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                        </td>
                                                        <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                            {{ $jadwal['nama_ruangan_kelas'] }}
                                                        </td>
                                                        <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                            {{ $jadwal['nama_mata_kuliah'] }}
                                                        </td>
                                                        <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
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
                                        <h2 class="text-3xl font-bold mt-4">Tidak Ada Jadwal yang <strong class="text-red-700 font-extrabold">SEDANG BERLANGSUNG</strong> pada hari <strong class="text-red-700 font-extrabold">{{ $tanggal }}</strong></h2>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-span-1 w-full  rounded-md overflow-hidden ">
                        <div class="bg-[#010347] p-3 w-full h-full      ">
                            <iframe class="w-full h-full " src="https://www.youtube.com/embed/1f4DExQoSfQ" title="WISUDA UNIVERSITAS BENGKULU PERIODE 103 - DAY 2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>
                <div class="w-full   overflow-hidden  ">
                    <div class="bg-white bg-opacity-70 h-[40vh]    w-full pl-3  ">
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

                                                @if($index2> $index-5 && $index2 <=$index) <tr class="   ">
                                                    <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                    </td>
                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_ruangan_kelas'] }}
                                                    </td>
                                                    <td class="px-4     lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_mata_kuliah'] }}
                                                    </td>
                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
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

                                                @if($index2> $index-( ($index + 1) % 5) && $index2 <=$index) <tr class="   ">
                                                    <!-- <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold
                                                        text-gray-700"> {{ $index2+1 }}
                                                        </td> -->

                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }}
                                                    </td>
                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_ruangan_kelas'] }}
                                                    </td>
                                                    <td class="px-4    lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
                                                        {{ $jadwal['nama_mata_kuliah'] }}
                                                    </td>
                                                    <td class="px-4  whitespace-nowrap lg:text-lg 2xl:text-2xl py-2 leading-7 font-bold text-gray-700">
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
                                    <h2 class="text-3xl font-bold mt-4">Tidak Ada Jadwal yang <strong class="text-red-700 font-extrabold">BELUM DIMULAI</strong> pada hari <strong class="text-red-700 font-extrabold">{{ $tanggal }}</strong></h2>
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
                <p class=" px-5 bg-[#050616] py-2 lg:py-3 2xl:py-2  h-screen text-left">Copyright&copy; 2023 |
                    <a href="#" class="text-yellow-500 font-bold ">SI-FISIP</a>. All rights reserved.
                </p>
                <marquee class="py-2 lg:py-3"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Vitae, nemo minus! Dolorem voluptates doloribus iure quis, fugiat ipsum saepe exercitationem
                    mollitia, praesentium perferendis unde veritatis sapiente atque cumque quidem. Optio?</span>
                </marquee>
            </div>

        </footer>

    </div>



</body>

<!-- script -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/scripts.js') }}"></script>
