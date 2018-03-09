@extends('layouts.app')

@section('content')
<div class="container_">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Devolución</h3>
    </div>
</div>

    <div class="row">
         <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('input.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        Datos del Producto a Devolver
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                             <div class="col-lg-6">
                                            @foreach($datap as $data)
                                                <div>
                                                    <label for="name" class="col-md-4 control-label">Producto:</label>

                                                    <div class="col-md-8">
                                                        <p class="form-control" name="name">{{ $data->name }}</p>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="serial" class="col-md-4 control-label">Serial:</label>

                                                    <div class="col-md-8">
                                                        <p class="form-control">{{ $data->serial }}</p>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="type" class="col-md-4 control-label">Categoria:</label>

                                                    <div class="col-md-8">
                                                       <p class="form-control">{{ $data->Types->desctype }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                             <div class="col-lg-6">
                                                <div>
                                                    <label for="brand" class="col-md-4 control-label">Marca:</label>

                                                    <div class="col-md-8">
                                                       <p class="form-control">{{ $data->Types->Modelos->Brands->descbrand }}</p>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="model" class="col-md-4 control-label">Modelo:</label>

                                                    <div class="col-md-8">
                                                        <p class="form-control">{{ $data->Types->Modelos->descmodel }}</p>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="place" class="col-md-4 control-label">Ubicación:</label>

                                                    <div class="col-md-8">
                                                        <p class="form-control">{{ $data->detail }}</p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="idproduct" id="idproduct" value="{{ $data->idproduct }}">

                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        Datos para registro de Devolución 
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group{{ $errors->has('reasoninput') ? ' has-error' : '' }}">
                                                    <label for="reasoninput" class="col-md-4 control-label">Motivo de Entrada:</label>

                                                    <div class="col-md-8">
                                                        <input id="reasoninput" type="text" class="form-control" name="reasoninput" required autofocus>

                                                        @if ($errors->has('reasoninput'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('reasoninput') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('addresseein') ? ' has-error' : '' }}">
                                                    <label for="addresseein" class="col-md-4 control-label">Usuario que recibe:</label>

                                                    <div class="col-md-8">
                                                        <input id="addresseein" type="addresseein" class="form-control" name="addresseein" required autofocus>

                                                        @if ($errors->has('addresseein'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('addresseein') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('placeinput') ? ' has-error' : '' }}">
                                                    <label for="placeinput" class="col-md-4 control-label">Ubicación:</label>

                                                    <div class="col-md-8">
                                                        <input id="placeinput" type="text" class="form-control" name="placeinput" required autofocus>

                                                        @if ($errors->has('placeinput'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('placeinput') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('filearchivo') ? ' has-error' : '' }}">
                                                    <label for="filearchivo" class="col-md-4 control-label">Archivo asociado:</label>
                                        
                                                         <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">
                                    
                                                          <div class="col-md-8">
                                                            <input type="file" class="form-control" name="filearchivo" accept="application/pdf"  autofocus>
                                                          </div>
                                                       
                                                        @if ($errors->has('filearchivo'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('filearchivo') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                 <div class="form-group{{ $errors->has('idstate') ? ' has-error' : '' }}">
                                                    <label for="idstate" class="col-md-4 control-label">Estado del producto:</label>

                                                    <div class="col-md-8">
                                                       {!! Form::select('idstate', $idstate, null, ['id'=>'idstate', 'class'=>'js-example-basic-single form-control', 'required' => 'required']) !!}

                                                        @if ($errors->has('idstate'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('idstate') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group{{ $errors->has('idcity') ? ' has-error' : '' }}">
                                                    <label for="idcity" class="col-md-4 control-label">Ciudad:</label>

                                                    <div class="col-md-8">
                                                       {!! Form::select('idcity', $idcity, null, ['id'=>'idcity', 'class'=>'js-example-basic-single form-control', 'required' => 'required']) !!}

                                                        @if ($errors->has('idcity'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('idcity') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('filefoto') ? ' has-error' : '' }}">
                                                    <label for="filefoto" class="col-md-4 control-label">Foto asociada:</label>
                                        
                                                         <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">
                                    
                                                          <div class="col-md-8">
                                                            <input type="file" class="form-control" name="filefoto" accept="image/*" autofocus >
                                                          </div>
                                                       
                                                        @if ($errors->has('filefoto'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('filefoto') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                @permission('bodega_prestados_create')
                                                    <button type="submit" class="btn btn-primary">
                                                        Guardar Datos
                                                    </button>
                                                @endpermission
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        //$('.selectize').selectize();
            // en el form de select  'class'=>'selectize' css


        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        })
    </script>


@endsection
