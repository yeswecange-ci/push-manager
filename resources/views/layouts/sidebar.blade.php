
{{-- resources/views/layouts/sidebar.blade.php --}}

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
<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 w-64 bg-white border-r border-gray-200 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40 overflow-y-auto">
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
        <!-- Dashboard avec sous-menu -->
        <div class="dashboard-menu">
            <button onclick="toggleSubmenu()" class="w-full flex items-center justify-between px-4 py-3 text-gray-900 {{ request()->routeIs('dashboard*') ? 'bg-indigo-50' : 'hover:bg-gray-50' }} rounded-lg group transition">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </div>
                <svg id="submenu-icon" class="w-4 h-4 {{ request()->routeIs('dashboard*') ? 'text-indigo-600' : 'text-gray-400' }} transition-transform {{ request()->routeIs('dashboard*') ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div id="dashboard-submenu" class="ml-4 mt-1 space-y-1 overflow-hidden transition-all duration-300 {{ request()->routeIs('dashboard*') ? '' : 'max-h-0' }}">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Vue d'ensemble
                </a>
                <a href="{{ route('dashboard.statistics') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard.statistics') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Statistiques
                </a>
                <a href="{{ route('dashboard.campaigns') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard.campaigns') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Campagnes
                </a>
                <a href="{{ route('dashboard.pushlogs') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard.pushlogs') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Logs des Pushs
                </a>
                <a href="{{ route('dashboard.analytics') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard.analytics') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                    </svg>
                    Analyses
                </a>
            </div>
        </div>

        <a href="{{ route('contacts.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('contacts.*') ? 'text-gray-900 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg group transition">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('contacts.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span class="font-medium text-sm">Gestion des Contacts</span>
        </a>

        <a href="{{ route('twilio.config') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('twilio.*') ? 'text-gray-900 bg-indigo-50' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg group transition">
            <svg class="w-5 h-5 mr-3 {{ request()->routeIs('twilio.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="font-medium text-sm">Config chaîne</span>
        </a>
    </nav>

    <div class="absolute bottom-0 w-64 p-4 border-t border-gray-100 bg-white">
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
