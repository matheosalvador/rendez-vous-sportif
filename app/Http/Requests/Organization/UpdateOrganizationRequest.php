<?php

namespace App\Http\Requests\Organization;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationRequest extends FormRequest
{
    /**
    * Détermine si l'utilisateur est autorisé à faire cette requête.
    */
    public function authorize(): bool
    {
        // Ici, on pourrait vérifier que l'utilisateur est connecté ou a un rôle spécifique.
        // Pour simplifier : on autorise tout le monde.
        return true;
    }
    /**
    * Règles de validation de la requête.
    */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }
    /**
    * Messages d’erreur personnalisés (optionnel).
    */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
        ];
    }
}