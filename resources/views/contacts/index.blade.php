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
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>

                <a href="{{ route('contacts.index') }}" class="flex items-center px-4 py-3 text-gray-900 bg-indigo-50 rounded-lg group">
                    <svg class="w-5 h-5 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-medium text-sm">Gestion des Contacts</span>
                </a>

                <a href="{{ route('twilio.config') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900">Gestion des Contacts</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Gérez vos campagnes WhatsApp</p>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="hidden sm:inline">Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-4 lg:p-8">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="p-4 mb-6 bg-green-50 border border-green-200 rounded-xl flex items-center animate-fade-in">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-green-900 font-medium text-sm flex-1">{{ session('success') }}</p>
                        <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 ml-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="p-4 mb-6 bg-red-50 border border-red-200 rounded-xl flex items-center animate-fade-in">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-red-900 font-medium text-sm flex-1">{{ session('error') }}</p>
                        <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 ml-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif



<!-- Affichage de la chaîne active -->
@php
$activeConfig = \App\Models\TwilioConfig::where('is_active', true)->first();
@endphp

@if($activeConfig)
<div class="mb-4 lg:mb-6">
<div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 lg:p-5">
    <div class="flex items-center justify-between flex-wrap gap-3">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <h4 class="text-sm lg:text-base font-bold text-gray-900">Chaîne active</h4>
                    <span class="px-2 py-0.5 bg-green-600 text-white text-xs font-medium rounded-full">En cours</span>
                </div>
                <p class="text-sm lg:text-base text-gray-900 font-semibold">{{ $activeConfig->channel_name }}</p>
                <p class="text-xs text-gray-600 mt-0.5">Les messages seront envoyés via cette chaîne</p>
            </div>
        </div>

        <a href="{{ route('twilio.config') }}" class="inline-flex items-center px-3 lg:px-4 py-2 bg-white text-gray-700 border border-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Gérer les chaînes
        </a>
    </div>

    <!-- Informations détaillées (optionnel - peut être masqué/affiché) -->
    <div class="mt-3 pt-3 border-t border-green-200">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 text-xs">
            <div>
                <span class="text-gray-600">Account SID:</span>
                <span class="text-gray-900 font-mono ml-1">{{ substr($activeConfig->account_sid, 0, 10) }}...</span>
            </div>
            <div>
                <span class="text-gray-600">Content SID:</span>
                <span class="text-gray-900 font-mono ml-1">{{ substr($activeConfig->content_sid, 0, 10) }}...</span>
            </div>
            <div>
                <span class="text-gray-600">Dernière MAJ:</span>
                <span class="text-gray-900 ml-1">{{ $activeConfig->updated_at->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>
</div>
</div>
@else
<div class="mb-4 lg:mb-6">
<div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 lg:p-5">
    <div class="flex items-center justify-between flex-wrap gap-3">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <h4 class="text-sm lg:text-base font-bold text-yellow-900 mb-1">Aucune chaîne active</h4>
                <p class="text-xs lg:text-sm text-yellow-700">Vous devez configurer et activer une chaîne WhatsApp pour envoyer des messages</p>
            </div>
        </div>

        <a href="{{ route('twilio.config') }}" class="inline-flex items-center px-3 lg:px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-lg hover:bg-yellow-700 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Configurer une chaîne
        </a>
    </div>
</div>
</div>
@endif

                <!-- Actions Bar -->
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-4 lg:mb-6">
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-wrap gap-2 lg:gap-3">
                            <button onclick="openModal('addModal')" class="inline-flex items-center px-4 py-2 lg:px-5 lg:py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors flex-1 lg:flex-none justify-center">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-xs lg:text-sm">Ajouter</span>
                            </button>

                            <button onclick="openModal('importModal')" class="inline-flex items-center px-4 py-2 lg:px-5 lg:py-2.5 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors flex-1 lg:flex-none justify-center">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <span class="text-xs lg:text-sm">Importer</span>
                            </button>

                            <button onclick="openModal('sendCampaignModal')" class="inline-flex items-center px-4 py-2 lg:px-5 lg:py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors flex-1 lg:flex-none justify-center">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span class="text-xs lg:text-sm">Envoyer</span>
                            </button>

                            @if ($campagnes->count() > 0)
                                <button onclick="openModal('deleteCampaignModal')" class="inline-flex items-center px-4 py-2 lg:px-5 lg:py-2.5 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors flex-1 lg:flex-none justify-center">
                                    <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span class="text-xs lg:text-sm">Supprimer</span>
                                </button>
                            @endif
                        </div>

                        <div class="flex flex-col lg:flex-row gap-3 lg:items-center">
                            <!-- Search Bar -->
                            <div class="relative flex-1">
                                <input type="text" id="globalSearch" placeholder="Rechercher un numéro..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-white hover:border-gray-300 transition">
                                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <!-- Filter -->
                            <form method="GET" id="filterForm" class="flex gap-2 lg:gap-3 items-center">
                                <select name="campagne" onchange="submitWithLoader()" class="flex-1 lg:flex-none px-3 lg:px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent bg-white hover:border-gray-300 transition">
                                    <option value="">Toutes les campagnes</option>
                                    @foreach ($campagnes as $campagne)
                                        <option value="{{ $campagne }}" {{ request('campagne') == $campagne ? 'selected' : '' }}>
                                            {{ $campagne }}
                                        </option>
                                    @endforeach
                                </select>

                                @if (request('campagne'))
                                    <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-3 lg:px-4 py-2.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition">
                                        <svg class="w-4 h-4 mr-1 lg:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        <span class="hidden lg:inline">Réinitialiser</span>
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Barre de sélection -->
                <div id="selectionBar" class="bg-indigo-50 border border-indigo-200 p-4 rounded-xl mb-4 hidden">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-medium text-indigo-900">
                                <span id="selectedCount">0</span> contact(s) sélectionné(s)
                            </span>
                            <button onclick="selectAll()" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">Tout sélectionner</button>
                            <button onclick="deselectAll()" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium">Tout désélectionner</button>
                        </div>
                        <button onclick="sendToSelected()" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                            Envoyer aux sélectionnés
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px]">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4">
                                        <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll(this)" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                    </th>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">Numéro</th>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">Campagne</th>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">Date d'envoi</th>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">ID Twilio</th>
                                    <th class="px-4 lg:px-6 py-3 lg:py-4 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($messages as $message)
                                    <tr class="hover:bg-gray-50 transition contact-row" data-id="{{ $message->id }}">
                                        <td class="px-4 lg:px-6 py-3 lg:py-4">
                                            <input type="checkbox" class="contact-checkbox w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" value="{{ $message->id }}" onchange="updateSelection()">
                                        </td>
                                        <td class="px-4 lg:px-6 py-3 lg:py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium text-gray-900">#{{ $message->id }}</span>
                                        </td>
                                        <td class="px-4 lg:px-6 py-3 lg:py-4 whitespace-nowrap">
                                            <span class="text-sm font-semibold text-gray-900">{{ $message->numero_telephone }}</span>
                                        </td>
                                        <td class="px-4 lg:px-6 py-3 lg:py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 lg:px-3 lg:py-1.5 text-xs font-semibold text-indigo-700 bg-indigo-50 rounded-lg">
                                                {{ $message->nom_campagne }}
                                            </span>
                                        </td>
                                        <td class="px-4 lg:px-6 py-3 lg:py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $message->date_envoi ? $message->date_envoi->format('d/m/Y H:i') : '-' }}
                                        </td>
                                        <td class="px-4 lg:px-6 py-3 lg:py-4 whitespace-nowrap">
                                            <span class="text-xs font-mono text-gray-500">{{ $message->id_twilio ?? '-' }}</span>
                                        </td>
                                        <td class="px-4 lg:px-6 py-3 lg:py-4 whitespace-nowrap text-sm">
                                            <div class="flex items-center gap-2 lg:gap-3">
                                                <button onclick="sendToContact({{ $message->id }})" class="text-blue-600 hover:text-blue-800 font-medium transition text-xs lg:text-sm">
                                                    Envoyer
                                                </button>
                                                <span class="text-gray-300 hidden lg:inline">|</span>
                                                <button onclick="deleteContact({{ $message->id }})" class="text-red-600 hover:text-red-800 font-medium transition text-xs lg:text-sm">
                                                    Supprimer
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 lg:px-6 py-8 lg:py-16 text-center">
                                            <div class="flex flex-col items-center">
                                                <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3 lg:mb-4">
                                                    <svg class="w-6 h-6 lg:w-8 lg:h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                    </svg>
                                                </div>
                                                <p class="text-gray-900 font-medium text-base lg:text-lg mb-1">Aucun contact trouvé</p>
                                                <p class="text-gray-500 text-xs lg:text-sm mb-4 lg:mb-6">Commencez par ajouter vos premiers contacts</p>
                                                <button onclick="openModal('addModal')" class="inline-flex items-center px-4 py-2 lg:px-5 lg:py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                                                    <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Ajouter un contact
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($messages->hasPages())
                        <div class="px-4 lg:px-6 py-3 lg:py-4 bg-gray-50 border-t border-gray-100">
                            {{ $messages->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <!-- Global Loader - Z-INDEX LE PLUS ÉLEVÉ -->
    <div id="globalLoader" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-sm w-full mx-4 text-center">
            <div class="relative w-12 h-12 lg:w-16 lg:h-16 mx-auto mb-3 lg:mb-4">
                <div class="absolute inset-0 border-4 border-indigo-200 rounded-full"></div>
                <div class="absolute inset-0 border-4 border-indigo-600 rounded-full border-t-transparent animate-spin"></div>
            </div>
            <p class="text-gray-900 font-medium text-sm lg:text-base mb-1" id="loaderTitle">Chargement...</p>
            <p class="text-xs lg:text-sm text-gray-500" id="loaderMessage">Veuillez patienter</p>
        </div>
    </div>

    <!-- Alert Modal - Z-INDEX ÉLEVÉ -->
    <div id="alertModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[9000] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-md w-full mx-4 modal-content">
            <div class="flex items-center mb-4 lg:mb-6">
                <div id="alertIcon" class="w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                    <!-- Icon will be set dynamically -->
                </div>
                <h3 class="text-lg lg:text-xl font-bold text-gray-900" id="alertTitle">Alerte</h3>
            </div>
            <div class="mb-4 lg:mb-6">
                <p class="text-gray-700 text-sm lg:text-base" id="alertMessage">Message d'alerte</p>
            </div>
            <div class="flex justify-end">
                <button onclick="closeModal('alertModal')" class="px-4 lg:px-6 py-2 lg:py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition text-sm lg:text-base">
                    OK
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal - Z-INDEX ÉLEVÉ -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[9000] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-md w-full mx-4 modal-content">
            <div class="flex items-center justify-between mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-xl font-bold text-gray-900" id="confirmTitle">Confirmation</h3>
                <button onclick="closeModal('confirmationModal')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="mb-4 lg:mb-6">
                <p class="text-gray-700 text-sm lg:text-base" id="confirmMessage">Êtes-vous sûr de vouloir continuer ?</p>
            </div>
            <div class="flex gap-3 justify-end">
                <button onclick="closeModal('confirmationModal')" class="px-4 lg:px-6 py-2 lg:py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm lg:text-base">
                    Annuler
                </button>
                <button onclick="confirmAction()" class="px-4 lg:px-6 py-2 lg:py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition text-sm lg:text-base" id="confirmButton">
                    Confirmer
                </button>
            </div>
        </div>
    </div>

    <!-- Message Modal - Z-INDEX ÉLEVÉ -->
    <div id="messageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[9000] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-md w-full mx-4 modal-content">
            <div class="flex items-center justify-between mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-xl font-bold text-gray-900" id="modalTitle">Titre</h3>
                <button onclick="closeModal('messageModal')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="mb-4 lg:mb-6">
                <p class="text-gray-700 text-sm lg:text-base" id="modalMessage">Message</p>
            </div>
            <div class="flex justify-end">
                <button onclick="closeModal('messageModal')" class="px-4 lg:px-6 py-2 lg:py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition text-sm lg:text-base">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <!-- Modals de formulaire - Z-INDEX STANDARD -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-md w-full mx-4 modal-content">
            <div class="flex items-center justify-between mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-xl font-bold text-gray-900">Nouveau contact</h3>
                <button onclick="closeModal('addModal')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('contacts.store') }}" id="addContactForm" onsubmit="return submitFormWithLoader(event, 'Ajout en cours...', 'Le contact est en cours d\'ajout')">
                @csrf
                <div class="space-y-3 lg:space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de téléphone *</label>
                        <input type="text" name="numero_telephone" id="numero_telephone" required placeholder="0701234567, +2250701234567, +33612345678, +212612345678, etc." class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">L'indicatif +225 sera ajouté automatiquement si absent</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Campagne</label>
                        <div class="flex items-center gap-2 lg:gap-3 mb-3">
                            <button type="button" id="switchToSelect" class="px-2 lg:px-3 py-1 lg:py-1.5 text-xs font-medium bg-indigo-600 text-white rounded-lg transition">
                                Choisir existante
                            </button>
                            <button type="button" id="switchToInput" class="px-2 lg:px-3 py-1 lg:py-1.5 text-xs font-medium bg-gray-200 text-gray-700 rounded-lg transition">
                                Nouvelle campagne
                            </button>
                        </div>

                        <div id="campagneSelectContainer">
                            <select name="campagne_existante" id="campagne_existante" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Sélectionner une campagne</option>
                                @foreach ($campagnes as $campagne)
                                    <option value="{{ $campagne }}">{{ $campagne }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="campagneInputContainer" class="hidden">
                            <input type="text" name="nom_campagne" id="nom_campagne" placeholder="Nom de la nouvelle campagne" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 lg:gap-3 mt-4 lg:mt-6">
                    <button type="submit" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition text-sm lg:text-base">
                        Ajouter
                    </button>
                    <button type="button" onclick="closeModal('addModal')" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm lg:text-base">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Import CSV Modal -->
    <div id="importModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 modal-with-progress mx-4 modal-content">
            <div class="flex items-center justify-between mb-4 lg:mb-6">
                <h3 class="text-lg lg:text-xl font-bold text-gray-900">Importer des contacts</h3>
                <button onclick="closeModal('importModal')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="mb-4 lg:mb-6 p-3 lg:p-4 bg-blue-50 border border-blue-100 rounded-lg">
                <p class="text-sm text-blue-900 font-medium mb-2">Format requis</p>
                <code class="text-xs bg-white px-2 lg:px-3 py-1 lg:py-2 rounded block text-gray-700">
                    numero_telephone,nom_campagne<br>
                    0701234567,Campagne_2024<br>
                    +22501234567,Campagne_2024
                </code>
                <p class="text-xs text-blue-700 mt-2">100 contacts max par import</p>
                <p class="text-xs text-blue-700 mt-2">L'indicatif +225 sera ajouté automatiquement si absent</p>
            </div>

            <form method="POST" action="{{ route('contacts.import') }}" enctype="multipart/form-data" id="importForm">
                @csrf
                <div class="mb-4 lg:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Fichier CSV *</label>
                    <input type="file" name="csv_file" id="csvFile" accept=".csv" required class="hidden" onchange="updateFileName(this)">
                    <label for="csvFile" class="flex flex-col items-center justify-center w-full h-24 lg:h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition">
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 text-gray-400 mb-1 lg:mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-xs lg:text-sm font-medium text-gray-600" id="fileLabel">Cliquez pour sélectionner</p>
                        <p class="text-xs text-gray-500 mt-1">CSV uniquement</p>
                    </label>
                </div>

                <div id="importProgressContainer" class="hidden mb-4 lg:mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700" id="importProgressText">Importation en cours...</span>
                        <span class="text-sm font-medium text-indigo-600" id="importProgressPercent">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 lg:h-2.5 overflow-hidden">
                        <div id="importProgressBar" class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2 lg:h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 mt-2">
                        <span id="importProcessed">0</span>
                        <span id="importTotal">0</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2" id="importProgressMessage">Préparation de l'import...</p>

                    <div id="importDetails" class="mt-3 p-2 bg-gray-50 rounded-lg hidden progress-details">
                        <div class="flex justify-between text-xs progress-stats">
                            <span>Contacts importés:</span>
                            <span id="importSuccessCount" class="text-green-600 font-medium">0</span>
                        </div>
                        <div class="flex justify-between text-xs mt-1 progress-stats">
                            <span>Erreurs:</span>
                            <span id="importErrorCount" class="text-red-600 font-medium">0</span>
                        </div>
                        <div class="flex justify-between text-xs mt-1 progress-stats">
                            <span>Doublons ignorés:</span>
                            <span id="importDuplicateCount" class="text-yellow-600 font-medium">0</span>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2 lg:gap-3">
                    <button type="button" onclick="startImport()" id="importButton" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition text-sm lg:text-base">
                        Importer
                    </button>
                    <button type="button" onclick="closeModal('importModal')" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm lg:text-base">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Contact Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-md w-full mx-4 modal-content">
            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3 lg:mb-4">
                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-lg lg:text-xl font-bold text-gray-900 text-center mb-2">Confirmer la suppression</h3>
            <p class="text-xs lg:text-sm text-gray-600 text-center mb-4 lg:mb-6">Êtes-vous sûr de vouloir supprimer ce contact ? Cette action est irréversible.</p>

            <form id="deleteForm" method="POST" onsubmit="return submitFormWithLoader(event, 'Suppression...', 'Le contact est en cours de suppression')">
                @csrf
                @method('DELETE')
                <div class="flex gap-2 lg:gap-3">
                    <button type="button" onclick="closeModal('deleteModal')" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm lg:text-base">
                        Annuler
                    </button>
                    <button type="submit" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition text-sm lg:text-base">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Campaign Modal -->
    <div id="deleteCampaignModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 max-w-md w-full mx-4 modal-content">
            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3 lg:mb-4">
                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
            <h3 class="text-lg lg:text-xl font-bold text-gray-900 text-center mb-2">Supprimer une campagne</h3>
            <p class="text-xs lg:text-sm text-gray-600 text-center mb-4 lg:mb-6">Tous les contacts de cette campagne seront supprimés. Cette action est irréversible.</p>

            <form method="POST" action="{{ route('contacts.deleteCampaign') }}" onsubmit="return submitFormWithLoader(event, 'Suppression de la campagne...', 'Suppression de tous les contacts en cours')">
                @csrf
                @method('DELETE')
                <div class="mb-4 lg:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sélectionner une campagne</label>
                    <select name="campagne" required class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <option value="">Choisir une campagne</option>
                        @foreach ($campagnes as $campagne)
                            <option value="{{ $campagne }}">{{ $campagne }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2 lg:gap-3">
                    <button type="button" onclick="closeModal('deleteCampaignModal')" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm lg:text-base">
                        Annuler
                    </button>
                    <button type="submit" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition text-sm lg:text-base">
                        Supprimer la campagne
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Send to Campaign Modal -->
    <div id="sendCampaignModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-xl p-6 lg:p-8 modal-with-progress mx-4 modal-content max-w-2xl">
            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 lg:mb-4">
                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </div>
            <h3 class="text-lg lg:text-xl font-bold text-gray-900 text-center mb-2">Envoyer des messages</h3>
            <p class="text-xs lg:text-sm text-gray-600 text-center mb-4 lg:mb-6">Choisissez les contacts qui recevront le message WhatsApp</p>

            <form id="sendCampaignForm">
                <!-- Sélection de campagne -->
                <div class="mb-4 lg:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Campagne *</label>
                    <select name="campagne" id="campagneSelect" required onchange="updateCampaignInfo()" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Choisir une campagne</option>
                        @foreach ($campagnes as $campagne)
                            <option value="{{ $campagne }}" data-count="{{ \App\Models\MessageWhatsapp::where('nom_campagne', $campagne)->count() }}" data-not-sent="{{ \App\Models\MessageWhatsapp::where('nom_campagne', $campagne)->whereNull('date_envoi')->count() }}">
                                {{ $campagne }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Info campagne -->
                <div id="campaignInfo" class="mb-4 lg:mb-6 p-3 bg-gray-50 rounded-lg hidden">
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div>
                            <span class="text-gray-600">Total contacts:</span>
                            <span class="font-semibold text-gray-900 ml-2" id="totalContacts">0</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Non envoyés:</span>
                            <span class="font-semibold text-orange-600 ml-2" id="notSentContacts">0</span>
                        </div>
                    </div>
                </div>

                <!-- Mode d'envoi -->
                <div class="mb-4 lg:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Mode d'envoi *</label>
                    <div class="space-y-2">
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="send_mode" value="all" class="w-4 h-4 text-blue-600" checked onchange="updateSendMode()">
                            <span class="ml-3 text-sm">
                                <span class="font-medium text-gray-900">Tous les contacts</span>
                                <span class="block text-xs text-gray-500 mt-1">Envoyer à tous les contacts de la campagne</span>
                            </span>
                        </label>

                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="send_mode" value="limit" class="w-4 h-4 text-blue-600" onchange="updateSendMode()">
                            <span class="ml-3 text-sm flex-1">
                                <span class="font-medium text-gray-900">Limite personnalisée</span>
                                <span class="block text-xs text-gray-500 mt-1">Envoyer aux X premiers contacts</span>
                            </span>
                        </label>

                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" name="send_mode" value="range" class="w-4 h-4 text-blue-600" onchange="updateSendMode()">
                            <span class="ml-3 text-sm">
                                <span class="font-medium text-gray-900">Plage de contacts</span>
                                <span class="block text-xs text-gray-500 mt-1">Envoyer du contact N au contact M</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Options limite -->
                <div id="limitOptions" class="mb-4 lg:mb-6 hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nombre de contacts</label>
                    <input type="number" name="limit" id="limitInput" min="1" placeholder="Ex: 200" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Options plage -->
                <div id="rangeOptions" class="mb-4 lg:mb-6 hidden">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Du contact</label>
                            <input type="number" name="range_start" id="rangeStart" min="1" placeholder="1" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Au contact</label>
                            <input type="number" name="range_end" id="rangeEnd" min="1" placeholder="200" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Filtres avancés -->
                <div class="mb-4 lg:mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Filtre de statut</label>
                    <select name="filter_status" class="w-full px-3 lg:px-4 py-2 lg:py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="all">Tous les contacts</option>
                        <option value="not_sent">Non envoyés uniquement</option>
                        <option value="sent">Envoyés avec succès</option>
                        <option value="failed">Échecs d'envoi</option>
                    </select>
                </div>

                <!-- Résumé de sélection -->
                <div id="sendSummary" class="mb-4 lg:mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg hidden">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-blue-900" id="summaryText">Prêt à envoyer</p>
                            <p class="text-xs text-blue-700 mt-1" id="summaryDetails">Sélectionnez une campagne et un mode d'envoi</p>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar Envoi -->
                <div id="sendProgressContainer" class="hidden mb-4 lg:mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700" id="sendProgressText">Envoi en cours...</span>
                        <span class="text-sm font-medium text-indigo-600" id="sendProgressPercent">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 lg:h-2.5 overflow-hidden">
                        <div id="sendProgressBar" class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 lg:h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 mt-2">
                        <span id="sendProcessed">0</span>
                        <span id="sendTotal">0</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2" id="sendProgressMessage">Préparation de l'envoi...</p>

                    <div id="sendDetails" class="mt-3 p-2 bg-gray-50 rounded-lg hidden progress-details">
                        <div class="flex justify-between text-xs progress-stats">
                            <span>Messages envoyés:</span>
                            <span id="sendSuccessCount" class="text-green-600 font-medium">0</span>
                        </div>
                        <div class="flex justify-between text-xs mt-1 progress-stats">
                            <span>Échecs:</span>
                            <span id="sendErrorCount" class="text-red-600 font-medium">0</span>
                        </div>
                        <div class="flex justify-between text-xs mt-1 progress-stats">
                            <span>En cours:</span>
                            <span id="sendPendingCount" class="text-blue-600 font-medium">0</span>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 lg:p-4 mb-4 lg:mb-6">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-yellow-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-yellow-900 mb-1">Attention</p>
                            <p class="text-xs text-yellow-800">Assurez-vous que la configuration Twilio est correcte avant d'envoyer.</p>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2 lg:gap-3">
                    <button type="button" onclick="closeModal('sendCampaignModal')" id="cancelSendButton" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-sm lg:text-base">
                        Annuler
                    </button>
                    <button type="button" onclick="startCampaignSend()" id="sendCampaignButton" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition text-sm lg:text-base">
                        Envoyer les messages
                    </button>
                    <button type="button" onclick="stopCampaignSend()" id="stopSendButton" class="flex-1 px-3 lg:px-4 py-2 lg:py-2.5 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition text-sm lg:text-base hidden">
                        Arrêter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Variables globales
        let importInProgress = false;
        let sendInProgress = false;
        let selectedContacts = new Set();
        let confirmationCallback = null;

        // Mobile menu
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

            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        toggleSidebar();
                    }
                });
            });
        });

        // Gestion de la sélection de contacts
        function updateSelection() {
            selectedContacts.clear();
            document.querySelectorAll('.contact-checkbox:checked').forEach(checkbox => {
                selectedContacts.add(parseInt(checkbox.value));
            });

            const count = selectedContacts.size;
            document.getElementById('selectedCount').textContent = count;
            document.getElementById('selectionBar').classList.toggle('hidden', count === 0);

            // Mettre à jour l'état de la checkbox "Tout sélectionner"
            const allCheckboxes = document.querySelectorAll('.contact-checkbox');
            const selectAllCheckbox = document.getElementById('selectAllCheckbox');
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = allCheckboxes.length > 0 && count === allCheckboxes.length;
                selectAllCheckbox.indeterminate = count > 0 && count < allCheckboxes.length;
            }
        }

        function toggleSelectAll(checkbox) {
            const checkboxes = document.querySelectorAll('.contact-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = checkbox.checked;
            });
            updateSelection();
        }

        function selectAll() {
            document.querySelectorAll('.contact-checkbox').forEach(cb => {
                cb.checked = true;
            });
            updateSelection();
        }

        function deselectAll() {
            document.querySelectorAll('.contact-checkbox').forEach(cb => {
                cb.checked = false;
            });
            document.getElementById('selectAllCheckbox').checked = false;
            updateSelection();
        }

        // Envoyer aux contacts sélectionnés
        async function sendToSelected() {
            if (selectedContacts.size === 0) {
                showAlert('Erreur', 'Veuillez sélectionner au moins un contact', 'error');
                return;
            }

            // Récupérer la campagne du premier contact sélectionné
            const firstContactRow = document.querySelector(`.contact-row[data-id="${Array.from(selectedContacts)[0]}"]`);
            const campagneBadge = firstContactRow.querySelector('.text-indigo-700');
            const campagne = campagneBadge ? campagneBadge.textContent.trim() : '';

            if (!campagne) {
                showAlert('Erreur', 'Impossible de déterminer la campagne', 'error');
                return;
            }

            showConfirmation(
                'Confirmer l\'envoi',
                `Envoyer le message aux ${selectedContacts.size} contact(s) sélectionné(s) ?`,
                async () => {
                    showLoader('Envoi en cours...', `Envoi à ${selectedContacts.size} contact(s)`);

                    try {
                        const response = await fetch('/twilio/send-campaign', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                campagne: campagne,
                                send_mode: 'selected',
                                selected_ids: Array.from(selectedContacts)
                            })
                        });

                        const result = await response.json();

                        hideLoader();

                        if (result.success) {
                            let message = result.message;
                            if (result.statistics) {
                                message += `\n\nStatistiques:\n`;
                                message += `• Total: ${result.statistics.total}\n`;
                                message += `• Succès: ${result.statistics.success}\n`;
                                message += `• Échecs: ${result.statistics.errors}`;
                            }

                            showAlert('Succès', message, 'success');

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            throw new Error(result.message || 'Erreur lors de l\'envoi');
                        }

                    } catch (error) {
                        hideLoader();
                        showAlert('Erreur', 'Erreur lors de l\'envoi: ' + error.message, 'error');
                    }
                }
            );
        }

        // Mise à jour du mode d'envoi
        function updateSendMode() {
            const mode = document.querySelector('input[name="send_mode"]:checked').value;

            document.getElementById('limitOptions').classList.add('hidden');
            document.getElementById('rangeOptions').classList.add('hidden');

            if (mode === 'limit') {
                document.getElementById('limitOptions').classList.remove('hidden');
            } else if (mode === 'range') {
                document.getElementById('rangeOptions').classList.remove('hidden');
            }

            updateSendSummary();
        }

        // Mise à jour des informations de campagne
        function updateCampaignInfo() {
            const select = document.getElementById('campagneSelect');
            const option = select.selectedOptions[0];

            if (option && option.value) {
                const total = option.getAttribute('data-count');
                const notSent = option.getAttribute('data-not-sent');

                document.getElementById('totalContacts').textContent = total;
                document.getElementById('notSentContacts').textContent = notSent;
                document.getElementById('campaignInfo').classList.remove('hidden');

                updateSendSummary();
            } else {
                document.getElementById('campaignInfo').classList.add('hidden');
                document.getElementById('sendSummary').classList.add('hidden');
            }
        }

        // Mise à jour du résumé d'envoi
        function updateSendSummary() {
            const campagneSelect = document.getElementById('campagneSelect');
            const mode = document.querySelector('input[name="send_mode"]:checked')?.value;

            if (!campagneSelect.value || !mode) {
                document.getElementById('sendSummary').classList.add('hidden');
                return;
            }

            const option = campagneSelect.selectedOptions[0];
            const totalContacts = parseInt(option.getAttribute('data-count'));
            let estimatedCount = totalContacts;
            let summaryText = '';

            if (mode === 'all') {
                summaryText = `Vous allez envoyer à tous les ${totalContacts} contacts`;
            } else if (mode === 'limit') {
                const limit = parseInt(document.getElementById('limitInput').value) || 0;
                estimatedCount = Math.min(limit, totalContacts);
                summaryText = `Vous allez envoyer aux ${estimatedCount} premiers contacts`;
            } else if (mode === 'range') {
                const start = parseInt(document.getElementById('rangeStart').value) || 1;
                const end = parseInt(document.getElementById('rangeEnd').value) || 0;
                estimatedCount = Math.max(0, Math.min(end - start + 1, totalContacts));
                summaryText = `Vous allez envoyer du contact ${start} au contact ${end} (${estimatedCount} contacts)`;
            }

            document.getElementById('summaryText').textContent = summaryText;
            document.getElementById('summaryDetails').textContent = `Délai estimé: ~${Math.ceil(estimatedCount * 0.5)} secondes`;
            document.getElementById('sendSummary').classList.remove('hidden');
        }

        // Écouteurs pour les champs
        document.getElementById('limitInput')?.addEventListener('input', updateSendSummary);
        document.getElementById('rangeStart')?.addEventListener('input', updateSendSummary);
        document.getElementById('rangeEnd')?.addEventListener('input', updateSendSummary);

        // Envoi de campagne
        async function startCampaignSend() {
            const campagneSelect = document.getElementById('campagneSelect');
            const campagne = campagneSelect.value;
            const mode = document.querySelector('input[name="send_mode"]:checked').value;
            const filterStatus = document.querySelector('select[name="filter_status"]').value;

            if (!campagne) {
                showAlert('Erreur', 'Veuillez sélectionner une campagne', 'error');
                return;
            }

            // Préparer les données
            const data = {
                campagne: campagne,
                send_mode: mode,
                filter_status: filterStatus
            };

            if (mode === 'limit') {
                const limit = parseInt(document.getElementById('limitInput').value);
                if (!limit || limit < 1) {
                    showAlert('Erreur', 'Veuillez entrer un nombre valide de contacts', 'error');
                    return;
                }
                data.limit = limit;
            } else if (mode === 'range') {
                const start = parseInt(document.getElementById('rangeStart').value);
                const end = parseInt(document.getElementById('rangeEnd').value);

                if (!start || !end || start < 1 || end < start) {
                    showAlert('Erreur', 'Veuillez entrer une plage valide', 'error');
                    return;
                }
                data.range_start = start;
                data.range_end = end;
            }

            const summaryText = document.getElementById('summaryText').textContent;

            showConfirmation(
                'Confirmer l\'envoi',
                `${summaryText}\n\nConfirmer l'envoi ?`,
                async () => {
                    // Préparer l'interface
                    document.getElementById('sendProgressContainer').classList.remove('hidden');
                    document.getElementById('sendCampaignButton').classList.add('hidden');
                    document.getElementById('stopSendButton').classList.remove('hidden');
                    document.getElementById('cancelSendButton').disabled = true;
                    sendInProgress = true;

                    updateSendProgress(0, 100, 'Démarrage de l\'envoi...');

                    try {
                        const response = await fetch('/twilio/send-campaign', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(data)
                        });

                        if (!response.ok) {
                            throw new Error('Erreur lors de l\'envoi');
                        }

                        const result = await response.json();

                        if (result.success) {
                            updateSendProgress(result.statistics.total, result.statistics.total, 'Envoi terminé !');

                            document.getElementById('sendSuccessCount').textContent = result.statistics.success;
                            document.getElementById('sendErrorCount').textContent = result.statistics.errors;
                            document.getElementById('sendPendingCount').textContent = '0';
                            document.getElementById('sendDetails').classList.remove('hidden');

                            let message = result.message;
                            if (result.statistics) {
                                message += `\n\nStatistiques:\n`;
                                message += `• Total: ${result.statistics.total}\n`;
                                message += `• Succès: ${result.statistics.success}\n`;
                                message += `• Échecs: ${result.statistics.errors}\n`;
                                message += `• Temps moyen: ${result.statistics.avg_response_time}s`;
                            }

                            showAlert('Succès', message, 'success');

                            setTimeout(() => {
                                window.location.reload();
                            }, 3000);
                        } else {
                            throw new Error(result.message || 'Erreur lors de l\'envoi');
                        }

                    } catch (error) {
                        showAlert('Erreur', 'Erreur lors de l\'envoi: ' + error.message, 'error');
                    } finally {
                        sendInProgress = false;
                        document.getElementById('sendCampaignButton').classList.remove('hidden');
                        document.getElementById('stopSendButton').classList.add('hidden');
                        document.getElementById('cancelSendButton').disabled = false;
                    }
                }
            );
        }

        function stopCampaignSend() {
            sendInProgress = false;
            document.getElementById('sendProgressMessage').textContent = 'Envoi arrêté';
            document.getElementById('sendCampaignButton').classList.remove('hidden');
            document.getElementById('stopSendButton').classList.add('hidden');
            document.getElementById('cancelSendButton').disabled = false;
        }

        function updateSendProgress(processed, total, message) {
            const percent = total > 0 ? Math.round((processed / total) * 100) : 0;

            document.getElementById('sendProgressBar').style.width = percent + '%';
            document.getElementById('sendProgressPercent').textContent = percent + '%';
            document.getElementById('sendProcessed').textContent = processed;
            document.getElementById('sendTotal').textContent = total;
            document.getElementById('sendProgressMessage').textContent = message;
        }

        // Import CSV
        async function startImport() {
            const fileInput = document.getElementById('csvFile');
            const file = fileInput.files[0];

            if (!file) {
                showAlert('Erreur', 'Veuillez sélectionner un fichier CSV', 'error');
                return;
            }

            showConfirmation(
                'Confirmer l\'import',
                'Êtes-vous sûr de vouloir importer ce fichier CSV ?',
                async () => {
                    document.getElementById('importProgressContainer').classList.remove('hidden');
                    document.getElementById('importButton').disabled = true;
                    document.getElementById('importButton').classList.add('opacity-50', 'cursor-not-allowed');
                    importInProgress = true;

                    updateImportProgress(0, 0, 'Lecture du fichier...');

                    try {
                        const formData = new FormData();
                        formData.append('csv_file', file);
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                        const response = await fetch('/contacts/import', {
                            method: 'POST',
                            body: formData
                        });

                        if (!response.ok) {
                            throw new Error('Erreur lors de l\'import');
                        }

                        const result = await response.json();

                        if (result.success) {
                            updateImportProgress(result.total, result.total, 'Import terminé !');

                            document.getElementById('importSuccessCount').textContent = result.imported;
                            document.getElementById('importErrorCount').textContent = result.errors;
                            document.getElementById('importDuplicateCount').textContent = result.duplicates;
                            document.getElementById('importDetails').classList.remove('hidden');

                            showAlert('Succès', result.message, 'success');

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            throw new Error(result.message || 'Erreur lors de l\'import');
                        }

                    } catch (error) {
                        showAlert('Erreur', 'Erreur lors de l\'import: ' + error.message, 'error');
                    } finally {
                        importInProgress = false;
                        document.getElementById('importButton').disabled = false;
                        document.getElementById('importButton').classList.remove('opacity-50', 'cursor-not-allowed');
                    }
                }
            );
        }

        function updateImportProgress(processed, total, message) {
            const percent = total > 0 ? Math.round((processed / total) * 100) : 0;

            document.getElementById('importProgressBar').style.width = percent + '%';
            document.getElementById('importProgressPercent').textContent = percent + '%';
            document.getElementById('importProcessed').textContent = processed;
            document.getElementById('importTotal').textContent = total;
            document.getElementById('importProgressMessage').textContent = message;
        }

        // Envoyer à un contact
        function sendToContact(contactId) {
            showConfirmation(
                'Confirmer l\'envoi',
                'Êtes-vous sûr de vouloir envoyer le message à ce contact ?',
                () => {
                    showLoader('Envoi en cours...', 'Envoi du message WhatsApp');

                    fetch(`/twilio/send-contact/${contactId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(async response => {
                            const contentType = response.headers.get('content-type');
                            if (contentType && contentType.includes('application/json')) {
                                return response.json();
                            } else {
                                const text = await response.text();
                                console.error('Réponse non-JSON:', text.substring(0, 200));
                                throw new Error(`Le serveur a retourné: ${response.status} ${response.statusText}`);
                            }
                        })
                        .then(data => {
                            hideLoader();
                            if (data && typeof data === 'object') {
                                showAlert(data.title || (data.success ? 'Succès' : 'Erreur'), data.message, data.type || (data.success ? 'success' : 'error'));

                                if (data.success) {
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 2000);
                                }
                            } else {
                                throw new Error('Réponse invalide du serveur');
                            }
                        })
                        .catch(error => {
                            hideLoader();
                            console.error('Erreur détaillée:', error);
                            showAlert('Erreur', 'Erreur de communication: ' + error.message, 'error');
                        });
                }
            );
        }

        // Modal Management - CORRIGÉ
        function openModal(modalId) {
            // Fermer seulement les modals de formulaire (z-index bas) quand on ouvre un autre modal de formulaire
            const isFormModal = ['addModal', 'importModal', 'sendCampaignModal', 'deleteModal', 'deleteCampaignModal'].includes(modalId);

            if (isFormModal) {
                document.querySelectorAll('[id$="Modal"]').forEach(modal => {
                    if (modal.id !== modalId && !modal.classList.contains('hidden') &&
                        ['addModal', 'importModal', 'sendCampaignModal', 'deleteModal', 'deleteCampaignModal'].includes(modal.id)) {
                        modal.classList.add('hidden');
                    }
                });
            }

            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                const modalContent = modal.querySelector('.modal-content');
                if (modalContent) {
                    modalContent.scrollTop = 0;
                }

                if (modalId === 'addModal') {
                    resetAddModal();
                } else if (modalId === 'importModal') {
                    document.getElementById('importProgressContainer').classList.add('hidden');
                    document.getElementById('importDetails').classList.add('hidden');
                    document.getElementById('importButton').disabled = false;
                    document.getElementById('importButton').classList.remove('opacity-50', 'cursor-not-allowed');
                } else if (modalId === 'sendCampaignModal') {
                    document.getElementById('sendProgressContainer').classList.add('hidden');
                    document.getElementById('sendDetails').classList.add('hidden');
                    document.getElementById('sendCampaignButton').classList.remove('hidden');
                    document.getElementById('stopSendButton').classList.add('hidden');
                    document.getElementById('cancelSendButton').disabled = false;
                    document.getElementById('sendSummary').classList.add('hidden');
                    document.getElementById('campaignInfo').classList.add('hidden');
                }
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');

                const anyModalOpen = Array.from(document.querySelectorAll('[id$="Modal"]'))
                    .some(modal => !modal.classList.contains('hidden'));

                if (!anyModalOpen) {
                    document.body.style.overflow = 'auto';
                }
            }
        }

        // Nouvelle fonction pour les alertes stylisées
        function showAlert(title, message, type = 'info') {
            const modal = document.getElementById('alertModal');
            const alertTitle = document.getElementById('alertTitle');
            const alertMessage = document.getElementById('alertMessage');
            const alertIcon = document.getElementById('alertIcon');

            if (modal && alertTitle && alertMessage && alertIcon) {
                alertTitle.textContent = title;
                alertMessage.textContent = message;

                // Configuration de l'icône et des couleurs selon le type
                let iconSvg = '';
                let bgColor = '';
                let textColor = '';

                switch (type) {
                    case 'success':
                        bgColor = 'bg-green-100';
                        textColor = 'text-green-600';
                        iconSvg = '<svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>';
                        break;
                    case 'error':
                        bgColor = 'bg-red-100';
                        textColor = 'text-red-600';
                        iconSvg = '<svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>';
                        break;
                    case 'warning':
                        bgColor = 'bg-yellow-100';
                        textColor = 'text-yellow-600';
                        iconSvg = '<svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>';
                        break;
                    default:
                        bgColor = 'bg-blue-100';
                        textColor = 'text-blue-600';
                        iconSvg = '<svg class="w-5 h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>';
                }

                alertIcon.className = `w-8 h-8 lg:w-10 lg:h-10 rounded-full flex items-center justify-center mr-3 flex-shrink-0 ${bgColor} ${textColor}`;
                alertIcon.innerHTML = iconSvg;

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        // Nouvelle fonction pour les confirmations
        function showConfirmation(title, message, callback) {
            const modal = document.getElementById('confirmationModal');
            const confirmTitle = document.getElementById('confirmTitle');
            const confirmMessage = document.getElementById('confirmMessage');

            if (modal && confirmTitle && confirmMessage) {
                confirmTitle.textContent = title;
                confirmMessage.textContent = message;
                confirmationCallback = callback;

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function confirmAction() {
            if (confirmationCallback) {
                confirmationCallback();
            }
            closeModal('confirmationModal');
            confirmationCallback = null;
        }

        // Ancienne fonction showModal (conservée pour compatibilité)
        function showModal(title, message, type = 'info') {
            showAlert(title, message, type);
        }

        function resetAddModal() {
            document.getElementById('campagneSelectContainer').classList.remove('hidden');
            document.getElementById('campagneInputContainer').classList.add('hidden');
            document.getElementById('switchToSelect').classList.add('bg-indigo-600', 'text-white');
            document.getElementById('switchToSelect').classList.remove('bg-gray-200', 'text-gray-700');
            document.getElementById('switchToInput').classList.add('bg-gray-200', 'text-gray-700');
            document.getElementById('switchToInput').classList.remove('bg-indigo-600', 'text-white');

            document.getElementById('campagne_existante').value = '';
            document.getElementById('nom_campagne').value = '';
            document.getElementById('numero_telephone').value = '';
        }

        document.getElementById('switchToSelect')?.addEventListener('click', function() {
            document.getElementById('campagneSelectContainer').classList.remove('hidden');
            document.getElementById('campagneInputContainer').classList.add('hidden');
            this.classList.add('bg-indigo-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');
            document.getElementById('switchToInput').classList.add('bg-gray-200', 'text-gray-700');
            document.getElementById('switchToInput').classList.remove('bg-indigo-600', 'text-white');
        });

        document.getElementById('switchToInput')?.addEventListener('click', function() {
            document.getElementById('campagneSelectContainer').classList.add('hidden');
            document.getElementById('campagneInputContainer').classList.remove('hidden');
            this.classList.add('bg-indigo-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');
            document.getElementById('switchToSelect').classList.add('bg-gray-200', 'text-gray-700');
            document.getElementById('switchToSelect').classList.remove('bg-indigo-600', 'text-white');
        });

        document.getElementById('addContactForm')?.addEventListener('submit', function(e) {
            const campagneSelect = document.getElementById('campagne_existante');
            const campagneInput = document.getElementById('nom_campagne');

            let campagneValue = '';
            if (document.getElementById('campagneSelectContainer').classList.contains('hidden')) {
                campagneValue = campagneInput.value;
            } else {
                campagneValue = campagneSelect.value;
            }

            if (!campagneValue) {
                e.preventDefault();
                showAlert('Erreur', 'Veuillez sélectionner ou saisir un nom de campagne', 'error');
                return;
            }

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'nom_campagne';
            hiddenInput.value = campagneValue;
            this.appendChild(hiddenInput);
        });

        // Recherche globale
        document.getElementById('globalSearch')?.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Close modal on outside click
        document.addEventListener('click', function(e) {
            if (e.target.id && e.target.id.includes('Modal') && e.target.classList.contains('fixed')) {
                closeModal(e.target.id);
            }
        });

        // File name update
        function updateFileName(input) {
            const fileName = input.files[0]?.name || 'Cliquez pour sélectionner';
            const fileLabel = document.getElementById('fileLabel');
            if (fileLabel) {
                fileLabel.textContent = fileName;
            }
        }

        // Global Loader - CORRIGÉ
        function showLoader(title = 'Chargement...', message = 'Veuillez patienter') {
            // Ne pas fermer les modals existants, le loader doit s'afficher par-dessus
            const loader = document.getElementById('globalLoader');
            const loaderTitle = document.getElementById('loaderTitle');
            const loaderMessage = document.getElementById('loaderMessage');

            if (loaderTitle) loaderTitle.textContent = title;
            if (loaderMessage) loaderMessage.textContent = message;
            if (loader) {
                loader.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function hideLoader() {
            const loader = document.getElementById('globalLoader');
            if (loader) {
                loader.classList.add('hidden');

                // Vérifier s'il reste des modals ouverts
                const anyModalOpen = Array.from(document.querySelectorAll('[id$="Modal"]'))
                    .some(modal => !modal.classList.contains('hidden'));

                if (!anyModalOpen) {
                    document.body.style.overflow = 'auto';
                }
            }
        }

        // Form submission with loader
        function submitFormWithLoader(event, title, message) {
            showLoader(title, message);
            return true;
        }

        // Filter with loader
        function submitWithLoader() {
            showLoader('Filtrage...', 'Application du filtre en cours');
            document.getElementById('filterForm').submit();
        }

        // Delete contact
        function deleteContact(id) {
            const form = document.getElementById('deleteForm');
            if (form) {
                form.action = `/contacts/${id}`;
                openModal('deleteModal');
            }
        }

        // Auto-hide success message after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.querySelector('.animate-fade-in');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = 'opacity 0.5s';
                    successMessage.style.opacity = '0';
                    setTimeout(() => successMessage.remove(), 500);
                }, 5000);
            }

            resetAddModal();
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const loader = document.getElementById('globalLoader');
                if (loader && !loader.classList.contains('hidden')) {
                    hideLoader();
                    return;
                }

                // Fermer d'abord les modals d'alerte/confirmation (z-index élevé)
                const highPriorityModals = ['alertModal', 'confirmationModal', 'messageModal'];
                for (const modalId of highPriorityModals) {
                    const modal = document.getElementById(modalId);
                    if (modal && !modal.classList.contains('hidden')) {
                        closeModal(modalId);
                        return;
                    }
                }

                // Fermer les autres modals
                document.querySelectorAll('[id$="Modal"]:not(.hidden)').forEach(modal => {
                    closeModal(modal.id);
                });
            }
        });
    </script>

    <style>
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

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

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }

        .modal-with-progress {
            max-width: 42rem !important;
            width: 90vw !important;
        }

        @media (min-width: 640px) {
            .modal-with-progress {
                max-width: 48rem !important;
                width: 95vw !important;
            }
        }

        @media (min-width: 768px) {
            .modal-with-progress {
                max-width: 56rem !important;
                width: auto !important;
            }
        }

        .modal-content {
            max-height: 85vh;
            overflow-y: auto;
        }

        .progress-details {
            max-height: 120px;
            overflow-y: auto;
        }

        .progress-stats {
            font-size: 0.7rem;
        }

        @media (min-width: 640px) {
            .progress-stats {
                font-size: 0.75rem;
            }
        }

        /* Style pour les checkbox indeterminate */
        input[type="checkbox"]:indeterminate {
            background-color: #4f46e5;
            border-color: #4f46e5;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
        }
    </style>
</x-app-layout>
