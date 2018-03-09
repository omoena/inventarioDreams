<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('template/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('template/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('template/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

     <!-- DataTables CSS -->
    <link href="{{ asset('template/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('template/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
   

</head>
<body>
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
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('template/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
   <!--  <script src="{{ asset('template/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('template/vendor/morrisjs/morris.min.js') }}"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('template/dist/js/sb-admin-2.js') }}"></script>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('js/selectize.min.js') }}"></script>
      <script src="{{ asset('js/select2.min.js') }}"></script>
    

    <script src="{{ asset('template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>



    @yield('footter_js')
    <script>

        $('.datatable').DataTable({
            responsive: false,
            paginate:false,
            bInfo:false,
            searching: false,
            order:[]
        });
    </script>
</body>
</html>