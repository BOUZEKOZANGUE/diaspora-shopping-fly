<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            // Informations expéditeur
            'name' => ['required', 'string', 'max:255'],
            'sender_whatsapp' => ['required', 'string', 'max:255'],

            // Informations destinataire
            'recipient_name' => ['required', 'string', 'max:255'],
            'recipient_whatsapp' => ['required', 'string', 'max:255'],

            // Informations colis
            'weight' => ['required', 'numeric', 'min:0'],
            'destination_address' => ['required', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'min:0'],
            'description_colis' => ['required', 'string', 'max:1000'],

            // Champs pour construire l'adresse
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            // Messages expéditeur
            'name.required' => 'Le nom du client est requis',
            'sender_whatsapp.required' => 'Le WhatsApp de l\'expéditeur est requis',

            // Messages destinataire
            'recipient_name.required' => 'Le nom du destinataire est requis',
            'recipient_whatsapp.required' => 'Le WhatsApp du destinataire est requis',

            // Messages colis
            'weight.required' => 'Le poids du colis est requis',
            'weight.numeric' => 'Le poids doit être un nombre',
            'weight.min' => 'Le poids ne peut pas être négatif',
            'destination_address.required' => 'L\'adresse de destination est requise',
            'price.required' => 'Le prix est requis',
            'price.numeric' => 'Le prix doit être un nombre',
            'price.min' => 'Le prix ne peut pas être négatif',
            'description_colis.required' => 'La description du colis est requise',

            // Messages adresse
            'country.required' => 'Le pays est requis',
            'city.required' => 'La ville est requise',
            'street.required' => 'L\'adresse est requise',
        ];
    }
}
