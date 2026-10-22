<?php

namespace App\Actions\Organization;

class UpdateOrganizationAction
{

    public function execute(UpdateOrganizationDTO $dto): Organization
    {
        // Mise à jour de l’organisation via Eloquent
        $organization = Organization::find($dto->organization_id);
        $organization->update([
            'name' => $dto->organization_name
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}