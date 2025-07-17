<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diaspora Shopping & Fly - Colis en route</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: normal;
            opacity: 0.9;
        }
        .content {
            padding: 30px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .tracking-box {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 25px 0;
            border-left: 5px solid #1976d2;
        }
        .tracking-number {
            font-size: 24px;
            font-weight: bold;
            color: #1976d2;
            letter-spacing: 1px;
        }
        .colis-info {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin: 25px 0;
            border: 1px solid #e9ecef;
        }
        .colis-info h3 {
            margin-top: 0;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
        }
        .info-row {
            display: flex;
            margin: 12px 0;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #495057;
            min-width: 120px;
        }
        .info-value {
            color: #6c757d;
        }
        .btn-container {
            text-align: center;
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            font-size: 16px;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        }
        .notification-info {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }
        .contact-info {
            background: #e7f3ff;
            border: 1px solid #b8daff;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }
        .footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 0;
        }
        .footer h4 {
            margin: 0 0 15px 0;
            font-size: 18px;
        }
        .footer p {
            margin: 5px 0;
            opacity: 0.8;
        }
        .footer a {
            color: #74b9ff;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .highlight {
            color: #1976d2;
            font-weight: bold;
        }
        .emoji {
            font-size: 1.2em;
            margin-right: 5px;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .content {
                padding: 20px;
            }
            .info-row {
                flex-direction: column;
            }
            .info-label {
                min-width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📦 Diaspora Shopping & Fly</h1>
            <h2>Un colis vous a été envoyé!</h2>
        </div>

        <div class="content">
            <div class="greeting">
                Bonjour <strong>{{ $shipment['recipient']['name'] }}</strong>,
            </div>

            <p>Nous avons le plaisir de vous informer qu'un colis vous a été envoyé par <span class="highlight">{{ $shipment['user']['name'] }}</span> via Diaspora Shopping & Fly.</p>

            <div class="tracking-box">
                <div style="margin-bottom: 10px; color: #1976d2; font-weight: bold;">Numéro de suivi</div>
                <div class="tracking-number">{{ $shipment['package']['tracking'] }}</div>
            </div>

            <div class="colis-info">
                <h3><span class="emoji">📋</span>Informations du colis</h3>

                <div class="info-row">
                    <div class="info-label"><span class="emoji">⚖️</span>Poids:</div>
                    <div class="info-value">{{ $shipment['package']['weight'] }} kg</div>
                </div>

                <div class="info-row">
                    <div class="info-label"><span class="emoji">📝</span>Description:</div>
                    <div class="info-value">{{ $shipment['package']['description'] }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label"><span class="emoji">📍</span>Destination:</div>
                    <div class="info-value">{{ str_replace("\n", " ", $shipment['package']['destination']) }}</div>
                </div>

                @if($shipment['package']['media_count']['total'] > 0)
                <div class="info-row">
                    <div class="info-label"><span class="emoji">📸</span>Médias inclus:</div>
                    <div class="info-value">
                        @if($shipment['package']['media_count']['images'] > 0)
                            {{ $shipment['package']['media_count']['images'] }} image(s)
                        @endif
                        @if($shipment['package']['media_count']['videos'] > 0)
                            @if($shipment['package']['media_count']['images'] > 0) et @endif
                            {{ $shipment['package']['media_count']['videos'] }} vidéo(s)
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <div class="btn-container">
                <a href="{{ url('/tracking/' . $shipment['package']['tracking']) }}" class="btn">
                    <span class="emoji">🔍</span>Suivre mon colis
                </a>
            </div>

            <div class="notification-info">
                <strong><span class="emoji">📱</span>Notifications automatiques:</strong><br>
                Vous recevrez des notifications par email et SMS à chaque étape importante de la livraison de votre colis.
            </div>

            <div class="contact-info">
                <strong><span class="emoji">📞</span>Contact expéditeur:</strong><br>
                En cas de questions, vous pouvez contacter l'expéditeur au <strong>{{ $shipment['user']['phone'] }}</strong>
            </div>

            <p style="margin-top: 30px; text-align: center; color: #6c757d;">
                <em>Nous vous remercions de faire confiance à Diaspora Shopping & Fly pour vos envois.</em>
            </p>
        </div>

        <div class="footer">
            <h4>Diaspora Shopping & Fly</h4>
            <p>Votre satisfaction, notre priorité</p>
            <div style="margin-top: 15px;">
                <a href="{{ url('/') }}">Site web</a>
                <a href="{{ url('/contact') }}">Contact</a>
                <a href="{{ url('/tracking') }}">Suivi de colis</a>
            </div>
            <p style="margin-top: 15px; font-size: 12px;">
                © {{ date('Y') }} DSF . Tous droits réservés.
            </p>
        </div>
    </div>
</body>
</html>
