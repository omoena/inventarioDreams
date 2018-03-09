@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos</h3>
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
        <div class="panel-body"> 
            <table width="100%" class="table table-striped table-bordered table-hover datatable" id="tableProduct">
              <thead>
                <tr>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Serial</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Ubicación</th>
                    <th class="text-center">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($datapro as $data)
                    <tr class="gradeA">
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->serial }}</td>
                        <td>{{ $data->Types->desctype}}</td>
                        <td>{{ $data->Types->Modelos->Brands->descbrand }}</td>
                        <td>{{ $data->Types->Modelos->descmodel }}</td>
                        <td>{{ $data->state }}</td>
                        <td>{{ $data->detail }}</td>
            
                        <td class="text-center">
                           @permission('bodega_productos_update')
                            <a href="{{ route('product.edit', $data->idproduct) }}" class="btn btn-warning btn-xs">Modificar</a>
                            @endpermission
                        <div style="margin-top: 5px">
                           @permission('bodega_productos_delete')
                            <a href="{{ route('product.destroy', $data->idproduct) }}" class="btn btn-danger btn-xs" onclick="return confirm('¿Está seguro de eliminar el producto {{  $data->name }}?');">Eliminar</a>
                            @endpermission
                            @permission('bodega_productos_read')
                            <a href="{{ route('product.see', $data->idproduct) }}" class="btn btn-info btn-xs">Ver</a>
                            @endpermission
                        </div>
                        </td>
                    </tr>
                @endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@permission('bodega_productos_create')
<a href="{{ route('product.create') }}" class="btn btn-primary">Nuevo Producto</a> 
@endpermission

 {{ $datapro->links() }}

@endsection
@section('footter_js')
    
@endsection