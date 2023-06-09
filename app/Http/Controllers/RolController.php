<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    function __Construct()
    {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-rol',['only'=>['create','store']]);
        $this->middleware('permission:editar-rol',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index', ['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=Permission::all();
        return view('dashboard.roles.create', ['permission'=>$permission]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'permission'=>'required'
        ]);

        $role = Role::create($request->only('name'));
        $role->syncPermissions($request->input('permission', []));
        return redirect()->route('roles.index');

        // $role = Role::create([
        //     'name'=>$request->input('name')
        // ]);

        // $role->syncPermission($request->input('permission'));

        // return redirect()->route('dashboard.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {        
        $role->load('permissions');
        $permission = Permission::all();
        return view('dashboard.roles.edit', compact('role', 'permission'));
        // $role = Role::find($id);
        // $permission = Permission::get();
        // $rolePermission = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
        // //metodo pluck, recupera todos los valores de una clave determinada $id
        // ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
        // ->all();

        // return view('dashboard.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'permission' => 'required',
        // ]);
    
        // $role = Role::find($id);
        // $role->name = $request->input('name');
        // $role->save();
    
        // $role->syncPermissions($request->input('permission'));
    
        // return redirect()->route('dashboard.roles.index')
        //                 ->with('success','Role updated successfully');

        $this->validate($request, ['name'=>'required', 'permission'=>'required']);
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permission', []));
        return back()->with('status', 'Publicación actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        DB::table('roles')->where('id', $id)->delete();
        return back()->with('status', 'Publicación eliminada con éxito');
    }
}
