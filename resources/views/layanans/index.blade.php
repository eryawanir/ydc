<x-app-layout>
  <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
      <x-tab-item :route="route('super-admin.layanans.index')" :active="request()->routeIs('super-admin.layanans.index')">Daftar</x-tab-item>
      <x-tab-item :route="route('super-admin.layanans.create')" :active="request()->routeIs('super-admin.layanans.create')">Tambah Data</x-tab-item>
      {{-- <li>
        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
      </li> --}}
    </ul>

    <div class="m-2"></div>

    <table id="search-table">
      <thead>
        <tr>
          <th>
            <span class="flex items-center">
              Jenis
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Nama
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Harga
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($layanans as $layanan)
          <tr>

            <td>

              {{ $layanan->nama_jenis }} {{ $layanan->persenanDokter*100 }}%

            </td>
            <td>{{ $layanan->nama }}</td>

            <td>{{ $layanan->harga }}</td>

          </tr>
        @empty
        @endforelse


      </tbody>
    </table>


  </div>



</x-app-layout>
