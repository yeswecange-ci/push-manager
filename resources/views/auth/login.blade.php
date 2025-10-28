<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variables CSS pour une cohérence du design */
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --secondary-color: #f8fafc;
            --text-color: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
            --error-color: #ef4444;
            --success-color: #10b981;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 8px;
        }

        /* Reset et styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Conteneur principal */
        .login-container {
            width: 100%;
            max-width: 800px;
        }

        /* Carte de connexion */
        .login-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 40px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* En-tête */
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .login-subtitle {
            color: var(--text-light);
            font-size: 16px;
        }

        /* Styles pour les messages de statut et d'erreur */
        .auth-status {
            padding: 12px 16px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        .auth-status.success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .auth-status.error {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--error-color);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .input-error {
            color: var(--error-color);
            font-size: 14px;
            margin-top: 6px;
            display: block;
        }

        /* Conteneur du formulaire horizontal */
        .form-container {
            display: flex;
            gap: 40px;
        }

        .form-column {
            flex: 1;
        }

        /* Groupes de formulaires */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 16px;
            transition: all 0.2s ease;
            background-color: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* Case à cocher "Se souvenir de moi" */
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .remember-checkbox {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: var(--primary-color);
        }

        .remember-label {
            font-size: 14px;
            color: var(--text-light);
        }

        /* Section d'action avec bouton et lien */
        .action-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        /* Bouton de soumission */
        .submit-button {
            padding: 14px 30px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-width: 150px;
        }

        .submit-button:hover {
            background-color: var(--primary-hover);
        }

        .submit-button:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        /* Lien mot de passe oublié */
        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        /* Loader */
        .loader {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Pied de page */
        .login-footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
            color: var(--text-light);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
                gap: 20px;
            }

            .action-section {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .submit-button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 24px;
            }

            .login-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- En-tête -->
            <div class="login-header">
                <h1 class="login-title">Connexion à votre compte</h1>
                <p class="login-subtitle">Entrez vos identifiants pour accéder à votre espace</p>
            </div>

            <!-- Statut de session -->
            {{-- <div class="auth-status success">
                <!-- Le contenu du statut sera injecté dynamiquement -->
            </div> --}}

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <div class="form-container">
                    <!-- Colonne Email -->
                    <div class="form-column">
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="votre@email.com">
                            <span class="input-error">
                                <!-- Les messages d'erreur seront injectés ici -->
                            </span>
                        </div>

                        <!-- Se souvenir de moi -->
                        <div class="remember-me">
                            <input id="remember_me" type="checkbox" class="remember-checkbox" name="remember">
                            <label for="remember_me" class="remember-label">Se souvenir de moi</label>
                        </div>
                    </div>

                    <!-- Colonne Mot de passe -->
                    <div class="form-column">
                        <!-- Mot de passe -->
                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="Votre mot de passe">
                            <span class="input-error">
                                <!-- Les messages d'erreur seront injectés ici -->
                            </span>
                        </div>

                        <!-- Section d'action -->
                        <div class="action-section">
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                Mot de passe oublié ?
                            </a>

                            <button type="submit" class="submit-button" id="submitButton">
                                <span class="button-text">Se connecter</span>
                                <div class="loader" id="loader"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Pied de page -->
            <div class="login-footer">
                &copy; {{ date('Y') }} Yeswecange. Tous droits réservés.
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const submitButton = document.getElementById('submitButton');
            const buttonText = submitButton.querySelector('.button-text');
            const loader = document.getElementById('loader');

            loginForm.addEventListener('submit', function(e) {
                // Validation simple du formulaire
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                if (!email || !password) {
                    e.preventDefault();
                    alert('Veuillez remplir tous les champs obligatoires.');
                    return;
                }

                // Afficher le loader et désactiver le bouton
                buttonText.textContent = 'Connexion en cours...';
                loader.style.display = 'block';
                submitButton.disabled = true;

                // Simuler un délai de traitement (à retirer en production)
                // setTimeout(function() {
                //     buttonText.textContent = 'Se connecter';
                //     loader.style.display = 'none';
                //     submitButton.disabled = false;
                // }, 3000);
            });
        });
    </script>
</body>
</html>
