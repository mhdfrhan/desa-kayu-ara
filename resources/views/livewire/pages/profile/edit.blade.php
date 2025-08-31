@extends('layouts.admin')

@section('title', 'Edit Profil')

@section('page-title', 'Edit Profil')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informasi Profil') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Perbarui informasi profil dan alamat email akun Anda.') }}
                    </p>
                </header>

                <form method="POST" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->name)"
                            required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                            :value="old('email', auth()->user()->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Email Anda belum diverifikasi.') }}

                                <form method="POST" action="{{ route('verification.send') }}" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                                    </button>
                                </form>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat registrasi.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Simpan') }}</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
                        @endif
                    </div>
                </form>
            </section>

            <!-- Update Password Section -->
            <section class="mt-10 pt-10 border-t border-gray-200">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Update Password') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Pastikan akun Anda menggunakan password yang panjang dan acak untuk tetap aman.') }}
                    </p>
                </header>

                <form method="POST" action="{{ route('admin.password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="current_password" :value="__('Password Saat Ini')" />
                        <x-text-input id="current_password" name="current_password" type="password"
                            class="mt-1 block w-full" autocomplete="current-password" />
                        <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password Baru')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                            autocomplete="new-password" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                            class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update Password') }}</x-primary-button>

                        @if (session('status') === 'password-updated')
                            <p class="text-sm text-gray-600">{{ __('Password berhasil diupdate.') }}</p>
                        @endif
                    </div>
                </form>
            </section>
        </div>
    </div>

    <script>
        function confirmDeleteAccount() {
            document.getElementById('deleteAccountModal').classList.remove('hidden');
        }

        function closeDeleteAccountModal() {
            document.getElementById('deleteAccountModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('deleteAccountModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteAccountModal();
            }
        });
    </script>
@endsection
