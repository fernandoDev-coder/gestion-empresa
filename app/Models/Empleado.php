<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Permitir la asignación masiva de estos campos
    protected $fillable = [
        'nombre',
        'apellido_primero',
        'apellido_segundo',
        'rol',
        'fecha_nacimiento',
        'dni',
        'email',
        'oficina_id'
    ];

    // Relación con la oficina
    public function oficina()
    {
        return $this->belongsTo(Oficina::class);
    }

    // Establecer si quieres que Laravel gestione los timestamps (por defecto es true)
    public $timestamps = true;
}
