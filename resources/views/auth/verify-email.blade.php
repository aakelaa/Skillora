<x-guest-layout>
    <div class="space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-semibold text-heading">Verify your email</h1>
            <p class="mt-4 text-sm text-paragraph">Please verify your email before continuing. A verification link was sent to the address you used during registration.</p>
        </div>

        <div class="rounded-[32px] border border-slate-200 bg-white p-8 shadow-card space-y-6">
            @if (session('status') == 'verification-link-sent')
                <div class="rounded-[28px] border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="grid gap-4 sm:grid-cols-2">
                <form method="POST" action="{{ route('verification.send') }}" class="rounded-[28px] border border-slate-200 bg-surface p-6 shadow-sm">
                    @csrf
                    <x-primary-button class="w-full py-3">{{ __('Resend Verification Email') }}</x-primary-button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="rounded-[28px] border border-slate-200 bg-surface p-6 shadow-sm">
                    @csrf
                    <button type="submit" class="btn-secondary w-full">{{ __('Log Out') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
