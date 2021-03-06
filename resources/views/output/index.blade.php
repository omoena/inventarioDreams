@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos Disponibles</h3>
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
            <table width="100%" class="table table-striped table-bordered table-hover datatable" id="tableDisponible">
              <thead>
                <tr>
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
                @foreach($dataout as $data)
                    <tr class="gradeA">
                        <td>{{ $data->serial }}</td>
                        <td>{{ $data->Types->desctype}}</td>
                        <td>{{ $data->Types->Modelos->Brands->descbrand }}</td>
                        <td>{{ $data->Types->Modelos->descmodel }}</td>
                        <td>{{ $data->state }}</td>
                        <td>{{ $data->detail }}</td>
                        <td class="text-center">
                           @permission('bodega_disponibles_create')
                            <a href="{{ route('output.show', $data->idproduct) }}" class="btn btn-primary btn-sm">Prestar</a>
                            @endpermission
                           @permission('bodega_disponibles_read')
                            <a href="{{ route('input.see', $data->idproduct) }}" class="btn btn-info btn-sm">Ver</a>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>

 {{ $dataout->links() }}

@endsection
@section('footter_js')
   
@endsection