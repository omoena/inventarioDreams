<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Brand;
use App\Model\Modelo;
use App\Model\Type;
use App\Model\Provider;
use App\Model\Inputrecord;
use App\Model\Location;
use App\Model\State;
use App\Model\City;
use App\Model\Outputrecord;
use Auth;
use Carbon\Carbon;
use DateTime;

use Illuminate\Http\Request;
use App\Http\Requests;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::atrasado()->paginate(15);
        $productsOntime = Product::onTime()->paginate(15);
        
        return view('home', ['datapro' => $products, 'ontime' => $productsOntime]);
    }

    public function estadoEntrega($fecha)
    {
        return new DateTime($fecha) >= new DateTime(date('Y-m-d'));
    }

    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $datapro = Product::all(); 

        $pdf = PDF::loadView('product.showpdf', compact('datapro'));

        return $pdf->download('listado.pdf');
    }

    public function pdfProductos(Product $idproduct)
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $id = $idproduct->idproduct;
        $see = Product::where('idproduct', '=', $id)->get();
        $pdf = PDF::loadView('product.seepdf', compact('see'));
        
        return $pdf->download('producto.pdf');
    }

    public function reportever()
    {
        $datapro = Product::paginate(6);
        return view('product.showreporte', compact('datapro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::pluck('descstate','idstate')->prepend('Selecciona Estado');
        $idcity = City::pluck('desccity','idcity')->prepend('Selecciona Ciudad');

        // dd($type);

        return view('product.create',compact('state','idcity'));
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
            'name' => 'required|string',
            'serial' => 'required|string',
            'state' => 'required',
            'idcity' => 'required',
            'detail' => 'required|string',
            // 'daterecords' => 'required|date',
            'description' => 'required|string',
            'descbrand' => 'required|string',
            'descmodel' => 'required|string',
            'desctype' => 'required|string',
            'businessname' => 'required|string',
            'rut' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'addresseein' => 'required|string',
            'reasoninput' => 'required|string',
            'dateinput' => 'required|date'
        ]);

         //Almacenamiento
        $date = Carbon::now();
        $file1 = $request->file('filefoto');
        $foto = $file1 == null ? null :  $this->fileget($file1); 
        // $foto = $this->fileget($file1);

        $file2 = $request->file('filearchivo');
        $archivo = $file2 == null ? null : $this->fileget($file2);
        // $archivo = $this->fileget($file2);

        $brand = new Brand;
        $brand->descbrand = $request->descbrand;
        $valor1 = $brand->save();
        
        $model = new Modelo;
        $model->descmodel = $request->descmodel;
        $model->brand_id = $brand->idbrand;
        $valor2 = $model->save();

        $type = new Type;
        $type->desctype = $request->desctype;
        $type->model_id = $model->idmodel;
        $valor3 = $type->save();

        $provider = new Provider;
        $provider->businessname = $request->businessname;
        $provider->rut = $request->rut;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->daterecords = $date->format('Y-m-d');
        $provider->user_id = Auth::user()->id;
        $valor4 = $provider->save();

        $pr= $brand->idbrand;
        
        $product = new Product;
        $product->name = $request->name;
        $product->serial = $request->serial;
        $product->description = $request->description;
        $product->archive = $archivo;
        $product->photo = $foto;
        $product->detail = $request->detail;
        $product->state = 'Disponible';
        $product->daterecords = $date->format('Y-m-d');
        $product->type_id = $type->idtype;
        $product->provider_id = $provider->idprovider;
        $product->user_id = Auth::user()->id;
        //$product->user_id = Auth::user()->id;
        $valor5 = $product->save();

        $input = new Inputrecord;
        $input->quantityinput = 1;
        $input->reasoninput = $request->reasoninput;
        $input->addresseein = $request->addresseein;
        $input->placeinput = $request->detail;
        $input->archiveinput = $product->archive;
        $input->photo = $product->photo;
        $input->dateinput = $request->dateinput;
        $input->product_id = $product->idproduct;
        $input->location_id = 6;
        $input->user_id = Auth::user()->id;
        $input->state_id = $request->input('state');
        $input->city_id = $request->input('idcity');
        $valor6 = $input->save();

        

        $mensaje = $valor1 == 1 && $valor2 == 1 && $valor3 == 1 && $valor4 == 1 && $valor5 == 1 && $valor6 == 1 ? "Registro guardado con exito." : "Error al guardar el registro";
        //redireccion a vista
        $datapro = Product::paginate(6);
        //dd($datapro);
        // return view('product.show', compact('datapro','mensaje'));
        return redirect()->route('product.show',compact('datapro'))->withMessage($mensaje);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $datapro = Product::paginate(6);
        return view('product.show', compact('datapro'));

        // $datapro = Product::get(['idproduct']); //obtengo todos los id de productos
        // $largop = count($datapro); //total de datos

        // foreach ($datapro as $idp) 
        // {
        //     $arrayidp[] = $idp->idproduct; 
        // }
            
        //     //recorro el array con los id de producto
        // for ($i=0; $i < $largop ; $i++) { 
        //     $countin = Inputrecord::where('product_id', '=', $arrayidp[$i])->count();
        //     $countou = Outputrecord::where('product_id', '=', $arrayidp[$i])->count();
            
        //     if($countin > $countou)
        //     {
        //         $dataes[] = Inputrecord::where('product_id', '=', $arrayidp[$i])->get()->max();
               
        //     }
        //     elseif ($countin == $countou) 
        //     {
        //         $dataes[] = Outputrecord::where('product_id', '=', $arrayidp[$i])->get()->max();    
        //     }
        // }
       
        // $largoarray = count($dataes);
        // return view('product.show', compact('dataes','largoarray'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $idproduct)
    {
        $id = $idproduct->idproduct;
        $edit = Product::where('idproduct', '=', $id)->get();
        return view('product.update', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $idproduct)
    {
         $this->validate($request, [
            'name' => 'required|string',
            'serial' => 'required|string',
            'description' => 'required|string',
            'detail' => 'required|string',
            'desctype' => 'required|string',
            'descbrand' => 'required|string',
            'descmodel' => 'required|string',
        ]);

        $updatep = Product::find($idproduct)->first();
        // dd($updatep);
        $updatep->name = $request->name;   
        $updatep->serial = $request->serial;
        $updatep->description = $request->description;
        $updatep->detail = $request->detail;
        $updatep->save();

        $idbrand = $request->idbrand;    
        $updateb = Brand::where('idbrand','=',$idbrand)->first();
        $updateb->descbrand = $request->descbrand;   
        $updateb->save();

        $idmodel = $request->idmodel;
        $updatem = Modelo::where('idmodel','=',$idmodel)->first();
        $updatem->descmodel = $request->descmodel;   
        $updatem->save();

        $idtype = $request->idtype;
        $updatet = Type::where('idtype','=',$idtype)->first();
        $updatet->desctype = $request->desctype;   
        $updatet->save();

        $mensaje = "Datos del Producto ".$request->name." actualizados";   
        
        $datapro = Product::paginate(6);
        // return view('product.show', compact('datapro','mensaje'));
        return redirect()->route('product.show',compact('datapro'))->withMessage($mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproduct)
    {
        /*$id = $idproduct->idproduct;*/
        
        $prod = Product::findOrFail($idproduct);
        //dd($prod);

        if ($prod) {
            //$delet = Product::where('idproduct', '=', $id)->first();
            $valor1 = $prod->delete();
          
            $mensaje = $valor1 == 'true' ? "Producto eliminado del sistema" : "Error al eliminar producto";
            $datapro = Product::paginate(6);
            // return view('product.show', compact('datapro','mensaje'));
            return redirect()->route('product.show',compact('datapro'))->withMessage($mensaje);    
        }
        
    }

    public function see (Product $idproduct)
    {
        $id = $idproduct->idproduct;
        $see = Product::where('idproduct', '=', $id)->get();
        return view('product.see', compact('see'));
    }

  

}
