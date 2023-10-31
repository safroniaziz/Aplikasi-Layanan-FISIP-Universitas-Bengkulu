@extends('layouts.user')
@section('poadcast','active-menu')

@section('content')
    <!-- slider -->

    <section id="home">
        <div
            class=" text-center overflow-hidden bg-[#010347] dark:bg-[#f5ca3c] duration-300 transform">
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

    <div
        class="bg-[#010347] dark:bg-[#f5ca3c] relative ">



        <div class="slider-svg-b  tran-svg absolute -mt-1 z-10">
            <svg data-name="Layer 1" class="svg7  duration-300 transform fill-[#010347] dark:fill-[#f5ca3c]  "
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <!-- end slider -->

    <!-- Fitur  -->
    <section id="Fitur" class="duration-300 transform bg-pattren2">
        <div
            class="mx-auto container px-5  pt-24 pb-48   section-heading  text-gray-700 dark:text-gray-200 z-30 relative overflow-hidden">

            <div class="slider-svg-b  tran-svg absolute   z-10">
                <svg data-name="Layer 1" class="svg7  duration-300 transform fill-gray-100 dark:fill-[#001344]  "
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        class="shape-fill"></path>
                </svg>
            </div>

                <div
                    class="relative bg-white   mb-10 mt-1 dark:bg-black dark:bg-opacity-30 bg-opacity-60
                    dark:border-yellow-500 rounded-xl">
                    <img src="https://res.cloudinary.com/peerspace-inc/image/upload/q_80,c_crop,g_custom/w_2048/aqqbcy1l8x5pxgnjijhi.jpg"
                        alt="" class="w-full h-[400px] rounded-xl shadow-lg shadow-black object-cover bg-fill" >

                        <!-- Image example  -->
                        <div class="overflow-hidden   mx-auto py-2 my-5 bg-gray-100 dark:bg-[#001344]">
                            <ul class="marquee py-3 inline-flex space-x-4 max-w-full items-center"
                                x-data="Marquee({speed: 1, spaceX: 4, dynamicWidthElements: true})">
                                <!-- if you are putting elements that require dynamic width calculations (e.g. images), add the flex-shrink-0 class to each li element -->
                                <li class="flex-shrink-0">
                                    <img src="https://jete.id/wp-content/uploads/2022/01/peralatan-podcast-pemula-768x403.jpg"
                                        class="max-h-20 md:max-h-40 lg:max-h-52 w-auto">
                                </li>
                                <li class="flex-shrink-0">
                                    <img src="https://jete.id/wp-content/uploads/2022/01/peralatan-podcast-pemula-2-768x403.jpg"
                                        class="max-h-20 md:max-h-40 lg:max-h-52 w-auto">
                                </li>
                                <li class="flex-shrink-0">
                                    <img src="https://galerimusikindonesia.com/image/data/recording/audio%20interface/Tascam/Mixcast%204/tascam-mixcast-4-podcast-studio-mixer-station-with-built-in-recorder-usb-audio-interface-a100494.jpg"
                                        class="max-h-20 md:max-h-40 lg:max-h-52 w-auto">
                                </li>
                            </ul>
                        </div>



                        <p class="p-6 leading-8 text-sm text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error ad et voluptas beatae ipsa
                            alias consequuntur deserunt exercitationem dicta corrupti blanditiis nemo fuga suscipit,
                            fugit impedit iure praesentium, similique nam. Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Error ad et voluptas beatae ipsa
                            alias consequuntur deserunt exercitationem dicta corrupti blanditiis nemo fuga suscipit,
                            fugit impedit iure praesentium, similique namLorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Error ad et voluptas beatae ipsa </p>
                        <h2
                                class="mb-6 text-center font-sans text-4xl lg:text-5xl font-bold text-[#0b3960] dark:text-yellow-500 text-sh2">
                                Paket Tersedia</h2>

                        <div class="px-6 flex flex-wrap justify-center items-stretch  pb-12 space-x-3 space-y-3   ">
                            <button class="hidden"></button>
                            <button
                                @click="modelOpen =!modelOpen;id_sewa =1, durasi='20 september 2023 - 30 september 2023'
                                "
                                class="bg-[#001344]  hover:bg-blue-500 px-4 py-3 w-full md:max-w-[200px]   duration-300 transform text-gray-200 text-sm rounded-lg">
                                20 september 2023 - 30 september 2023
                            </button>
                            <button @click="modelOpen =!modelOpen;id_sewa =2, durasi='20 september 2023' "
                                class="bg-[#001344] hover:bg-blue-500 px-4 py-3 w-full md:max-w-[200px]   duration-300 transform text-gray-200 text-sm rounded-lg">
                                20 september 2023
                            </button>
                            <button @click="modelOpen =!modelOpen;id_sewa =3, durasi='Lorem ipsum dolor sit amet c' "
                                class="bg-[#001344] hover:bg-blue-500 px-4 py-3 w-full md:max-w-[200px]   duration-300 transform text-gray-200 text-sm rounded-lg">
                                Lorem ipsum dolor sit amet c
                            </button>
                            <button
                                @click="modelOpen =!modelOpen;id_sewa =4, durasi='Lorem ipsum dolor sit amet consectetur adipi' "
                                class="bg-[#001344] hover:bg-blue-500 px-4 py-3 w-full md:max-w-[200px]   duration-300 transform text-gray-200 text-sm rounded-lg">
                                Lorem ipsum dolor sit amet consectetur adipi
                            </button>


                        </div>



                </div>

        </div>


    </section>
    <!-- end Fitur  -->
@endsection