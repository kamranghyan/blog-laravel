<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    
    public function index()
    {
        return Role::all();
    }

    
    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));
        return response($role, Response::HTTP_CREATED);
    }

    
    public function show(string $id)
    {
        return Role::find($id);
    }

    
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);

        $role->update($request->only('name'));

        return response($role, Response::HTTP_ACCEPTED);
    }

    
    
    public function destroy(string $id)
    {
        Role::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
