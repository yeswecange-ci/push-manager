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
                    <span class="font-medium text-sm">Config chaînes</span>
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
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900">Configuration des chaînes</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Gérez vos différentes chaînes WhatsApp</p>
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

                <div class="grid grid-cols-1 gap-6 lg:gap-8">
                    <!-- Liste des chaînes existantes -->
                    @if($configs->isNotEmpty())
                    <div class="bg-white rounded-xl border border-gray-100 p-4 lg:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg lg:text-xl font-bold text-gray-900">Chaînes WhatsApp configurées</h3>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-medium rounded-full">
                                {{ $configs->count() }} chaîne{{ $configs->count() > 1 ? 's' : '' }}
                            </span>
                        </div>

                        <div class="space-y-4">
                            @foreach($configs as $config)
                            <div class="border border-gray-200 rounded-xl p-4 lg:p-6 {{ $config->is_active ? 'bg-green-50 border-green-300' : 'bg-white' }} transition-all hover:shadow-md">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <h4 class="text-base lg:text-lg font-bold text-gray-900">{{ $config->channel_name }}</h4>
                                            @if($config->is_active)
                                            <span class="px-2 py-1 bg-green-600 text-white text-xs font-medium rounded-full flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                Active
                                            </span>
                                            @else
                                            <span class="px-2 py-1 bg-gray-200 text-gray-600 text-xs font-medium rounded-full">
                                                Inactive
                                            </span>
                                            @endif
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                            <div>
                                                <span class="text-gray-600">Account SID:</span>
                                                <span class="text-gray-900 font-mono text-xs ml-2">{{ substr($config->account_sid, 0, 10) }}...</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-600">Content SID:</span>
                                                <span class="text-gray-900 font-mono text-xs ml-2">{{ substr($config->content_sid, 0, 10) }}...</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-600">From Number:</span>
                                                <span class="text-gray-900 font-mono text-xs ml-2">{{ substr($config->from_number, 0, 10) }}...</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-600">Dernière mise à jour:</span>
                                                <span class="text-gray-900 text-xs ml-2">{{ $config->updated_at->format('d/m/Y H:i') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col space-y-2 ml-4">
                                        <!-- Bouton Modifier (toujours disponible) -->
                                        <button onclick="openEditModal({{ $config->id }}, '{{ $config->channel_name }}', '{{ $config->account_sid }}', '{{ $config->content_sid }}', '{{ $config->from_number }}')"
                                                class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition whitespace-nowrap">
                                            Modifier
                                        </button>

                                        @if(!$config->is_active)
                                        <form method="POST" action="{{ route('twilio.activateConfig', $config->id) }}">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition whitespace-nowrap">
                                                Activer
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('twilio.deleteConfig', $config->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette chaîne ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition whitespace-nowrap">
                                                Supprimer
                                            </button>
                                        </form>
                                        @else
                                        <div class="px-4 py-2 bg-gray-100 text-gray-500 text-sm font-medium rounded-lg text-center">
                                            En cours d'utilisation
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Formulaire d'ajout d'une nouvelle chaîne -->
                    <div class="bg-white rounded-xl border border-gray-100 p-4 lg:p-8">
                        <h3 class="text-lg lg:text-xl font-bold text-gray-900 mb-4 lg:mb-6">Ajouter une nouvelle chaîne</h3>

                        <form method="POST" action="{{ route('twilio.saveConfig') }}">
                            @csrf

                            <div class="space-y-4 lg:space-y-6">
                                <!-- Nom de la chaîne -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nom de la chaîne *
                                    </label>
                                    <input type="text" name="channel_name" required
                                           value="{{ old('channel_name') }}"
                                           placeholder="Ex: Chaîne Marketing, Chaîne Support..."
                                           class="w-full px-3 lg:px-4 py-2 lg:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    <p class="text-xs text-gray-500 mt-1">
                                        Donnez un nom unique pour identifier cette chaîne
                                    </p>
                                    @error('channel_name')
                                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Account SID -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Account SID *
                                    </label>
                                    <input type="text" name="account_sid" required
                                           value="{{ old('account_sid') }}"
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
                                           value="{{ old('auth_token') }}"
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
                                           value="{{ old('content_sid') }}"
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
                                           value="{{ old('from_number') }}"
                                           placeholder="MGxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                           class="w-full px-3 lg:px-4 py-2 lg:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                    <p class="text-xs text-gray-500 mt-1">
                                        ID de votre Messaging Service Twilio
                                    </p>
                                </div>

                                <div class="pt-2 lg:pt-4">
                                    <button type="submit"
                                            class="w-full px-4 lg:px-6 py-2.5 lg:py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-sm lg:text-base">
                                        Ajouter la chaîne
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Informations sur la chaîne active -->
                    @if($activeConfig)
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 lg:p-6">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base lg:text-lg font-bold text-green-900">Chaîne active</h4>
                                <p class="text-sm text-green-700">{{ $activeConfig->channel_name }}</p>
                            </div>
                        </div>

                        <p class="text-xs lg:text-sm text-green-800">
                            Cette chaîne sera utilisée pour tous les envois de messages WhatsApp.
                            Pour changer de chaîne, activez-en une autre dans la liste ci-dessus.
                        </p>

                        <div class="mt-4 pt-4 border-t border-green-200">
                            <a href="{{ route('contacts.index') }}"
                               class="inline-flex items-center px-4 py-2.5 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Envoyer des messages
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 lg:p-6">
                        <div class="flex items-center mb-3">
                            <svg class="w-8 h-8 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h4 class="text-base lg:text-lg font-bold text-yellow-900">Aucune chaîne active</h4>
                                <p class="text-sm text-yellow-700">Configuration requise</p>
                            </div>
                        </div>
                        <p class="text-xs lg:text-sm text-yellow-800">
                            Vous devez ajouter au moins une chaîne WhatsApp et l'activer pour pouvoir envoyer des messages.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <!-- Modal de modification -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-hidden flex flex-col">
        <!-- En-tête fixe -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-4 sm:px-6 py-4 flex items-center justify-between z-10">
            <h3 class="text-lg sm:text-xl font-bold text-gray-900">Modifier la chaîne</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition p-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Contenu scrollable -->
        <div class="flex-1 overflow-y-auto">
            <form id="editForm" method="POST" action="" class="p-4 sm:p-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Nom de la chaîne -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nom de la chaîne *
                        </label>
                        <input type="text" name="channel_name" id="edit_channel_name" required
                               class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>

                    <!-- Account SID -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Account SID *
                        </label>
                        <input type="text" name="account_sid" id="edit_account_sid" required
                               placeholder="ACxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                               class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>

                    <!-- Auth Token -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Auth Token
                        </label>
                        <input type="password" name="auth_token" id="edit_auth_token"
                               placeholder="Laissez vide pour ne pas modifier"
                               class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <p class="text-xs text-gray-500 mt-1">
                            Laissez vide pour conserver le token actuel
                        </p>
                    </div>

                    <!-- Content SID -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Content SID *
                        </label>
                        <input type="text" name="content_sid" id="edit_content_sid" required
                               placeholder="HXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                               class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>

                    <!-- From Number (Messaging Service) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Messaging Service SID *
                        </label>
                        <input type="text" name="from_number" id="edit_from_number" required
                               placeholder="MGxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                               class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>
                </div>

                <!-- Boutons fixes en bas -->
                <div class="sticky bottom-0 bg-white pt-4 mt-6 border-t border-gray-200 -mx-4 sm:-mx-6 px-4 sm:px-6 py-3">
                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                        <button type="button" onclick="closeEditModal()"
                                class="flex-1 px-4 py-2.5 sm:py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm sm:text-base">
                            Annuler
                        </button>
                        <button type="submit"
                                class="flex-1 px-4 py-2.5 sm:py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition text-sm sm:text-base">
                            Mettre à jour
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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

        // Modal de modification
        function openEditModal(id, channelName, accountSid, contentSid, fromNumber) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editForm').action = `/twilio/config/${id}`;
            document.getElementById('edit_channel_name').value = channelName;
            document.getElementById('edit_account_sid').value = accountSid;
            document.getElementById('edit_content_sid').value = contentSid;
            document.getElementById('edit_from_number').value = fromNumber;
            // Vider le champ auth_token
            document.getElementById('edit_auth_token').value = '';
            document.getElementById('edit_auth_token').removeAttribute('required');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            // Réinitialiser le formulaire
            document.getElementById('editForm').reset();
            document.getElementById('edit_auth_token').setAttribute('required', 'required');
        }

        // Fermer le modal en cliquant en dehors
        document.getElementById('editModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        // Fermer le modal avec la touche Échap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditModal();
            }
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
