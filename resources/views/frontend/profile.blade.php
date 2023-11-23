@extends('layouts.user')

@section('content')

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
            <svg data-name="Layer 1" class="svg6  duration-300 transform fill-[#010347] dark:fill-[#f5ca3c]  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <!-- end slider -->

    <!-- Fitur  -->
    <section id="Fitur" class="duration-300 transform bg-pattren mb-32">
        <div style="padding-top: 7rem" class="mx-auto container px-5   pb-35   section-heading  text-gray-700 dark:text-gray-200 z-30 relative ">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end Fitur  -->
@endsection
