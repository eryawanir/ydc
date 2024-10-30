<x-app-layout>
  <div class="mx-4 mt-2 z-0  max-w-4xl sm:ms-64 sm:ps-3 pb-5">


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
      <x-tab-item :route="route('super-admin.users.index')" :active="request()->routeIs('super-admin.users.index')">Daftar</x-tab-item>
      <x-tab-item :route="route('super-admin.users.create')" :active="request()->routeIs('super-admin.users.create')">Tambah Data</x-tab-item>
      {{-- <li>
        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
      </li> --}}
    </ul>
    <x-flash-massage />

    <form method="POST" action="{{ route('super-admin.users.store') }}" class="max-w-xl m-4">
      @csrf

      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      {{-- No WhatsApp --}}
      <div class="mt-4">
        <x-input-label for="phone_number" value="No WhatsApp" />
        <x-text-input id="phone_number" class="block mt-1 w-full" type="text" value="628" name="phone_number" autocomplete="off" />
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
          Format harus seperti ini >> 6285864273455</p>
        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
      </div>

      <div class="flex">
        {{-- Role --}}
        <div class="mt-4 w-1/2">
          <x-input-label for="role" value="Jenis Akun" />
          <x-select class="mt-1" id="role" name="role">
            <option value="" selected>Pilih</option>
            <option value="">Dokter</option>
            <option value="">Admin</option>
          </x-select>
          <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>
        <!-- Username -->
        <div class="mt-4 w-1/2">
          <x-input-label for="username" value="Username" />
          <x-text-input id="username" class="mt-1 block w-full" type="text" name="username" autocomplete="off" />
          <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

      </div>


      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="text" value="1234ganti" name="password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
          {{ __('Register') }}
        </x-primary-button>
      </div>
    </form>

  </div>



</x-app-layout>
