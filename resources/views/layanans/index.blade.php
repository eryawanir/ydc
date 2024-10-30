<x-app-layout>
  <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
      <x-tab-item :route="route('super-admin.users.index')" :active="request()->routeIs('super-admin.users.index')">Daftar</x-tab-item>
      <x-tab-item :route="route('super-admin.users.create')" :active="request()->routeIs('super-admin.users.create')">Tambah Data</x-tab-item>
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
              Nama
            </span>
          </th>
          <th>
            <span class="flex items-center">
              No WA
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Role
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Presensi
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($layanans as $layanan)
          <tr>
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                {{ $layanan->nama }}
              </a>
            </td>
            <td>AAPL</td>
            <td>$192.58</td>
            <td>$3.04T</td>
          </tr>
        @empty
        @endforelse


      </tbody>
    </table>


  </div>



</x-app-layout>
