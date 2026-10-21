<?php

namespace App\DTOs\Organization;

use App\Http\Requests\Organization\StoreOrganizationRequest;

class OrganizationDTO
{

    public function __construct(
        public string $name,
        public string $slug,
        public string $plan,
    ) {}

    public static function fromRequest(StoreOrganizationRequest $request): self
    {
        // Retourne une nouvelle instance du DTO avec les données nécessaires
        return new self(
            name: $request->name,
            slug: $request->slug,
            plan: $request->plan,
        );
    }
}