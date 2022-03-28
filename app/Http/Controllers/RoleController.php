<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRoleOptions() {
        $roles = Roles::select('id', 'name')->get();
        $options = "<option selected value=\"\" disabled>Select</option>";
        foreach($roles as $role) {
            $role = $role->toArray();
            $options .= "<option value=\"$role[id]\">$role[name]</option>";
        }
        return $options;
    }
}
