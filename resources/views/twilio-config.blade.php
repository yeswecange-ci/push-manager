<x-app-layout>
    <div class="flex-container">
        <!-- Mobile menu button -->
        <div class="mobile-menu-container">
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
                        <h1 class="app-title">Push Manager</h1>
                        <p class="app-subtitle">Yeswecange</p>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="{{ route('contacts.index') }}" class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="nav-text">Gestion des Contacts</span>
                </a>
                <a href="{{ route('twilio.config') }}" class="nav-item active">
                    <svg class="nav-icon active" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
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
                        <h2 class="header-title">Configuration Twilio</h2>
                        <p class="header-subtitle">Configurez vos identifiants Twilio pour WhatsApp</p>
                    </div>
                    <div class="header-actions">
                        <div class="date-time">
                            <p class="date-text">{{ now()->format('d/m/Y') }}</p>
                            <p class="time-text">{{ now()->format('H:i') }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">
                                <svg class="logout-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="logout-text">Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="content-container">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="success-message">
                        <div class="success-icon-container">
                            <svg class="success-icon" fill="currentColor" viewBox="0 0 20 20">
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

                <!-- Error Message -->
                @if(session('error'))
                    <div class="error-message">
                        <div class="error-icon-container">
                            <svg class="error-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="error-text">{{ session('error') }}</p>
                        <button onclick="this.parentElement.remove()" class="error-close">
                            <svg class="close-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="grid-container">
                    <!-- Configuration Form -->
                    <div class="form-container">
                        <div class="form-card">
                            <h3 class="form-title">Configuration Twilio</h3>

                            <form method="POST" action="{{ route('twilio.saveConfig') }}">
                                @csrf

                                <div class="form-fields">
                                    <!-- Account SID -->
                                    <div class="form-field">
                                        <label class="field-label">
                                            Account SID *
                                        </label>
                                        <input type="text" name="account_sid" required
                                               value="{{ old('account_sid', $config->account_sid ?? '') }}"
                                               placeholder="ACxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                               class="field-input">
                                        <p class="field-help">
                                            Trouvable dans votre dashboard Twilio
                                        </p>
                                    </div>

                                    <!-- Auth Token -->
                                    <div class="form-field">
                                        <label class="field-label">
                                            Auth Token *
                                        </label>
                                        <input type="password" name="auth_token" required
                                               value="{{ old('auth_token', $config->auth_token ?? '') }}"
                                               placeholder="Votre token d'authentification"
                                               class="field-input">
                                        <p class="field-help">
                                            Gardez cette information secrète
                                        </p>
                                    </div>

                                    <!-- Content SID -->
                                    <div class="form-field">
                                        <label class="field-label">
                                            Content SID *
                                        </label>
                                        <input type="text" name="content_sid" required
                                               value="{{ old('content_sid', $config->content_sid ?? '') }}"
                                               placeholder="HXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                               class="field-input">
                                        <p class="field-help">
                                            ID de votre template WhatsApp approuvé
                                        </p>
                                    </div>

                                    <!-- From Number (Messaging Service) -->
                                    <div class="form-field">
                                        <label class="field-label">
                                            Messaging Service SID *
                                        </label>
                                        <input type="text" name="from_number" required
                                               value="{{ old('from_number', $config->from_number ?? '') }}"
                                               placeholder="MGxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
                                               class="field-input">
                                        <p class="field-help">
                                            ID de votre Messaging Service Twilio
                                        </p>
                                    </div>

                                    <div class="form-submit">
                                        <button type="submit"
                                                class="submit-button">
                                            Enregistrer la configuration
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="sidebar-content">
                        <!-- Guide -->
                        <div class="info-card">
                            <h4 class="info-title">Guide d'installation</h4>

                            <div class="steps-container">
                                <div class="step-item">
                                    <div class="step-number">
                                        1
                                    </div>
                                    <div>
                                        <p class="step-title">Twilio Console</p>
                                        <p class="step-description">
                                            Connectez-vous à votre compte Twilio
                                        </p>
                                    </div>
                                </div>

                                <div class="step-item">
                                    <div class="step-number">
                                        2
                                    </div>
                                    <div>
                                        <p class="step-title">Account SID & Auth Token</p>
                                        <p class="step-description">
                                            Disponibles sur la page d'accueil de la console
                                        </p>
                                    </div>
                                </div>

                                <div class="step-item">
                                    <div class="step-number">
                                        3
                                    </div>
                                    <div>
                                        <p class="step-title">Content SID</p>
                                        <p class="step-description">
                                            Créez un template WhatsApp dans Content API
                                        </p>
                                    </div>
                                </div>

                                <div class="step-item">
                                    <div class="step-number">
                                        4
                                    </div>
                                    <div>
                                        <p class="step-title">Messaging Service</p>
                                        <p class="step-description">
                                            Créez un service et ajoutez votre numéro WhatsApp
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Configuration -->
                        @if($config)
                        <div class="config-status active">
                            <div class="status-header">
                                <svg class="status-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <h4 class="status-title">Configuration Active</h4>
                            </div>

                            <div class="config-details">
                                <div class="config-detail">
                                    <span class="detail-label">Account SID:</span>
                                    <span class="detail-value">{{ substr($config->account_sid, 0, 10) }}...</span>
                                </div>
                                <div class="config-detail">
                                    <span class="detail-label">Content SID:</span>
                                    <span class="detail-value">{{ substr($config->content_sid, 0, 10) }}...</span>
                                </div>
                                <div class="config-detail">
                                    <span class="detail-label">From Number:</span>
                                    <span class="detail-value">{{ substr($config->from_number, 0, 10) }}...</span>
                                </div>
                                <div class="config-detail">
                                    <span class="detail-label">Dernière mise à jour:</span>
                                    <span class="detail-value">{{ $config->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="config-status warning">
                            <div class="status-header">
                                <svg class="status-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <h4 class="status-title">Configuration Requise</h4>
                            </div>
                            <p class="status-description">
                                Aucune configuration Twilio active. Veuillez remplir le formulaire pour activer l'envoi de messages WhatsApp.
                            </p>
                        </div>
                        @endif

                        <!-- Test Connection -->
                        @if($config)
                        <div class="test-connection">
                            <h4 class="test-title">Tester la connexion</h4>
                            <p class="test-description">
                                Vérifiez que votre configuration fonctionne correctement.
                            </p>
                            <a href="{{ route('contacts.index') }}"
                               class="test-button">
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
        /* Base styles */
        .flex-container {
            display: flex;
            height: 100vh;
            background-color: #f9fafb;
        }

        /* Mobile menu */
        .mobile-menu-container {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 50;
        }

        .mobile-menu-button {
            padding: 0.5rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .mobile-menu-icon {
            width: 1.5rem;
            height: 1.5rem;
            color: #4b5563;
        }

        /* Sidebar overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background-color: black;
            opacity: 0.5;
            z-index: 30;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            inset: 0;
            left: 0;
            width: 16rem;
            background-color: white;
            border-right: 1px solid #e5e7eb;
            transform: translateX(-100%);
            transition: transform 0.3s;
            z-index: 40;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(to bottom right, #6366f1, #8b5cf6);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-svg {
            width: 1.5rem;
            height: 1.5rem;
            color: white;
        }

        .app-title {
            font-size: 1.125rem;
            font-weight: bold;
            color: #111827;
        }

        .app-subtitle {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .sidebar-nav {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #4b5563;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .nav-item:hover {
            background-color: #f9fafb;
        }

        .nav-item.active {
            color: #111827;
            background-color: #eef2ff;
        }

        .nav-icon {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.75rem;
            color: #9ca3af;
            transition: color 0.3s;
        }

        .nav-item:hover .nav-icon {
            color: #4b5563;
        }

        .nav-item.active .nav-icon {
            color: #4f46e5;
        }

        .nav-text {
            font-size: 0.875rem;
            font-weight: 500;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 16rem;
            padding: 1rem;
            border-top: 1px solid #f3f4f6;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s;
        }

        .user-profile:hover {
            background-color: #f9fafb;
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(to bottom right, #6366f1, #8b5cf6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .avatar-text {
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: #111827;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-email {
            font-size: 0.75rem;
            color: #6b7280;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Main content */
        .main-content {
            flex: 1;
            overflow-y: auto;
            margin-left: 0;
        }

        .main-header {
            background-color: white;
            border-bottom: 1px solid #f3f4f6;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1rem;
        }

        .header-title-container {
            margin-left: 0;
        }

        .header-title {
            font-size: 1.125rem;
            font-weight: bold;
            color: #111827;
        }

        .header-subtitle {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.125rem;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .date-time {
            text-align: right;
            margin-right: 1rem;
        }

        .date-text {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .time-text {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .logout-button {
            display: flex;
            align-items: center;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            color: #4b5563;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .logout-button:hover {
            color: #111827;
            background-color: #f9fafb;
        }

        .logout-icon {
            width: 1rem;
            height: 1rem;
            margin-right: 0.25rem;
        }

        .logout-text {
            display: none;
        }

        /* Content container */
        .content-container {
            padding: 1rem;
        }

        /* Messages */
        .success-message {
            padding: 1rem;
            margin-bottom: 1.5rem;
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            animation: fade-in 0.3s ease-out;
        }

        .success-icon-container {
            width: 2rem;
            height: 2rem;
            background-color: #22c55e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        .success-icon {
            width: 1.25rem;
            height: 1.25rem;
            color: white;
        }

        .success-text {
            color: #14532d;
            font-weight: 500;
            font-size: 0.875rem;
            flex: 1;
        }

        .success-close {
            color: #16a34a;
            margin-left: 0.75rem;
        }

        .success-close:hover {
            color: #15803d;
        }

        .error-message {
            padding: 1rem;
            margin-bottom: 1.5rem;
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            animation: fade-in 0.3s ease-out;
        }

        .error-icon-container {
            width: 2rem;
            height: 2rem;
            background-color: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        .error-icon {
            width: 1.25rem;
            height: 1.25rem;
            color: white;
        }

        .error-text {
            color: #7f1d1d;
            font-weight: 500;
            font-size: 0.875rem;
            flex: 1;
        }

        .error-close {
            color: #dc2626;
            margin-left: 0.75rem;
        }

        .error-close:hover {
            color: #b91c1c;
        }

        .close-icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Grid layout */
        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        /* Form container */
        .form-container {
            grid-column: span 2;
        }

        .form-card {
            background-color: white;
            border-radius: 0.75rem;
            border: 1px solid #f3f4f6;
            padding: 1rem;
        }

        .form-title {
            font-size: 1.125rem;
            font-weight: bold;
            color: #111827;
            margin-bottom: 1rem;
        }

        .form-fields {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-field {
            margin-bottom: 0;
        }

        .field-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .field-input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.3s;
        }

        .field-input:focus {
            outline: none;
            border-color: transparent;
            box-shadow: 0 0 0 2px #4f46e5;
        }

        .field-help {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }

        .form-submit {
            padding-top: 0.5rem;
        }

        .submit-button {
            width: 100%;
            padding: 0.625rem 1rem;
            background-color: #4f46e5;
            color: white;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: background-color 0.3s;
            font-size: 0.875rem;
        }

        .submit-button:hover {
            background-color: #4338ca;
        }

        .submit-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px #4f46e5, 0 0 0 4px #c7d2fe;
        }

        /* Sidebar content */
        .sidebar-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .info-card {
            background-color: white;
            border-radius: 0.75rem;
            border: 1px solid #f3f4f6;
            padding: 1rem;
        }

        .info-title {
            font-size: 1rem;
            font-weight: bold;
            color: #111827;
            margin-bottom: 0.75rem;
        }

        .steps-container {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .step-number {
            width: 1.5rem;
            height: 1.5rem;
            background-color: #eef2ff;
            color: #4f46e5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
            flex-shrink: 0;
            margin-top: 0.125rem;
        }

        .step-title {
            font-size: 0.875rem;
            font-weight: 500;
            color: #111827;
        }

        .step-description {
            font-size: 0.75rem;
            color: #4b5563;
            margin-top: 0.125rem;
        }

        /* Config status */
        .config-status {
            border-radius: 0.75rem;
            padding: 1rem;
        }

        .config-status.active {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .config-status.warning {
            background-color: #fefce8;
            border: 1px solid #fef08a;
        }

        .status-header {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .status-icon {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.5rem;
        }

        .config-status.active .status-icon {
            color: #16a34a;
        }

        .config-status.warning .status-icon {
            color: #ca8a04;
        }

        .status-title {
            font-size: 1rem;
            font-weight: bold;
        }

        .config-status.active .status-title {
            color: #14532d;
        }

        .config-status.warning .status-title {
            color: #713f12;
        }

        .config-details {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            font-size: 0.75rem;
        }

        .config-detail {
            display: flex;
            justify-content: space-between;
        }

        .detail-label {
            color: #15803d;
        }

        .detail-value {
            color: #14532d;
            font-family: monospace;
            font-size: 0.75rem;
        }

        .status-description {
            font-size: 0.75rem;
            color: #713f12;
        }

        /* Test connection */
        .test-connection {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 0.75rem;
            padding: 1rem;
        }

        .test-title {
            font-size: 1rem;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 0.5rem;
        }

        .test-description {
            font-size: 0.75rem;
            color: #1e40af;
            margin-bottom: 0.75rem;
        }

        .test-button {
            display: block;
            width: 100%;
            padding: 0.625rem 1rem;
            background-color: #2563eb;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 0.5rem;
            text-align: center;
            transition: background-color 0.3s;
        }

        .test-button:hover {
            background-color: #1d4ed8;
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

        /* Responsive design */
        @media (min-width: 1024px) {
            .mobile-menu-container {
                display: none;
            }

            .sidebar-overlay {
                display: none !important;
            }

            .sidebar {
                position: static;
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .header-content {
                padding: 1.25rem 2rem;
            }

            .header-title {
                font-size: 1.25rem;
            }

            .logout-text {
                display: inline;
            }

            .logout-button {
                padding: 0.5rem 1rem;
            }

            .logout-icon {
                margin-right: 0.5rem;
            }

            .content-container {
                padding: 2rem;
            }

            .grid-container {
                grid-template-columns: 2fr 1fr;
                gap: 2rem;
            }

            .form-card {
                padding: 2rem;
            }

            .form-title {
                font-size: 1.25rem;
                margin-bottom: 1.5rem;
            }

            .form-fields {
                gap: 1.5rem;
            }

            .field-input {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }

            .form-submit {
                padding-top: 1rem;
            }

            .submit-button {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
            }

            .sidebar-content {
                gap: 1.5rem;
            }

            .info-card {
                padding: 1.5rem;
            }

            .info-title {
                font-size: 1.125rem;
                margin-bottom: 1rem;
            }

            .steps-container {
                gap: 1rem;
            }

            .config-status {
                padding: 1.5rem;
            }

            .test-connection {
                padding: 1.5rem;
            }
        }

        @media (min-width: 640px) {
            .date-time {
                display: block;
            }

            .logout-text {
                display: inline;
            }
        }

        /* Utility classes */
        .hidden {
            display: none;
        }

        .-translate-x-full {
            transform: translateX(-100%);
        }

        .translate-x-0 {
            transform: translateX(0);
        }

        .lg\:static {
            position: static;
        }

        .lg\:ml-0 {
            margin-left: 0;
        }

        .lg\:translate-x-0 {
            transform: translateX(0);
        }

        .lg\:block {
            display: block;
        }

        .lg\:hidden {
            display: none;
        }
    </style>
</x-app-layout>
