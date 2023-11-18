<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }
}
