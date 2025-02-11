<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            color: #0077be;
            padding: 20px 0;
            border-bottom: 2px solid #0077be;
        }
        .section {
            margin: 20px 0;
            padding: 10px;
        }
        .section-title {
            color: #0077be;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .info-box {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .tracking {
            background: #f8f9fa;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DSF Express</h1>
        <h2>Confirmation d'Expédition</h2>
    </div>

    <div class="tracking">
        Numéro de suivi: <strong>{{ $shipment['package']['tracking'] }}</strong>
    </div>

    <!-- Informations Expéditeur -->
    <div class="section">
        <div class="section-title">📤 Expéditeur</div>
        <div class="info-box">
            <p><strong>Nom:</strong> {{ $shipment['user']['name'] }}</p>
            <p><strong>Email:</strong> {{ $shipment['user']['email'] }}</p>
            <p><strong>Téléphone:</strong> {{ $shipment['user']['phone'] }}</p>
        </div>
    </div>

    <!-- Informations Destinataire -->
    <div class="section">
        <div class="section-title">📥 Destinataire</div>
        <div class="info-box">
            <p><strong>Nom:</strong> {{ $shipment['recipient']['name'] }}</p>
            <p><strong>Téléphone:</strong> {{ $shipment['recipient']['phone'] }}</p>
        </div>
    </div>

    <!-- Détails du Colis -->
    <div class="section">
        <div class="section-title">📦 Détails du Colis</div>
        <div class="info-box">
            <p><strong>Poids:</strong> {{ $shipment['package']['weight'] }} kg</p>
            <p><strong>Prix:</strong> {{ $shipment['package']['price'] }} €</p>
            <p><strong>Destination:</strong> {{ $shipment['package']['destination'] }}</p>
            <p><strong>Description:</strong> {{ $shipment['package']['description'] }}</p>
        </div>
    </div>

    <div style="margin-top: 40px; text-align: center; font-size: 12px;">
        <p>Pour suivre votre colis, visitez www.dsf-express.com</p>
        <p>Contact: support@dsf-express.com | Tel: +33 1 23 45 67 89</p>
    </div>
</body>
</html>
