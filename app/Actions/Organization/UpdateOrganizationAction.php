<?php

class UpdateOrganizationAction
{

    public function execute(UpdateOrganizationDTO $dto): Organization
    {
        // Mise à jour de l’organisation via Eloquent
        $organization = Organization::find($dto->id);
        $organization->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'members' => $dto->members,
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}