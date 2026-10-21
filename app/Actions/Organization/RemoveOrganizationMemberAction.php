<?php

namespace App\Actions\Organization;

class RemoveOrganizationMemberAction
{

    public function execute(RemoveOrganizationMemberDTO $dto): Organization
    {
        // Suppression d'un membre de l'organisation via Eloquent
        $organization = Organization::find($dto->organization_id);
        $organization->members()->where('member_id', $dto->member_id)->delete();
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}