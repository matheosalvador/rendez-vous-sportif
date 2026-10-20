<?php

class AddOrganizationMemberAction
{

    public function execute(AddOrganizationMemberDTO $dto): Organization
    {
        // Ajout d'un membre à l'organisation via Eloquent
        $organization = Organization::find($dto->id);
        $organization->members()->create([
            'name' => $dto->name,
            'email' => $dto->email,
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}