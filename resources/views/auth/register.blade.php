@extends('layouts.app')

@section('content')
<div class="container_">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Usuarios</h3>
        </div>
    </div>
    <div class="row">
         @if(Session::has('message'))
         <!--    <h1>{{Session::get('message')}}</h1> -->
             <div class="alert alert-success alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('message')}}
            </div>
        @endif
    </div>  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        Registro de Usuario
                    </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Nambre Completo:</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('iddepartment') ? ' has-error' : '' }}">
                            <label for="iddepartment" class="col-md-4 control-label">Departamento:</label>

                            <div class="col-md-6">
                                 {!! Form::select('iddepartment', $iddepartment, null, ['id'=>'iddepartment','class'=>'js-example-basic-single form-control', 'required' => 'required']) !!}
                                @if ($errors->has('iddepartment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iddepartment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('idposition') ? ' has-error' : '' }}">
                            <label for="idposition" class="col-md-4 control-label">Cargo:</label>

                            <div class="col-md-6">
                                 {!! Form::select('idposition', $idposition, null, ['id'=>'idposition','class'=>'js-example-basic-single form-control', 'required' => 'required']) !!}
                                @if ($errors->has('idposition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idposition') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('idrole') ? ' has-error' : '' }}">
                            <label for="idrole" class="col-md-4 control-label">Rol:</label>

                            <div class="col-md-6">
                                 {!! Form::select('idrole', $idrole, null, ['id'=>'idrole','class'=>'js-example-basic-single form-control', 'required' => 'required']) !!}
                                @if ($errors->has('idrole'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idrole') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nambre de usuario:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                           @permission('admin_usuarios_create')
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            @endpermission
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
