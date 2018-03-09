@extends('layouts.app')

@section('content')

	<div class="x_panel">
		<div class="row">
		    <div class="col-lg-12">
		        <h3 class="page-header">Roles</h3>
		    </div>
		</div>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-green">
					<div class="panel-heading">
		                {{ isset($role) ? 'Editar' : 'Nuevo' }} Rol  
		            </div>
					
					<div class="panel-body">
						<?php $route = isset($role) ? route('admin.role.update', $role->id) : route('admin.role.store') ?>
						<form action="{{ $route }}" method="post" role="form" style="width: 60%; margin: 0 auto; padding-bottom: 50px;">
							{{csrf_field()}}

							<div class="col-md-6 col-sm-6 col-xs-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name" >Nombre del rol</label>
								<input type="text" class="form-control" name="name" id="" value="{{ isset($role) ? $role->name : old('name') }}" placeholder="Nombre del rol" required>
								@if ($errors->has('name'))
									<span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
								@endif
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
								<label for="display_name">Alias</label>
								<input type="text" class="form-control" name="display_name" id="" value="{{ isset($role) ? $role->display_name : old('display_name') }}" placeholder="Alias" required>
								@if ($errors->has('display_name'))
									<span class="help-block"> <strong>{{ $errors->first('display_name') }}</strong> </span>
								@endif
							</div>
							<div class="padding-rl-10 form-group">
								<label for="description">Descripción</label>
								<input type="text" class="form-control" name="description" id="" value="{{ isset($role) ? $role->description : old('description') }}" placeholder="Descripción">
							</div>
							
							 <div class="panel">
								<br>
								<h3>Permisos</h3>
								<?php $permission = ['create'=> 'Crear', 'read'=> 'Leer', 'update'=> 'Actualizar', 'delete'=>'Borrar']; ?>
								<div class="panel-body"> 
									<table width="100%" class="table table-hover datatables table-permission">
										<thead>
											<tr>
												<th>Módulo</th>
												@foreach($permission as $perm)
													<th class="text-center">{{ $perm }}</th>
												@endforeach
											</tr>
										</thead>
										<tbody>
											@foreach($modules as $module => $submodules)
												@foreach($submodules as $submodule)
												<tr>
													<td>{{ $module. ' - '.$submodule }}</td>
													@foreach($permission as $key => $perm)
														<?php $idPermission = $permissionDict[$module.'_'.$submodule.'_'.$key] ?>
														<td class="text-center">
															<input type="checkbox" class="flat" {{ isset($rolePermissions) && in_array($idPermission, $rolePermissions) ? "checked" : "" }} value="{{ $idPermission }}" name="permission[]">
														</td>
													@endforeach
												</tr>
												@endforeach
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							{{--
								<div class="form-group text-left">
									<h3>Permisos</h3>
									<input type="checkbox" id="select-all-chbxs-role" name="select-all-chbxs-role" value="" > <label class="select-all-chbxs-role-lbl" for="select-all-chbxs-role">Seleccionar todo**</label> <br>
									@foreach($permissions as $permission)
										<input type="checkbox" name="permission[]" value="{{ $permission->id }}" class="chbxs-role"> {{ $permission->name }} <br>
									@endforeach
								</div>
							--}}
							<!-- <button type="submit" class="btn btn-primary">Aceptar</button> -->
							<div class="navbar-right">
								<a class="btn btn-default" href="{!! route('admin.role.index') !!}">Cancelar</a>
								<button type="submit" class="btn btn-primary">Aceptar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footter_js')
 <script>

        $('.datatables').DataTable({
            responsive: true,
            paginate:false,
            bInfo:false,
            searching: false,
            ordering: false
        });
    </script>   
@endsection