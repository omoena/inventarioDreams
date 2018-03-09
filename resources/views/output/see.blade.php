@extends('layouts.app')

@section('content')
<div class="container_">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos Prestados</h3>
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
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    Registro de producto del última salida
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group{{ $errors->has('reasonoutput') ? ' has-error' : '' }}">
                                                <label for="reasonoutput" class="col-md-4 control-label">Motivo de Entrada:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->reasonoutput }}</p>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('addresseeout') ? ' has-error' : '' }}">
                                                <label for="addresseeout" class="col-md-4 control-label">Para el usuario:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->addresseeout }}</p>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('dateoutput') ? ' has-error' : '' }}">
                                                <label for="dateoutput" class="col-md-4 control-label">Fecha de Inicio:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->dateoutput }}</p>
                                                </div>    
                                            </div>

                                            <div class="form-group{{ $errors->has('dateend') ? ' has-error' : '' }}">
                                                <label for="dateend" class="col-md-4 control-label">Fecha de Termino:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->dateend }}</p>
                                                </div>    
                                            </div>
                                            

                                            <div class="form-group{{ $errors->has('archiveoutput') ? ' has-error' : '' }}">
                                            @if($see->archiveoutput != null)
                                                <label for="archiveoutput" class="col-md-4 control-label">Archivo asociado:</label>
                                                <div class="col-md-8">
                                                    <a href="/proyectos/inventariodreams/public{{$see->archiveoutput}}" target="_blank" class="btn btn-success">Hacer clic aquí para ver</a>
                                                </div> 
                                            @endif   
                                            </div>
                                       
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group{{ $errors->has('descareapro') ? ' has-error' : '' }}">
                                                <label for="descareapro" class="col-md-4 control-label">Área de propiedad:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->Areaproperties->descareapro }}</p>  
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('desccity') ? ' has-error' : '' }}">
                                                <label for="desccity" class="col-md-4 control-label">Ciudad:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->Cities->desccity }}</p>
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('desclocation') ? ' has-error' : '' }}">
                                                <label for="desclocation" class="col-md-4 control-label">Ubicación:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->Locations->desclocation }}</p>
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('descgroup') ? ' has-error' : '' }}">
                                                <label for="descgroup" class="col-md-4 control-label">Razón social:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control" name="phone">{{ $see->Groups->descgroup }}</p>
                                                </div>    
                                            </div>

                                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
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
                            <a href="{{ route('input.index') }}" class="btn btn-primary">Volver</a>
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
