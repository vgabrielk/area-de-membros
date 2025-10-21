<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4">
            <div id="creatorCard"
                class="cursor-pointer border-2 rounded-lg p-6 mt-8 text-center bg-white transition-transform transform hover:scale-102"
                onclick="selectCard('creator')">
                <h2 class="text-xl font-semibold mb-2">Criador de Curso</h2>
                <p>Quero criar e vender meus cursos na plataforma.</p>
            </div>

            <div id="memberCard"
                class="cursor-pointer border-2 rounded-lg p-6 text-center bg-white transition-transform transform hover:scale-102"
                onclick="selectCard('member')">
                <h2 class="text-xl font-semibold mb-2">Membro</h2>
                <p>Quero aprender e participar dos cursos disponíveis.</p>
            </div>
        </div>
        <input type="hidden" name="role" id="roleInput"/>


        <div class="flex items-center justify-between mt-6">
            <a class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/20 rounded-lg px-2 py-1 transition-all duration-200 ease-in-out"
                href="{{ route('auth.view') }}">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    let selected = null;

    function selectCard(type) {
        const creatorCard = document.getElementById('creatorCard');
        const memberCard = document.getElementById('memberCard');
        const roleInput = document.getElementById('roleInput');

        if (type === 'creator') {
            selected = 'creator';
            creatorCard.classList.add('border-blue-500', 'bg-blue-50');
            memberCard.classList.remove('border-blue-500', 'bg-blue-50');
        } else {
            selected = 'member';
            memberCard.classList.add('border-blue-500', 'bg-blue-50');
            creatorCard.classList.remove('border-blue-500', 'bg-blue-50');
        }

        roleInput.value = selected;
    }
</script>
