<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe</title>
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

        /* Indicateur de force du mot de passe */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            border-radius: 2px;
            background-color: #e2e8f0;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak {
            background-color: #ef4444;
            width: 33%;
        }

        .strength-medium {
            background-color: #f59e0b;
            width: 66%;
        }

        .strength-strong {
            background-color: #10b981;
            width: 100%;
        }

        .password-requirements {
            margin-top: 8px;
            font-size: 12px;
            color: var(--text-light);
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 2px;
        }

        .requirement.met {
            color: var(--success-color);
        }

        .requirement.unmet {
            color: var(--text-light);
        }

        /* Section d'action avec bouton et lien */
        .action-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 32px;
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
                <h1 class="login-title">Nouveau mot de passe</h1>
                <p class="login-subtitle">
                    Créez un nouveau mot de passe sécurisé pour votre compte
                </p>
            </div>

            <!-- Messages d'erreur généraux -->
            @if ($errors->any())
                <div class="auth-status error">
                    <i class="fas fa-exclamation-circle"></i>
                    @foreach ($errors->all() as $error)
                        {{ $error }}@if (!$loop->last)<br>@endif
                    @endforeach
                </div>
            @endif

            <!-- Formulaire de réinitialisation -->
            <form method="POST" action="{{ route('password.store') }}" id="resetForm">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Adresse email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email" placeholder="votre@email.com">
                    @error('email')
                        <span class="input-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Nouveau mot de passe</label>
                    <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="Votre nouveau mot de passe">

                    <!-- Indicateur de force du mot de passe -->
                    <div class="password-strength">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>

                    <!-- Exigences du mot de passe -->
                    <div class="password-requirements">
                        <div class="requirement unmet" id="reqLength">
                            <i class="fas fa-circle" style="font-size: 6px;"></i>
                            Au moins 8 caractères
                        </div>
                        <div class="requirement unmet" id="reqLowercase">
                            <i class="fas fa-circle" style="font-size: 6px;"></i>
                            Une lettre minuscule
                        </div>
                        <div class="requirement unmet" id="reqUppercase">
                            <i class="fas fa-circle" style="font-size: 6px;"></i>
                            Une lettre majuscule
                        </div>
                        <div class="requirement unmet" id="reqNumber">
                            <i class="fas fa-circle" style="font-size: 6px;"></i>
                            Un chiffre
                        </div>
                    </div>

                    @error('password')
                        <span class="input-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez votre nouveau mot de passe">

                    <!-- Indicateur de correspondance -->
                    <div class="password-requirements">
                        <div class="requirement unmet" id="reqMatch">
                            <i class="fas fa-circle" style="font-size: 6px;"></i>
                            Les mots de passe correspondent
                        </div>
                    </div>

                    @error('password_confirmation')
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

                    <button type="submit" class="submit-button" id="submitButton" disabled>
                        <span class="button-text">Réinitialiser le mot de passe</span>
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
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const strengthBar = document.getElementById('strengthBar');

            // Éléments des exigences
            const reqLength = document.getElementById('reqLength');
            const reqLowercase = document.getElementById('reqLowercase');
            const reqUppercase = document.getElementById('reqUppercase');
            const reqNumber = document.getElementById('reqNumber');
            const reqMatch = document.getElementById('reqMatch');

            function checkPasswordStrength(password) {
                let strength = 0;
                let requirements = {
                    length: false,
                    lowercase: false,
                    uppercase: false,
                    number: false
                };

                // Longueur minimale
                if (password.length >= 8) {
                    strength += 25;
                    requirements.length = true;
                }

                // Lettre minuscule
                if (/[a-z]/.test(password)) {
                    strength += 25;
                    requirements.lowercase = true;
                }

                // Lettre majuscule
                if (/[A-Z]/.test(password)) {
                    strength += 25;
                    requirements.uppercase = true;
                }

                // Chiffre
                if (/[0-9]/.test(password)) {
                    strength += 25;
                    requirements.number = true;
                }

                return { strength, requirements };
            }

            function updatePasswordRequirements(requirements) {
                // Mettre à jour les indicateurs visuels
                reqLength.className = requirements.length ? 'requirement met' : 'requirement unmet';
                reqLowercase.className = requirements.lowercase ? 'requirement met' : 'requirement unmet';
                reqUppercase.className = requirements.uppercase ? 'requirement met' : 'requirement unmet';
                reqNumber.className = requirements.number ? 'requirement met' : 'requirement unmet';

                // Mettre à jour la barre de force
                strengthBar.className = 'strength-bar';
                if (requirements.length && requirements.lowercase && requirements.uppercase && requirements.number) {
                    strengthBar.classList.add('strength-strong');
                } else if ((requirements.length && requirements.lowercase && requirements.uppercase) ||
                          (requirements.length && requirements.lowercase && requirements.number) ||
                          (requirements.length && requirements.uppercase && requirements.number)) {
                    strengthBar.classList.add('strength-medium');
                } else if (requirements.length && (requirements.lowercase || requirements.uppercase || requirements.number)) {
                    strengthBar.classList.add('strength-weak');
                }
            }

            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;

                if (confirm.length > 0) {
                    reqMatch.className = password === confirm ? 'requirement met' : 'requirement unmet';
                } else {
                    reqMatch.className = 'requirement unmet';
                }

                return password === confirm;
            }

            function validateForm() {
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                const { requirements } = checkPasswordStrength(password);
                const passwordsMatch = checkPasswordMatch();

                // Activer le bouton seulement si tous les critères sont remplis
                const isStrongPassword = requirements.length && requirements.lowercase &&
                                       requirements.uppercase && requirements.number;

                submitButton.disabled = !(isStrongPassword && passwordsMatch && password.length > 0 && confirm.length > 0);
            }

            // Écouteurs d'événements
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const { strength, requirements } = checkPasswordStrength(password);
                updatePasswordRequirements(requirements);
                validateForm();
            });

            confirmInput.addEventListener('input', function() {
                checkPasswordMatch();
                validateForm();
            });

            resetForm.addEventListener('submit', function(e) {
                // Validation finale avant soumission
                const email = document.getElementById('email').value;
                const password = passwordInput.value;
                const confirm = confirmInput.value;

                if (!email || !password || !confirm) {
                    e.preventDefault();
                    alert('Veuillez remplir tous les champs obligatoires.');
                    return;
                }

                if (!checkPasswordMatch()) {
                    e.preventDefault();
                    alert('Les mots de passe ne correspondent pas.');
                    return;
                }

                // Afficher le loader et désactiver le bouton
                buttonText.textContent = 'Réinitialisation en cours...';
                loader.style.display = 'block';
                submitButton.disabled = true;
            });

            // Validation initiale
            validateForm();
        });
    </script>
</body>
</html>
