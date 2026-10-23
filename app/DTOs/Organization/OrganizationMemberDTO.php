<?php

namespace App\DTOs\Organization;

use App\Http\Requests\Organization\AddOrganizationMemberRequest;


class OrganizationMemberDTO
{

    public function __construct(
        public readonly int $organization_id,
        public readonly int $user_id,
        public readonly string $role,
    ) {}        

    public static function fromRequest(AddOrganizationMemberRequest $request): self
    {
        // Retourne une nouvelle instance du DTO avec les données nécessaires
        return new self(
            organization_id: $request->organization_id,
            user_id: $request->user_id,
            role: $request->role,
        );
    }
}