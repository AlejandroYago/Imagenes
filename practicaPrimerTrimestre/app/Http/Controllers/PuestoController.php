<?php

namespace App\Http\Controllers;

use App\Models\puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['puestos']= puesto::all();
        return view('puesto.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data[]="";
        $data['puestos'] = puesto::all();
        return view('puesto.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    
     
    public function store(Request $request)
    {
        
        //---------------------------------------------------------------------------------------------------------------------VALIDACIONES
        $rules=
            [
                "nombre"    => "required|unique:puesto,nombre|string|min:2|max:150",
                "minimo"    => "required|gte:0.01|lte:999999.98|numeric",
                "maximo"    => "required|gte:0.02|lte:999999.99|numeric",
            ];

            $message=[
                'nombre.required'   =>'Por favor rellene el nombre',
                'nombre.max'        =>'El nombre es demasiado largo',
                'nombre.min'        =>'El nombre es demasiado corto',
                'nombre.unique'     =>'El nombre que intenta introducir esta repetido',
                'nombre.string'     =>'El nombre debe estar compuesto por un string',
                
                'minimo.required'   =>'Por favor introduzca un sueldo minimo',
                'minimo.gte'        =>'El minimo debe ser superior o igual a 0.01',
                'minimo.lte'        =>'El minimo deber ser inferior o igual a 999999.98',
                'minimo.numeric'    =>'El sueldo minimo debe ser un valor numerico',
                
                'maximo.required'   =>'Por favor introduzca un sueldo maximo',
                'maximo.gte'        =>'El maximo debe ser superior o igual a 0.02',
                'maximo.lte'        =>'El maximo deber ser inferior o igual a 999999.99',
                'maximo.numeric'    =>'El sueldo maximo debe ser un valor numerico',

                ];

                $validator =Validator::make($request->all(), $rules, $message);

                if($validator->messages()->messages()){
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
                }
        //-----------------------------------------------------------------------------------------------------------------FIN VALIDACIONES
        
        $data=[];
        $data['message']='Un nuevo puesto ha sido creado correctamente';
        $data['type'] = 'success';
        $puesto = new puesto($request->all());
        
        
        try{
            $result=$puesto->save();
        }catch(\Exception $e){
            $result = false;
        }
        
        if(!$result){
            $data['message']='Un nuevo puesto no ha podido ser insertado';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        
        return redirect('puesto')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(puesto $puesto)
    {
        $data=[];
        $data['puesto']=$puesto;
        
        return view('puesto.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(puesto $puesto)
    {
        $data[]="";
        $data['puesto']= puesto::all();
        $data['puesto']=$puesto;
        return view('puesto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, puesto $puesto)
    {

        //---------------------------------------------------------------------------------------------------------------------VALIDACIONES
        $rules=
            [
                "nombre"    => "required|string|min:2|max:150",
                "minimo"    => "required|gte:0.01|lte:999999.98|numeric",
                "maximo"    => "required|gte:0.02|lte:999999.99|numeric",
            ];

            $message=[
                'nombre.required'   =>'Por favor rellene el nombre',
                'nombre.max'        =>'El nombre es demasiado largo',
                'nombre.min'        =>'El nombre es demasiado corto',
                //'nombre.unique'     =>'El nombre que intenta introducir esta repetido',
                'nombre.string'     =>'El nombre debe estar compuesto por un string',
                
                'minimo.required'   =>'Por favor introduzca un sueldo minimo',
                'minimo.gte'        =>'El minimo debe ser superior o igual a 0.01',
                'minimo.lte'        =>'El minimo deber ser inferior o igual a 999999.98',
                'minimo.numeric'    =>'El sueldo minimo debe ser un valor numerico',
                
                'maximo.required'   =>'Por favor introduzca un sueldo maximo',
                'maximo.gte'        =>'El maximo debe ser superior o iguak a 0.02',
                'maximo.lte'        =>'El maximo deber ser inferior o igual a 999999.99',
                'maximo.numeric'    =>'El sueldo maximo debe ser un valor numerico',

                ];

                $validator =Validator::make($request->all(), $rules, $message);

                if($validator->messages()->messages()){
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
                }
        //-----------------------------------------------------------------------------------------------------------------FIN VALIDACIONES
        
                
        $data=[];
        $data['message']='El puesto: ' . $puesto->nombre. ' ha sido editado correctamente';
        
        try{
            $result=$puesto->update($request->all());//Aqui guardamos en $result lo que nos llega por el $request y updateamos los datos 
        }catch(\Exception $e){
            $data['message']='El puesto no ha podido ser editado';
            $data['type'] = 'danger';
            return redirect('puesto/' . $puesto->id . '/edit')->with($data);
        }
        
        return redirect('puesto')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, puesto $puesto)
    {
        $data=[];
        $data['message']='El puesto '. $puesto->nombre . ' ha sido borrado';
        
        try{
            $puesto->delete();
            $data['message']='El puesto ' . $puesto->nombre . ' ha sido borrado correctamente';
            
            return redirect('puesto')->with($data);
        }catch(\Exception $e){
            $data['message']='El puesto ' . $puesto->nombre . ' No ha podido ser borrado, porque es el puesto de un Jefe de Departamento';
            $data['type'] = 'danger';
            
            return redirect('puesto')->with($data);
        }
    }
}

