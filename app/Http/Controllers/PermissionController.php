<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(['role:super-admin|admin']);
        $this->middleware("permission:permission-view", ["only"=> ["index"]]);
        $this->middleware("permission:permission-create", ["only"=> ["create","store"]]);
        $this->middleware("permission:permission-update", ["only"=> ["update", "edit"]]);
        $this->middleware("permission:permission-show", ["only"=> ["show"]]);
        $this->middleware("permission:permission-delete", ["only"=> ["destroy"]]);
        $this->middleware("permission:give-role-permissions", ["only"=> ["givePermissionsToRole"]]);
    }
    
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->get();
        return view("role-permission.permission.index", compact('permissions'));
    }


    public function create()
    {
        return view("role-permission.permission.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'permissions.*.name' => 'required|unique:permissions,name'
        ]);

        /* dd($request->permissions); */
        
        foreach ($request->permissions as $key => $value) {
            Permission::create($value);
        }

        /* Permission::create([
            "name" => $request->name
        ]); */

        return redirect()->route("permissions.create")->with("status", "Permission créée avec succès");
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view("role-permission.permission.update", compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Permission::class)->ignore($id)]
        ]);

        Permission::find($id)->update([
            'name' => $request->name
        ]);

        $permissions = Permission::get();
        $mesage = 'La permission a été modifiée';
        return redirect()->route("permissions.index", compact('permissions'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        $mesage = 'La permission ' . $permission->name . ' a été supprimée';
        return redirect()->back()->with("danger", $mesage);
    }
}
