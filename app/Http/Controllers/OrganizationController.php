<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTOs\Organization\OrganizationDTO;
use App\DTOs\Organization\OrganizationMemberDTO;
use App\Http\Requests\Organization\AddOrganizationMemberRequest;
use App\Http\Requests\Organization\StoreOrganizationRequest;
use App\Models\Organization;
use App\Models\OrganizationUser;


class OrganizationController extends Controller
{
    public function create()
    {
        return view('organizations.create');
    }

    public function index()
    {
        return view('organizations.index');
    }

    public function edit()
    {
        return view('organizations.edit');
    }

    public function memberList()
    {
        return view('organizations.partials.member-list');
    }

    public function store(StoreOrganizationRequest $request)
    {
        // Logique pour stocker une nouvelle organisation
        $dto = OrganizationDTO::fromRequest($request);


        $organization = Organization::create([
            'name' => $dto->name,
            'slug' => $dto->slug,
            'plan' => $dto->plan,
        ]);

        return response()->json([
            'message' => 'Organisation créée avec succès.',
            'organization' => $organization
            ], 201);
    }

    public function addOrganizationMember(AddOrganizationMemberRequest $request)
    {
        // Logique pour ajouter un membre à l'organisation
        // Vous pouvez utiliser un DTO similaire à OrganizationDTO pour encapsuler les données du membre
        $dto = OrganizationMemberDTO::fromRequest($request);

        // Logique pour ajouter le membre à l'organisation
        $organizationMember = OrganizationUser::create([
            'organization_id' => $dto->organization_id,
            'user_id' => $dto->user_id,
            'role' => $dto->role,
        ]);

        return response()->json([
            'message' => "Membre ajoute a l'organisation avec succes.",
            'organization_user' => $organizationMember
        ], 201);
    }
}
?>