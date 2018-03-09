<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\outputrecord as Outputrecord;
use App\Model\Product;
use App\Model\State;
use App\Model\Areaproperty;
use App\Model\City;
use App\Model\Entity;
use App\Model\Group;
use App\Model\Location;
use Auth;
use Carbon\Carbon;
use DateTime;

class OutputrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataout = Product::where('state','=','Disponible')->paginate(6);
        return view('output.index',compact('dataout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idproduct)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileget($file)
    {
 
           //obtenemos el nombre del archivo
           $nombre = $file->getClientOriginalName();
     
           //indicamos que queremos guardar un nuevo archivo en el disco local
           \Storage::disk('local')->put($nombre,  \File::get($file));

           $url = '/storage/'.$nombre;

           return $url;
    }
    public function store(Request $request)
    {
          //validacion de los datos que ingresa el usuario
            $this->validate($request, [
            'reasonoutput' => 'required|string',
            'dateoutput' => 'required',
            'dateend' => 'required',
            'addresseeout' => 'required|string',
            // 'filearchivo' => 'required',
            'idareapro' => 'required',
            'idcity' => 'required',
            'idgroup' => 'required',
            'idlocation' => 'required'
            // 'filefoto' => 'required'
        ]);

         //Almacenamiento
           $file1 = $request->file('filefoto');
           // $foto = $this->fileget($file1);
           $foto = $file1 == null ? null :  $this->fileget($file1); 

           $file2 = $request->file('filearchivo');
           // $archivo = $this->fileget($file2);
           $archivo = $file2 == null ? null : $this->fileget($file2);


        $output = new Outputrecord;
        $output->quantityoutput = "1";
        $output->reasonoutput = $request->reasonoutput;
        $output->addresseeout = $request->addresseeout;
        $output->archiveoutput = $archivo;
        $output->photo = $foto;
        $output->dateoutput = $request->dateoutput;
        $output->dateend = $request->dateend;
        $output->product_id =  $request->idproduct;
        $output->location_id = $request->input('idlocation');
        $output->user_id = Auth::user()->id;;
        $output->state_id = 1;
        $output->city_id = $request->input('idcity');
        $output->areapro_id = $request->input('idareapro');
        $output->entity_id = 1;
        $output->group_id = $request->input('idgroup');
        $valor = $output->save();

        $id = $request->idproduct;
        $update = Product::where('idproduct','=',$id)->first();
        $update->state = "Activo";
        $update->datereturn = $output->dateend; 
        $update->delivery = $this->estadoEntregaAldia($output->dateend);  // 1 true = al dia y 0 false = retraso 
        $update->save();

        

        // dd($archivo);
        
        $mensaje = $valor == 1 ? "Registro guardado con exito." : "Error al guardar el registro";
       
        //redireccion a vista
        $dataout = Product::where('state','=','Disponible')->paginate(6);
        // return view('output.index',compact('dataout','mensaje'));
        return redirect()->route('output.index',compact('dataout'))->withMessage($mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\outputrecord  $outputrecord
     * @return \Illuminate\Http\Response
     */
    public function estadoEntregaAldia($fecha)
    {
        return new DateTime($fecha) >= new DateTime(date('Y-m-d'));
        
    }

    public function show(Product $idproduct)
    {
         
        //dd($idproduct);
        $idareapro = Areaproperty::pluck('descareapro','idareapro')->prepend('Selecciona Área');
        $idcity = City::pluck('desccity','idcity')->prepend('Selecciona Ciudad');
        $idgroup = Group::pluck('descgroup','idgroup')->prepend('Selecciona Razón Social');
        $idlocation = Location::pluck('desclocation','idlocation')->prepend('Selecciona Ubicación');
        
        $id = $idproduct->idproduct;
        //dd($id);
        $datap = Product::where('idproduct','=',$id)->get();
        //dd($datap);
        return view('output.createout', compact('idareapro','idcity','idgroup','idlocation','datap'));
    }

     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\outputrecord  $outputrecord
     * @return \Illuminate\Http\Response
     */
    public function edit(outputrecord $outputrecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\outputrecord  $outputrecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, outputrecord $outputrecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\outputrecord  $outputrecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outputrecord $outputrecord)
    {
        //
    }

    public function see (Product $idproduct)
    {
        $id = $idproduct->idproduct;
        $see = Outputrecord::where('product_id', '=', $id)->get()->max();
        // dd($see);
        return view('output.see', compact('see'));
    }

    public function retraso (Product $idproduct)
    {
        $id = $idproduct->idproduct;
        $see = Outputrecord::where('product_id', '=', $id)->get()->max();
        // dd($see);
        return view('output.retraso', compact('see'));
    }
}
