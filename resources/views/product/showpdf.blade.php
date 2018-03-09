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
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Productos</h3>
        </div>
    </div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body"> 
            <table width="100%" class="table table-striped table-bordered table-hover datatable" id="tableProduct">
              <thead>
                <tr>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Serial</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Ubicación</th>
                  <!--   <th class="text-center">Opciones</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach($datapro as $data)
                    <tr class="gradeA">
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->serial }}</td>
                        <td>{{ $data->Types->desctype}}</td>
                        <td>{{ $data->Types->Modelos->Brands->descbrand }}</td>
                        <td>{{ $data->Types->Modelos->descmodel }}</td>
                        <td>{{ $data->state }}</td>
                        <td>{{ $data->detail }}</td>
                    </tr>
                @endforeach
            	</tbody>
            </table>
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