<x-app-layout>
  <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3 pb-5">


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
      <x-tab-item :route="route('super-admin.tindakans.index')" :active="request()->routeIs('super-admin.tindakans.index')">Daftar</x-tab-item>
      <x-tab-item :route="route('super-admin.tindakans.create')" :active="request()->routeIs('super-admin.tindakans.create')">Tambah Data</x-tab-item>
      {{-- <li>
        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
      </li> --}}
    </ul>

    <form method="POST" action="{{ route('super-admin.tindakans.store') }}" class="max-w-xl m-4">
      @csrf

      <div>
        <x-input-label for="layanan" value="Tindakan" />
        <x-select class="mt-1" id="layanan" name="layanan_id">
          <option value="" selected>Pilih</option>
          @foreach ($layanans as $layanan)
            <option value="{{ $layanan->id }}">{{ $layanan->nama_jenis }} - {{ $layanan->nama }}</option>
          @endforeach
        </x-select>
        <x-input-error :messages="$errors->get('layanan_id')" class="mt-2" />
      </div>
      <!-- Waktu Tindakan -->
      <div class="mt-3">
        <x-input-label for="waktu" value="Waktu Tindakan" />
        <x-text-input id="waktu" class="block mt-1 w-full" type="text" name="waktu" value="{{ date('d-m-Y') }}" autofocus disabled autocomplete="off" />

      </div>





      <div class="flex items-center justify-end mt-4">


        <x-primary-button class="ms-4">
          {{ __('Add') }}
        </x-primary-button>
      </div>
    </form>

  </div>



</x-app-layout>
