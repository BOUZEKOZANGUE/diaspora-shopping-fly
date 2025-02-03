<x-mail::message>
# Confirmation de votre expédition

Merci d'avoir choisi notre service d'expédition. Votre colis a été enregistré avec succès.

**Détails de votre colis:**
- Numéro de suivi: {{ $trackingNumber }}
- Poids: {{ $weight }} kg
- Prix: {{ number_format($price, 2) }} €
- Statut: {{ ucfirst($status) }}

<x-mail::button :url="route('tracking.show', ['number' => $trackingNumber])">
Suivre mon colis
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
