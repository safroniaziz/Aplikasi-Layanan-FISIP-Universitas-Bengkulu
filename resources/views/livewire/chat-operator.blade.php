<div>
    <div class="flex h-screen overflow-hidden antialiased text-gray-800">
        <div class="flex flex-row h-full w-full overflow-x-hidden">
            <div class="flex flex-col py-8     w-64 bg-[#070E30] text-white flex-shrink-0 overflow-hidden">
                <a href="{{ route('dashboard') }}" class="flex   flex-row items-center justify-center h-12 w-full duration-300 transform text-white hover:text-yellow-500">
                    <div class="flex items-center justify-center rounded-2xl     h-10 w-10">
                        <svg class="w-6 h-6" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                    </div>
                    <div class="  font-extrabold font-[arial] text-2xl uppercase">Kembali</div>
                </a>

                <div wire:poll.5000ms="listchat" class="flex flex-col mt-8 h-[70vh]  overflow-y-auto overflow-x-hidden">
                    @if($listNew->count()!=0)
                    <div class="flex py-2 my-2 px-3 flex-row items-center justify-between text-xs bg-cyan-900">
                        <span class="font-bold">Pesan Terbaru </span>
                        <span class="flex items-center justify-center  bg-gray-300 text-black h-4 w-4 rounded">{{ $listNew->count() }}</span>
                    </div>
                    <div class="flex flex-col space-y-1  mr-2   -ml-2 ">
                        @foreach ($listNew as $item)

                        <button wire:click="fetchpesan({{ $item->id }})" class="flex {{$id==$item->id?'bg-cyan-600 border-r-4 border-cyan-500':''}} flex-row items-center duration-300  transform hover:bg-cyan-900 border  border-[#070E30] hover:border-r-4 hover:border-cyan-500 rounded-xl py-2  pr-1 pl-6">
                            <div class="flex items-center justify-center h-8 w-8 bg-gray-200 rounded-full">
                                <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300  " src="https://www.gravatar.com/avatar/{{ md5($item->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', $item->name) !!}/128" alt="Bordered avatar">
                            </div>
                            <div class="ml-2 text-sm text-left line-clamp-1 font-semibold">{{ $item->name }}</div>
                            <div class="flex items-center justify-center ml-2  text-xs text-white bg-red-500   h-4 w-4 rounded-full leading-none">
                                {{ $item->pesan_masuk }}
                            </div>

                        </button>

                        @endforeach

                    </div>
                    @endif
                    <div class="flex py-2 my-2 px-3 flex-row items-center justify-between text-xs bg-cyan-900">
                        <span class="font-bold">Pesan </span>
                        <span class="flex items-center justify-center  bg-gray-300 text-black h-4 w-4 rounded">{{ $listPesan->count() }}</span>
                    </div>
                    <div class="flex flex-col space-y-1  mr-2   -ml-2 ">
                        @foreach ($listPesan as $item)
                        @if($item->pesan_masuk ==0)
                        <button wire:click="fetchpesan({{ $item->id }})" class="flex flex-row items-center duration-300 transform hover:bg-cyan-900 border {{$id==$item->id?'bg-cyan-600 border-r-4 border-cyan-500':''}} border-[#070E30] hover:border-r-4 hover:border-cyan-500 rounded-xl p-2 pl-6">
                            <div class="flex items-center justify-center h-8 w-8 bg-gray-200 rounded-full">
                                <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300  " src="https://www.gravatar.com/avatar/{{ md5($item->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', $item->name) !!}/128" alt="Bordered avatar">
                            </div>
                            <div class="ml-2 text-sm font-semibold line-clamp-1 text-left">{{ $item->name }}</div>

                        </button>
                        @endif

                        @endforeach

                    </div>

                </div>
            </div>
            <div class="flex flex-col flex-auto h-full p-6">
                @if($id!=null)
                @if($pesanKonseling)

                <div wire:poll.5000ms="fetchpesan({{ $id }})" class="flex flex-col flex-grow w-full   h-full bg-white shadow-xl rounded-lg overflow-hidden    ">
                    <div class="bg-[#070E30] text-white p-4 flex">
                        <div class="flex items-center justify-center h-8 w-8 bg-gray-200 rounded-full">
                            <img class="w-8 h-8 rounded-full ring-2 mr-1 ring-gray-300  " src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', $user->name) !!}/128" alt="Bordered avatar">
                        </div>
                        <div class="ml-2 text-sm text-left line-clamp-1 py-2 font-semibold">{{ $user->name }}</div>
                    </div>

                    <div id="messages" class="flex flex-col flex-grow h-0 p-4 overflow-auto scroll-smooth  pb-20 ">
                        @foreach ($pesanKonseling as $item)
                        @php
                        $givenTime = \Carbon\Carbon::parse($item->created_at);
                        $currentTime = \Carbon\Carbon::now();
                        $minutesDifference = $givenTime->diffInMinutes($currentTime);
                        $hoursDifference = $givenTime->diffInHours($currentTime);
                        $daysDifference = $givenTime->diffInDays($currentTime);
                        if ($minutesDifference < 60) { $waktupesan=$minutesDifference==1 ? '1 menit lalu' : $minutesDifference . ' menit lalu' ; } elseif ($hoursDifference < 24) { $waktupesan=$hoursDifference==1 ? '1 jam lalu' : $hoursDifference . ' jam lalu' ; } elseif ($daysDifference < 7) { $waktupesan=$daysDifference==1 ? '1 hari lalu' : $daysDifference . ' hari lalu' ; } else { $waktupesan=$givenTime->format('Y-m-d H:i:s');
                            }
                            @endphp
                            @if($item->repley==0)
                            <div class="flex w-full mt-2 space-x-3 ">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden bg-black"><img src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', $user->name) !!}/128" class="h-10 w-10 rounded-full  "></div>
                                <div>
                                    <div class="bg-gray-100 p-3 rounded-r-lg rounded-bl-lg">
                                        <p class="text-sm">{{$item->message}}</p>
                                    </div>
                                    <span class="text-xs text-gray-500 leading-none left-0 text-left float-left mt-2"> {{$waktupesan}}
                                        @if($item->read==0)
                                        <div class="flex items-center justify-center   text-[9px] float-right text-white bg-red-500 py-1 ml-2 px-2 rounded-full leading-none">
                                            Belum dibalas
                                        </div>
                                        @endif
                                    </span>

                                </div>
                            </div>
                            @else
                            <div class="flex w-full mt-2 space-x-3  ml-auto justify-end">
                                <div>
                                    <div class="bg-blue-400 text-white p-3 rounded-l-lg rounded-br-lg">
                                        <p class="text-sm">{{$item->message}}</p>
                                    </div>
                                    <span class="text-xs text-gray-500 leading-none right-0 text-right float-right mt-2"><strong>{{ $item->operator_name }}</strong> - {{$waktupesan}}</span>
                                </div>
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"><img src="https://www.gravatar.com/avatar/{{ md5($item->email) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', $item->operator_name) !!}/128" class="h-10 w-10 rounded-full  "></div>
                            </div>
                            @endif
                            @endforeach



                    </div>
                    <form wire:submit.prevent="kirimPesan({{ $id }})" method="POST">
                        <div class="bg-gray-300 p-4">
                            <div class="relative flex ">

                                <input name="pesan" wire:model="pesan" type="text" placeholder="Tuliskan pesan/pertanyaan anda!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-3 pr-28 bg-white rounded-md py-3 text-sm" autocomplete="off">
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


                </div>

                @endif
                @else
                <div class="  w-full   h-full bg-white shadow-xl rounded-lg overflow-hidden   grid ">
                    <div class="  place-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 mx-auto mb-8" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                        </svg>
                        <h2>Silakan Pilih chat untuk menjawab konseling user</h2>
                    </div>
                </div>
                @endif
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
</div>
