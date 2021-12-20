<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\puesto;
use App\Models\departamento;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['empleados']= empleado::all();
        $data['imagenes'] = Imagen::all();
        return view('empleado.index' , $data);
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
        $data['departamentos'] = departamento::all();
        $data['empleados'] = empleado::all();
        return view('empleado.create', $data);
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
                "nombre"        => "required|string|min:2|max:150",
                "apellidos"     => "required|string|min:2|max:150",
                "email"         => "required|email:rfc|unique:empleado,email",
                "telefono"      => "required|string|size:9|unique:empleado,telefono",
                "fechacontrato" => "required|date_format:Y-m-d|before:tomorrow",
                "idpuesto"      => "required|exists:puesto,id|integer",
                "iddepartamento"=> "required|exists:departamento,id|integer",
                
            ];

            $message=[
                
                'nombre.required'           =>'Por favor rellene el nombre',
                'nombre.max'                =>'El nombre es demasiado largo',
                'nombre.min'                =>'El nombre es demasiado corto',
                'nombre.string'             =>'El nombre debe estar compuesto por un string',
                
                'apellidos.required'        =>'Por favor rellene los apellidos',
                'apellidos.max'             =>'El apellido es demasiado largo',
                'apellidos.min'             =>'El apellido es demasiado corto',
                'apellidos.string'          =>'El apellido debe ser una string',
                
                'email.required'            =>'Por favor introduzca el email',
                'email.email'               =>'Por favor introduce un email valido',
                'email.unique'              =>'El email esta duplicado',
                
                'telefono.required'         =>'Por favor introduzca un telefono',
                'telefono.string'           =>'El telefono debe ser un string',
                'telefono.size'             =>'El telefono tiene que tener una longitud de 9',
                'telefono.unique'           =>'El telefono introducido ya existe',
                
                'fechacontrato.required'    =>'Por favor introduzca una fecha de contrato',
                'fechacontrato.date_format' =>'La fecha debe contener el siguiente formato: Y/m/d',
                'fechacontrato.before'      =>'La fecha de contrato debe ser anterior a mañana',
                
                'idpuesto.required'         =>'Por favor introduce una idpuesto',
                'idpuesto.exists'           =>'El puesto introducido no existe',
                'idpuesto.integer'          =>'El id puesto deberia ser un integer',
                
                'iddepartamento.required'   =>'Por favor introduce un iddepartamento',
                'iddepartamento.exists'     =>'El departamento introducido no existe',
                'iddepartamento.integer'    =>'El id departamento deberia ser un integer',
            
                ];

                $validator =Validator::make($request->all(), $rules, $message);
                if($validator->messages()->messages()){
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
                }
        //-----------------------------------------------------------------------------------------------------------------FIN VALIDACIONES
        
        $data=[];
        
        
        $data['message']='Un nuevo empleado ha sido creado correctamente';

        
        $empleado = new empleado($request->all());
        
        try{
            
            $result=$empleado->save();
            
            
        }catch(\Exception $e){
            
            $result = false;
        }
        
        if(!$result){
            $data['message']='Un nuevo empleado no ha podido ser insertado';
            $data['type']='danger';
            return back()->withInput()->with($data);
        }
        
        return redirect('empleado')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        $data=[];
        $data['empleado']=$empleado;
        
        return view('empleado.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(empleado $empleado)
    {
        $data[]="";
        $data['puestos'] = puesto::all();
        $data['departamentos'] = departamento::all();
        $data['empleados'] = empleado::all();
        $data['empleado']=$empleado;
        return view('empleado.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $empleado)
    {
        
         //---------------------------------------------------------------------------------------------------------------------VALIDACIONES
        $rules=
            [
                "nombre"        => "required|string|min:2|max:150",
                "apellidos"     => "required|string|min:2|max:150",
                "email"         => "required|email:rfc",
                "telefono"      => "required|string|size:9",
                "fechacontrato" => "required|date_format:Y-m-d|before:tomorrow",
                "idpuesto"      => "required|exists:puesto,id|integer",
                "iddepartamento"=> "required|exists:departamento,id|integer",
                
            ];

            $message=[
                
                'nombre.required'           =>'Por favor rellene el nombre',
                'nombre.max'                =>'El nombre es demasiado largo',
                'nombre.min'                =>'El nombre es demasiado corto',
                'nombre.string'             =>'El nombre debe estar compuesto por un string',
                
                'apellidos.required'        =>'Por favor rellene los apellidos',
                'apellidos.max'             =>'El apellido es demasiado largo',
                'apellidos.min'             =>'El apellido es demasiado corto',
                'apellidos.string'          =>'El apellido debe ser una string',
                
                'email.required'            =>'Por favor introduzca el email',
                'email.email'               =>'Por favor introduce un email valido',
                
                'telefono.required'         =>'Por favor introduzca un telefono',
                'telefono.string'           =>'El telefono debe ser un string',
                'telefono.size'             =>'El telefono tiene que tener una longitud de 9',
                
                'fechacontrato.required'    =>'Por favor introduzca una fecha de contrato',
                'fechacontrato.date_format' =>'La fecha debe contener el siguiente formato: Y/m/d',
                'fechacontrato.before'      =>'La fecha de contrato debe ser anterior a mañana',
                
                'idpuesto.required'         =>'Por favor introduce una idpuesto',
                'idpuesto.exists'           =>'El puesto introducido no existe',
                'idpuesto.integer'          =>'El id puesto deberia ser un integer',
                
                'iddepartamento.required'   =>'Por favor introduce un iddepartamento',
                'iddepartamento.exists'     =>'El departamento introducido no existe',
                'iddepartamento.integer'    =>'El id departamento deberia ser un integer',
            
                ];
                
                $validator =Validator::make($request->all(), $rules, $message);
                
                if($validator->messages()->messages()){
                    dd($request->all());
                    return back()
                        ->withInput()
                        ->withErrors($validator->messages());
                }
        //-----------------------------------------------------------------------------------------------------------------FIN VALIDACIONES
        
        
        
        $data=[];
    
        $data['message']='El empleado' . $empleado->nombre. 'ha sido editado correctamente';
        
        try{
            $result=$empleado->update($request->all());//Aqui guardamos en $result lo que nos llega por el $request y updateamos los datos 
        }catch(\Exception $e){
            dd($empleado);
            $data['message']='El empleado no ha podido ser editado';
            $data['type']='danger';
            return redirect('empleado/' . $empleado->id . '/edit')->with($data);
        }
        
        return redirect('empleado')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
        
        $empleado = empleado::find($empleado->id);
        $isExist = departamento::select("*")->where("idempleadojefe", $empleado->id)->exists();
        if($isExist){
            DB::update('update departamento set idempleadojefe = null where idempleadojefe = :id', ['id' => $empleado->id]);

        }
        $data=[];
        $data['message']='El empleado '. $empleado->nombre . ' ha sido borrado';
        
        try{
            $empleado->delete();
            $data['message']='El empleado ' . $empleado->nombre . ' ha sido borrado correctamente';
            
            return redirect('empleado')->with($data);
        }catch(\Exception $e){
            $data['message']='El empleado ' . $empleado->nombre . ' NO ha sido borrado correctamente';
            $data['type']='danger';
            return redirect('empleado')->with($data);
        }
    }
}
