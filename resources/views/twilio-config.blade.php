<x-app-layout>
    <div class="flex h-screen bg-gray-50">
        <!-- Mobile menu button -->
        <div class="lg:hidden fixed top-4 left-4 z-50">
            <button id="mobile-menu-button" class="p-2 bg-white rounded-lg shadow-md">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Sidebar Overlay -->
        <div id="sidebar-overlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-30 hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 w-64 bg-white border-r border-gray-200 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900">Push Manager</h1>
                        <p class="text-xs text-gray-500">Yeswecange</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>
                <a href="{{ route('contacts.index') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="font-medium text-sm">Gestion des Contacts</span>
                </a>
                <a href="{{ route('twilio.config') }}" class="flex items-center px-4 py-3 text-gray-900 bg-indigo-50 rounded-lg group">
                    <svg class="w-5 h-5 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="font-medium text-sm">Config chaîne</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-100">
                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto lg:ml-0">
            <!-- Header -->
            <header class="bg-white border-b border-gray-100">
                <div class="flex items-center justify-between px-4 lg:px-8 py-4 lg:py-5">
                    <div class="lg:ml-0 ml-12">
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900">Configuration de la chaîne</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Configurez les identifiants de votre chaîne WhatsApp</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="text-right mr-4 hidden sm:block">
                            <p class="text-xs text-gray-500">{{ now()->format('d/m/Y') }}</p>
                            <p class="text-sm font-medium text-gray-700">{{ now()->format('H:i') }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-3 py-2 lg:px-4 lg:py-2 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition flex items-center">
                                <svg class="w-4 h-4 mr-1 lg:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="hidden sm:inline">Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-4 lg:p-8">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="p-4 mb-6 bg-green-50 border border-green-200 rounded-xl flex items-center animate-fade-in">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-green-900 font-medium text-sm flex-1">{{ session('success') }}</p>
                        <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 ml-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- Error Message -->
                @if(session('error'))
                    <div class="p-4 mb-6 bg-red-50 border border-red-200 rounded-xl flex items-center animate-fade-in">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-red-900 font-medium text-sm flex-1">{{ session('error') }}</p>
                        <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 ml-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
                    <!-- Configuration Form -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl border border-gray-100 p-4 lg:p-8">
                            <h3 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 lg:mb-6">Configuration de la chaîne</h3>

                            <form method="POST" action="{{ route('twilio.saveConfig') }}">
                                @csrf

                                <div class="space-y-4 lg:space-y-6">
                                    <!-- Account SID -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Account SID *
                                        </label>
                                        <input type="text" name="account_sid" required
                                               value="{{ old('account_sid', $config->account_sid ?? '') }}"
                                               placeholder="ACxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                               class="w-full px-3 lg:px-4 py-2 lg:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                        <p class="text-xs text-gray-500 mt-1">
                                            Trouvable dans votre dashboard Twilio
                                        </p>
                                    </div>

                                    <!-- Auth Token -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Auth Token *
                                        </label>
                                        <input type="password" name="auth_token" required
                                               value="{{ old('auth_token', $config->auth_token ?? '') }}"
                                               placeholder="Votre token d'authentification"
                                               class="w-full px-3 lg:px-4 py-2 lg:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                        <p class="text-xs text-gray-500 mt-1">
                                            Gardez cette information secrète
                                        </p>
                                    </div>

                                    <!-- Content SID -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Content SID *
                                        </label>
                                        <input type="text" name="content_sid" required
                                               value="{{ old('content_sid', $config->content_sid ?? '') }}"
                                               placeholder="HXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                               class="w-full px-3 lg:px-4 py-2 lg:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                        <p class="text-xs text-gray-500 mt-1">
                                            ID de votre template WhatsApp approuvé
                                        </p>
                                    </div>

                                    <!-- From Number (Messaging Service) -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Messaging Service SID *
                                        </label>
                                        <input type="text" name="from_number" required
                                               value="{{ old('from_number', $config->from_number ?? '') }}"
                                               placeholder="MGxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                               class="w-full px-3 lg:px-4 py-2 lg:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                        <p class="text-xs text-gray-500 mt-1">
                                            ID de votre Messaging Service Twilio
                                        </p>
                                    </div>

                                    <div class="pt-2 lg:pt-4">
                                        <button type="submit"
                                                class="w-full px-4 lg:px-6 py-2.5 lg:py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-sm lg:text-base">
                                            Enregistrer la configuration
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="space-y-4 lg:space-y-6">
                        <!-- Guide -->
                        {{-- <div class="bg-white rounded-xl border border-gray-100 p-4 lg:p-6">
                            <h4 class="text-base lg:text-lg font-bold text-gray-900 mb-3 lg:mb-4">Guide d'installation</h4>

                            <div class="space-y-3 lg:space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                                        1
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Twilio Console</p>
                                        <p class="text-xs text-gray-600 mt-0.5">
                                            Connectez-vous à votre compte Twilio
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                                        2
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Account SID & Auth Token</p>
                                        <p class="text-xs text-gray-600 mt-0.5">
                                            Disponibles sur la page d'accueil de la console
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                                        3
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Content SID</p>
                                        <p class="text-xs text-gray-600 mt-0.5">
                                            Créez un template WhatsApp dans Content API
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                                        4
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Messaging Service</p>
                                        <p class="text-xs text-gray-600 mt-0.5">
                                            Créez un service et ajoutez votre numéro WhatsApp
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Current Configuration -->
                        @if($config)
                        <div class="bg-green-50 border border-green-200 rounded-xl p-4 lg:p-6">
                            <div class="flex items-center mb-2 lg:mb-3">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <h4 class="text-base lg:text-lg font-bold text-green-900">Configuration Active</h4>
                            </div>

                            <div class="space-y-1 lg:space-y-2 text-xs lg:text-sm">
                                <div class="flex justify-between">
                                    <span class="text-green-700">Account SID:</span>
                                    <span class="text-green-900 font-mono text-xs">{{ substr($config->account_sid, 0, 10) }}...</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-green-700">Content SID:</span>
                                    <span class="text-green-900 font-mono text-xs">{{ substr($config->content_sid, 0, 10) }}...</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-green-700">From Number:</span>
                                    <span class="text-green-900 font-mono text-xs">{{ substr($config->from_number, 0, 10) }}...</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-green-700">Dernière mise à jour:</span>
                                    <span class="text-green-900 text-xs lg:text-sm">{{ $config->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 lg:p-6">
                            <div class="flex items-center mb-2 lg:mb-3">
                                <svg class="w-5 h-5 text-yellow-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <h4 class="text-base lg:text-lg font-bold text-yellow-900">Configuration Requise</h4>
                            </div>
                            <p class="text-xs lg:text-sm text-yellow-800">
                                Aucune configuration Twilio active. Veuillez remplir le formulaire pour activer l'envoi de messages WhatsApp.
                            </p>
                        </div>
                        @endif

                        <!-- Test Connection -->
                        @if($config)
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 lg:p-6">
                            <h4 class="text-base lg:text-lg font-bold text-blue-900 mb-2 lg:mb-3">Tester la connexion</h4>
                            <p class="text-xs lg:text-sm text-blue-800 mb-3 lg:mb-4">
                                Vérifiez que votre configuration fonctionne correctement.
                            </p>
                            <a href="{{ route('contacts.index') }}"
                               class="w-full px-4 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition text-center block">
                                Tester avec un envoi
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            }

            mobileMenuButton.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            // Close sidebar when clicking on a link (mobile)
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
    </style>
</x-app-layout>
