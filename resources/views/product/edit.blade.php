<x-app-layout>
    <x-slot name="header">
        <div
            class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                <div>
                    <h1
                        class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Editar "{{ $product->title }}"
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Atualize as informações do seu curso</p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('products.show', $product) }}"
                        class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200
                              dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl
                              hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200
                              focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Visualizar
                    </a>

                    <a href="{{ route('products') }}"
                        class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200
                              dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl
                              hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200
                              focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium shadow-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Voltar aos Cursos
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Save Status Alert -->
            <div id="saveAlert" class="hidden mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-green-800 font-medium">Alterações salvas com sucesso!</p>
                </div>
            </div>

            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data"
                id="editForm">
                @csrf
                @method('PUT')

                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <!-- Hero Section with Image -->
                    <div
                        class="relative bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800">
                        <div class="grid lg:grid-cols-2">
                            <!-- Image Section -->
                            <div class="p-8">
                                <h3
                                    class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6 flex items-center gap-3">
                                    <div class="p-2 bg-indigo-100 dark:bg-indigo-900/50 rounded-xl">
                                        <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    Imagem do Curso
                                </h3>

                                <div class="relative group">
                                    <img id="currentImage" src="{{ asset('storage/' . $product->banner) }}"
                                        alt="{{ $product->title }}"
                                        class="w-full h-80 object-cover rounded-xl shadow-lg group-hover:shadow-2xl transition-all duration-300">

                                    <!-- Image Overlay -->
                                    <div
                                        class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 rounded-xl transition-opacity duration-300 flex items-center justify-center">
                                        <button type="button" onclick="document.getElementById('imageInput').click()"
                                            class="bg-white text-gray-900 px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                            Alterar Imagem
                                        </button>
                                    </div>
                                </div>

                                <!-- File Input -->
                                <input type="file" id="imageInput" name="banner" accept="image/*" class="hidden"
                                    onchange="previewNewImage(this)">

                                <!-- Image Upload Area -->
                                <div id="uploadArea"
                                    class="hidden mt-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 text-center hover:border-indigo-400 transition-colors duration-200">
                                    <div
                                        class="mx-auto w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2">Nova imagem selecionada</p>
                                    <button type="button" onclick="cancelImageChange()"
                                        class="text-sm text-red-600 hover:text-red-700">Cancelar</button>
                                </div>
                            </div>

                            <!-- Quick Info -->
                            <div class="p-8 flex flex-col justify-center">
                                <div class="space-y-4">
                                    <div class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>Criado por <strong>{{ $product->user->name }}</strong></span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                        <span>Preço atual: <strong class="text-indigo-600 dark:text-indigo-400">R$
                                                {{ number_format($product->price, 2, ',', '.') }}</strong></span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                        <span>Status: <strong
                                                class="text-green-600 dark:text-green-400">Publicado</strong></span>
                                    </div>
                                    <div class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>{{ rand(50, 300) }} visualizações</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Course Title -->
                            <div class="lg:col-span-2">
                                <label for="title"
                                    class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Título do Curso *
                                </label>
                                <input type="text" id="title" name="title"
                                    value="{{ old('title', $product->title) }}"
                                    class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl
                                              focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                              text-lg font-medium transition-all duration-200"
                                    required>
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price"
                                    class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Preço (R$) *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400 text-lg">R$</span>
                                    </div>
                                    <input type="number" id="price" name="price" step="0.01"
                                        min="0" value="{{ old('price', $product->price) }}"
                                        class="w-full pl-12 pr-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl
                                                  focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                                  text-lg font-medium transition-all duration-200"
                                        required>
                                </div>
                                @error('price')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category"
                                    class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Categoria
                                </label>
                                <select id="category" name="category"
                                    class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl
                                               focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                               text-lg transition-all duration-200">
                                    <option value="">Selecione uma categoria</option>
                                    <option value="programming"
                                        {{ old('category', $product->category ?? '') == 'programming' ? 'selected' : '' }}>
                                        Programação</option>
                                    <option value="design"
                                        {{ old('category', $product->category ?? '') == 'design' ? 'selected' : '' }}>
                                        Design</option>
                                    <option value="marketing"
                                        {{ old('category', $product->category ?? '') == 'marketing' ? 'selected' : '' }}>
                                        Marketing</option>
                                    <option value="business"
                                        {{ old('category', $product->category ?? '') == 'business' ? 'selected' : '' }}>
                                        Negócios</option>
                                    <option value="photography"
                                        {{ old('category', $product->category ?? '') == 'photography' ? 'selected' : '' }}>
                                        Fotografia</option>
                                    <option value="music"
                                        {{ old('category', $product->category ?? '') == 'music' ? 'selected' : '' }}>
                                        Música</option>
                                    <option value="other"
                                        {{ old('category', $product->category ?? '') == 'other' ? 'selected' : '' }}>
                                        Outros</option>
                                </select>
                                @error('category')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Short Description -->
                            <div class="lg:col-span-2">
                                <label for="description"
                                    class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Descrição Curta *
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl
                                                 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                                 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                                 resize-none transition-all duration-200"
                                    required>{{ old('description', $product->description) }}</textarea>
                                <div class="flex justify-between items-center mt-2">
                                    <span id="charCount"
                                        class="text-sm text-gray-500 dark:text-gray-400">{{ strlen($product->description) }}/500
                                        caracteres</span>
                                    @error('description')
                                        <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Long Description -->
                            <div class="lg:col-span-2">
                                <label for="long_description"
                                    class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Descrição Detalhada
                                </label>
                                <textarea id="long_description" name="long_description" rows="6"
                                    class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl
                                                 focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                                 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                                 resize-none transition-all duration-200"
                                    placeholder="Forneça uma descrição mais detalhada do curso...">{{ old('long_description', $product->long_description) }}</textarea>
                                @error('long_description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div
                            class="flex flex-col sm:flex-row gap-4 justify-between mt-12 pt-8 border-t border-gray-200 dark:border-gray-600">
                            <div class="flex gap-3">
                                <!-- Delete Button -->
                                <button type="button" onclick="showDeleteModal()"
                                    class="inline-flex items-center gap-2 px-6 py-3 border border-red-300
                                               text-red-700 bg-white hover:bg-red-50 rounded-xl font-semibold
                                               transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Excluir Curso
                                </button>

                                <!-- Save Draft -->
                                <button type="button" onclick="saveDraft()"
                                    class="inline-flex items-center gap-2 px-6 py-3 border border-gray-300
                                               dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700
                                               hover:bg-gray-50 dark:hover:bg-gray-600 rounded-xl font-semibold
                                               transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Salvar Rascunho
                                </button>
                            </div>

                            <!-- Update Course -->
                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600
                                           hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-3 rounded-xl
                                           font-semibold shadow-lg hover:shadow-xl transform hover:scale-[1.02]
                                           transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Salvar Alterações
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-md w-full">
            <div class="flex items-center gap-4 mb-4">
                <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Excluir Curso</h3>
                    <p class="text-gray-600 dark:text-gray-400">Esta ação não pode ser desfeita.</p>
                </div>
            </div>

            <p class="text-gray-700 dark:text-gray-300 mb-6">
                Tem certeza que deseja excluir o curso "{{ $product->title }}"?
                Todos os dados serão perdidos permanentemente.
            </p>

            <div class="flex gap-3 justify-end">
                <button type="button" onclick="hideDeleteModal()"
                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancelar
                </button>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Sim, Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Loading animation */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid #fff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        // Character counter for description
        document.getElementById('description').addEventListener('input', function(e) {
            const maxLength = 500;
            const currentLength = e.target.value.length;
            const counter = document.getElementById('charCount');

            counter.textContent = `${currentLength}/${maxLength} caracteres`;

            if (currentLength > maxLength * 0.9) {
                counter.classList.add('text-red-500');
                counter.classList.remove('text-gray-500');
            } else {
                counter.classList.remove('text-red-500');
                counter.classList.add('text-gray-500');
            }
        });

        // Image preview functionality
        function previewNewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('currentImage').src = e.target.result;
                    document.getElementById('uploadArea').classList.remove('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function cancelImageChange() {
            document.getElementById('imageInput').value = '';
            document.getElementById('currentImage').src = '{{ asset('storage/' . $product->banner) }}';
            document.getElementById('uploadArea').classList.add('hidden');
        }

        // Delete modal functions
        function showDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Form submission with loading state
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            submitBtn.innerHTML =
                '<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg> Salvando...';
        });

        // Save draft functionality
        function saveDraft() {
            const formData = new FormData(document.getElementById('editForm'));
            formData.append('status', 'draft');

            // Here you would implement the actual save draft functionality
            alert('Funcionalidade de rascunho será implementada em breve!');
        }

        // Auto-save functionality (optional)
        let autoSaveTimer;
        document.getElementById('editForm').addEventListener('input', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                console.log('Auto-saving...');
                // Auto-save logic here
            }, 10000); // Save every 10 seconds
        });

        // Show save success message if redirected after update
        @if (session('success'))
            document.getElementById('saveAlert').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('saveAlert').classList.add('hidden');
            }, 5000);
        @endif
    </script>
</x-app-layout>
