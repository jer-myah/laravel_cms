<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(): View {
        $users = User::select('users.id', 'users.name', 'users.email', 'roles.id as role_id', 'roles.name as role_name')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->paginate(20);
        
        return view('admin.users.index')->with(['users' => $users, 'roles' => Role::where('name', '!=', 'Admin')->get()]);
    }

    public function updateRole (Request $request) {
        dd($request);
        // DB::table('model_has_roles')->create([]);
    }

    function destroy ($id): RedirectResponse {
        if (User::where('id', $id)->delete()) {
            return redirect()->back()->with('success', 'User deleted successfully!');
        }

        return redirect()->back()->with('error', 'No record found!');
    }
}
