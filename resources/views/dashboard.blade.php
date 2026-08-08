<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-xl font-semibold text-heading">{{ __('Dashboard') }}</h2>
            <p class="text-sm text-muted">Welcome back! Your account is ready and your workspace is set up.</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-card">
                <div class="p-8 text-heading">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
