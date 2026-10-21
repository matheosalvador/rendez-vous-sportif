<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTOs\Organization\OrganizationDTO;
use App\Http\Requests\Organization\StoreOrganizationRequest;
use App\Models\Organization;

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
}
?>