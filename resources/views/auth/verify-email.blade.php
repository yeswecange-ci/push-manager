<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de l'email</title>
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
            --warning-color: #f59e0b;
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
            text-align: center;
        }

        /* Icône de vérification */
        .verification-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            color: white;
            font-size: 32px;
        }

        /* En-tête */
        .login-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-color);
        }

        .login-subtitle {
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.6;
        }

        /* Styles pour les messages de statut */
        .auth-status {
            padding: 16px;
            border-radius: var(--radius);
            margin-bottom: 24px;
            font-size: 14px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .auth-status.success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .auth-status.info {
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--primary-color);
            border: 1px solid rgba(79, 70, 229, 0.2);
        }

        .auth-status.warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning-color);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        /* Instructions */
        .instructions {
            background-color: rgba(248, 250, 252, 0.8);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 24px;
            text-align: left;
        }

        .instructions-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .instructions-list {
            list-style: none;
            padding-left: 0;
        }

        .instructions-list li {
            padding: 6px 0;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 14px;
            color: var(--text-light);
        }

        .instructions-list li i {
            color: var(--primary-color);
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Section d'actions */
        .action-section {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 24px;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Boutons */
        .submit-button {
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 180px;
        }

        .submit-button:hover {
            background-color: var(--primary-hover);
        }

        .submit-button:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        .logout-button {
            padding: 12px 24px;
            background-color: transparent;
            color: var(--text-light);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 140px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #f8fafc;
            border-color: var(--text-light);
        }

        /* Loader */
        .loader {
            display: none;
            width: 16px;
            height: 16px;
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

        /* Support */
        .support-section {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .support-text {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 12px;
        }

        .support-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }

        .support-link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
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
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .submit-button, .logout-button {
                width: 100%;
                max-width: 250px;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 24px;
            }

            .login-title {
                font-size: 20px;
            }

            .verification-icon {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Icône de vérification -->
            <div class="verification-icon">
                <i class="fas fa-envelope"></i>
            </div>

            <!-- En-tête -->
            <div class="login-header">
                <h1 class="login-title">Vérifiez votre adresse email</h1>
                <p class="login-subtitle">
                    Merci pour votre inscription ! Avant de commencer, veuillez vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer.
                </p>
            </div>

            <!-- Message de statut -->
            @if (session('status') == 'verification-link-sent')
                <div class="auth-status success">
                    <i class="fas fa-check-circle"></i>
                    Un nouveau lien de vérification a été envoyé à l'adresse email que vous avez fournie lors de l'inscription.
                </div>
            @endif

            <!-- Instructions -->
            <div class="instructions">
                <h3 class="instructions-title">
                    <i class="fas fa-info-circle"></i>
                    Instructions de vérification
                </h3>
                <ul class="instructions-list">
                    <li>
                        <i class="fas fa-envelope"></i>
                        Vérifiez votre boîte de réception (et vos spams)
                    </li>
                    <li>
                        <i class="fas fa-mouse-pointer"></i>
                        Cliquez sur le lien de vérification dans l'email
                    </li>
                    <li>
                        <i class="fas fa-sync-alt"></i>
                        Revenez sur cette page une fois vérifié
                    </li>
                </ul>
            </div>

            <!-- Section d'actions -->
            <div class="action-section">
                <!-- Formulaire de renvoi d'email -->
                <form method="POST" action="{{ route('verification.send') }}" id="verificationForm">
                    @csrf
                    <div class="action-buttons">
                        <button type="submit" class="submit-button" id="submitButton">
                            <span class="button-text">Renvoyer l'email de vérification</span>
                            <div class="loader" id="loader"></div>
                        </button>

                        <!-- Formulaire de déconnexion -->
                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                            <button type="submit" class="logout-button">
                                <i class="fas fa-sign-out-alt"></i>
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </form>
            </div>

            <!-- Section support -->
            <div class="support-section">
                <p class="support-text">
                    Vous n'avez pas reçu l'email ? Vérifiez vos spams ou contactez le support.
                </p>
                <a href="mailto:support@yeswecange.com" class="support-link">
                    <i class="fas fa-life-ring"></i>
                    Contacter le support
                </a>
            </div>

            <!-- Pied de page -->
            <div class="login-footer">
                &copy; {{ date('Y') }} Yeswecange. Tous droits réservés.
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const verificationForm = document.getElementById('verificationForm');
            const logoutForm = document.getElementById('logoutForm');
            const submitButton = document.getElementById('submitButton');
            const buttonText = submitButton.querySelector('.button-text');
            const loader = document.getElementById('loader');

            // Gestion du renvoi d'email de vérification
            verificationForm.addEventListener('submit', function(e) {
                // Afficher le loader et désactiver le bouton
                buttonText.textContent = 'Envoi en cours...';
                loader.style.display = 'block';
                submitButton.disabled = true;

                // Laisser le formulaire se soumettre normalement
                // Le loader restera actif jusqu'à la redirection
            });

            // Gestion de la déconnexion
            logoutForm.addEventListener('submit', function(e) {
                // Demander confirmation avant déconnexion
                if (!confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                    e.preventDefault();
                    return;
                }
            });

            // Vérification périodique si l'email a été vérifié
            function checkEmailVerification() {
                // Cette fonction pourrait être utilisée pour rediriger automatiquement
                // si l'email est vérifié, mais nécessite une implémentation backend
                console.log('Vérification du statut de validation...');
            }

            // Vérifier toutes les 30 secondes (optionnel)
            // setInterval(checkEmailVerification, 30000);

            // Animation d'entrée
            const card = document.querySelector('.login-card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>
