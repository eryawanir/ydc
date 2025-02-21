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

        <form method="POST" action="{{ route('super-admin.rekam-medis.update', $rm->id) }}" class="max-w-xl m-4">
            @csrf
            @method('PUT')

            <p>
                <span>{{ $pasien->nama }}, </span>
                <span>{{ $pasien->umur }} tahun</span>
                <span>- {{ $pasien->jenis_kelamin }}</span>
            </p>
            <div class="mt-1">
                <x-input-label for="dokter_id" value="Dokter Pemeriksa" />
                <x-select class="mt-1" id="dokter_id" name="dokter_id">
                    <option value="" selected>Pilih</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}" @if ($dokter->id == $rm->dokter->id) selected @endif>
                            {{ $dokter->nama }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('dokter_id')" class="mt-2" />
            </div>
            <!-- Nama Tindakan -->
            <div class="mt-1">
                <x-input-label for="waktu_kunjungan" value="Waktu Kunjungan" />
                <x-text-input id="waktu_kunjungan" class="block mt-1 w-full" type="datetime-local"
                    name="waktu_kunjungan" value="{{ $rm->waktu_kunjungan }}" autocomplete="off" />
                <x-input-error :messages="$errors->get('waktu_kunjungan')" class="mt-2" />
            </div>


            <!-- Harga -->
            <div class="mt-1">
                <x-input-label for="keluhan" value="Keluhan" />
                <x-text-input id="keluhan" class="block mt-1 w-full" type="text" name="keluhan"
                    value="{{ $rm->keluhan }}" autocomplete="off" />
                <x-input-error :messages="$errors->get('keluhan')" class="mt-2" />
            </div>

            <div class="mt-1">
                <x-input-label for="hasil_pemeriksaan" value="Keterangan Hasil Pemeriksaan" />
                <x-text-input id="hasil_pemeriksaan" class="block mt-1 w-full" type="text" name="hasil_pemeriksaan"
                    value="{{ $rm->hasil_pemeriksaan }}" autocomplete="off" />
                <x-input-error :messages="$errors->get('hasil_pemeriksaan')" class="mt-2" />
            </div>






            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
            <div class="mt-2">
                <x-input-label for="tindakan" value="Daftar tindakan" />

                <a href="{{ route('super-admin.tindakans.create', $rm) }}"
                    class="px-3 py-2 text-xs font-medium text-center text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                    + Tambah Tindakan
                </a>
                <div class="mt-4 relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Diagnosa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tindakan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Biaya
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rm->tindakans as $tindakan)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <td class="px-6 py-4">
                                        {{ $tindakan->lokasi }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $tindakan->diagnosa }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $tindakan->layanan->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $tindakan->layanan->harga }}
                                    </td>
                                </tr>
                                @php
                                    $total += $tindakan->layanan->harga;
                                @endphp
                            @empty
                                <td colspan="3" class="text-center">Tidak ada data...</td>
                            @endforelse

                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 font-bold">
                                <td colspan="3" class="px-6 py-4 text-end fontb">
                                    Total
                                </td>
                                <td class="px-6 py-4">
                                    {{ $total }}
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
                <a href="{{ route('super-admin.rekam-medis.index') }}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
                <x-input-error :messages="$errors->get('tindakan')" class="mt-2" />
            </div>
        </form>

    </div>



</x-app-layout>
