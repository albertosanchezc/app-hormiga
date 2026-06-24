<?php

namespace App\Models;

use App\Models\Orden;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    //
    protected $fillable = [
        'nombre',
        'activo',
    ];


    protected $casts = [
        'activo' => 'boolean',
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
    
    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'tipo_servicio_id');
    }
}
