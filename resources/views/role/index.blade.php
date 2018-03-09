@extends('layouts.app')

@section('content')


	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Roles</h3>
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
		<!-- <p class="text-muted font-13 m-b-30">
		  DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
		</p> -->
		<div class="col-lg-12">
		    <div class="panel-body"> 
				<table id="datatable" width="100%" class="table table-striped table-bordered table-hover datatable">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<!-- <th rowspan="1" colspan="1">Nombre</th> -->
							<th class="text-center">Nombre</th>
							<th class="text-center">Alias</th>
							<th class="text-center">Permisos</th>
							<th class="text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@if (isset( $roles ))
							@foreach($roles as $r)
							<tr>
								<td class="text-center">{!! $r->id !!}</td>
								<td class="text-center">{!! $r->name !!}</td>
								<td class="text-center">{!! $r->display_name !!}</td>
								<td class="text-center">
									@if (array_key_exists($r->id, $permissionsByRole) )
										
											<select class="js-example-basic-single form-control" readonly>
												@foreach ($permissionsByRole[$r->id] as $prd)
													<option><i class="fa fa-key"></i> {{$prd}}</option>
												@endforeach
											</select>
											
										
									@else
										Sin permisos asignados
									@endif
								</td>
								<td class="text-center">
										<a class="btn btn-warning btn-sm" href="{{ route('admin.role.edit', $r->id) }}">Editar</a>
								
										<button class="btn btn-danger btn-sm" onclick="if (confirm('realmente quieres eliminar el rol: {{ $r->name }}')) $('#form-delete-rol-{{$r->id}}').submit()">Borrar</button>
										<form action="{{route('admin.role.delete', $r->id)}}" id="form-delete-rol-{{$r->id}}" method="POST" style="display: inline;">
											{{csrf_field()}}
										</form>
								
								</td>
							</tr>
							@endforeach
						@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<a class="btn btn-primary" href="{{route('admin.role.create')}}">Nuevo Rol</a>
			


@endsection
@section('footter_js')
       <script>
        //$('.selectize').selectize();
            // en el form de select  'class'=>'selectize' css

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        });
 		
    </script>

@endsection