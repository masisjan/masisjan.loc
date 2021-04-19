<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Շնորհակալություն գրանցվելու համար: Սկսելուց առաջ կարո՞ղ եք հաստատել ձեր էլ. Փոստի հասցեն ՝ սեղմելով այն հղմանը, որը մենք այս պահին ուղարկել ենք ձեզ էլ․ փոստով: Եթե չեք ստացել, մենք սիրով մեկ անգամ էլ կուղարկենք: ') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Մեկ անգամ էլ ուղարկել') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Դուրս գալ') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
