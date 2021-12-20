<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puesto extends Model
{//Los modelos son para laravel y las migraciones para las bases de datos
//Y son como las clases de Java
    use HasFactory;
    protected $table = 'puesto';//Me busca la tabla puesto
    
    protected $fillable = ['nombre','minimo','maximo',];//Y los atributos de la tabla que especificamos aqui arriba
    
    
    public function empleado(){
        return $this->hasMany('App\Models\empleado','idpuesto');
    }
}
