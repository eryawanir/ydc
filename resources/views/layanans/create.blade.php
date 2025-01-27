<x-app-layout>
  <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3 pb-5">


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
      <x-tab-item :route="route('super-admin.layanans.index')" :active="request()->routeIs('super-admin.layanans.index')">Daftar</x-tab-item>
      <x-tab-item :route="route('super-admin.layanans.create')" :active="request()->routeIs('super-admin.layanans.create')">Tambah Data</x-tab-item>
      {{-- <li>
        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
      </li> --}}
    </ul>

    <form method="POST" action="{{ route('super-admin.layanans.store') }}" class="max-w-xl m-4">
      @csrf


              <!-- Nama Tindakan -->
      <div class="mt-3">
        <x-input-label for="nama" value="Nama Tindakan" />
        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
      </div>
      <div class="mt-3">
        <x-input-label for="jenis" value="Jenis Tindakan" />
        <x-select class="mt-1" id="jenis" name="jenis">
          <option value="" selected>Pilih</option>
          <option value="1">Umum 35%</option>
          <option value="2">Lab 60%</option>
          <option value="3">Bedah 55%</option>
          <option value="4">Veneer/orto/bleeching 40%</option>
        </x-select>
        <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
      </div>

      <!-- Harga -->
      <div class="mt-3">
        <x-input-label for="harga" value="Harga" />
        <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" :value="old('harga')" autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
      </div>




      <div class="flex items-center justify-end mt-4">


        <x-primary-button class="ms-4">
          {{ __('Add') }}
        </x-primary-button>
      </div>
    </form>

  </div>



</x-app-layout>
