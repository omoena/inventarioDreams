@extends('layouts.app')

@section('content')
<div class="container_">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos</h3>
        </div>
    </div>
            
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-yellow">
                    <div class="panel-heading">
                        Actualizar datos de Producto
                    </div>
                <div class="panel-body">
                @foreach ($edit as $data)
                    <form class="form-horizontal" method="POST" action="{{ route('product.update', $data->idproduct) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}

               
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre Producto:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('serial') ? ' has-error' : '' }}">
                            <label for="serial" class="col-md-4 control-label">Serial:</label>

                            <div class="col-md-6">
                                <input id="serial" type="text" class="form-control" name="serial" value="{{ $data->serial}}" required autofocus>

                                @if ($errors->has('serial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description:</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $data->description}}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                            <label for="detail" class="col-md-4 control-label">Destino:</label>

                            <div class="col-md-6">
                                <input id="detail" type="text" class="form-control" name="detail" value="{{ $data->detail}}" required autofocus>

                                @if ($errors->has('detail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('desctype') ? ' has-error' : '' }}">
                            <label for="desctype" class="col-md-4 control-label">Categoria:</label>

                            <div class="col-md-6">
                                <input id="desctype" type="text" class="form-control" name="desctype" value="{{ $data->Types->desctype }}" required autofocus>

                                @if ($errors->has('desctype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desctype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descbrand') ? ' has-error' : '' }}">
                            <label for="descbrand" class="col-md-4 control-label">Marca:</label>

                            <div class="col-md-6">
                                <input id="descbrand" type="text" class="form-control" name="descbrand" value="{{ $data->Types->Modelos->Brands->descbrand }}" required autofocus>

                                @if ($errors->has('descbrand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descbrand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descmodel') ? ' has-error' : '' }}">
                            <label for="descmodel" class="col-md-4 control-label">Modelo:</label>

                            <div class="col-md-6">
                                <input id="descmodel" type="text" class="form-control" name="descmodel" value="{{ $data->Types->Modelos->descmodel }}" required autofocus>

                                @if ($errors->has('descmodel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descmodel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <input type="hidden" name="idbrand" id="idbrand" value="{{ $data->Types->Modelos->Brands->idbrand }}">
                          <input type="hidden" name="idtype" id="idtype" value="{{ $data->Types->idtype }}">
                          <input type="hidden" name="idmodel" id="idmodel" value="{{ $data->Types->Modelos->idmodel }}">
                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('product.show') }}" class="btn btn-default">Cancelar</a>
                            @permission('bodega_productos_update')
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            @endpermission
                            </div>
                        </div>
                    </form>
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
