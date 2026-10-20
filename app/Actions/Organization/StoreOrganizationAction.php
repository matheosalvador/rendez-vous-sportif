<?php

class StoreOrganizationAction
{

    public function execute(CreateOrganizationDTO $dto): Organization
    {
        // Création de l’organisation via Eloquent
        $organization = Organization::create([
            'id' => $dto->id,
            'name' => $dto->name,
            'description' => $dto->description,
            'members' => $dto->members,
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}