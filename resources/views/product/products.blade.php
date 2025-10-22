<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                <div>
                    <h1
                        class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ __('Lista de cursos') }}
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Descubra cursos incríveis criados por especialistas
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Search Bar -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Buscar cursos..."
                            class="pl-10 pr-4 py-2.5 w-64 border border-gray-200 dark:border-gray-700 rounded-xl
                                      bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm
                                      focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                      transition-all duration-200 text-sm"
                            id="searchInput">
                    </div>

                    <!-- Create Course Button -->
                    @hasrole('creator')
                        <a href="{{ route('products.create') }}"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600
                              hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-2.5 rounded-xl
                              font-semibold text-sm shadow-lg hover:shadow-xl transform hover:scale-105
                              transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            {{ __('Criar Curso') }}
                        </a>
                    @endhasrole
                    <!-- Filter Toggle -->
                    <button onclick="toggleFilters()"
                        class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200
                                   dark:border-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2.5 rounded-xl
                                   hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z" />
                        </svg>
                        Filtros
                    </button>
                </div>
            </div>

            <!-- Filters Panel -->
            <div id="filtersPanel"
                class="hidden mt-6 p-4 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preço</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500">
                            <option>Todos os preços</option>
                            <option>Gratuito</option>
                            <option>Até R$ 50</option>
                            <option>R$ 50 - R$ 200</option>
                            <option>Acima de R$ 200</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Categoria</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500">
                            <option>Todas as categorias</option>
                            <option>Programação</option>
                            <option>Design</option>
                            <option>Marketing</option>
                            <option>Negócios</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ordenar
                            por</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500">
                            <option>Mais recentes</option>
                            <option>Mais populares</option>
                            <option>Menor preço</option>
                            <option>Maior preço</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $products->links() }}
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900/20 dark:to-indigo-900/20 p-6 rounded-2xl border border-blue-200/50 dark:border-blue-800/50">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-500 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $products->total() }}</p>
                            <p class="text-sm text-blue-600/80 dark:text-blue-400/80">Cursos Disponíveis</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900/20 dark:to-emerald-900/20 p-6 rounded-2xl border border-green-200/50 dark:border-green-800/50">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-500 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                {{ $products->pluck('user_id')->unique()->count() }}</p>
                            <p class="text-sm text-green-600/80 dark:text-green-400/80">Instrutores Ativos</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-purple-50 to-pink-100 dark:from-purple-900/20 dark:to-pink-900/20 p-6 rounded-2xl border border-purple-200/50 dark:border-purple-800/50">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-purple-500 rounded-xl">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:scale-[1.02] course-card"
                        data-title="{{ strtolower($product->title) }}"
                        data-description="{{ strtolower($product->description) }}"
                        data-author="{{ strtolower($product->user->name) }}">

                        <!-- Image Container -->
                        <div
                            class="relative overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800">
                            <img src="{{ asset('storage/' . $product->banner) }}" alt="{{ $product->title }}"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500 ease-out">

                            <!-- Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <!-- Quick Actions -->
                            <div
                                class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="flex gap-2">
                                    <button
                                        class="p-2 bg-white/90 hover:bg-white text-gray-700 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                    <button
                                        class="p-2 bg-white/90 hover:bg-white text-gray-700 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Price Badge -->
                            <div class="absolute bottom-3 left-3">
                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-bold bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg">
                                    R$ {{ number_format($product->price, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Author Info -->
                            <div class="flex items-center gap-3 mb-3">
                                <div
                                    class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span
                                        class="text-white text-sm font-semibold">{{ substr($product->user->name, 0, 1) }}</span>
                                </div>
                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $product->user->name }}</span>
                            </div>

                            <!-- Title -->
                            <h3
                                class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200">
                                {{ $product->title }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2 leading-relaxed">
                                {{ Str::limit($product->description, 90) }}
                            </p>

                            <!-- Action Button -->
                            <a href="{{ route('products.show', $product->id) }}"
                                class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600
                                      hover:from-indigo-700 hover:to-purple-700 text-white px-4 py-3 rounded-xl
                                      font-semibold text-sm shadow-lg hover:shadow-xl transform hover:scale-[1.02]
                                      transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Ver Detalhes
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-16">
                    <div class="max-w-sm mx-auto">
                        <div
                            class="w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Nenhum curso encontrado
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Seja o primeiro a criar um curso incrível!</p>
                        <a href="{{ route('products.create') }}"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Criar Primeiro Curso
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

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

        .course-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .course-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .course-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .course-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .course-card:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const courseCards = document.querySelectorAll('.course-card');

            courseCards.forEach(card => {
                const title = card.dataset.title;
                const description = card.dataset.description;
                const author = card.dataset.author;

                if (title.includes(searchTerm) || description.includes(searchTerm) || author.includes(
                        searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Toggle filters
        function toggleFilters() {
            const filtersPanel = document.getElementById('filtersPanel');
            filtersPanel.classList.toggle('hidden');
        }

        // Add loading states for better UX
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.course-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</x-app-layout>
