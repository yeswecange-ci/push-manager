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
                        <div class="text-right mr-4 hidden sm:flex items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-200">
                            <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <div>
                                <p class="text-xs text-gray-500">{{ now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}</p>
                                <p class="text-sm font-medium text-gray-700">{{ now()->format('H:i') }}</p>
                            </div>
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

                <!-- Alertes et Notifications -->
                {{-- @if($alerts->count() > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-base lg:text-lg font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Alertes et Notifications
                        </h3>
                        <button onclick="closeAllAlerts()" class="text-sm text-gray-500 hover:text-gray-700 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Tout fermer
                        </button>
                    </div>
                    <div class="space-y-3" id="alerts-container">
                        @foreach($alerts as $index => $alert)
                        <div class="flex items-start p-3 rounded-lg transition-all duration-300 alert-item
                            @if($alert['type'] == 'warning') bg-yellow-50 border border-yellow-200
                            @elseif($alert['type'] == 'red') bg-red-50 border border-red-200
                            @else bg-blue-50 border border-blue-200 @endif">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0
                                @if($alert['type'] == 'warning') bg-yellow-500
                                @elseif($alert['type'] == 'red') bg-red-500
                                @else bg-blue-500 @endif">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    @if($alert['type'] == 'warning')
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    @else
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    @endif
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold
                                    @if($alert['type'] == 'warning') text-yellow-800
                                    @elseif($alert['type'] == 'red') text-red-800
                                    @else text-blue-800 @endif">
                                    {{ $alert['title'] }}
                                </h4>
                                <p class="text-xs mt-1
                                    @if($alert['type'] == 'warning') text-yellow-700
                                    @elseif($alert['type'] == 'red') text-red-700
                                    @else text-blue-700 @endif">
                                    {{ $alert['message'] }}
                                </p>
                            </div>
                            <button onclick="closeAlert(this)" class="ml-2
                                @if($alert['type'] == 'warning') text-yellow-600 hover:text-yellow-800
                                @elseif($alert['type'] == 'red') text-red-600 hover:text-red-800
                                @else text-blue-600 hover:text-blue-800 @endif">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif --}}

                <!-- Statistics Cards - LIGNE 1 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-lg transition-shadow">
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
                        @if(isset($totalGrowth) && $totalGrowth > 0)
                        <div class="flex items-center mt-2 text-xs text-green-600">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span>+{{ $totalGrowth }}% ce mois</span>
                        </div>
                        @endif
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-green-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-green-50 text-green-600 text-xs font-semibold rounded-full">Aujourd'hui</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($todayMessages) }}</p>
                        <p class="text-xs lg:text-sm text-gray-500">Nouveaux contacts</p>
                        @if(isset($todayGrowth) && $todayGrowth != 0)
                        <div class="flex items-center mt-2 text-xs {{ $todayGrowth > 0 ? 'text-green-600' : 'text-red-600' }}">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $todayGrowth > 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6' }}"/>
                            </svg>
                            <span>{{ $todayGrowth > 0 ? '+' : '' }}{{ $todayGrowth }}% vs hier</span>
                        </div>
                        @endif
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">Taux</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ $successRate }}%</p>
                        <p class="text-xs lg:text-sm text-gray-500">Taux de réussite</p>
                        @if(isset($successRateGrowth) && $successRateGrowth != 0)
                        <div class="flex items-center mt-2 text-xs {{ $successRateGrowth > 0 ? 'text-green-600' : 'text-red-600' }}">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $successRateGrowth > 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6' }}"/>
                            </svg>
                            <span>{{ $successRateGrowth > 0 ? '+' : '' }}{{ $successRateGrowth }}% ce mois</span>
                        </div>
                        @endif
                    </div>

                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-purple-50 text-purple-600 text-xs font-semibold rounded-full">Actives</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ $campagnes->count() }}</p>
                        <p class="text-xs lg:text-sm text-gray-500">Campagnes actives</p>
                        @if(isset($activeCampaignsCount))
                        <div class="flex items-center mt-2 text-xs text-gray-500">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $activeCampaignsCount }} en cours</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Statistics Cards - LIGNE 2 (Statistiques des Pushs) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
                    <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-indigo-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-indigo-50 text-indigo-600 text-xs font-semibold rounded-full">Aujourd'hui</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($todayPushs) }}</p>
                        <p class="text-xs lg:text-sm text-gray-500">Pushs envoyés</p>
                        @if(isset($todayPushsGrowth) && $todayPushsGrowth != 0)
                        <div class="flex items-center mt-2 text-xs {{ $todayPushsGrowth > 0 ? 'text-green-600' : 'text-red-600' }}">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $todayPushsGrowth > 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6' }}"/>
                            </svg>
                            <span>{{ $todayPushsGrowth > 0 ? '+' : '' }}{{ $todayPushsGrowth }}% vs hier</span>
                        </div>
                        @endif
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 lg:p-6 rounded-xl border border-green-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-white text-green-600 text-xs font-semibold rounded-full">Réussis</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ number_format($todaySuccessful) }}</p>
                        <p class="text-xs lg:text-sm text-gray-700">Pushs réussis aujourd'hui</p>
                        <div class="flex items-center mt-2 text-xs text-green-600">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $todaySuccessRate }}% de réussite</span>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 lg:p-6 rounded-xl border border-blue-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-white text-blue-600 text-xs font-semibold rounded-full">Moyenne</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ $avgResponseTime ?? '0.0' }}s</p>
                        <p class="text-xs lg:text-sm text-gray-700">Temps de réponse moyen</p>
                        @if(isset($responseTimeTrend))
                        <div class="flex items-center mt-2 text-xs {{ $responseTimeTrend < 0 ? 'text-green-600' : 'text-red-600' }}">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $responseTimeTrend < 0 ? 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6' : 'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6' }}"/>
                            </svg>
                            <span>{{ $responseTimeTrend < 0 ? '-' : '+' }}{{ abs($responseTimeTrend) }}% vs hier</span>
                        </div>
                        @endif
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 lg:p-6 rounded-xl border border-purple-200 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between mb-3 lg:mb-4">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <span class="px-2 py-1 lg:px-3 lg:py-1 bg-white text-purple-600 text-xs font-semibold rounded-full">Actives</span>
                        </div>
                        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mb-1">{{ $activeCampaignsCount ?? 0 }}</p>
                        <p class="text-xs lg:text-sm text-gray-700">Campagnes en cours</p>
                        <div class="flex items-center mt-2 text-xs text-purple-600">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <span>{{ $totalCampaigns ?? 0 }} au total</span>
                        </div>
                    </div>
                </div>

                <!-- Activité par tranche horaire -->
                @if(isset($hourlyStats) && count($hourlyStats) > 0 && ($maxHourlyPushs ?? 0) > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Activité par tranche horaire
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                        @foreach($hourlyStats as $stat)
                        <div class="text-center">
                            <div class="relative h-24 bg-gray-100 rounded-lg mb-2 overflow-hidden">
                                <div class="absolute bottom-0 w-full bg-gradient-to-t from-indigo-500 to-indigo-400 transition-all" style="height: {{ min(($stat['pushs'] / ($maxHourlyPushs ?? 1)) * 100, 100) }}%"></div>
                            </div>
                            <p class="text-xs font-semibold text-gray-700">{{ $stat['hour'] }}</p>
                            <p class="text-sm text-gray-500">{{ number_format($stat['pushs']) }} pushs</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Graphique d'activité récente -->
                @if(isset($weeklyActivity) && count($weeklyActivity) > 0 && ($maxDailyPushs ?? 0) > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <h3 class="text-base lg:text-lg font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Activité des 7 derniers jours
                        </h3>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-medium rounded-lg transition hover:bg-indigo-200">
                                7J
                            </button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-lg transition hover:bg-gray-200">
                                30J
                            </button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-lg transition hover:bg-gray-200">
                                90J
                            </button>
                        </div>
                    </div>

                    <div class="h-64 flex items-end space-x-2 justify-between pt-4">
                        @foreach($weeklyActivity as $day)
                        <div class="flex flex-col items-center flex-1">
                            <div class="relative w-full flex justify-center mb-2">
                                <div class="w-8 bg-gradient-to-t from-indigo-500 to-indigo-300 rounded-t-lg transition-all hover:from-indigo-600 hover:to-indigo-400"
                                     style="height: {{ (($day['pushs'] ?? 0) / ($maxDailyPushs ?? 1)) * 80 }}%"
                                     title="{{ $day['pushs'] ?? 0 }} pushs">
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 font-medium">{{ $day['label'] ?? 'N/A' }}</span>
                            <span class="text-xs text-gray-400 mt-1">{{ $day['pushs'] ?? 0 }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Campaign Statistics -->
                @if($campaignStats->count() > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <h3 class="text-base lg:text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                        </svg>
                        Statistiques par Campagne
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                        @foreach($campaignStats as $stat)
                        <div class="border border-gray-200 rounded-lg p-3 lg:p-4 hover:shadow-md transition">
                            <h4 class="font-semibold text-gray-900 text-sm lg:text-base mb-3 truncate" title="{{ $stat->nom_campagne }}">{{ $stat->nom_campagne }}</h4>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs lg:text-sm">
                                    <span class="text-gray-600">Total pushs:</span>
                                    <span class="font-semibold text-gray-900">{{ number_format($stat->total_pushs) }}</span>
                                </div>
                                <div class="flex justify-between text-xs lg:text-sm">
                                    <span class="text-gray-600">Réussis:</span>
                                    <span class="font-semibold text-green-600">{{ number_format($stat->successful_pushs) }}</span>
                                </div>
                                <div class="flex justify-between text-xs lg:text-sm">
                                    <span class="text-gray-600">Échoués:</span>
                                    <span class="font-semibold text-red-600">{{ number_format($stat->failed_pushs) }}</span>
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

                <!-- Recent Push Logs avec Recherche et Filtres -->
                @if($recentPushs->count() > 0)
                <div class="bg-white p-4 lg:p-6 rounded-xl border border-gray-100 mb-6 lg:mb-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <h3 class="text-base lg:text-lg font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Derniers Pushs Effectués
                        </h3>

                        <div class="flex flex-wrap items-center gap-2">
                            <!-- Compteur de résultats -->
                            <span class="text-sm text-gray-600" id="result-count">
                                {{ $recentPushs->count() }} résultat{{ $recentPushs->count() > 1 ? 's' : '' }}
                            </span>

                            <!-- Bouton filtres mobile -->
                            <button
                                onclick="toggleFilters()"
                                class="md:hidden px-3 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition flex items-center"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                Filtres
                            </button>

                            <!-- Bouton export -->
                            <button
                                onclick="exportTableData()"
                                class="px-3 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition flex items-center"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Exporter
                            </button>
                        </div>
                    </div>

                    <!-- Barre de recherche et filtres -->
                    <div id="filter-section" class="hidden md:block mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <!-- Recherche -->
                            <div class="md:col-span-2 relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                <input
                                    type="text"
                                    id="search-input"
                                    placeholder="Rechercher par numéro, campagne ou ID..."
                                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                    oninput="filterTable()"
                                />
                            </div>

                            <!-- Filtre par status -->
                            <select
                                id="status-filter"
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                onchange="filterTable()"
                            >
                                <option value="all">Tous les status</option>
                                <option value="success">Réussis uniquement</option>
                                <option value="failed">Échoués uniquement</option>
                            </select>

                            <!-- Filtre par date -->
                            <select
                                id="date-filter"
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                onchange="filterTable()"
                            >
                                <option value="all">Toutes les dates</option>
                                <option value="today">Aujourd'hui</option>
                                <option value="week">Cette semaine</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tableau -->
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[800px]" id="push-table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Numéro</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Campagne</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                                    <th class="px-3 py-2 lg:px-4 lg:py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date/Heure</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($recentPushs as $push)
                                <tr class="hover:bg-gray-50 transition table-row"
                                    data-id="{{ $push->id }}"
                                    data-phone="{{ $push->numero_telephone }}"
                                    data-campaign="{{ $push->nom_campagne }}"
                                    data-status="{{ $push->status }}"
                                    data-date="{{ $push->sent_at->format('Y-m-d') }}">
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 text-xs lg:text-sm text-gray-900 font-mono">
                                        #{{ $push->id }}
                                    </td>
                                    <td class="px-3 py-2 lg:px-4 lg:py-3 text-xs lg:text-sm text-gray-900 font-medium">
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

                    <div id="no-results" class="hidden text-center py-12">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun résultat trouvé</h3>
                        <p class="text-gray-500 text-sm">Essayez de modifier vos critères de recherche</p>
                    </div>

                    @if($recentPushs->count() >= 10)
                    <div class="mt-4 flex justify-center">
                        <a href="#" class="px-4 py-2 bg-indigo-50 text-indigo-600 text-sm font-medium rounded-lg hover:bg-indigo-100 transition">
                            Voir tous les logs ({{ $recentPushs->count() }})
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
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-4">
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

                        <!-- Rapports -->
                        <button onclick="generateReport()" class="p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition group text-center cursor-pointer">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-blue-700">Générer Rapport</span>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript -->
    <script>
        // Menu mobile
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

        // Toggle filters
        function toggleFilters() {
            const filterSection = document.getElementById('filter-section');
            filterSection.classList.toggle('hidden');
        }

        // Filter table
        function filterTable() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const statusFilter = document.getElementById('status-filter').value;
            const dateFilter = document.getElementById('date-filter').value;
            const table = document.getElementById('push-table');
            const rows = table.querySelectorAll('tbody .table-row');
            const noResults = document.getElementById('no-results');

            let visibleCount = 0;
            const today = new Date().toISOString().split('T')[0];
            const weekAgo = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000).toISOString().split('T')[0];

            rows.forEach(row => {
                const id = row.dataset.id.toLowerCase();
                const phone = row.dataset.phone.toLowerCase();
                const campaign = row.dataset.campaign.toLowerCase();
                const status = row.dataset.status;
                const date = row.dataset.date;

                const matchesSearch = id.includes(searchInput) ||
                                    phone.includes(searchInput) ||
                                    campaign.includes(searchInput);

                const matchesStatus = statusFilter === 'all' || status === statusFilter;

                let matchesDate = true;
                if (dateFilter === 'today') {
                    matchesDate = date === today;
                } else if (dateFilter === 'week') {
                    matchesDate = date >= weekAgo;
                }

                if (matchesSearch && matchesStatus && matchesDate) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Update result count
            document.getElementById('result-count').textContent =
                `${visibleCount} résultat${visibleCount > 1 ? 's' : ''}`;

            // Show/hide no results message
            if (visibleCount === 0) {
                table.style.display = 'none';
                noResults.classList.remove('hidden');
            } else {
                table.style.display = '';
                noResults.classList.add('hidden');
            }
        }

        // Export table data
        function exportTableData() {
            const table = document.getElementById('push-table');
            const rows = table.querySelectorAll('tbody .table-row');
            let csv = 'ID,Numéro,Campagne,Status,Date/Heure\n';

            rows.forEach(row => {
                if (row.style.display !== 'none') {
                    const cells = row.querySelectorAll('td');
                    const rowData = Array.from(cells).map(cell => {
                        return '"' + cell.textContent.trim().replace(/"/g, '""') + '"';
                    });
                    csv += rowData.join(',') + '\n';
                }
            });

            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);

            link.setAttribute('href', url);
            link.setAttribute('download', 'pushs_export_' + new Date().toISOString().split('T')[0] + '.csv');
            link.style.visibility = 'hidden';

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Gestion des alertes
        function closeAlert(button) {
            const alertItem = button.closest('.alert-item');
            alertItem.style.opacity = '0';
            alertItem.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                alertItem.remove();
                // Si plus d'alertes, masquer la section
                if (document.querySelectorAll('.alert-item').length === 0) {
                    document.querySelector('#alerts-container').closest('.bg-white').remove();
                }
            }, 300);
        }

        function closeAllAlerts() {
            const alerts = document.querySelectorAll('.alert-item');
            alerts.forEach((alert, index) => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(-100%)';
                    setTimeout(() => alert.remove(), 300);
                }, index * 100);
            });

            setTimeout(() => {
                const alertsContainer = document.querySelector('#alerts-container');
                if (alertsContainer) {
                    alertsContainer.closest('.bg-white').remove();
                }
            }, (alerts.length * 100) + 300);
        }

        // Génération de rapport
        function generateReport() {
            // Afficher un indicateur de chargement
            const button = event.target.closest('button');
            const originalText = button.querySelector('span').textContent;
            button.querySelector('span').textContent = 'Génération...';
            button.disabled = true;

            // Simuler la génération du rapport
            setTimeout(() => {
                // Créer les données du rapport
                const reportData = {
                    date: new Date().toLocaleDateString('fr-FR'),
                    totalContacts: {{ $total }},
                    totalPushs: {{ $totalPushs }},
                    successRate: {{ $successRate }},
                    todayPushs: {{ $todayPushs }},
                    avgResponseTime: {{ $avgResponseTime ?? 0 }}
                };

                // Créer le contenu du rapport
                const reportContent = `RAPPORT DE PERFORMANCE - ${reportData.date}

STATISTIQUES GLOBALES:
• Contacts enregistrés: ${reportData.totalContacts.toLocaleString()}
• Total des pushs: ${reportData.totalPushs.toLocaleString()}
• Taux de réussite: ${reportData.successRate}%
• Pushs aujourd'hui: ${reportData.todayPushs.toLocaleString()}
• Temps de réponse moyen: ${reportData.avgResponseTime}s

CAMPAGNES ACTIVES:
@foreach($campagnes as $campagne)
• {{ $campagne }}
@endforeach

DERNIÈRES ACTIVITÉS:
@foreach($recentPushs->take(5) as $push)
• {{ $push->sent_at->format('d/m/Y H:i') }} - {{ $push->numero_telephone }} - {{ $push->nom_campagne }} - {{ $push->status }}
@endforeach

--- Rapport généré automatiquement ---`;

                // Créer et télécharger le fichier
                const blob = new Blob([reportContent], { type: 'text/plain;charset=utf-8' });
                const link = document.createElement('a');
                const url = URL.createObjectURL(blob);

                link.setAttribute('href', url);
                link.setAttribute('download', `rapport_performance_${new Date().toISOString().split('T')[0]}.txt`);
                link.style.visibility = 'hidden';

                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Restaurer le bouton
                button.querySelector('span').textContent = originalText;
                button.disabled = false;

                // Afficher une notification de succès
                showNotification('Rapport généré avec succès!', 'success');
            }, 1500);
        }

        // Fonction de notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            // Animation d'entrée
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Auto-fermeture après 5 secondes
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 5000);
        }

        // Animation des barres de graphique
        document.addEventListener('DOMContentLoaded', function() {
            const bars = document.querySelectorAll('.bg-gradient-to-t');
            bars.forEach((bar, index) => {
                setTimeout(() => {
                    bar.style.transform = 'scaleY(1)';
                    bar.style.opacity = '1';
                }, index * 100);
            });
        });
    </script>

    <style>
        .bg-gradient-to-t {
            transform: scaleY(0);
            opacity: 0;
            transform-origin: bottom;
            transition: all 0.5s ease-in-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .alert-item {
            transition: all 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-app-layout>
