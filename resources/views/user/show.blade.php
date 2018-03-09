@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Usuarios del Sistema</h3>
        </div>
    </div>
    <div class="row">
         @if(Session::has('message'))
         <!--    <h1>{{Session::get('message')}}</h1> -->
             <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('message')}}
            </div>
        @endif
    </div>
<div class="row">
    <div class="col-lg-12">
       <!--  <div class="panel panel-default"> -->
            <div class="panel-body">   
                <table width="100%" class="table table-striped table-bordered table-hover datatable" id="tableUser">
                  <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Nombre de Usuario</th>
                        <th>Email</th>
                        <th>Departamento</th>
                        <th>Opciones</th>

                    </tr>
                  </thead>
                  <tbody>
                	@foreach ($datauser as $users)
                		<tr class="gradeA">
                            <td>{{ $users->fullname}}</td>
                            <td>{{ $users->name}}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->Departments->descdepartment}}</td>
                           
                            <td class="text-center">
                              @permission('admin_usuarios_update')
                                <a href="{{ route('user.edit',$users->id)}}" class="btn btn-warning btn-sm">Modificar</a>
                              @endpermission
                              @permission('admin_usuarios_delete')
                                <a href="{{ route('user.destroy', $users->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar al usuario {{  $users->fullname }}?');">Bloquear</a> 
                              @endpermission
                            </td>
                        </tr>
                	@endforeach

                	</tbody>
                </table>
                
                @permission('admin_usuarios_create')
                 <a href="{{ route('user.create') }}" class="btn btn-primary">Nuevo Usuario</a>
                @endpermission
             </div>
        <!--  </div> -->
     </div>
 </div>
{{ $datauser->links() }}
@endsection

@section('footter_js')
@endsection