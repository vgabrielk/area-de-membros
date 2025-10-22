<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4">
                <div class="flex-1">
                    <nav class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400 mb-4">
                        <a href="{{ route('products') }}"
                            class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Cursos</a>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-900 dark:text-gray-100 font-medium">{{ $product->title }}</span>
                    </nav>

                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-gray-100 mb-3 leading-tight">
                        {{ $product->title }}
                    </h1>

                    <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span
                                    class="text-white text-sm font-semibold">{{ substr($product->user->name, 0, 1) }}</span>
                            </div>
                            <span>Por <strong
                                    class="text-gray-900 dark:text-gray-100">{{ $product->user->name }}</strong></span>
                        </div>

                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Última atualização: {{ $product->updated_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    @php
                        $auth = Auth::user();
                        $userId = $product->user->id;
                    @endphp

                    @if ($userId === $auth->id)
                        <a href="{{ route('products.edit', $product) }}"
                            class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200
                                  dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl
                                  hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Editar Curso
                        </a>
                    @endif

                    <button onclick="shareProduct()"
                        class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200
                                   dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl
                                   hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                        </svg>
                        Compartilhar
                    </button>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Course Image -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $product->banner) }}" alt="{{ $product->title }}"
                                class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-500">

                            <!-- Play Button Overlay -->
                            <div
                                class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <button
                                    class="w-20 h-20 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-2xl hover:shadow-3xl transform hover:scale-110 transition-all duration-200">
                                    <svg class="w-8 h-8 text-indigo-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Course Badge -->
                            <div class="absolute top-4 left-4">
                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-green-600 to-emerald-600 text-white shadow-lg">
                                    ✓ Curso Completo
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Course Description -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 dark:bg-indigo-900/50 rounded-xl">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            Sobre este curso
                        </h2>

                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg mb-6">
                                {{ $product->description }}
                            </p>

                            @if ($product->long_description)
                                <div class="border-t border-gray-200 dark:border-gray-600 pt-6">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Descrição
                                        Detalhada</h3>
                                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                        {{ $product->long_description }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 flex items-center gap-3">
                            <div class="p-2 bg-purple-100 dark:bg-purple-900/50 rounded-xl">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </div>
                            Conteúdo do Curso
                        </h2>

                        <div class="space-y-4">
                            @php
                                $modules = [
                                    [
                                        'title' => 'Introdução e Conceitos Básicos',
                                        'lessons' => 5,
                                        'duration' => '1h 30min',
                                    ],
                                    ['title' => 'Desenvolvimento Prático', 'lessons' => 8, 'duration' => '2h 45min'],
                                    ['title' => 'Técnicas Avançadas', 'lessons' => 6, 'duration' => '2h 15min'],
                                    ['title' => 'Projeto Final e Conclusão', 'lessons' => 4, 'duration' => '1h 20min'],
                                ];
                            @endphp

                            @foreach ($modules as $index => $module)
                                <div
                                    class="border border-gray-200 dark:border-gray-600 rounded-xl p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-8 h-8 bg-indigo-100 dark:bg-indigo-900/50 rounded-lg flex items-center justify-center">
                                                <span
                                                    class="text-indigo-600 dark:text-indigo-400 font-semibold text-sm">{{ $index + 1 }}</span>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900 dark:text-gray-100">
                                                    {{ $module['title'] }}</h3>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $module['lessons'] }} aulas • {{ $module['duration'] }}</p>
                                            </div>
                                        </div>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Purchase Card -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-8 sticky top-6">
                        <!-- Price -->
                        <div class="text-center mb-8">
                            <div
                                class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                R$ {{ number_format($product->price, 2, ',', '.') }}
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Acesso vitalício ao curso</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <button onclick="purchaseCourse()"
                                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700
                                           text-white px-6 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl
                                           transform hover:scale-[1.02] transition-all duration-200
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                🚀 Comprar Agora
                            </button>

                            <button onclick="addToWishlist()"
                                class="w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600
                                           text-gray-700 dark:text-gray-300 px-6 py-3 rounded-xl font-semibold
                                           hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200
                                           focus:outline-none focus:ring-2 focus:ring-gray-500">
                                ♥️ Adicionar à Lista de Desejos
                            </button>
                        </div>

                        <!-- Features -->

                        <!-- Money Back Guarantee -->
                        <div
                            class="mt-6 p-4 bg-green-50 dark:bg-green-900/20 rounded-xl border border-green-200 dark:border-green-800">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-green-800 dark:text-green-300 font-semibold text-sm">Garantia de 30
                                        dias</p>
                                    <p class="text-green-700 dark:text-green-400 text-xs">Satisfação garantida ou seu
                                        dinheiro de volta</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div id="shareModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-md w-full">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Compartilhar Curso</h3>
                <button onclick="closeShareModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="space-y-4">
                <div class="flex gap-4">
                    <button onclick="shareToSocial('facebook')"
                        class="flex-1 bg-blue-600 text-white p-3 rounded-xl hover:bg-blue-700 transition-colors">
                        Facebook
                    </button>
                    <button onclick="shareToSocial('twitter')"
                        class="flex-1 bg-sky-500 text-white p-3 rounded-xl hover:bg-sky-600 transition-colors">
                        Twitter
                    </button>
                    <button onclick="shareToSocial('linkedin')"
                        class="flex-1 bg-blue-700 text-white p-3 rounded-xl hover:bg-blue-800 transition-colors">
                        LinkedIn
                    </button>
                </div>

                <div class="border-t pt-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Link do
                        curso:</label>
                    <div class="flex gap-2">
                        <input type="text" id="courseUrl" value="{{ url()->current() }}" readonly
                            class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm">
                        <button onclick="copyToClipboard()"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors text-sm">
                            Copiar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .prose {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <script>
        // Purchase course
        function purchaseCourse() {
            // Here you would implement the actual purchase logic
            alert('🎉 Redirecionando para o checkout... Funcionalidade de pagamento será implementada em breve!');
        }

        // Add to wishlist
        function addToWishlist() {
            // Here you would implement wishlist functionality
            alert('♥️ Adicionado à lista de desejos! Funcionalidade será implementada em breve.');
        }

        // Share functionality
        function shareProduct() {
            document.getElementById('shareModal').classList.remove('hidden');
        }

        function closeShareModal() {
            document.getElementById('shareModal').classList.add('hidden');
        }

        function shareToSocial(platform) {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent('{{ $product->title }}');
            const description = encodeURIComponent('{{ $product->description }}');

            let shareUrl;

            switch (platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
                    break;
            }

            window.open(shareUrl, '_blank', 'width=600,height=400');
        }

        function copyToClipboard() {
            const urlInput = document.getElementById('courseUrl');
            urlInput.select();
            document.execCommand('copy');

            // Show feedback
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Copiado!';
            button.classList.add('bg-green-600');
            button.classList.remove('bg-indigo-600');

            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-indigo-600');
            }, 2000);
        }

        // Close modal when clicking outside
        document.getElementById('shareModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeShareModal();
            }
        });

        // Add smooth scrolling for internal links
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation to elements
            const elements = document.querySelectorAll('.bg-white, .prose');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</x-app-layout>
