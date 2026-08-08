<x-guest-layout>
    <div class="space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-semibold text-heading">Confirm your password</h1>
            <p class="mt-4 text-sm text-paragraph">This is a secure area of the application. Please confirm your password before continuing.</p>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="mt-2" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button class="px-6 py-3">Confirm</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
