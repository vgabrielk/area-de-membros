<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                        Olá, {{ $user->name }}! 👋
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">Bem-vindo de volta ao seu painel de controle</p>
                    <div class="flex items-center gap-4 mt-3 text-sm text-gray-600 dark:text-gray-400">

                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                            <span>Sistema online</span>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    @hasrole('creator')
                    <a href="{{ route('products.create') }}"
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600
                              hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-2.5 rounded-xl
                              font-semibold text-sm shadow-lg hover:shadow-xl
                              transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Criar Curso
                    </a>
                    @endhasrole
                    <a href="{{ route('products') }}"
                       class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200
                              dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl
                              hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200
                              focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Ver Cursos
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 space-y-8">

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Products -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl p-6 border border-blue-200/50 dark:border-blue-800/50 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-500 rounded-xl group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-1">{{ $totalProducts }}</h3>
                    <p class="text-blue-600/80 dark:text-blue-400/80 text-sm font-medium">Cursos Criados</p>
                </div>

                <!-- Total Students -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-100 dark:from-purple-900/20 dark:to-pink-900/20 rounded-2xl p-6 border border-purple-200/50 dark:border-purple-800/50 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-500 rounded-xl group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-purple-600 dark:text-purple-400 mb-1">{{ number_format($totalStudents) }}</h3>
                    <p class="text-purple-600/80 dark:text-purple-400/80 text-sm font-medium">Alunos Totais</p>
                </div>

                <!-- Revenue -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl p-6 border border-green-200/50 dark:border-green-800/50 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-500 rounded-xl group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-green-600 dark:text-green-400 mb-1">R$ {{ number_format($totalRevenue, 2, ',', '.') }}</h3>
                    <p class="text-green-600/80 dark:text-green-400/80 text-sm font-medium">Receita Total</p>
                </div>

            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <!-- Recent Products - Takes 2 columns on xl screens -->
                @if($recentProducts->count() > 0)
                <div class="xl:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-3">
                            <div class="p-2 bg-green-100 dark:bg-green-900/50 rounded-xl">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            Seus Cursos Recentes
                        </h2>
                        <a href="{{ route('products') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 text-sm font-medium">
                            Ver todos →
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($recentProducts as $product)
                            <div class="flex flex-col p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                                <div class="flex items-start gap-4 mb-3">
                                    <img src="{{ asset('storage/' . $product->banner) }}"
                                         class="w-16 h-16 object-cover rounded-lg shadow-sm group-hover:shadow-md transition-shadow"
                                         alt="{{ $product->title }}">

                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors line-clamp-2">
                                            {{ $product->title }}
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-2">
                                            {{ Str::limit($product->description, 60) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-auto">
                                    <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-500">
                                        <span>{{ $product->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                        R$ {{ number_format($product->price, 2, ',', '.') }}
                                    </div>
                                </div>

                                <div class="flex gap-2 mt-3">
                                    <a href="{{ route('products.show', $product) }}"
                                       class="flex-1 flex items-center justify-center gap-2 p-2 bg-white dark:bg-gray-600 border border-gray-200 dark:border-gray-500 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-500 transition-colors text-sm">
                                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Ver
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}"
                                       class="flex-1 flex items-center justify-center gap-2 p-2 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-lg hover:bg-indigo-200 dark:hover:bg-indigo-900 transition-colors text-sm">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Editar
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Sidebar Content - Takes 1 column on xl screens -->
                <div class="xl:col-span-1 space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center gap-2">
                            <div class="p-1.5 bg-yellow-100 dark:bg-yellow-900/50 rounded-lg">
                                <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            Ações Rápidas
                        </h3>

                        <div class="space-y-3">
                            <a href="{{ route('products.create') }}"
                               class="w-full flex items-center gap-3 p-3 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20
                                      hover:from-indigo-100 hover:to-purple-100 dark:hover:from-indigo-900/40 dark:hover:to-purple-900/40
                                      rounded-xl transition-all duration-200 group border border-indigo-200/50 dark:border-indigo-800/50">
                                <div class="p-2 bg-indigo-100 dark:bg-indigo-800 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-gray-100 font-medium">Criar Novo Curso</span>
                            </a>

                            <a href="{{ route('products') }}"
                               class="w-full flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700
                                      rounded-xl transition-all duration-200 group">
                                <div class="p-2 bg-gray-200 dark:bg-gray-600 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-gray-100 font-medium">Gerenciar Cursos</span>
                            </a>

                            <button onclick="window.print()"
                                    class="w-full flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700
                                           rounded-xl transition-all duration-200 group">
                                <div class="p-2 bg-gray-200 dark:bg-gray-600 rounded-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-gray-100 font-medium">Gerar Relatório</span>
                            </button>
                        </div>
                    </div>

                    <!-- Popular Courses -->
                    @if($popularProducts->count() > 0)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center gap-2">
                            <div class="p-1.5 bg-orange-100 dark:bg-orange-900/50 rounded-lg">
                                <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            Cursos Populares
                        </h3>

                        <div class="space-y-3">
                            @foreach($popularProducts->take(4) as $product)
                                <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                                    <img src="{{ asset('storage/' . $product->banner) }}"
                                         class="w-12 h-12 object-cover rounded-lg"
                                         alt="{{ $product->title }}">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                            {{ Str::limit($product->title, 30) }}
                                        </h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-500">{{ $product->user->name }}</p>
                                        <div class="flex text-yellow-400 text-xs mt-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3 h-3 {{ $i <= 4 ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">
                                            R$ {{ number_format($product->price, 0) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('products') }}" class="w-full mt-4 p-2 text-sm text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 rounded-lg transition-colors text-center block">
                            Ver todos os cursos
                        </a>
                    </div>
                    @endif

                </div>
            </div>

            <!-- Quick Tips Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-8">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6 flex items-center gap-3">
                    <div class="p-2 bg-yellow-100 dark:bg-yellow-900/50 rounded-xl">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    Dicas Rápidas
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl border-l-4 border-blue-500">
                        <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">💡 Dica de Engajamento</h4>
                        <p class="text-sm text-blue-700 dark:text-blue-300">Adicione quizzes interativos para aumentar o engajamento dos alunos em 40%.</p>
                    </div>
                    
                    <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-xl border-l-4 border-green-500">
                        <h4 class="font-semibold text-green-900 dark:text-green-100 mb-2">📈 Otimização de Preço</h4>
                        <p class="text-sm text-green-700 dark:text-green-300">Cursos com preços entre R$ 50-150 têm maior taxa de conversão.</p>
                    </div>
                    
                    <div class="p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl border-l-4 border-purple-500">
                        <h4 class="font-semibold text-purple-900 dark:text-purple-100 mb-2">🎯 Marketing</h4>
                        <p class="text-sm text-purple-700 dark:text-purple-300">Compartilhe seus cursos nas redes sociais para alcançar mais alunos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        // Dashboard interactions
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard loaded successfully');
        });

        // Real-time updates animation removed
    </script>
</x-app-layout>
