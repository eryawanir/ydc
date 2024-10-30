<x-app-layout>
  <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
      <x-tab-item :route="route('super-admin.tindakans.index')" :active="request()->routeIs('super-admin.tindakans.index')">Daftar</x-tab-item>
      <x-tab-item :route="route('super-admin.tindakans.create')" :active="request()->routeIs('super-admin.tindakans.create')">Tambah Data</x-tab-item>
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
              Tindakan
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Dokter
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Bahan
            </span>
          </th>
          <th>
            <span class="flex items-center">
              ZIS
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Pribadi
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($tindakans as $tindakan)
          <tr>

            <td>

              {{ $tindakan->layanan->nama }} - {{ $tindakan->layanan->nama_jenis }}

            </td>
            <td>{{ $tindakan->utk_dokter }}</td>
            <td>{{ $tindakan->utk_bahan }}</td>
            <td>{{ $tindakan->utk_zis }}</td>
            <td>{{ $tindakan->utk_pribadi }}</td>
            {{-- <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $tindakan->created_at }}</td> --}}


          </tr>
        @empty
        @endforelse


      </tbody>
    </table>


  </div>



</x-app-layout>
