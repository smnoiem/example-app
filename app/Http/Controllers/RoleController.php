<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRoleOptions() {
        $roles = Role::select('id', 'name')->get();
        return view('layouts.role-options', ['roles' => $roles]);
    }
}
