<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 -mx-6 -mt-6 px-6 pt-6 pb-8">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ __('Criar Novo Curso') }}
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Compartilhe seu conhecimento com o mundo</p>
                </div>

                <a href="{{ route('products') }}"
                   class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200 
                          dark:border-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2.5 rounded-xl 
                          hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm font-medium shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Voltar aos Cursos
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress Steps -->
            <div class="mb-12">
                
               
            </div>

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" id="courseForm">
                    @csrf

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <!-- Image Upload Section -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-8 border-b border-gray-200 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6 flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 dark:bg-indigo-900/50 rounded-xl">
                                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            Imagem do Curso
                        </h3>
                        
                        <!-- Image Upload Area -->
                        <div class="relative">
                            <div id="imagePreview" class="hidden mb-6">
                                <div class="relative inline-block">
                                    <img id="previewImg" class="w-full max-w-md h-64 object-cover rounded-xl shadow-lg" alt="Preview">
                                    <button type="button" onclick="removeImage()" 
                                            class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1.5 shadow-lg transition-all duration-200 hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <div id="uploadArea" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200 cursor-pointer bg-white dark:bg-gray-700" onclick="document.getElementById('banner').click()">
                                <div class="mx-auto w-16 h-16 bg-indigo-100 dark:bg-indigo-900/50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Adicione uma imagem atrativa</h4>
                                <p class="text-gray-600 dark:text-gray-400 mb-4">Arraste e solte ou clique para selecionar</p>
                                <p class="text-sm text-gray-500 dark:text-gray-500">PNG, JPG, WEBP até 2MB</p>
                                
                                <input type="file" id="banner" name="banner" accept="image/*" class="hidden" required onchange="previewImage(this)">
                            </div>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Course Title -->
                            <div class="lg:col-span-2">
                                <label for="title" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Título do Curso *
                                </label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title') }}"
                                       class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl 
                                              focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                                              bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                                              text-lg font-medium transition-all duration-200"
                                       placeholder="Ex: Curso Completo de Laravel para Iniciantes"
                                       required>
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Preço (R$) *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400 text-lg">R$</span>
                                    </div>
                                    <input type="number" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price') }}"
                                           step="0.01" 
                                           min="0"
                                           class="w-full pl-12 pr-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl 
                                                  focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                                                  bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                                                  text-lg font-medium transition-all duration-200"
                                           placeholder="99.90"
                                           required>
                                </div>
                                @error('price')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Categoria
                                </label>
                                <select id="category" 
                                        name="category" 
                                        class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl 
                                               focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                                               bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                                               text-lg transition-all duration-200">
                                    <option value="">Selecione uma categoria</option>
                                    <option value="programming">Programação</option>
                                    <option value="design">Design</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="business">Negócios</option>
                                    <option value="photography">Fotografia</option>
                                    <option value="music">Música</option>
                                    <option value="other">Outros</option>
                                </select>
                                @error('category')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="lg:col-span-2">
                                <label for="description" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Descrição Curta *
                                </label>
                                <textarea id="description" 
                                          name="description" 
                                          rows="4" 
                                          class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl 
                                                 focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                                                 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                                                 resize-none transition-all duration-200"
                                          placeholder="Descreva brevemente o que os alunos aprenderão neste curso..."
                                          required>{{ old('description') }}</textarea>
                                <div class="flex justify-between items-center mt-2">
                                    <span id="charCount" class="text-sm text-gray-500 dark:text-gray-400">0/500 caracteres</span>
                                    @error('description')
                                        <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Long Description -->
                            <div class="lg:col-span-2">
                                <label for="long_description" class="block text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                                    Descrição Detalhada
                                </label>
                                <textarea id="long_description" 
                                          name="long_description" 
                                          rows="6" 
                                          class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-xl 
                                                 focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                                                 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 
                                                 resize-none transition-all duration-200"
                                          placeholder="Forneça uma descrição mais detalhada do curso, incluindo pré-requisitos, o que será abordado, e como os alunos se beneficiarão...">{{ old('long_description') }}</textarea>
                                @error('long_description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-end mt-12 pt-8 border-t border-gray-200 dark:border-gray-600">
                            <!-- Save as Draft -->
                            <button type="button" 
                                    onclick="saveDraft()"
                                    class="inline-flex items-center justify-center gap-2 px-6 py-3 border border-gray-300 
                                           dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 
                                           rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 font-semibold 
                                           transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Salvar Rascunho
                            </button>
                            
                            <!-- Create Course -->
                        <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 
                                           hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-3 rounded-xl 
                                           font-semibold shadow-lg hover:shadow-xl transform hover:scale-[1.02] 
                                           transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Criar Curso
                        </button>
                        </div>
                    </div>
                    </div>
                </form>
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
        
        /* Image preview animations */
        #imagePreview {
            animation: fadeInUp 0.5s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                    document.getElementById('uploadArea').classList.add('hidden');
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function removeImage() {
            document.getElementById('banner').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('uploadArea').classList.remove('hidden');
        }
        
        // Drag and drop functionality
        const uploadArea = document.getElementById('uploadArea');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight(e) {
            uploadArea.classList.add('border-indigo-400', 'bg-indigo-50');
        }
        
        function unhighlight(e) {
            uploadArea.classList.remove('border-indigo-400', 'bg-indigo-50');
        }
        
        uploadArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                document.getElementById('banner').files = files;
                previewImage(document.getElementById('banner'));
            }
        }
        
        // Form submission with loading state
        document.getElementById('courseForm').addEventListener('submit', function(e) {
            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Criando...';
        });
        
        // Save draft functionality
        function saveDraft() {
            const formData = new FormData(document.getElementById('courseForm'));
            formData.append('status', 'draft');
            
            // Here you would implement the actual save draft functionality
            alert('Funcionalidade de rascunho será implementada em breve!');
        }
        
        // Auto-save functionality (optional)
        let autoSaveTimer;
        document.getElementById('courseForm').addEventListener('input', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                // Auto-save logic here
                console.log('Auto-saving...');
            }, 5000);
        });
    </script>
</x-app-layout>
