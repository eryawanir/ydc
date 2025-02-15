<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3 pb-5">


        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <x-tab-item :route="route('super-admin.pasiens.index')" :active="request()->routeIs('super-admin.pasiens.index')">Data Pasien Lama</x-tab-item>
            <x-tab-item :route="route('super-admin.pasiens.create')" :active="request()->routeIs('super-admin.pasiens.create')">Pendaftaran Pasien Baru</x-tab-item>
            {{-- <li>
          <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
        </li> --}}
        </ul>

        <form method="POST" action="{{ route('super-admin.pasiens.store') }}" class="max-w-lg m-4">
            @csrf

            <div class="mt-3">
                <x-input-label for="nama" value="Nama Lengkap" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"
                    autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                <x-select class="mt-1" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="" selected>Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </x-select>
                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="tempat_lahir" value="Tempat Lahir" />
                <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir"
                    :value="old('tempat_lahir')" autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="tanggal_lahir" value="Tanggal Lahir" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir"
                    :value="old('tanggal_lahir')" autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-input-label for="no_hp" value="No Whatsapp" />
                <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp')"
                    autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>
            <div class="mt-3">
                <x-input-label for="nik" value="NIK" />
                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')"
                    autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>
            <div class="mt-3">
                <x-input-label for="alamat" value="Alamat" />
                <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                    autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>





            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Add') }}
                </x-primary-button>
            </div>
        </form>

    </div>



</x-app-layout>
