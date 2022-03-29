<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRoleOptions() {
        $roles = Roles::select('id', 'name')->get();
        return view('layouts.role-options', ['roles' => $roles]);
    }
}
