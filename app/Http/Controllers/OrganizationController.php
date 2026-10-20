<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
?>