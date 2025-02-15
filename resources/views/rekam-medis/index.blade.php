<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">
        DAFTAR REKAM MEDIS
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">

            {{-- <x-tab-item :route="route('super-admin.rekam-medis.index')" :active="request()->routeIs('super-admin.rekam-medis.index')">Data Pasien Lama</x-tab-item>
            <x-tab-item :route="route('super-admin.rekam-medis.create')" :active="request()->routeIs('super-admin.rekam-medis.create')">Pendaftaran Pasien Baru</x-tab-item> --}}
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
                            Waktu Kunjungan
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Nama Pasien
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Dokter
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
                @forelse ($rekam_medis as $rekam_medis)
                    <tr>

                        <td>{{ $rekam_medis->waktu_kunjungan }}</td>
                        <td>{{ $rekam_medis->pasien->nama }}</td>
                        <td>{{ $rekam_medis->dokter->nama }}</td>
                        <td>
                            <a href="{{ route('super-admin.rekam-medis.edit', $rekam_medis) }}"
                                class="ms-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Edit
                            </a>

                        </td>
                    </tr>
                @empty
                @endforelse


            </tbody>
        </table>


    </div>



</x-app-layout>
