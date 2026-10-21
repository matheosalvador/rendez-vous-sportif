<?php

namespace App\DTOs\Organization;

class OrganizationMemberDTO
{

    public function __construct(
        public readonly int $member_id,
        public readonly string $member_name, 
        public readonly string $email,
    ) {}        

    public static function fromRequest(AddOrganizationMemberRequest $request): self
    {
        // Retourne une nouvelle instance du DTO avec les données nécessaires
        return new self(
            member_id: $request->member_id,
            member_name: $request->member_name,
            email: $request->email,
        );
    }
}