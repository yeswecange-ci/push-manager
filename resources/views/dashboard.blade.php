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
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-900 bg-indigo-50 rounded-lg group">
                    <svg class="w-5 h-5 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>

                <a href="{{ route('contacts.index') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="font-medium text-sm">Gestion des Contacts</span>
                </a>

                <a href="{{ route('twilio.config') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg group transition">
                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
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
                        <h2 class="text-lg lg:text-xl font-bold text-gray-900">Tableau de Bord</h2>
                        <p class="text-xs text-gray-500 mt-0.5">Vue d'ensemble de vos statistiques</p>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
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

                <!-- Statistics Cards - LIGNE 1 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-indigo-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-indigo-50 text-indigo-600 text-xs font-semibold rounded-full">Total</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($total) }}</p>
                        <p class="text-xs lg:text-sm text-gray-500">Contacts enregistrés</p>
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-green-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-green-50 text-green-600 text-xs font-semibold rounded-full">Aujourd'hui</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($todayMessages) }}</p>
                        <p class="text-xs lg:text-sm text-gray-500">Nouveaux contacts</p>
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">Taux</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ $successRate }}%</p>
                        <p class="text-xs lg:text-sm text-gray-500">Messages envoyés</p>
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-purple-50 text-purple-600 text-xs font-semibold rounded-full">Campagnes</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ $campagnes->count() }}</p>
                        <p class="text-xs lg:text-sm text-gray-500">Campagnes actives</p>
                    </div>
                </div>

                <!-- Statistics Cards - LIGNE 2 (Statistiques des Pushs) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-6 lg:mb-8">
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 lg:p-6 rounded-xl border border-orange-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-white text-orange-600 text-xs font-semibold rounded-full">Total</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($totalPushs) }}</p>
                        <p class="text-xs lg:text-sm text-gray-700">Pushs effectués (total)</p>
                    </div>

                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-4 lg:p-6 rounded-xl border border-emerald-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-white text-emerald-600 text-xs font-semibold rounded-full">Réussis</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($successfulPushs) }}</p>
                        <p class="text-xs lg:text-sm text-gray-700">Pushs réussis</p>
                    </div>

                    <div class="bg-gradient-to-br from-sky-50 to-sky-100 p-4 lg:p-6 rounded-xl border border-sky-200 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-white text-sky-600 text-xs font-semibold rounded-full">Aujourd'hui</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($todayPushs) }}</p>
                        <p class="text-xs lg:text-sm text-gray-700">Pushs aujourd'hui ({{ $todaySuccessful }} réussis)</p>
                    </div>
                </div>

                <!-- Campaign Statistics -->
                @if($campaignStats->count() > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-4">Statistiques par Campagne</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-4">
                        @foreach($campaignStats as $stat)
                        <div class="border border-gray-200 rounded-lg p-3 lg:p-4 hover:shadow-md transition">
                            <h4 class="font-semibold text-gray-900 text-sm lg:text-base mb-3">{{ $stat->nom_campagne }}</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs lg:text-sm">
                                    <span class="text-gray-600">Total pushs:</span>
                                    <span class="font-semibold text-gray-900">{{ $stat->total_pushs }}</span>
                                </div>
                                <div class="flex justify-between text-xs lg:text-sm">
                                    <span class="text-gray-600">Réussis:</span>
                                    <span class="font-semibold text-green-600">{{ $stat->successful_pushs }}</span>
                                </div>
                                <div class="flex justify-between text-xs lg:text-sm">
                                    <span class="text-gray-600">Échoués:</span>
                                    <span class="font-semibold text-red-600">{{ $stat->failed_pushs }}</span>
                                </div>
                                <div class="flex justify-between text-xs lg:text-sm pt-2 border-t border-gray-200">
                                    <span class="text-gray-600">Taux de réussite:</span>
                                    <span class="font-bold {{ $stat->success_rate >= 80 ? 'text-green-600' : ($stat->success_rate >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                                        {{ $stat->success_rate }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Recent Push Logs -->
                @if($recentPushs->count() > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-4">Derniers Pushs Effectués</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px]">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID Push</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Numéro</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Campagne</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date/Heure</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($recentPushs as $push)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 text-xs lg:text-sm text-gray-900 font-mono">
                                        #{{ $push->id }}
                                    </td>
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 text-xs lg:text-sm text-gray-900">
                                        {{ $push->numero_telephone }}
                                    </td>
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 text-xs lg:text-sm text-gray-600">
                                        {{ $push->nom_campagne }}
                                    </td>
                                    <td class="px-3 py-2 lg:px-4 lg:py-3">
                                        @if($push->status === 'success')
                                        <span class="inline-flex items-center px-2 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            Réussi
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-2 py-1 bg-red-50 text-red-700 text-xs font-medium rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                            </svg>
                                            Échoué
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 text-xs lg:text-sm text-gray-500">
                                        {{ $push->sent_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($recentPushs->count() >= 10)
                    <div class="mt-4 flex justify-center">
                        <a href="#" class="px-4 py-2 bg-indigo-50 text-indigo-600 text-sm font-medium rounded-lg hover:bg-indigo-100 transition">
                            Voir tous les logs
                        </a>
                    </div>
                    @endif
                </div>
                @else
                <div class="bg-white p-6 rounded-xl border border-gray-100 text-center">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun push effectué</h3>
                    <p class="text-gray-500 text-sm">Les logs des pushs apparaitront ici une fois les premières campagnes lancées.</p>
                </div>
                @endif

                <!-- Quick Actions -->
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100">
                    <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-4">Actions Rapides</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                        <!-- Nouveau Contact - Désactivé car pas de route create -->
                        {{-- <div class="p-4 border-2 border-dashed border-gray-300 rounded-xl opacity-50 cursor-not-allowed">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-500">Nouveau Contact</span>
                            <p class="text-xs text-gray-400 mt-1">Utilisez l'import</p>
                        </div> --}}

                        <!-- Import Contacts -->
                        {{-- <a href="{{ route('contacts.import') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition group text-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-blue-700">Importer Contacts</span>
                        </a> --}}

                        <!-- Gestion des Contacts -->
                        <a href="{{ route('contacts.index') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-green-300 hover:bg-green-50 transition group text-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-green-200 transition">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-green-700">Gérer Contacts</span>
                        </a>

                        <!-- Configuration Twilio -->
                        <a href="{{ route('twilio.config') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-purple-300 hover:bg-purple-50 transition group text-center">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-purple-200 transition">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-purple-700">Configuration</span>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript pour le menu mobile -->
    <script>
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

            // Fermer le sidebar en cliquant sur un lien (mobile)
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        toggleSidebar();
                    }
                });
            });
        });
    </script>
</x-app-layout>
