<?php

namespace App\Actions\Organization;

class StoreOrganizationAction
{

    public function execute(StoreOrganizationDTO $dto): Organization
    {
        // Création de l’organisation via Eloquent
        $organization = Organization::create([
            'name' => $dto->name,
            'slug' => $dto->slug,
            'plan' => $dto->plan,
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}