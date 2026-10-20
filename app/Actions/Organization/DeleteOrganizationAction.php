<?php

class DeleteOrganizationAction
{

    public function execute(DeleteOrganizationDTO $dto): bool
    {
        // Suppression de l’organisation via Eloquent
        $organization = Organization::find($dto->id);
        return $organization->delete();
    }
}