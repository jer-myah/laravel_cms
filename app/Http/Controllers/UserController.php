<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() {
        $users = User::select('users.name', 'users.email', 'roles.name as role_name')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->paginate(20);
        // dd($users);
        return view('admin.users.index')->with(['users' => $users, 'roles' => Role::get()]);
    }

    public function changeRole (Request $request) {
        dd($request);
        // DB::table('model_has_roles')->create([]);
    }
}
