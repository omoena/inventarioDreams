@extends('layouts.app')

@section('content')
<?php 
//use App\Model\Product;
// use DateTime; 
/**
    $datap = Product::where('state','=','Activo')->where('delivery','=','1')->get();
    foreach ($datap as $data) {
        $update = Product::where('idproduct','=',$data->idproduct)->first();
        $update->delivery = new DateTime($data->datereturn) >= new DateTime(date('Y-m-d'));  // 1 true = al dia y 0 false = retraso 
        $update->save();
    }
    $datapro = Product::where('delivery','=','0')->where('state','=','Activo')->paginate(6); 
*/
?>
<div class="container_">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Bienvenido</h3>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
             
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="text-center">Productos Prestados en Retraso de Devolución</h4>
                                    </div>
                                <div class="panel-body"> 
                                    <!-- <div class="table-responsive"> -->
                                        <table width="100%" class="table table-hover datatables" id="tableDisponible">
                                          <thead>
                                            <tr>
                                                <th class="text-center">Prestado a</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Serial</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Fecha Devolución</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($datapro as $data)
                                                <tr class="danger">
                                                    <td class="text-center">{{ $data->Outputrecords->last()->addresseeout }}</td>
                                                    <td class="text-center">{{ $data->name }}</td>
                                                    <td class="text-center">{{ $data->serial }}</td>
                                                    <td class="text-center">{{ $data->state }}</td>
                                                    <td class="text-center">{{ $data->datereturn }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('output.retraso', $data->idproduct) }}" class="btn btn-info btn-sm">Ver información</a>
                                                    </td>
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                   <!--  </div> -->
                                    {{ $datapro->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="text-center">Productos Prestados en tiempo para Devolución</h4>
                                    </div>
                                <div class="panel-body"> 
                                    <!-- <div class="table-responsive"> -->
                                        <table width="100%" class="table table-hover datatables" id="tableDisponible">
                                          <thead>
                                            <tr>
                                                <th class="text-center">Prestado A</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Serial</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Fecha Devolución</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                            @if($ontime)
                                             @foreach($ontime as $data)
                                                <tr class="warning">
                                                    <td class="text-center">{{ $data->Outputrecords->last()->addresseeout }}</td>
                                                    <td class="text-center">{{ $data->name }}</td>
                                                    <td class="text-center">{{ $data->serial }}</td>
                                                    <td class="text-center">{{ $data->state }}</td>
                                                    <td class="text-center">{{ $data->datereturn }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('output.retraso', $data->idproduct) }}" class="btn btn-info btn-sm">Ver información</a>
                                                    </td>
                                                </tr>
                                             @endforeach
                                             @endif
                                            </tbody>
                                        </table>
                                   <!--  </div> -->
                                   
                                    {{ $ontime->links() }}
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footter_js')
 <script>

        $('.datatables').DataTable({
            responsive: true,
            paginate:false,
            bInfo:false,
            searching: false,
            ordering: false
        });
    </script>   
@endsection

