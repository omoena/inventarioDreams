@extends('layouts.app')

@section('content')
<div class="container_">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos Disponibles</h3>
        </div>
    </div>
            
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                    <div class="panel-heading">
                        Datos del Producto
                    </div>
                <div class="panel-body">
               
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="name" class="col-md-4 ">Producto:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="name">{{ $see->Products->name }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="serial" class="col-md-4 control-label">Serial:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="serial">{{ $see->Products->serial }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="description" class="col-md-4 control-label">Description:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="description">{{ $see->Products->description }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="desctype" class="col-md-4 control-label">Categoria:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="desctype">{{ $see->Products->Types->desctype }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="descbrand" class="col-md-4 control-label">Marca:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="descbrand">{{ $see->Products->Types->Modelos->Brands->descbrand }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="descmodel" class="col-md-4 control-label">Modelo:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="descmodel">{{ $see->Products->Types->Modelos->descmodel }}</p>
                                </div>
                            </div>

                            <div>
                                @if($see->Products->archive != null)
                                <label for="phone" class="col-md-4 control-label">Archivo: </label>
                                <div class="col-md-8">
                                    <a href="/proyectos/inventariodreams/public{{$see->Products->archive}}" target="_blank" class="btn btn-info ">Hacer clic aquí para ver</a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="detail" class="col-md-4 control-label">Ubicación:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="detail">{{ $see->Products->detail }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="state" class="col-md-4 control-label">Estado:</label>
                                <div class="col-md-8">
                                    <p class="form-control" name="state">{{ $see->Products->state }}</p>
                                </div>
                            </div>

                             <div>
                                <label for="businessname" class="col-md-4 control-label">Proveedor: </label>
                                <div class="col-md-8">
                                    <p class="form-control" name="businessname">{{ $see->Products->Providers->businessname }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="rut" class="col-md-4 control-label">Rut Proveedor: </label>
                                <div class="col-md-8">
                                    <p class="form-control" name="rut">{{ $see->Products->Providers->rut }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="address" class="col-md-4 control-label">Dirección: </label>
                                <div class="col-md-8">
                                    <p class="form-control" name="address">{{ $see->Products->Providers->address }}</p>
                                </div>
                            </div>

                            <div>
                                <label for="phone" class="col-md-4 control-label">Teléfono: </label>
                                <div class="col-md-8">
                                    <p class="form-control" name="phone">{{ $see->Products->Providers->phone }}</p>
                                </div>
                            </div>

                            <div>
                                @if($see->Products->photo != null)
                                <label for="phone" class="col-md-4 control-label">Imagen: </label>
                                <div class="col-md-8">
                                    <a href="/proyectos/inventariodreams/public{{$see->Products->photo}}" target="_blank" class="btn btn-info">Hacer clic aquí para ver</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Registro de producto del último ingreso 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                                <label for="reasoninput" class="col-md-4 control-label">Motivo de Entrada:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->reasoninput }}</p>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="addresseein" class="col-md-4 control-label">Usuario que recibe:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->addresseein }}</p>
                                                </div>
                                            </div>

                                            <div>
                                                <label for="placeinput" class="col-md-4 control-label">Ubicación:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->placeinput }}</p>
                                                </div>
                                            </div>

                                            <div>
                                            @if($see->archiveinput != null)
                                                <label for="archiveinput" class="col-md-4 control-label">Archivo asociado:</label>
                                                <div class="col-md-8">
                                                    <a href="/proyectos/inventariodreams/public{{$see->archiveinput}}" target="_blank" class="btn btn-success">Hacer clic aquí para ver</a>
                                                </div>  
                                            @endif  
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div >
                                                <label for="descstate" class="col-md-4 control-label">Estado del producto:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->States->descstate }}</p>  
                                                </div>
                                            </div>

                                            <div >
                                                <label for="desccity" class="col-md-4 control-label">Ciudad:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->Cities->desccity }}</p>
                                                </div>
                                            </div>

                                             <div >
                                                <label for="dateinput" class="col-md-4 control-label">Fecha de ingreso:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->dateinput }}</p>
                                                </div>    
                                            </div>

                                            <div>
                                            @if($see->photo != null)
                                                <label for="photo" class="col-md-4 control-label">Foto asociada:</label>
                                                <div class="col-md-8">
                                                    <a href="/proyectos/inventariodreams/public{{$see->photo}}" target="_blank" class="btn btn-success">Hacer clic aquí para ver</a>
                                                </div>
                                            @endif    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ route('output.index') }}" class="btn btn-primary">Volver</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footter_js')
@endsection
