<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTOs\Organization\OrganizationDTO;
use App\DTOs\Organization\OrganizationMemberDTO;
use App\Http\Requests\Organization\AddOrganizationMemberRequest;
use App\Http\Requests\Organization\StoreOrganizationRequest;
use App\Models\Organization;
use App\Models\User;
use App\Models\OrganizationUser;
use App\Actions\Organization\AddOrganizationMemberAction;
use App\Http\Requests\Organization\UpdateOrganizationRequest;

class OrganizationController extends Controller
{
    public function create()
    {
        return view('organizations.create');
    }

    public function index()
    {
        $organizations = Organization::paginate(10);

        return view('organizations.index', compact('organizations'));
    }

    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->validated());

        return redirect()->route('organizations.index')
            ->with('success', 'Organisation mise à jour avec succès !');
    }

    public function memberList()
    {
        return view('organizations.partials.member-list');
    }

    public function showAddMemberForm(Organization $organization)
    {
        $users = User::all(); // Pour charger la liste des utilisateurs dans le select
        return view('organizations.add-member', compact('organization', 'users'));
    }

    public function store(StoreOrganizationRequest $request)
    {
        $dto = OrganizationDTO::fromRequest($request);

        $organization = Organization::create([
            'name' => $dto->name,
            'slug' => $dto->slug,
            'plan' => $dto->plan,
        ]);

        // ✅ Ajouter le créateur comme "owner"
        $organization->users()->attach(auth()->id(), [
            'role' => 'owner',
            'joined_at' => now(),
        ]);

        return redirect()->route('organizations.index')
            ->with('success', 'Organisation créée avec succès !');
    }

    public function addOrganizationMember(
        AddOrganizationMemberRequest $request, 
        AddOrganizationMemberAction $action
    )
    {
        $dto = OrganizationMemberDTO::fromRequest($request);

        $organizationMember = $action->execute($dto);

      return redirect()->route('organizations.index')
        ->with('success', 'Membre ajouté à l\'organisation avec succès !');
    }
}
?>