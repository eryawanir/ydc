<x-app-layout>
    <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3 pb-5">
        <p>TAMBAH TINDAKAN</p>
        <P>Pasien : {{ $rm->pasien->nama }}</P>
        <P>Dokter : {{ $rm->dokter->nama }}</P>
        <P>Waktu : {{ $rm->waktu_kunjungan }}</P>

        <form method="POST" action="{{ route('super-admin.tindakans.store') }}" class="max-w-xl m-4">
            @csrf

            <div class="mt-1">
                <x-input-label for="lokasi" value="Lokasi" />
                <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" value=""
                    autocomplete="off" />
                <x-input-error :messages="$errors->get('keluhan')" class="mt-2" />
            </div>
            <div class="mt-1">
                <x-input-label for="diagnosa" value="Diagnosa" />
                <x-text-input id="diagnosa" class="block mt-1 w-full" type="text" name="diagnosa" value=""
                    autocomplete="off" />
                <x-input-error :messages="$errors->get('diagnosa')" class="mt-2" />
            </div>


            <div class="mt-1">
                <x-input-label for="layanan_id" value="Tindakan" />
                <x-select class="mt-1" id="layanan_id" name="layanan_id">
                    <option value="" selected>Pilih</option>
                    @foreach ($layanans as $layanan)
                        <option value="{{ $layanan->id }}">{{ $layanan->nama_jenis }} - {{ $layanan->nama }}
                            Rp{{ $layanan->harga }}</option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('layanan_id')" class="mt-2" />
            </div>
            <input type="hidden" name="rekam_medis_id" value="{{ $rm->id }}">





            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Add') }}
                </x-primary-button>
            </div>
        </form>

    </div>



</x-app-layout>
