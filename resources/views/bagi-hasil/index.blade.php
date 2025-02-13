<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3">

        {{-- <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <x-tab-item :route="route('super-admin.pasiens.index')" :active="request()->routeIs('super-admin.pasiens.index')">Data Pasien Lama</x-tab-item>
            <x-tab-item :route="route('super-admin.pasiens.create')" :active="request()->routeIs('super-admin.pasiens.create')">Pendaftaran Pasien Baru</x-tab-item>
        </ul> --}}

        <form class="w-full">
            <div class="flex">
                <div class="me-2">
                    <select id="dokter" name="dokter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" {{ request('dokter') == '' ? 'selected' : '' }}>Semua Dokter</option>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}" {{ request('dokter') == $dokter->id ? 'selected' : '' }}>
                                {{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="me-2">
                    <select id="bulan" name="bulan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="" {{ request('bulan') == '' ? 'selected' : '' }}>Semua bulan</option>
                        <option value="01" {{ request('bulan') == '01' ? 'selected' : '' }}>1. Januari</option>
                        <option value="2" {{ request('bulan') == '02' ? 'selected' : '' }}> 2. Febuari</option>
                        <option value="03" {{ request('bulan') == '03' ? 'selected' : '' }}>3. Maret</option>
                        <option value="04" {{ request('bulan') == '04' ? 'selected' : '' }}>4. April</option>
                        <option value="05" {{ request('bulan') == '05' ? 'selected' : '' }}>5. Mei</option>
                        <option value="06" {{ request('bulan') == '06' ? 'selected' : '' }}>6. Juni</option>
                        <option value="07" {{ request('bulan') == '07' ? 'selected' : '' }}>7. Juli</option>
                        <option value="08" {{ request('bulan') == '08' ? 'selected' : '' }}>8. Agustus</option>
                        <option value="09" {{ request('bulan') == '09' ? 'selected' : '' }}>9. September</option>
                        <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>10. Oktober</option>
                        <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>11. November</option>
                        <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>12. Desember</option>
                    </select>
                </div>
                <div class="me-2">
                    <select id="tahun" name="tahun"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" {{ request('tahun') == '' ? 'selected' : '' }}>Semua tahun</option>
                        <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
                        <option value="2025" {{ request('tahun') == '2025' ? 'selected' : '' }}>2025</option>
                    </select>
                </div>
                <button type="submit" name="find" value="Find"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tampilkan</button>
            </div>
        </form>

        <div>
            <p>Jumlah Tindakan : {{ $tindakans->count() }}</p>
            <p>Bagi Hasi untuk Dokter : {{ $total_fee_dokter }}</p>
            <p>Pendapatan Klinik : {{ $total_pendapatan_klinik }}</p>
            <p>Uang Masuk: {{ $total_pemasukan }}</p>
        </div>

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

                </tr>
            </thead>
            <tbody>
                @forelse ($tindakans as $tindakan)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{ $tindakan->rekam_medis->waktu_kunjungan }}
                            </a>
                        </td>
                        <td>{{ $tindakan->rekam_medis->dokter->nama }}</td>
                        <td>{{ $tindakan->layanan->nama }}</td>
                    </tr>
                @empty
                @endforelse


            </tbody>
        </table>


    </div>



</x-app-layout>
