<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">

        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <x-tab-item :route="route('super-admin.dokters.index')" :active="request()->routeIs('super-admin.dokters.index')">Data Dokter</x-tab-item>
            <x-tab-item :route="route('super-admin.dokters.create')" :active="request()->routeIs('super-admin.dokters.create')">Tambah Dokter</x-tab-item>
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
                Jenis Kelamin
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Tanggal Lahir
              </span>
            </th>
            <th>
              <span class="flex items-center">
                Aksi
              </span>
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($dokters as $dokter)
            <tr>
              <td>
                  {{ $dokter->nama }}

              </td>
              <td>{{ $dokter->jenis_kelamin }}</td>
              <td>{{ $dokter->tanggal_lahir }}</td>
              <td>

                  <a href="{{ route('super-admin.dokters.edit', $dokter) }}" class="ms-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    Lihat
                  </a>

              </td>
            </tr>
          @empty
          @endforelse


        </tbody>
      </table>


    </div>



  </x-app-layout>
