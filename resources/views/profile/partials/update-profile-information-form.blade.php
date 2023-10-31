<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil User') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ubah informasi profil akun, email dan data anda yang lainnya") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
    
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', Auth::user()->name)"  autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
        
                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', Auth::user()->username)" autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">        
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', Auth::user()->email)" autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div>
                    <x-input-label for="no_hp" :value="__('No. HP')" />
                    <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full" :value="old('no_hp', Auth::user()->no_hp)"  autofocus autocomplete="no_hp" />
                    <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">        
                <div>
                    <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
                    <x-text-input id="pekerjaan" name="pekerjaan" type="text" class="mt-1 block w-full" :value="old('pekerjaan', Auth::user()->pekerjaan)" autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                </div>

                <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="block mt-1 w-full">
                            <option value="mahasiswa" @if(old('status', Auth::user()->status) === 'mahasiswa') selected @endif>Mahasiswa</option>
                            <option value="pelajar" @if(old('status', Auth::user()->status) === 'pelajar') selected @endif>Pelajar</option>
                            <option value="bekerja" @if(old('status', Auth::user()->status) === 'bekerja') selected @endif>Bekerja</option>
                            <option value="lainnya" @if(old('status', Auth::user()->status) === 'lainnya') selected @endif>Lainnya</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>
            </div>
    
        <!-- Bagian 3 (button dan pesan) -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
    
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    
</section>
