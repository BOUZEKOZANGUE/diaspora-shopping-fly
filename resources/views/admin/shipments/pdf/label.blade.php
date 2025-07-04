<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .label-container {
            border: 2px solid #000;
            padding: 15px;
        }
        .logo-section {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #0077be;
            padding-bottom: 10px;
        }
        .tracking-number {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 15px 0;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #ddd;
        }
        .section {
            margin: 15px 0;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .barcode {
            text-align: center;
            margin: 20px 0;
        }
        .warning {
            font-size: 12px;
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="label-container">
        <div class="logo-section">
            <h1 style="color: #0077be;">Diaspora shopping and fly</h1>
            <p></p>
        </div>

        <div class="tracking-number">
            {{ $shipment['package']['tracking'] }}
        </div>

        <div class="section">
            <h3>EXPÉDITEUR</h3>
            <p>{{ $shipment['user']['name'] }}<br>
            Tel: {{ $shipment['user']['phone'] }}</p>
        </div>

        <div class="section">
            <h3>DESTINATAIRE</h3>
            <p>{{ $shipment['recipient']['name'] }}<br>
            Tel: {{ $shipment['recipient']['phone'] }}<br>
            {{ $shipment['package']['destination'] }}</p>
        </div>

        <div class="section">
            <p><strong>Poids:</strong> {{ $shipment['package']['weight'] }} kg</p>
            <p><strong>Description:</strong> {{ $shipment['package']['description'] }}</p>
        </div>

        <div class="barcode">
            <!-- Placeholder pour le code-barres -->
            *{{ $shipment['package']['tracking'] }}*
        </div>

        <div class="warning">
            Manipuler avec précaution • Ne pas plier • Garder au sec
        </div>
    </div>
</body>
</html>
