<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos identifiants Diaspora Shopping & Fly</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #0077be, #005c91);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        .content {
            padding: 30px 20px;
        }
        .credentials-box {
            background: #f8f9fa;
            border: 2px solid #0077be;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }
        .credentials-box h3 {
            color: #0077be;
            margin-top: 0;
            font-size: 18px;
        }
        .credential-item {
            background: white;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #0077be;
        }
        .credential-label {
            font-weight: bold;
            color: #666;
            font-size: 14px;
        }
        .credential-value {
            font-size: 16px;
            color: #333;
            font-family: 'Courier New', monospace;
            background: #f1f3f4;
            padding: 8px;
            border-radius: 4px;
            margin-top: 5px;
            word-break: break-all;
        }
        .btn {
            display: inline-block;
            background: #0077be;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            margin: 15px 0;
            font-weight: bold;
        }
        .btn:hover {
            background: #005c91;
        }
        .package-info {
            background: #e8f4f8;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .package-info h4 {
            color: #0077be;
            margin-top: 0;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #ddd;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .warning strong {
            color: #d63031;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .social-links {
            margin: 15px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #0077be;
            text-decoration: none;
        }
        .features-list {
            background: #f1f3f4;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .features-list h4 {
            color: #0077be;
            margin-top: 0;
        }
        .features-list ul {
            padding-left: 20px;
        }
        .features-list li {
            margin: 8px 0;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .content {
                padding: 20px 15px;
            }
            .info-row {
                flex-direction: column;
            }
            .info-row span:first-child {
                font-weight: bold;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🔐 Vos identifiants Diaspora Shopping & Fly</h1>
            <p>Bienvenue dans la famille DSF , {{ $user['name'] }} !</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Bonjour <strong>{{ $user['name'] }}</strong>,</p>

            <p>Votre colis a été créé avec succès ! Nous avons automatiquement généré un compte Diaspora Shopping & Fly pour vous permettre de suivre vos expéditions.</p>

            <!-- Credentials Box -->
            <div class="credentials-box">
                <h3>🔑 Vos identifiants de connexion</h3>

                <div class="credential-item">
                    <div class="credential-label">📧 Email de connexion :</div>
                    <div class="credential-value">{{ $user['email'] }}</div>
                </div>

                <div class="credential-item">
                    <div class="credential-label">🔒 Mot de passe :</div>
                    <div class="credential-value">{{ $password }}</div>
                </div>

                <a href="{{ url('/login') }}" class="btn">🚀 Accéder à mon espace client</a>
            </div>

            {{-- <!-- Warning -->
            <div class="warning">
                <strong>⚠️ Important :</strong> Gardez ces informations précieusement ! Nous vous recommandons de changer votre mot de passe lors de votre première connexion pour plus de sécurité.
            </div> --}}

            <!-- Package Info -->
            <div class="package-info">
                <h4>📦 Informations de votre colis</h4>

                <div class="info-row">
                    <span>Numéro de suivi :</span>
                    <span><strong>{{ $package['tracking'] }}</strong></span>
                </div>

                <div class="info-row">
                    <span>Prix :</span>
                    <span>{{ number_format($package['price'], 2) }} €</span>
                </div>

                <div class="info-row">
                    <span>Poids :</span>
                    <span>{{ $package['weight'] }} kg</span>
                </div>

                <div class="info-row">
                    <span>Destination :</span>
                    <span>{{ str_replace("\n", ", ", $package['destination']) }}</span>
                </div>
            </div>

            {{-- <!-- Tracking Link -->
            <div style="text-align: center; margin: 25px 0;">
                <a href="{{ url('/tracking/' . $package['tracking']) }}" class="btn">
                    🔍 Suivre mon colis
                </a>
            </div> --}}

            <!-- Features -->
            <div class="features-list">
                <h4>💡 Avec votre espace client, vous pouvez :</h4>
                <ul>
                    <li>✅ Suivre tous vos colis en temps réel</li>
                    <li>✅ Consulter l'historique de vos expéditions</li>
                    <li>✅ Recevoir des notifications automatiques</li>
                    <li>✅ Créer de nouvelles expéditions facilement</li>
                    <li>✅ Gérer vos informations personnelles</li>
                    <li>✅ Télécharger vos factures et reçus</li>
                </ul>
            </div>

            <p>Si vous avez des questions ou besoin d'aide, n'hésitez pas à nous contacter.</p>

            <p>Merci de faire confiance à Diaspora Shopping & Fly ! 🙏</p>

            <p style="color: #666; font-style: italic;">
                L'équipe DSF
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Diaspora Shopping & Fly</strong> - Votre partenaire de confiance pour l'expédition internationale</p>

            <div class="social-links">
                <a href="tel:+237692893144">📞 +237 692 893 144</a>
                <a href="https://wa.me/237692893144">💬 WhatsApp</a>
                <a href="mailto:support@dsf-express.com">📧 Support</a>
            </div>

            <p style="font-size: 12px; color: #999;">
                Cet email a été envoyé automatiquement. Merci de ne pas répondre directement.<br>
                Diaspora Shopping & Fly- Expédition internationale rapide et sécurisée
            </p>
        </div>
    </div>
</body>
</html>
