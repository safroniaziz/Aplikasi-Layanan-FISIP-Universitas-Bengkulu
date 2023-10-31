<div x-data="{ modelOpen: false  }">
    <button @click="modelOpen =!modelOpen   " class="fixed bottom-20 right-3 w-14 h-14 bg-yellow-500 ring-yellow-200 ring-opacity-50 ring-4 hover:scale-95 active:scale-105 duration-300 transform hover:bg-yellow-600 rounded-full text-center grid z-[80]">
        <svg xmlns="http://www.w3.org/2000/svg" class="place-self-center fill-white w-6 h-6" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
            <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
        </svg>
    </button>

    <!-- modal  -->
    <div x-show="modelOpen" style="z-index: 998 !important;" class=" fixed   inset-0 z-10 overflow-hidden " aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div x-cloak @click="modelOpen = false" x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed z-0 inset-0 transition-opacity bg-gray-500   bg-opacity-40" aria-hidden="true">
        </div>
        <div class="flex items-end    overflow-hidden px-4 text-center   sm:p-0">
            <div x-cloak x-show="modelOpen" style="z-index: 20;" :class="{ 'fadeInRight': modelOpen, 'fadeInLeft': !modelOpen }" class="  w-full max-w-lg   pb-[70px]  container   text-left transition-all transform  h-screen  absolute bottom-0 right-0   bg-[#091031] opacity-80 rounded-lg shadow-xl overflow-hidden ">
                <div class="flex items-center justify-between space-x-4 py-4 px-5">
                    <h1 class="text-xl font-bold text-yellow-500  flex"> <img src="{{ asset('assets/img/logo.svg') }}" class="w-10 h-10 mr-2"><span class="font-bold py-2 ">Help Desk </span> </h1>
                    @if($scroll==1)
                    <script>
                        const el = document.getElementById('messages');
                        el.scrollTop = el.scrollHeight;
                    </script>

                    @endif

                    <button @click="modelOpen = false" class="text-yellow-500    focus:outline-none hover:text-yellow-300 relative   ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>



                <div wire:poll.5000ms="pesanView" class="flex flex-col flex-grow w-full max-w-xl h-full bg-white shadow-xl rounded-lg overflow-hidden mb-20  ">

                    @if(isset(Auth::user()->name))
                    <div id="messages" class="flex flex-col flex-grow h-0 p-4 overflow-auto scroll-smooth  pb-20 ">
                        <div class="flex w-full mt-3 space-x-3 ">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-black"><img src="{{ asset('assets/img/logo.svg') }}" class="w-10 h-10 p-1"></div>
                            <div>
                                <div class="bg-gray-100 p-3 rounded-r-lg rounded-bl-lg">
                                    <p class="text-sm">Hi... <strong class="text-yellow-500">{{ Auth::user()->name }}</strong>, ada yang bisa dibantu? silakan tanyakan pertannyaan anda dan akan di jawab oleh operator</p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">System</span>
                            </div>
                        </div>
                        @foreach ($chat as $item)
                        @php
                        $givenTime = \Carbon\Carbon::parse($item->created_at);
                        $currentTime = \Carbon\Carbon::now();
                        $minutesDifference = $givenTime->diffInMinutes($currentTime);
                        $hoursDifference = $givenTime->diffInHours($currentTime);
                        $daysDifference = $givenTime->diffInDays($currentTime);
                        if ($minutesDifference < 60) { $waktupesan=$minutesDifference==1 ? '1 menit lalu' : $minutesDifference . ' menit lalu' ; } elseif ($hoursDifference < 24) { $waktupesan=$hoursDifference==1 ? '1 jam lalu' : $hoursDifference . ' jam lalu' ; } elseif ($daysDifference < 7) { $waktupesan=$daysDifference==1 ? '1 hari lalu' : $daysDifference . ' hari lalu' ; } else { $waktupesan=$givenTime->format('Y-m-d H:i:s');
                            }
                            @endphp
                            @if($item->repley==1)
                            <div class="flex w-full mt-2 space-x-3 ">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-black"><img src="https://www.gravatar.com/avatar/{{ md5($item->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', $item->name) !!}/128" class="h-10 w-10 rounded-full  "></div>
                                <div>
                                    <div class="bg-gray-100 p-3 rounded-r-lg rounded-bl-lg">
                                        <p class="text-sm">{{$item->message}}</p>
                                    </div>
                                    <span class="text-xs text-gray-500 leading-none left-0 text-left float-left mt-2"><strong>{{$item->name}}</strong> - {{$waktupesan}}</span>
                                </div>
                            </div>
                            @else
                            <div class="flex w-full mt-2 space-x-3  ml-auto justify-end">
                                <div>
                                    <div class="bg-blue-400 text-white p-3 rounded-l-lg rounded-br-lg">
                                        <p class="text-sm">{{$item->message}}</p>
                                    </div>
                                    <span class="text-xs text-gray-500 leading-none right-0 text-right float-right mt-2">{{$waktupesan}}</span>
                                </div>
                                <!-- <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300">https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', Auth::user()->name) !!}/128</div> -->
                            </div>
                            @endif
                            @endforeach



                    </div>
                    <form wire:submit.prevent="kirimPesan" method="POST">
                        <div class="bg-gray-300 p-4">
                            <div class="relative flex ">

                                <input name="pesan" wire:model="pesan" type="text" placeholder="Tuliskan pesan/pertanyaan anda!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-3 pr-28 bg-white rounded-md py-3 text-sm">
                                <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">

                                    <button type="submit" class="inline-flex text-sm items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-[#091150] hover:bg-blue-700 focus:outline-none">
                                        <span wire:loading.remove wire:target="kirimPesan" class="font-bold">Send</span>
                                        <span wire:loading wire:target="kirimPesan" class="font-bold">Processing...</span>

                                        <svg wire:loading.remove wire:target="kirimPesan" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                        </svg>

                                        <svg wire:loading wire:target="kirimPesan" class="animate-spin  w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    @else


                    <div class="p-8">
                        <div class="flex w-full mt-2 space-x-3 max-w-xs">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-black"><img src="{{ asset('assets/img/logo.svg') }}" class="w-10 h-10 p-1"></div>
                            <div>
                                <div class="bg-gray-100 p-3 rounded-r-lg rounded-bl-lg">
                                    <p class="text-sm">Hi... untuk menggunakan fitur silakan <strong class="text-yellow-500">LOGIN</strong> terlebih dalulu</p>
                                </div>
                                <!-- <span class="text-xs text-gray-500 leading-none">2 min ago</span> -->
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="my-2  ">
                                <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300
                                after:ml-2 text-sm pb-2">Email</label>
                                <input type="text" id="id_user" name="id_user" class="   w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                bg-transparent px-3 py-2.5 text-sm font-normal text-gray-700 dark:text-gray-300 transition-all duration-500
                                placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                focus:shadow-[-4px_4px_10px_0px_#01052D]
                                dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder="Email" />
                                <x-input-error :messages="$errors->get('id_user')" class="mt-2" />
                            </div>
                            <div class="my-2  " x-data="{ show: false }">
                                <label class=" after:content-['*'] after:text-red-500 font-semibold text-gray-700 dark:text-gray-300
                                after:ml-2 text-sm pb-2">Password</label>
                                <div class="relative flex items-center ">
                                    <input :type=" show ? 'text': 'password' " type="password" name="password" class=" w-full rounded-lg border-2 mt-1 border-[#01052D] dark:border-yellow-500
                                    bg-transparent
                                    px-3 py-2.5 text-sm font-normal text-gray-700 dark:text-gray-300 transition-all duration-500
                                    placeholder:text-gray-600 dark:placeholder:text-yellow-100 focus:border-white
                                    dark:focus:ring-yellow-500 focus:ring-[#01052D]
                                    focus:shadow-[-4px_4px_10px_0px_#01052D]
                                    dark:focus:shadow-[-4px_4px_10px_0px_#eab308] " placeholder="Password" />
                                    <span class="absolute right-2 pt-1 bg-transparent flex items-center justify-center cursor-pointer " @click="show = !show">
                                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                            </path>
                                        </svg>

                                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
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

                    </div>


                    @endif
                </div>





            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('scrollToBottom', (event) => {
                var elem = document.getElementById('messages');
                elem.scrollTop = elem.scrollHeight;
            });
        });

        function onLoad() {
            const el = document.getElementById('messages');
            el.scrollTop = el.scrollHeight;
        }

        window.onload = onLoad;
    </script>
    <!-- end modal  -->
</div>
