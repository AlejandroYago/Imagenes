<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;
    
    protected $table = 'departamento';
    
    protected $fillable = ['nombre', 'localizacion', 'idempleadojefe',];
    
    
    public function empleados(){
        return $this->hasMany('App\Models\empleado', 'iddepartamento');
    }
    
    public function empleado(){
        return $this->belongsTo('App\Models\empleado', 'idempleadojefe');
    }
}
