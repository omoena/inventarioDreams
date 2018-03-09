<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\User;
use App\Model\Department;
use App\Model\Position;
use App\Model\Role;
use App\Model\RoleUser;


class UserController extends Controller
{
    
	public function create()
    {
        $idposition = Position::pluck('descposition','idposition')->prepend('Seleccionar Cargo');
        $iddepartment = Department::pluck('descdepartment','iddepartment')->prepend('Seleccionar Departamento');
        $idrole = Role::pluck('display_name','id')->prepend('Seleccionar Rol');
        return view('auth.register',compact('idposition','iddepartment','idrole'));
    }

	public function index()
    {
    			// dd("hola");
        $datauser = User::where('blockade','=','No')->paginate(6);
        // dd($datauser);
        return view('user.show', compact('datauser'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string',
            'iddepartment' => 'required',
            'idposition' => 'required',
            'idrole' => 'required',
            'email' => 'required',
            'name' => 'required|string',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        $selectemail = User::where('email','=',$request->email)->get()->count();
        if($selectemail == 0)
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  bcrypt($request->password);
            $user->fullname = $request->fullname;
            $user->position_id = $request->input('idposition');
            $user->department_id = $request->input('iddepartment');
            $valor = $user->save();

            $roleuser = new RoleUser;
            $roleuser->role_id = $request->input('idrole');
            $roleuser->user_id = $user->id;
            $roleuser->save();

            $mensaje = $valor == 1 ? "Usuario registrado" : "Error al registrar Usuario";
            $datauser = User::where('blockade','=','No')->paginate(6);
            return redirect()->route('user.index',compact('datauser'))->withMessage($mensaje);
        }
        elseif ($selectemail == 1) {
            $mensaje = "El email ingresado ya exsiste en el sistema";
            $idposition = Position::pluck('descposition','idposition')->prepend('Seleccionar Cargo');
            $iddepartment = Department::pluck('descdepartment','iddepartment')->prepend('Seleccionar Departamento');
            $idrole = Role::pluck('display_name','id')->prepend('Seleccionar Rol');
            return redirect()->route('user.create',compact('idposition','iddepartment','idrole'))->withMessage($mensaje);
        }

        
        // return view('user.show', compact('datauser','mensaje'));
    }

    public function destroy(User $id)
    {
        // $iduser = $id->id;

        // $delet = User::where('id', '=', $iduser)->first();

        // $delet->delete();
        $update = User::find($id)->first();   
        $update->password = " ";
        $update->blockade = "si";
        $update->save();
        $mensaje = "Usuario Bloqueado del sistema";

        $datauser = User::where('blockade','=','No')->paginate(6);
        // return view('user.show', compact('datauser','mensaje'));
        return redirect()->route('user.index',compact('datauser'))->withMessage($mensaje);

    }

    public function edit(User $id)
    {
        $iduser = $id->id;
        $edit = RoleUser::where('user_id', '=', $iduser)->get();
        // dd($edit);

        $idposition = Position::pluck('descposition','idposition')->prepend('Seleccionar Cargo');
        $iddepartment = Department::pluck('descdepartment','iddepartment')->prepend('Seleccionar Departamento');
        $idrole = Role::pluck('display_name','id')->prepend('Seleccionar Rol');
        return view('user.update', compact('edit','idposition','iddepartment','idrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\outputrecord  $outputrecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        // dd($id);
        $this->validate($request, [
            'fullname' => 'required|string',
            'iddepartment' => 'required',
            'idposition' => 'required',
            'idrole' => 'required',
            'email' => 'required',
            'name' => 'required|string'
        ]);

        $update = User::find($id)->first();
        $update->name = $request->name;   
        $update->email = $request->email;
        $update->fullname = $request->fullname;
        $update->position_id = $request->input('idposition');
        $update->department_id = $request->input('iddepartment');
        $update->save();
        
        $iduser = $request->iduser;
        $updaterol = RoleUser::where('user_id','=',$iduser)->first();
        $update->detachRole(['id'=> $updaterol->role_id]);
        $role = Role::find($request->input('idrole'));
        $update->attachRole($role);
      


         $mensaje = "Datos del Usuario ".$request->fullname." actualizados";   
         $datauser = User::where('blockade','=','No')->paginate(6);
        // dd($datauser);
        // return view('user.show', compact('datauser','mensaje'));
        return redirect()->route('user.index',compact('datauser'))->withMessage($mensaje);

    }

}
