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
            'member_id' => ['required', 'integer'],
            'member_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ];
    }
    /**
    * Messages d’erreur personnalisés (optionnel).
    */
    public function messages(): array
    {
        return [
            'member_id.required' => 'L’ID du membre est obligatoire.',
            'member_name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L’e-mail est obligatoire.',
        ];
    }
}