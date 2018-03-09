<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Inputrecord;
use App\Model\Product;
use App\Model\Type;
use App\Model\Modelo;
use App\Model\Brand;
use App\Model\Provider;
use App\Model\City;
use App\Model\State;
use Carbon\Carbon;
use Auth;
use DateTime;

class InputrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapro = Product::where('state','=','Activo')->where('delivery','=','1')->get();
        foreach ($datapro as $data) {
            $update = Product::where('idproduct','=',$data->idproduct)->first();
            $update->delivery = $this->estadoEntrega($data->datereturn);  // 1 true = al dia y 0 false = retraso 
            $update->save();
        }

        $datain = Product::where('state','=','Activo')->paginate(6);
        return view('input.show',compact('datain'));

    }

    public function estadoEntrega($fecha)
    {
        return new DateTime($fecha) >= new DateTime(date('Y-m-d'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
         //validacion
         $this->validate($request, [
            'reasoninput' => 'required|string',
            'addresseein' => 'required|string',
            'placeinput' => 'required|string',
            // 'filearchivo' => 'required',
            'idstate' => 'required',
            'idcity' => 'required'
            // 'filefoto' => 'required'
        ]);

          $file1 = $request->file('filefoto');
           // $foto = $this->fileget($file1);
           $foto = $file1 == null ? null :  $this->fileget($file1); 


           $file2 = $request->file('filearchivo');
           // $archivo = $this->fileget($file2);
           $archivo = $file2 == null ? null : $this->fileget($file2);


           $date = Carbon::now();
           //$date = $date->format('d/m/Y');

            $inputre = new Inputrecord;
            $inputre->quantityinput = "1";
            $inputre->reasoninput = $request->reasoninput;
            $inputre->addresseein = $request->addresseein;
            $inputre->placeinput = $request->placeinput;
            $inputre->archiveinput = $archivo;
            $inputre->photo = $foto;
            $inputre->dateinput = $date->format('Y-m-d');
            $inputre->product_id =  $request->idproduct;
            $inputre->location_id = 6;
            $inputre->user_id = Auth::user()->id;;
            $inputre->state_id = $request->input('idstate');
            $inputre->city_id = $request->input('idcity');
            $valor = $inputre->save();

            $id = $request->idproduct;
            $update = Product::where('idproduct','=',$id)->first();
            $update->state = "Disponible";
            $update->datereturn = null;
            $update->delivery = null;
            $update->detail = $inputre->placeinput;
            $update->save();

            $mensaje = $valor == 1 ? "Registro guardado con exito." : "Error al guardar el registro";
            $datain = Product::where('state','=','Activo')->paginate(6);
            // return view('input.show',compact('datain','mensaje'));
            return redirect()->route('input.index',compact('datain'))->withMessage($mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Inputrecord  $inputrecord
     * @return \Illuminate\Http\Response
     */
    public function show(Product $idproduct)
    {
        $idcity = City::pluck('desccity','idcity')->prepend('Selecciona Ciudad');
        $idstate = State::pluck('descstate','idstate')->prepend('Selecciona Estado');

        $id = $idproduct->idproduct;
        //dd($id);
        $datap = Product::where('idproduct','=',$id)->get();

        return view('input.create', compact('idcity','idstate','datap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Inputrecord  $inputrecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Inputrecord $inputrecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Inputrecord  $inputrecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inputrecord $inputrecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Inputrecord  $inputrecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inputrecord $inputrecord)
    {
        
    }

    public function see (Product $idproduct)
    {
        $id = $idproduct->idproduct;
        $see = Inputrecord::where('product_id', '=', $id)->get()->max();
        // dd($see->Products->name);
        return view('input.see', compact('see'));
    }
}
