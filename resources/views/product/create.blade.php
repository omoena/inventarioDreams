@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Productos</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Registro de Producto
            </div>
            
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('product.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre del producto: </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
                                    <label for="serial" class="col-md-4 control-label">Serial: </label>

                                    <div class="col-md-6">
                                        <input id="serial" type="text" class="form-control" name="serial" value="{{ old('serial') }}" required required>

                                        @if ($errors->has('serial'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('serial') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('descbrand') ? ' has-error' : '' }}">
                                    <label for="descbrand" class="col-md-4 control-label">Marca: </label>

                                    <div class="col-md-6">
                                        <input id="descbrand" type="text" class="form-control" name="descbrand" value="{{ old('descbrand') }}"  autofocus placeholder="Marca del producto" required>

                                        @if ($errors->has('descbrand'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('descbrand') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group{{ $errors->has('descmodel') ? ' has-error' : '' }}">
                                    <label for="descmodel" class="col-md-4 control-label">Modelo: </label>

                                    <div class="col-md-6">
                                        <input id="descmodel" type="text" class="form-control" name="descmodel" value="{{ old('descmodel') }}"  autofocus placeholder="Modelo del producto" required>

                                        @if ($errors->has('descmodel'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('descmodel') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group{{ $errors->has('desctype') ? ' has-error' : '' }}">
                                    <label for="desctype" class="col-md-4 control-label">Categoria: </label>

                                    <div class="col-md-6">
                                     <input id="desctype" type="text" class="form-control" name="desctype" value="{{ old('desctype') }}"  autofocus placeholder="Ej. computador, celular" required>
                                        @if ($errors->has('desctype'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('desctype') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-6">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Descripción: </label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}"  autofocus required>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                 <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label for="state" class="col-md-4 control-label">Estado: </label>

                                    <div class="col-md-6">
                                        
                                        {!! Form::select('state', $state, null, ['id'=>'state', 'class'=>'js-example-basic-single form-control', 'required' => 'required']) !!} 
                                        
                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                    <label for="detail" class="col-md-4 control-label">Ubicación: </label>

                                    <div class="col-md-6">
                                        <input id="detail" type="text" class="form-control" name="detail" value="{{ old('detail') }}"  autofocus required>

                                        @if ($errors->has('detail'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('detail') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo" class="col-md-4 control-label">Foto del producto: </label>

                                 <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">

                                      <div class="col-md-6">
                                        <input type="file" class="form-control" name="filefoto" accept="image/*" autofocus>
                                      </div>

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>

                            <div class="form-group{{ $errors->has('archive') ? ' has-error' : '' }}">
                                <label for="archive" class="col-md-4 control-label">Archivo asociado: </label>

                                 <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">

                                      <div class="col-md-6">
                                        <input type="file" class="form-control" name="filearchivo" accept="application/pdf" autofocus>
                                      </div>
                                

                                    @if ($errors->has('archive'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('archive') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        Proveedor
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group{{ $errors->has('businessname') ? ' has-error' : '' }}">
                                            <label for="businessname" class="col-md-4 control-label">Razón Social: </label>

                                            <div class="col-md-6">
                                                <input id="businessname" type="text" class="form-control" name="businessname" value="{{ old('businessname') }}"  autofocus required>

                                                @if ($errors->has('businessname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('businessname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                                            <label for="rut" class="col-md-4 control-label">Rut Proveedor: </label>

                                            <div class="col-md-6">
                                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}"  autofocus required>

                                                @if ($errors->has('rut'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('rut') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address" class="col-md-4 control-label">Dirección: </label>

                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"  autofocus required>

                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="phone" class="col-md-4 control-label">Teléfono: </label>

                                            <div class="col-md-6">
                                                <input id="phone" type="tel"  class="form-control" name="phone" value="{{ old('phone') }}"  autofocus required>

                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-4 -->
                            </div>

                            <div class="col-lg-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        Registro de Entrada
                                    </div>
                                    <div class="panel-body">
                                         <div class="form-group{{ $errors->has('addresseein') ? ' has-error' : '' }}">
                                            <label for="addresseein" class="col-md-4 control-label">Recepcionista: </label>

                                            <div class="col-md-6">
                                                <input id="addresseein" type="text" class="form-control" name="addresseein" value="{{ old('addresseein') }}"  autofocus required>

                                                @if ($errors->has('addresseein'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('addresseein') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('reasoninput') ? ' has-error' : '' }}">
                                            <label for="reasoninput" class="col-md-4 control-label">Motivo de ingreso: </label>

                                            <div class="col-md-6">
                                                <input id="reasoninput" type="text" class="form-control" name="reasoninput" value="{{ old('reasoninput') }}"  autofocus required>

                                                @if ($errors->has('reasoninput'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('reasoninput') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('dateinput') ? ' has-error' : '' }}">
                                            <label for="dateinput" class="col-md-4 control-label">Fecha de ingreso: </label>

                                            <div class="col-md-6">
                                                <input id="dateinput" type="date" class="form-control" name="dateinput" value="{{ old('dateinput') }}"  autofocus required>

                                                @if ($errors->has('dateinput'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('dateinput') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('idcity') ? ' has-error' : '' }}">
                                            <label for="idcity" class="col-md-4 control-label">Ciudad: </label>

                                            <div class="col-md-6">
                                               {!! Form::select('idcity', $idcity, null, ['id'=>'idcity', 'class'=>'js-example-basic-single form-control','required','autofocus']) !!}

                                                @if ($errors->has('idcity'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('idcity') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            @permission('bodega_productos_create')
                                <button type="submit" class="btn btn-primary">
                                    Guardar Datos
                                </button>
                            @endpermission
                            </div>
                        </div>
                </form>
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