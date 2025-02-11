<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Étiquette de colis - {{ $package->tracking_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        .label-container {
            border: 2px solid #000;
            padding: 15px;
            max-width: 400px;
            margin: 0 auto;
        }
        .header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .tracking-number {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }
        .barcode {
            text-align: center;
            margin: 15px 0;
            padding: 10px;
            border: 1px solid #ccc;
            background: #fff;
        }
        .section {
            margin-bottom: 15px;
        }
        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
            font-size: 10px;
            color: #666;
        }
        .address {
            padding: 5px;
            background: #f8f8f8;
        }
        .details {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #000;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 10px;
        }
        .weight, .price {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #000;
            font-size: 10px;
            text-align: center;
            color: #666;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        .status-in_transit {
            background: #cce5ff;
            color: #004085;
        }
        .status-delivered {
            background: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="label-container">
        <div class="header">
            <div class="logo">DELIVERY EXPRESS</div>
            <div>{{ now()->format('d/m/Y H:i') }}</div>
        </div>

        <div class="tracking-number">
            N° Suivi: {{ $package->tracking_number }}
        </div>

        <div class="barcode">
            *{{ $package->tracking_number }}*
        </div>

        <div class="section">
            <div class="section-title">Expéditeur</div>
            <div class="address">
                {{ $package->user->name }}<br>
                {{ $package->user->email }}
            </div>
        </div>

        <div class="section">
            <div class="section-title">Destinataire</div>
            <div class="address">
                {{ $package->destination_address }}
            </div>
        </div>

        <div class="details">
            <div class="grid">
                <div>
                    <div class="section-title">Status</div>
                    <div class="status-badge status-{{ $package->status }}">
                        @switch($package->status)
                            @case('pending')
                                En attente
                                @break
                            @case('in_transit')
                                En transit
                                @break
                            @case('delivered')
                                Livré
                                @break
                            @default
                                {{ $package->status }}
                        @endswitch
                    </div>
                </div>
                <div>
                    <div class="section-title">Date d'envoi</div>
                    <div>{{ $package->created_at->format('d/m/Y') }}</div>
                </div>
            </div>

            <div class="grid">
                <div>
                    <div class="section-title">Poids</div>
                    <div class="weight">{{ $package->weight }} kg</div>
                </div>
                <div>
                    <div class="section-title">Prix</div>
                    <div class="price">{{ number_format($package->price, 2) }} €</div>
                </div>
            </div>
        </div>

        <div class="footer">
            Ce document doit accompagner le colis pendant toute la durée du transport.<br>
            Service client: +33 (0)1 23 45 67 89
        </div>
    </div>
</body>
</html>
