@extends('layouts.app')

@section('content')
<div class="container_">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos</h3>
        </div>
    </div>
            
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                    <div class="panel-heading">
                        Datos del Producto
                    </div>
                <div class="panel-body">
                @foreach ($see as $data)
                    <div class="row">
                    
                        <div class="col-lg-6">
                           <div>
                                <label for="name" class="col-md-4 ">Producto:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="name">{{ $data->name }}</p>
                                </div>
                            </div>

                             <div>
                                <label for="serial" class="col-md-4 control-label">Serial:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="serial">{{ $data->serial }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="description" class="col-md-4 control-label">Description:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="description">{{ $data->description }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="desctype" class="col-md-4 control-label">Categoria:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="desctype">{{ $data->Types->desctype }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="descbrand" class="col-md-4 control-label">Marca:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="descbrand">{{ $data->Types->Modelos->Brands->descbrand }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="descmodel" class="col-md-4 control-label">Modelo:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="descmodel">{{ $data->Types->Modelos->descmodel }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="detail" class="col-md-4 control-label">Ubicación:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="detail">{{ $data->detail }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="state" class="col-md-4 control-label">Estado:</label>

                                <div class="col-md-8">
                                    <p class="form-control" name="state">{{ $data->state }}</p>
                                </div>
                            </div>

                             <div>
                                <label for="businessname" class="col-md-4 control-label">Proveedor: </label>

                                <div class="col-md-8">
                                    <p class="form-control" name="businessname">{{ $data->Providers->businessname }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="rut" class="col-md-4 control-label">Rut Proveedor: </label>

                                <div class="col-md-8">
                                    <p class="form-control" name="rut">{{ $data->Providers->rut }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="address" class="col-md-4 control-label">Dirección: </label>

                                <div class="col-md-8">
                                    <p class="form-control" name="address">{{ $data->Providers->address }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="phone" class="col-md-4 control-label">Teléfono: </label>

                                <div class="col-md-8">
                                    <p class="form-control" name="phone">{{ $data->Providers->phone }}</p>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                            
                
                    <div class="panel-body">
                        <div class="row">
                        @if($data->archive != null)
                            <div class="col-lg-6">
                                <div style="width: 100%; height: 500px;">
                                 <object data="/proyectos/inventariodreams/public{{ $data->archive }}" type="application/pdf" width="100%" height="100%"></object>
                                </div>
                                 <a href="/proyectos/inventariodreams/public{{ $data->archive }}" target="_blank">Abrir en una nueva ventana o pestaña</a>
                        
                            </div>
                        @endif

                        @if($data->photo != null)
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <img src="/proyectos/inventariodreams/public{{ $data->photo }}" width="100%" height="100%">
                                </div>
                                <a href="/proyectos/inventariodreams/public{{ $data->photo }}" target="_blank">Abrir en una nueva ventana o pestaña</a>
                            
                            </div>
                        @endif
                        </div>
                    </div>
                    
                          
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('product.show') }}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footter_js')
    <script>
        //$('.selectize').selectize();
            // en el form de select  'class'=>'selectize' css


        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        })
    </script>


@endsection
