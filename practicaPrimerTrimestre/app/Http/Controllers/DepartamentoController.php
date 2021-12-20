<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Illuminate\Http\Request;
use App\Models\empleado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['departamentos']= departamento::all();
        $data['empleados']= empleado::all();
        return view('departamento.index' , $data);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data[]="";
        $data['departamentos'] = departamento::all();
        $data['empleados']= empleado::all();
        return view('departamento.create',$data);
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
                "nombre"        => "required|unique:departamento,nombre|string|min:2|max:150",
                "localizacion"  => "required|min:2|max:150",
                "idempleadojefe"=> "nullable|exists:empleado,id|unique:departamento,idempleadojefe|integer",
            ];

            $message=[
                'nombre.required'       =>'Por favor rellene el nombre',
                'nombre.string'          =>'El nombre debe estar compuesto por un string',
                'nombre.unique'         =>'El nombre que intenta introducir esta repetido',
                'nombre.max'            =>'El nombre es demasiado largo',
                'nombre.min'            =>'El nombre es demasiado corto',
                
                'localizacion.max'      =>'El nombre de la localizacion es demasiado largo',
                'localizacion.min'      =>'El nombre de la localizacion es demasiado corto',
                
                'idempleadojefe.exists' =>'Este id de empleado no existe',
                'idempleadojefe.integer'=>'La id del empleado debe ser un numero entero',
                'idempleadojefe.unique' =>'El jefe de departamento debe ser unico',
                'idempleadojefe.integer'=>'El jefe de departamento debe ser un valor entero',

                ];

                $validator =Validator::make($request->all(), $rules, $message);

                if($validator->messages()->messages()){
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
                }
        //-----------------------------------------------------------------------------------------------------------------FIN VALIDACIONES
        
        
        
        $data=[];
        
        $data['message']='Un nuevo departamento ha sido creado correctamente';
        
        $departamento = new departamento($request->all());
        
      
        try{
            $result=$departamento->save();
        }catch(\Exception $e){
            $result = false;
        }
        
        if(!$result){
            $data['message']='Un nuevo departamento no ha podido ser insertado porque ya existia otro con el mismo nombre';
            $data['type']='danger';
            return back()->withInput()->with($data);
        }
        
        return redirect('departamento')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(departamento $departamento)
    {
        $data=[];
        $data['departamento']=$departamento;
        
        return view('departamento.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(departamento $departamento)
    {
        $data[]="";
        $data['departamento']= departamento::all();
        $data['empleados']= empleado::all();
        $data['departamento']=$departamento;
        return view('departamento.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departamento $departamento)
    {
        
        //---------------------------------------------------------------------------------------------------------------------VALIDACIONES
        $rules=
            [
                "nombre"        => "required|string|min:2|max:150",
                "localizacion"  => "required|min:2|max:150",
                "idempleadojefe"=> "nullable|exists:empleado,id|integer|unique:departamento,idempleadojefe",
            ];

            $message=[
                'nombre.required'       =>'Por favor rellene el nombre',
                'nombre.alpha'          =>'El nombre debe estar compuesto por un string',
                //'nombre.unique'         =>'El nombre que intenta introducir esta repetido',
                'nombre.max'            =>'El nombre es demasiado largo',
                'nombre.min'            =>'El nombre es demasiado corto',
                
                'localizacion.max'      =>'El nombre de la localizacion es demasiado largo',
                'localizacion.min'      =>'El nombre de la localizacion es demasiado corto',
                
                'idempleadojefe.exists' =>'Este id de empleado no existe',
                'idempleadojefe.integer'=>'La id del empleado debe ser un numero entero',
                'idempleadojefe.unique' =>'La id del empleado jefe ya esta en uso',

                ];

                $validator =Validator::make($request->all(), $rules, $message);

                if($validator->messages()->messages()){
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
                }
        //-----------------------------------------------------------------------------------------------------------------FIN VALIDACIONES
        
    
        
        
        $data=[];
        $data['message']='El departamento' . $departamento->nombre. 'ha sido editado correctamente';
        
        
        
        try{
            $result=$departamento->update($request->all());//Aqui guardamos en $result lo que nos llega por el $request y updateamos los datos 
        }catch(\Exception $e){
            $data['message']='El departamento no ha podido ser editado';
            $data['type']='danger';
            return redirect('departamento/' . $departamento->id . '/edit')->with($data);
        }
        
        return redirect('departamento')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(departamento $departamento)
    {
        $data=[];
        $data['message']='El departamento '. $departamento->nombre . ' ha sido borrado';
        
        try{
            $departamento->delete();
            //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $data['message']='El departamento ' . $departamento->nombre . ' ha sido borrado correctamente';
            
            return redirect('departamento')->with($data);
        }catch(\Exception $e){
            dd($e);
            $data['message']='El departamento ' . $departamento->nombre . ' NO ha sido borrado correctamente';
            $data['type']='danger';
            
            return redirect('departamento')->with($data);
        }
    }
}
