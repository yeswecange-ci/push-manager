<x-app-layout>
    <div class="app-container">
        <!-- Mobile menu button -->
        <div class="mobile-menu-button-container">
            <button id="mobile-menu-button" class="mobile-menu-button">
                <svg class="mobile-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Sidebar Overlay -->
        <div id="sidebar-overlay" class="sidebar-overlay"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <div class="logo-icon">
                        <svg class="logo-svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="logo-title">Push Manager</h1>
                        <p class="logo-subtitle">Yeswecange</p>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-item active">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="nav-text">Dashboard</span>
                </a>

                <a href="{{ route('contacts.index') }}" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="nav-text">Gestion des Contacts</span>
                </a>

                <a href="{{ route('twilio.config') }}" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="nav-text">Config Twilio</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">
                        <span class="avatar-text">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="user-info">
                        <p class="user-name">{{ Auth::user()->name }}</p>
                        <p class="user-email">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="main-header">
                <div class="header-content">
                    <div class="header-title-container">
                        <h2 class="header-title">Tableau de Bord</h2>
                        <p class="header-subtitle">Vue d'ensemble de vos statistiques</p>
                    </div>
                    <div class="header-actions">
                        <div class="time-display">
                            <p class="time-date">{{ now()->format('d/m/Y') }}</p>
                            <p class="time-hour">{{ now()->format('H:i') }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">
                                <svg class="logout-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span class="logout-text">Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="content-area">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="success-message">
                        <div class="success-icon">
                            <svg class="success-svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="success-text">{{ session('success') }}</p>
                        <button onclick="this.parentElement.remove()" class="success-close">
                            <svg class="close-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- Statistics Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon-container indigo-icon">
                                <svg class="stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <span class="stat-badge indigo-badge">Total</span>
                        </div>
                        <p class="stat-number">{{ number_format($total) }}</p>
                        <p class="stat-label">Contacts enregistrés</p>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon-container green-icon">
                                <svg class="stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <span class="stat-badge green-badge">Aujourd'hui</span>
                        </div>
                        <p class="stat-number">{{ number_format($todayMessages) }}</p>
                        <p class="stat-label">Nouveaux contacts</p>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon-container blue-icon">
                                <svg class="stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                            </div>
                            <span class="stat-badge blue-badge">Taux</span>
                        </div>
                        <p class="stat-number">{{ $successRate }}%</p>
                        <p class="stat-label">Messages envoyés</p>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon-container purple-icon">
                                <svg class="stat-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <span class="stat-badge purple-badge">Campagnes</span>
                        </div>
                        <p class="stat-number">{{ $campagnes->count() }}</p>
                        <p class="stat-label">Campagnes actives</p>
                    </div>
                </div>

                <!-- Campaign Statistics -->
                @if($campaignStats->count() > 0)
                <div class="campaign-stats">
                    <h3 class="section-title">Statistiques par Campagne</h3>
                    <div class="campaign-grid">
                        @foreach($campaignStats as $stat)
                        <div class="campaign-card">
                            <h4 class="campaign-name">{{ $stat->nom_campagne }}</h4>
                            <div class="campaign-stat">
                                <span class="stat-name">Contacts:</span>
                                <span class="stat-value">{{ $stat->total_contacts }}</span>
                            </div>
                            <div class="campaign-stat">
                                <span class="stat-name">Envoyés:</span>
                                <span class="stat-value sent">{{ $stat->sent_messages }}</span>
                            </div>
                            @php
                                $rate = $stat->total_contacts > 0 ? round(($stat->sent_messages / $stat->total_contacts) * 100, 1) : 0;
                            @endphp
                            <div class="campaign-stat">
                                <span class="stat-name">Taux:</span>
                                <span class="stat-value rate {{ $rate >= 80 ? 'high' : ($rate >= 50 ? 'medium' : 'low') }}">
                                    {{ $rate }}%
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Recent Contacts -->
                @if($recentContacts->count() > 0)
                <div class="recent-contacts">
                    <h3 class="section-title">Contacts Récents</h3>
                    <div class="table-container">
                        <table class="contacts-table">
                            <thead class="table-header">
                                <tr>
                                    <th class="table-head">Numéro</th>
                                    <th class="table-head">Campagne</th>
                                    <th class="table-head">Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($recentContacts as $contact)
                                <tr class="table-row">
                                    <td class="table-cell">
                                        <span class="phone-number">{{ $contact->numero_telephone }}</span>
                                    </td>
                                    <td class="table-cell">
                                        <span class="campaign-badge">{{ $contact->nom_campagne }}</span>
                                    </td>
                                    <td class="table-cell">
                                        <span class="contact-date">{{ $contact->created_at->format('d/m/Y H:i') }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h3 class="section-title">Actions Rapides</h3>
                    <div class="actions-container">
                        <a href="{{ route('contacts.index') }}" class="action-button primary">
                            <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Gérer les contacts
                        </a>

                        <a href="{{ route('twilio.config') }}" class="action-button secondary">
                            <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Configuration Twilio
                        </a>
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
                sidebar.classList.toggle('sidebar-open');
                sidebarOverlay.classList.toggle('overlay-visible');
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
        /* Variables CSS */
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --indigo-50: #eef2ff;
            --indigo-100: #e0e7ff;
            --indigo-500: #6366f1;
            --indigo-600: #4f46e5;
            --purple-50: #faf5ff;
            --purple-600: #9333ea;
            --green-50: #f0fdf4;
            --green-500: #22c55e;
            --green-600: #16a34a;
            --blue-50: #eff6ff;
            --blue-500: #3b82f6;
            --blue-600: #2563eb;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --white: #ffffff;
            --black: #000000;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 8px;
            --radius-lg: 12px;
        }

        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--gray-50);
            color: var(--gray-900);
            line-height: 1.6;
        }

        /* App Container */
        .app-container {
            display: flex;
            height: 100vh;
            background-color: var(--gray-50);
        }

        /* Mobile Menu Button */
        .mobile-menu-button-container {
            position: fixed;
            top: 16px;
            left: 16px;
            z-index: 50;
            display: none;
        }

        @media (max-width: 1023px) {
            .mobile-menu-button-container {
                display: block;
            }
        }

        .mobile-menu-button {
            padding: 8px;
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
            border: none;
            cursor: pointer;
        }

        .mobile-menu-icon {
            width: 24px;
            height: 24px;
            color: var(--gray-600);
        }

        /* Sidebar Overlay */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background-color: var(--black);
            opacity: 0.5;
            z-index: 30;
            display: none;
        }

        @media (max-width: 1023px) {
            .sidebar-overlay.overlay-visible {
                display: block;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            inset: 0;
            top: 0;
            left: 0;
            width: 256px;
            background-color: var(--white);
            border-right: 1px solid var(--gray-200);
            transform: translateX(-100%);
            transition: transform 0.3s;
            z-index: 40;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 1024px) {
            .sidebar {
                position: static;
                transform: translateX(0);
            }
        }

        @media (max-width: 1023px) {
            .sidebar.sidebar-open {
                transform: translateX(0);
            }
        }

        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid var(--gray-100);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(to bottom right, var(--indigo-500), var(--purple-600));
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-svg {
            width: 24px;
            height: 24px;
            color: var(--white);
        }

        .logo-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--gray-900);
        }

        .logo-subtitle {
            font-size: 12px;
            color: var(--gray-500);
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--gray-600);
            border-radius: var(--radius);
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background-color: var(--gray-50);
        }

        .nav-item.active {
            color: var(--gray-900);
            background-color: var(--indigo-50);
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
        }

        .nav-item.active .nav-icon {
            color: var(--indigo-600);
        }

        .nav-item:not(.active) .nav-icon {
            color: var(--gray-400);
        }

        .nav-item:not(.active):hover .nav-icon {
            color: var(--gray-600);
        }

        .nav-text {
            font-size: 14px;
            font-weight: 500;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 256px;
            padding: 16px;
            border-top: 1px solid var(--gray-100);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: var(--radius);
            transition: background-color 0.2s;
        }

        .user-profile:hover {
            background-color: var(--gray-50);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(to bottom right, var(--indigo-500), var(--purple-600));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .avatar-text {
            color: var(--white);
            font-size: 14px;
            font-weight: 600;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-900);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-email {
            font-size: 12px;
            color: var(--gray-500);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            overflow-y: auto;
            margin-left: 0;
        }

        @media (min-width: 1024px) {
            .main-content {
                margin-left: 0;
            }
        }

        /* Main Header */
        .main-header {
            background-color: var(--white);
            border-bottom: 1px solid var(--gray-100);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 32px;
        }

        @media (max-width: 1023px) {
            .header-content {
                padding: 16px;
            }
        }

        .header-title-container {
            margin-left: 48px;
        }

        @media (min-width: 1024px) {
            .header-title-container {
                margin-left: 0;
            }
        }

        .header-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--gray-900);
        }

        @media (min-width: 1024px) {
            .header-title {
                font-size: 20px;
            }
        }

        .header-subtitle {
            font-size: 12px;
            color: var(--gray-500);
            margin-top: 2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .time-display {
            text-align: right;
            margin-right: 16px;
            display: none;
        }

        @media (min-width: 640px) {
            .time-display {
                display: block;
            }
        }

        .time-date {
            font-size: 12px;
            color: var(--gray-500);
        }

        .time-hour {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray-700);
        }

        .logout-button {
            padding: 8px 12px;
            font-size: 14px;
            color: var(--gray-600);
            background: none;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }

        @media (min-width: 1024px) {
            .logout-button {
                padding: 8px 16px;
            }
        }

        .logout-button:hover {
            color: var(--gray-900);
            background-color: var(--gray-50);
        }

        .logout-icon {
            width: 16px;
            height: 16px;
            margin-right: 4px;
        }

        @media (min-width: 1024px) {
            .logout-icon {
                margin-right: 8px;
            }
        }

        .logout-text {
            display: none;
        }

        @media (min-width: 640px) {
            .logout-text {
                display: inline;
            }
        }

        /* Content Area */
        .content-area {
            padding: 16px 32px;
        }

        @media (min-width: 1024px) {
            .content-area {
                padding: 32px;
            }
        }

        /* Success Message */
        .success-message {
            padding: 16px;
            margin-bottom: 24px;
            background-color: var(--green-50);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            animation: fade-in 0.3s ease-out;
        }

        @media (min-width: 1024px) {
            .success-message {
                margin-bottom: 32px;
            }
        }

        .success-icon {
            width: 32px;
            height: 32px;
            background-color: var(--green-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .success-svg {
            width: 20px;
            height: 20px;
            color: var(--white);
        }

        .success-text {
            color: #065f46;
            font-weight: 500;
            font-size: 14px;
            flex: 1;
        }

        .success-close {
            color: var(--green-600);
            background: none;
            border: none;
            cursor: pointer;
            margin-left: 12px;
        }

        .success-close:hover {
            color: #065f46;
        }

        .close-icon {
            width: 20px;
            height: 20px;
        }

        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        @media (min-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 24px;
                margin-bottom: 32px;
            }
        }

        .stat-card {
            background-color: var(--white);
            padding: 16px 24px;
            border: 1px solid var(--gray-100);
            border-radius: var(--radius-lg);
            transition: box-shadow 0.2s;
        }

        @media (min-width: 1024px) {
            .stat-card {
                padding: 24px;
            }
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        @media (min-width: 1024px) {
            .stat-header {
                margin-bottom: 16px;
            }
        }

        .stat-icon-container {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 1024px) {
            .stat-icon-container {
                width: 48px;
                height: 48px;
            }
        }

        .indigo-icon {
            background-color: var(--indigo-50);
        }

        .green-icon {
            background-color: var(--green-50);
        }

        .blue-icon {
            background-color: var(--blue-50);
        }

        .purple-icon {
            background-color: var(--purple-50);
        }

        .stat-icon {
            width: 20px;
            height: 20px;
        }

        @media (min-width: 1024px) {
            .stat-icon {
                width: 24px;
                height: 24px;
            }
        }

        .indigo-icon .stat-icon {
            color: var(--indigo-600);
        }

        .green-icon .stat-icon {
            color: var(--green-600);
        }

        .blue-icon .stat-icon {
            color: var(--blue-600);
        }

        .purple-icon .stat-icon {
            color: var(--purple-600);
        }

        .stat-badge {
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 9999px;
        }

        @media (min-width: 1024px) {
            .stat-badge {
                padding: 4px 12px;
            }
        }

        .indigo-badge {
            background-color: var(--indigo-50);
            color: var(--indigo-600);
        }

        .green-badge {
            background-color: var(--green-50);
            color: var(--green-600);
        }

        .blue-badge {
            background-color: var(--blue-50);
            color: var(--blue-600);
        }

        .purple-badge {
            background-color: var(--purple-50);
            color: var(--purple-600);
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 4px;
        }

        @media (min-width: 1024px) {
            .stat-number {
                font-size: 30px;
            }
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray-500);
        }

        @media (min-width: 1024px) {
            .stat-label {
                font-size: 14px;
            }
        }

        /* Campaign Statistics */
        .campaign-stats {
            background-color: var(--white);
            padding: 16px 24px;
            border: 1px solid var(--gray-100);
            border-radius: var(--radius-lg);
            margin-bottom: 24px;
        }

        @media (min-width: 1024px) {
            .campaign-stats {
                padding: 24px;
                margin-bottom: 32px;
            }
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 16px;
        }

        @media (min-width: 1024px) {
            .section-title {
                font-size: 18px;
            }
        }

        .campaign-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        @media (min-width: 640px) {
            .campaign-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .campaign-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
            }
        }

        .campaign-card {
            border: 1px solid var(--gray-200);
            border-radius: var(--radius);
            padding: 12px 16px;
        }

        @media (min-width: 1024px) {
            .campaign-card {
                padding: 16px;
            }
        }

        .campaign-name {
            font-weight: 600;
            color: var(--gray-900);
            font-size: 14px;
            margin-bottom: 8px;
        }

        @media (min-width: 1024px) {
            .campaign-name {
                font-size: 16px;
            }
        }

        .campaign-stat {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        @media (min-width: 1024px) {
            .campaign-stat {
                font-size: 14px;
            }
        }

        .stat-name {
            color: var(--gray-600);
        }

        .stat-value {
            font-weight: 600;
        }

        .stat-value.sent {
            color: var(--green-600);
        }

        .stat-value.rate.high {
            color: var(--green-600);
        }

        .stat-value.rate.medium {
            color: #d97706;
        }

        .stat-value.rate.low {
            color: var(--error-color);
        }

        /* Recent Contacts */
        .recent-contacts {
            background-color: var(--white);
            padding: 16px 24px;
            border: 1px solid var(--gray-100);
            border-radius: var(--radius-lg);
        }

        @media (min-width: 1024px) {
            .recent-contacts {
                padding: 24px;
            }
        }

        .table-container {
            overflow-x: auto;
        }

        .contacts-table {
            width: 100%;
            min-width: 500px;
        }

        .table-header {
            background-color: var(--gray-50);
        }

        .table-head {
            padding: 8px 12px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
        }

        @media (min-width: 1024px) {
            .table-head {
                padding: 12px 16px;
            }
        }

        .table-body {
            background-color: var(--white);
        }

        .table-row {
            transition: background-color 0.2s;
        }

        .table-row:hover {
            background-color: var(--gray-50);
        }

        .table-cell {
            padding: 8px 12px;
            white-space: nowrap;
        }

        @media (min-width: 1024px) {
            .table-cell {
                padding: 12px 16px;
            }
        }

        .phone-number {
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-900);
        }

        .campaign-badge {
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 600;
            color: var(--indigo-700);
            background-color: var(--indigo-50);
            border-radius: var(--radius);
        }

        .contact-date {
            font-size: 12px;
            color: var(--gray-600);
        }

        @media (min-width: 1024px) {
            .contact-date {
                font-size: 14px;
            }
        }

        /* Quick Actions */
        .quick-actions {
            margin-top: 24px;
            background-color: var(--white);
            padding: 16px 24px;
            border: 1px solid var(--gray-100);
            border-radius: var(--radius-lg);
        }

        @media (min-width: 1024px) {
            .quick-actions {
                margin-top: 32px;
                padding: 24px;
            }
        }

        .actions-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        @media (min-width: 640px) {
            .actions-container {
                flex-direction: row;
            }
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 500;
            border-radius: var(--radius);
            text-decoration: none;
            transition: background-color 0.2s;
        }

        @media (min-width: 1024px) {
            .action-button {
                padding: 10px 20px;
            }
        }

        .action-button.primary {
            background-color: var(--indigo-600);
            color: var(--white);
        }

        .action-button.primary:hover {
            background-color: var(--primary-hover);
        }

        .action-button.secondary {
            background-color: var(--green-600);
            color: var(--white);
        }

        .action-button.secondary:hover {
            background-color: var(--green-700);
        }

        .action-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        /* Animations */
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

        /* Scrollbar Styling */
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
    </style>
</x-app-layout>
