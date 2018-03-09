<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Model\Permission;
use App\Model\PermissionRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

// class MyException extends Exception {}
class RoleController extends Controller
{

    function __construct(){
        
        $this->validate = [
                'rules' => [
                    'name' => 'bail|required',
					'display_name' => 'required'
                ],
                'message'=> [
					'name.required' => 'Debes agregar un nombre al rol',
					'display_name.required'  => 'Debes asignar un alias al rol',
                ]
            ];

        // $submodules = \App\Models\Submodulo::all();
		$this->modules = [	
						'admin' 	=> [
										'usuarios',
										'roles',
										],
						'bodega' 	=>[
										'productos',
										'disponibles',
										'prestados',
										'reportes'
										]
						];

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$roles = Role::all();
		$permissionRole = PermissionRole::all();
		$permissionsByRole = [];
		foreach ($permissionRole as $key => $value) {
			if (!array_key_exists($value->role_id, $permissionsByRole)) $permissionsByRole[$value->role_id] = [$value->permission->name];
			else $permissionsByRole[$value->role_id][] = $value->permission->name;
		}

		return view('role.index',compact('roles', 'permissionsByRole'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$modules = $this->modules;
		
		$permissions = Permission::all();
		$permissionDict = [];
		foreach ($permissions as $key => $value)
			$permissionDict[$value->name] = $value->id;

		return view('role.create', compact('permissions', 'modules', 'permissionDict'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	private function except($eval){
		$state = true;
		try{
			$eval;
		}catch (\Illuminate\Database\QueryException $e){
			$state = false;
		}
		return $state;
	}

	public function store(Request $request)
	{
		$this->validate($request, $this->validate['rules'], $this->validate['message'] );
		// Role::create($request->except(['permission','_token']));
		try{
			$role = Role::create($request->except(['permission','_token']));
		}catch (\Illuminate\Database\QueryException $e){
			return redirect()->back()->withMessage(json_encode(['text'=> 'Error al crear un Rol. [Erro Code: '.$e->getCode().']', 'type'=> 'warning', 'log'=> $e->getMessage()]));
		}

		if (!$request->permission)
			return redirect()->route('admin.role.index')->withMessage(json_encode(['text'=> 'Has creado un rol sin asignar permisos', 'type'=> 'warning']));

		foreach ($request->permission as $key => $value)
			PermissionRole::insert(["permission_id"=> $value, "role_id"=> $role->id]);

		return redirect()->route('admin.role.index')->withMessage(json_encode(['text'=> 'Rol creado correctamente', 'type'=> 'success']));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$role = Role::find($id);
		$permissions = Permission::all();
		$role_permissions = PermissionRole::where('role_id', $role->id)->get();
		$rolePermissions = [];
		foreach ($role_permissions as $rp)
			$rolePermissions[] = $rp->permission_id;

		// $submodules = \App\Models\Submodulo::all();
		$modules = $this->modules;
		// $permissions = Permission::all();
		$permissionDict = [];
		foreach ($permissions as $key => $value)
			$permissionDict[$value->name] = $value->id;
		
		// $role_permissions = $role->perms()->pluck('id','id')->toArray();
		// dd($role);
		// return view('role.update', compact(['role','rolePermissions','permissions']));
		return view('role.create', compact('permissions', 'modules', 'permissionDict', 'role', 'rolePermissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{

		$this->validate($request, $this->validate['rules'], $this->validate['message'] );

		$role=Role::find($id);
		$role->name=$request->name;
		$role->display_name=$request->display_name;
		$role->description=$request->description;
		$role->save();
		DB::table('permission_role')->where('role_id', $id)->delete();

		if (!$request->permission)
			return redirect()->route('admin.role.index')->withMessage(json_encode(['text'=> 'Has editado un rol sin asignar permisos', 'type'=> 'warning']));
		

		// foreach ($request->permission as $key=>$value){
		//     $role->attachPermission($value);
		// }
		foreach ($request->permission as $key => $value)
			PermissionRole::insert(["permission_id"=> $value, "role_id"=> $role->id]);

		// return redirect()->route('admin.role.index')->withMessage('role Updated');
		return redirect()->route('admin.role.index')->withMessage(json_encode(['text'=> 'Rol '.$id.' editado correctamente', 'type'=> 'success']));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{

		DB::table("roles")->where('id', $id)->delete();

		return back()->withMessage(json_encode(['text'=> 'Rol '.$id.' eliminado', 'type'=> 'success']));

	}
}
