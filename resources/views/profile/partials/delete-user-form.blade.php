<section class="card-padded !border-danger-100 bg-danger-50/40">
    <header>
        <h2 class="text-lg font-bold text-danger-700">{{ __('Delete Account') }}</h2>
        <p class="mt-1 text-sm text-paragraph">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="mt-6">
        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="btn-danger">
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="card-padded space-y-5">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-heading">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-sm text-paragraph">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="field-group">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password" class="mt-1" placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="btn-secondary">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="btn-danger">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
