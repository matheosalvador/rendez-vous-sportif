<?php

namespace App\Actions\Organization;

class DeleteOrganizationAction
{

    public function execute(DeleteOrganizationDTO $dto): bool
    {
        // Suppression de l’organisation via Eloquent
        $organization = Organization::find($dto->organization_id);
        $organization->Organization()->where('organization_id', $dto->organization_id)->delete();
        // Ici on pourrait déclencher un Event (ex : OrganizationCreated)
        return $organization;
    }
}
