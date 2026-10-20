<?php

class RemoveOrganizationMemberAction
{

    public function execute(RemoveOrganizationMemberDTO $dto): Organization
    {
        // Suppression d'un membre de l'organisation via Eloquent
        $organization = Organization::find($dto->id);
        $organization->members()->where('id', $dto->member_id)->delete();
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}