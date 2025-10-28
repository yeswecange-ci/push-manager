<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
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
            max-width: 500px;
        }

        /* Carte de connexion */
        .login-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 40px;
            position: relative;
            overflow: hidden;
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
            line-height: 1.5;
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

        /* Groupes de formulaires */
        .form-group {
            margin-bottom: 24px;
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

        /* Section d'action avec bouton et lien */
        .action-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
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
            min-width: 200px;
        }

        .submit-button:hover {
            background-color: var(--primary-hover);
        }

        .submit-button:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        /* Lien de retour */
        .back-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-link:hover {
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
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
            color: var(--text-light);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .action-section {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .submit-button {
                width: 100%;
            }

            .back-link {
                align-self: flex-start;
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
                <h1 class="login-title">Réinitialisation du mot de passe</h1>
                <p class="login-subtitle">
                    Mot de passe oublié ? Aucun problème. Indiquez-nous votre adresse email et nous vous enverrons un lien de réinitialisation.
                </p>
            </div>

            <!-- Statut de session -->
            @if (session('status'))
                <div class="auth-status success">
                    <i class="fas fa-check-circle"></i> {{ session('status') }}
                </div>
            @endif

            <!-- Formulaire de réinitialisation -->
            <form method="POST" action="{{ route('password.email') }}" id="resetForm">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="votre@email.com">
                    @error('email')
                        <span class="input-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Section d'action -->
                <div class="action-section">
                    <a href="{{ route('login') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i>
                        Retour à la connexion
                    </a>

                    <button type="submit" class="submit-button" id="submitButton">
                        <span class="button-text">Envoyer le lien de réinitialisation</span>
                        <div class="loader" id="loader"></div>
                    </button>
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
            const resetForm = document.getElementById('resetForm');
            const submitButton = document.getElementById('submitButton');
            const buttonText = submitButton.querySelector('.button-text');
            const loader = document.getElementById('loader');

            resetForm.addEventListener('submit', function(e) {
                // Validation simple du formulaire
                const email = document.getElementById('email').value;

                if (!email) {
                    e.preventDefault();
                    alert('Veuillez saisir votre adresse email.');
                    return;
                }

                // Validation basique de l'email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    e.preventDefault();
                    alert('Veuillez saisir une adresse email valide.');
                    return;
                }

                // Afficher le loader et désactiver le bouton
                buttonText.textContent = 'Envoi en cours...';
                loader.style.display = 'block';
                submitButton.disabled = true;

                // Le formulaire sera soumis normalement
                // Le loader restera actif jusqu'à la redirection
            });

            // Réactiver le bouton si la validation côté client échoue
            resetForm.addEventListener('invalid', function() {
                setTimeout(function() {
                    buttonText.textContent = 'Envoyer le lien de réinitialisation';
                    loader.style.display = 'none';
                    submitButton.disabled = false;
                }, 100);
            }, true);
        });
    </script>
</body>
</html>
