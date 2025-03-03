<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion'];

    // Relación con los empleados
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
