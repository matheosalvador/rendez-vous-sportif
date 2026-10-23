<?php

namespace App\Http\Requests\Organization;

use Illuminate\Foundation\Http\FormRequest;

class AddOrganizationMemberRequest extends FormRequest
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
            'organization_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'role' => ['required', 'string', 'max:255'],
        ];
    }
    /**
    * Messages d’erreur personnalisés (optionnel).
    */
    public function messages(): array
    {
        return [
            'organization_id.required' => 'L’ID de l’organisation est obligatoire.',
            'user_id.required' => 'L’ID de l’utilisateur est obligatoire.',
            'role.required' => 'Le rôle est obligatoire.',
        ];
    }
}