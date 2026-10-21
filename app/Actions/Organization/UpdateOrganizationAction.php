<?php

namespace App\Actions\Organization;

class UpdateOrganizationAction
{

    public function execute(UpdateOrganizationDTO $dto): Organization
    {
        // Mise à jour de l’organisation via Eloquent
        $organization = Organization::find($dto->organization_id);
        $organization->Organization()->where('organization_id', $dto->organization_id)->update([
            'organization_name' => $dto->organization_name,            
        ]);
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}