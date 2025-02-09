<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">

        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <x-tab-item :route="route('super-admin.pasiens.index')" :active="request()->routeIs('super-admin.pasiens.index')">Data Pasien Lama</x-tab-item>
            <x-tab-item :route="route('super-admin.pasiens.create')" :active="request()->routeIs('super-admin.pasiens.create')">Pendaftaran Pasien Baru</x-tab-item>
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
                @forelse ($pasiens as $pasien)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ $pasien->nama }}
                            </a>
                        </td>
                        <td>{{ $pasien->jenis_kelamin }}</td>
                        <td>{{ $pasien->tanggal_lahir }}</td>
                        <td>
                            <a href="{{ route('super-admin.rekam-medis.create', $pasien) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Periksa
                            </a>
                            <a href="{{ route('super-admin.pasiens.edit', $pasien) }}"
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
