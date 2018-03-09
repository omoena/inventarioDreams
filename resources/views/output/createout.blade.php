@extends('layouts.app')

@section('content')
<div class="container_">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Prestamo</h3>
    </div>
</div>

    <div class="row">
         <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('output.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        Datos del Producto a Prestar
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
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        Datos para registro de Prestamo
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group{{ $errors->has('reasonoutput') ? ' has-error' : '' }}">
                                                    <label for="reasonoutput" class="col-md-4 control-label">Motivo de salida:</label>

                                                    <div class="col-md-8">
                                                        <input id="reasonoutput" type="text" class="form-control" name="reasonoutput" required autofocus>

                                                        @if ($errors->has('reasonoutput'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('reasonoutput') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group{{ $errors->has('dateoutput') ? ' has-error' : '' }}">
                                                    <label for="dateoutput" class="col-md-4 control-label">Fecha de Inicio:</label>

                                                    <div class="col-md-8">
                                                        <input id="dateoutput" type="date" class="form-control" name="dateoutput" required autofocus>

                                                        @if ($errors->has('dateoutput'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('dateoutput') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group{{ $errors->has('dateend') ? ' has-error' : '' }}">
                                                    <label for="dateend" class="col-md-4 control-label">Fecha de Termino:</label>

                                                    <div class="col-md-8">
                                                        <input id="dateend" type="date" class="form-control" name="dateend" required autofocus>

                                                        @if ($errors->has('dateend'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('dateend') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('addresseeout') ? ' has-error' : '' }}">
                                                    <label for="addresseeout" class="col-md-4 control-label">Para el usuario:</label>

                                                    <div class="col-md-8">
                                                        <input id="addresseeout" type="addresseeout" class="form-control" name="addresseeout" required autofocus>

                                                        @if ($errors->has('addresseeout'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('addresseeout') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('filearchivo') ? ' has-error' : '' }}">
                                                    <label for="filearchivo" class="col-md-4 control-label">Archivo asociado:</label>
                                        
                                                         <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">
                                    
                                                          <div class="col-md-8">
                                                            <input type="file" class="form-control" name="filearchivo" accept="application/pdf" autofocus>
                                                          </div>
                                                       
                                                        @if ($errors->has('filearchivo'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('filearchivo') }}</strong>
                                                            </span>
                                                        @endif
                                                     </div>
                                                </div>

                                            <div class="col-lg-6">
                                                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Área de la propiedad:</label>

                                                    <div class="col-md-8">
                                                       {!! Form::select('idareapro', $idareapro, null, ['id'=>'idareapro', 'class'=>'js-example-basic-single form-control']) !!}

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Ciudad:</label>

                                                    <div class="col-md-8">
                                                       {!! Form::select('idcity', $idcity, null, ['id'=>'idcity', 'class'=>'js-example-basic-single form-control','required' => 'required']) !!}

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Razón social:</label>

                                                    <div class="col-md-8">
                                                        {!! Form::select('idgroup', $idgroup, null, ['id'=>'idgroup', 'class'=>'js-example-basic-single form-control','required' => 'required']) !!}
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Ubicación:</label>

                                                    <div class="col-md-8">
                                                        {!! Form::select('idlocation', $idlocation, null, ['id'=>'idlocation', 'class'=>'js-example-basic-single form-control','required' => 'required']) !!}
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                 <div class="form-group{{ $errors->has('filefoto') ? ' has-error' : '' }}">
                                                    <label for="filefoto" class="col-md-4 control-label">Foto asociada:</label>
                                        
                                                         <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">
                                    
                                                          <div class="col-md-8">
                                                            <input type="file" class="form-control" name="filefoto" accept="image/*"  autofocus>
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
                                                @permission('bodega_disponibles_create')
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
