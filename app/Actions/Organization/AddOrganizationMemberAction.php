<?php

namespace App\Actions\Organization;

class AddOrganizationMemberAction
{

    public function execute(AddOrganizationMemberDTO $dto): Organization
    {
        // Ajout d'un membre à l'organisation via Eloquent
        $organization = Organization::find($dto->organization_id);
        $organization->members()->create([
            'member_id' => $dto->member_id,
            'member_name' => $dto->member_name,
            'email' => $dto->email,
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}