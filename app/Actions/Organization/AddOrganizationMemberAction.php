<?php

namespace App\Actions\Organization;

use App\Models\OrganizationMember;
use App\DTOs\Organization\OrganizationMemberDTO;

class AddOrganizationMemberAction
{

    public function execute(OrganizationMemberDTO $dto): OrganizationMember
    {
        $organizationMember = OrganizationMember::create([
            'organization_id' => $dto->organization_id,
            'user_id' => $dto->user_id,
            'role' => $dto->role,
        ]);
        return $organizationMember;
    }
}