<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Imagen;
use App\Models\empleado;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado['imagenes'] = Imagen::all();
        return view('empleado.index', $empleado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado=[];
        $empleado['empleados'] = empleado::all();
        $empleado['imagenes'] = Imagen::all();
        $input='file';//Aqui estoy haciendo referencia al name del input de mi index

         $rules=
            [
                "file" => "required|mimes:jpg,png,jpge|file|max:2000",
            ];

        $message=[
                'file.required' =>'El nombre es requerido',
                'file.mimes' =>'Debe de ser una imagen con formato png,jpg,jpge',
                'file.max' =>'La imagen debe pesar 2MB como máximo',
            ];


        $validator = Validator::make($request->all($input), $rules, $message);

        if($validator->messages()->messages()){
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
        }

        if($request->hasFile($input) && $request->file($input)->isValid()) {//Aqui pregunatmos si el request tiene un archivo, y si el archivo es valido pues hago lo de abajo

            $archivo = $request->file($input);//Guardamos en archivo lo que nos llega por el request
            $nombre = $archivo->getClientOriginalName();//Esta funcion obtiene el nombre original con el que se subio la imagen

                try{
                                        
                        $data=[];
                        $data['nombreoriginal']=$archivo->getClientOriginalName();//Aqui cogemos el nombre original del archivo
                        $data['nombrearchivo']=$this->createId().'.'.$archivo->getClientOriginalExtension();//Asignamos con la funcion de abajo un nommbre unico y lo guardamos en el cloud name con este nombre unico
                        $data['mimetype']= 'image/'.$archivo->getClientOriginalExtension();//Aqui añadimos la extension original, pero asegurandonos que siempre lo vamos a leer como imagen
                        $data['idempleado']= $request->input('idempleado');
                        $img= new Imagen($data);//Aqui guardamos los datos en el objeto imagen
                        
                        $img->save();//Guardamos en la base de datos
                        
                        $archivo->storeAs('public/img', $data['nombrearchivo']);//Y lo guardamos en el storage con el nombre original

                }
                catch(\Exception $e){

                        return back()->with($empleado);
                }

        }
         return view('empleado.index', $empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function createId(){

        $x = 0;
        $y = 5;
        $Strings = '0123456789abcdefghijklmnopqrstuvwxyz';
        $random =substr(str_shuffle($Strings), $x, $y);

        $id = uniqid($random,true);


        return $id;
    }
}
