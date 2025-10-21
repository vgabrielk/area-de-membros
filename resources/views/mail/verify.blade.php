<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm text-center">
        <svg class="mx-auto mb-4 w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 12H8m8 0l-4-4m4 4l-4 4M12 20v-8m0 0L8 12m4 0l4-4" />
        </svg>

        <h2 class="text-2xl font-semibold mb-2">Confirme seu e-mail</h2>

        <p class="text-gray-600 mb-4">
            Para ativar sua conta e começar a usar o sistema, clique no botão abaixo para confirmar seu endereço de
            e-mail.
        </p>

        <a href="{{ route('confirmar.email', ['token' => $token]) }}"
            class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Confirmar e-mail
        </a>

        <p class="mt-4 text-sm text-gray-500">
            Não recebeu o e-mail? <a href="{{ route('reenviar.email') }}"
                class="text-blue-500 hover:underline">Reenviar</a>
        </p>
    </div>
</div>
