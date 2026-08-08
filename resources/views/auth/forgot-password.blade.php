<x-guest-layout>
    <div class="space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-semibold text-heading">Forgot your password?</h1>
            <p class="mt-4 text-sm text-paragraph">Enter your email address and we’ll send a secure reset link so you can choose a new password.</p>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card">
            <x-auth-session-status class="mb-6 rounded-[28px] border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="mt-2" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-primary hover:text-primary/80">Back to login</a>
                    <x-primary-button class="w-full sm:w-auto px-6 py-3">Email Password Reset Link</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
