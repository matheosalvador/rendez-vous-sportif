<?php

namespace App\Actions\Organization;

use App\Models\OrganizationMember;

class AddOrganizationMemberAction
{

    public function execute(AddOrganizationMemberDTO $dto): OrganizationMember
    {
        // Ajout d'un membre à l'organisation via Eloquent
        $organizationMember = OrganizationMember::create([
            'organization_id' => $dto->organization_id,
            'user_id' => $dto->user_id,
            'role' => $dto->role,
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organizationMember;
    }
}