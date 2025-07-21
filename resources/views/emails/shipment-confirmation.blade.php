{{-- resources/views/emails/shipment-confirmation.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'Expédition</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #0077be, #005c91);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border: 1px solid #e5e7eb;
            border-top: none;
        }
        .footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 10px 10px;
            font-size: 14px;
            color: #6b7280;
        }
        .tracking-box {
            background: #eff6ff;
            border: 2px dashed #3b82f6;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
            border-radius: 8px;
        }
        .tracking-number {
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
            font-family: monospace;
            letter-spacing: 2px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }
        .info-box {
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #0077be;
        }
        .info-label {
            font-weight: bold;
            color: #374151;
            font-size: 14px;
        }
        .info-value {
            color: #111827;
            margin-top: 5px;
        }
        .credentials-box {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            background: #0077be;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 10px 0;
        }
        .status-timeline {
            margin: 20px 0;
        }
        .status-item {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .status-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .status-completed {
            background: #10b981;
        }
        .status-pending {
            background: #d1d5db;
        }
        @media only screen and (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0; font-size: 28px;">DIASPORA SHOPPING & FLY</h1>
        <p style="margin: 10px 0 0 0; opacity: 0.9;">Votre partenaire de confiance</p>
    </div>

    <div class="content">
        <h2 style="color: #0077be; margin-top: 0;">Bonjour {{ $user_name }},</h2>

        <p><strong>Excellente nouvelle ! Votre expédition a été confirmée avec succès.</strong></p>

        <div class="tracking-box">
            <p style="margin: 0 0 10px 0; font-weight: bold; color: #374151;">Votre numéro de suivi</p>
            <div class="tracking-number">{{ $tracking_number }}</div>
        </div>

        <h3 style="color: #0077be; border-bottom: 2px solid #e5e7eb; padding-bottom: 10px;">Détails de votre colis</h3>

        <div class="info-grid">
            <div class="info-box">
                <div class="info-label">Poids</div>
                <div class="info-value">{{ number_format($weight, 1) }} kg</div>
            </div>
            <div class="info-box">
                <div class="info-label">Montant</div>
                <div class="info-value">{{ number_format($price, 2) }} EUR</div>
            </div>
        </div>

        <div class="info-box" style="margin: 20px 0;">
            <div class="info-label">Destination</div>
            <div class="info-value">{{ str_replace("\n", ', ', $destination) }}</div>
        </div>

        <div class="info-box">
            <div class="info-label">Description</div>
            <div class="info-value">{{ $description }}</div>
        </div>

        <h3 style="color: #0077be; border-bottom: 2px solid #e5e7eb; padding-bottom: 10px;">Destinataire</h3>

        <div class="info-grid">
            <div class="info-box">
                <div class="info-label">Nom</div>
                <div class="info-value">{{ $recipient_name }}</div>
            </div>
            <div class="info-box">
                <div class="info-label">Téléphone</div>
                <div class="info-value">{{ $recipient_phone }}</div>
            </div>
        </div>

        @if($new_password)
        <div class="credentials-box">
            <h4 style="margin: 0 0 10px 0; color: #92400e;">🎉 Votre compte a été créé !</h4>
            <p style="margin: 5px 0;"><strong>Site web :</strong> <a href="{{ $site_url }}">{{ $site_url }}</a></p>
            <p style="margin: 5px 0;"><strong>Email :</strong> {{ $user_email }}</p>
            <p style="margin: 5px 0;"><strong>Mot de passe :</strong> <code style="background: #fbbf24; padding: 2px 6px; border-radius: 4px;">{{ $new_password }}</code></p>
            <p style="margin: 10px 0 0 0; font-size: 14px; color: #92400e;">Connectez-vous pour suivre vos expéditions en temps réel.</p>
        </div>
        @else
        <div class="info-box">
            <div class="info-label">Votre espace client</div>
            <div class="info-value">
                <a href="{{ $site_url }}" class="btn">Se connecter à mon compte</a>
            </div>
        </div>
        @endif

        <h3 style="color: #0077be; border-bottom: 2px solid #e5e7eb; padding-bottom: 10px;">Suivi de votre colis</h3>

        <div class="status-timeline">
            <div class="status-item">
                <div class="status-icon status-completed"></div>
                <div>
                    <strong>Colis enregistré</strong><br>
                    <small style="color: #6b7280;">{{ $created_at }}</small>
                </div>
            </div>
            <div class="status-item">
                <div class="status-icon status-pending"></div>
                <div>
                    <strong>En transit</strong><br>
                    <small style="color: #6b7280;">2-7 jours ouvrés</small>
                </div>
            </div>
            <div class="status-item">
                <div class="status-icon status-pending"></div>
                <div>
                    <strong>Livré</strong><br>
                    <small style="color: #6b7280;">Destination finale</small>
                </div>
            </div>
        </div>

        <div style="background: #eff6ff; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h4 style="margin: 0 0 10px 0; color: #1e40af;">🛡️ Nos garanties</h4>
            <ul style="margin: 0; padding-left: 20px; color: #374151;">
                <li>Colis sécurisé et traçable 24h/24</li>
                <li>Notifications à chaque étape</li>
                <li>Assistance dédiée en cas de besoin</li>
                <li>Support client disponible</li>
            </ul>
        </div>

        <p style="background: #fef3c7; padding: 15px; border-radius: 8px; margin: 20px 0;">
            <strong>⚠️ Important :</strong> N'oubliez pas d'informer votre destinataire de l'envoi du colis.
        </p>
    </div>

    <div class="footer">
        <p><strong>DIASPORA SHOPPING & FLY</strong></p>
        <p>Votre partenaire de confiance pour tous vos envois</p>
        <p style="margin: 10px 0 0 0;">
            <a href="{{ $site_url }}" style="color: #0077be;">Visitez notre site web</a> |
            <a href="mailto:contact@group-dsf.com" style="color: #0077be;">Nous contacter</a>
        </p>
    </div>
</body>
</html>
