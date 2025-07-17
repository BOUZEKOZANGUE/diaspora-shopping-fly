<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copie de confirmation - Diaspora Shopping & Fly</title>
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
        .content {
            padding: 30px 20px;
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
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        @media (max-width: 600px) {
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
            <h1>📦 Copie de confirmation</h1>
            <p>Diaspora Shopping & Fly - Colis créé avec succès</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Bonjour,</p>

            <p>Vous recevez cet email car vous avez demandé à recevoir une copie des informations du colis suivant :</p>

            <!-- Package Info -->
            <div class="package-info">
                <h4>📦 Informations du colis</h4>

                <div class="info-row">
                    <span>Expéditeur :</span>
                    <span><strong>{{ $shipment['user']['name'] }}</strong></span>
                </div>

                <div class="info-row">
                    <span>Destinataire :</span>
                    <span><strong>{{ $shipment['recipient']['name'] }}</strong></span>
                </div>

                <div class="info-row">
                    <span>Numéro de suivi :</span>
                    <span><strong>{{ $shipment['package']['tracking'] }}</strong></span>
                </div>

                <div class="info-row">
                    <span>Prix :</span>
                    <span>{{ number_format($shipment['package']['price'], 2) }} €</span>
                </div>

                <div class="info-row">
                    <span>Poids :</span>
                    <span>{{ $shipment['package']['weight'] }} kg</span>
                </div>

                <div class="info-row">
                    <span>Destination :</span>
                    <span>{{ str_replace("\n", ", ", $shipment['package']['destination']) }}</span>
                </div>
            </div>


            <p>Merci de faire confiance à Diaspora Shopping & Fly !</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Diaspora shopping fly</strong> - Votre partenaire de confiance</p>
            <p style="font-size: 12px; color: #999;">
                Cet email est une copie de confirmation automatique.
            </p>
        </div>
    </div>
</body>
</html>
