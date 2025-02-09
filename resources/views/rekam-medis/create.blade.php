<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3 pb-5">

        PERIKSA PASIEN
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            {{-- <x-tab-item :route="route('super-admin.rekam-medis.index')" :active="request()->routeIs('super-admin.rekam-medis.index')">Daftar</x-tab-item> --}}
            {{-- <x-tab-item :route="route('super-admin.rekam-medis.create')" :active="request()->routeIs('super-admin.rekam-medis.create')">Tambah Data</x-tab-item> --}}
            {{-- <li>
        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
      </li> --}}
        </ul>

        <form method="POST" action="{{ route('super-admin.rekam-medis.store') }}" class="max-w-xl m-4">
            @csrf

            <p>
                <span>{{ $pasien->nama }}, </span>
                <span>{{ $pasien->umur }} tahun</span>
                <span>- {{ $pasien->jenis_kelamin }}</span>
            </p>
            <input type="hidden" value="{{ $pasien->id }}" name="pasien_id">
            <div class="mt-3">
                <x-input-label for="dokter_id" value="Dokter Pemeriksa" />
                <x-select class="mt-1" id="dokter_id" name="dokter_id">
                    <option value="" selected>Pilih</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('dokter_id')" class="mt-2" />
            </div>
            <!-- Nama Tindakan -->
            <div class="mt-3">
                <x-input-label for="waktu_kunjungan" value="Waktu Kunjungan" />
                <x-text-input id="waktu_kunjungan" class="block mt-1 w-full" type="datetime-local"
                    name="waktu_kunjungan" :value="old('waktu_kunjungan')" autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('waktu_kunjungan')" class="mt-2" />
            </div>


            <!-- Harga -->
            <div class="mt-3">
                <x-input-label for="keluhan" value="Keluhan" />
                <x-text-input id="keluhan" class="block mt-1 w-full" type="text" name="keluhan" :value="old('keluhan')"
                    autofocus autocomplete="off" />
                <x-input-error :messages="$errors->get('keluhan')" class="mt-2" />
            </div>






            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ 'Lanjut' }}
                </x-primary-button>
            </div>
        </form>

    </div>



</x-app-layout>
