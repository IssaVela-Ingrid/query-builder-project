<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // 1. ASIGNACIÓN MASIVA (VITAL para el Seeder y creación de pedidos)
    protected $fillable = [
        'producto',
        'cantidad',
        'total',
        'id_usuario', // <<-- Campo de la FK, tal como está en la DB
    ];
    
    /**
     * Define la relación Muchos-a-Uno: Un pedido pertenece a un usuario.
     */
    public function usuario() // <<-- Renombrado a 'usuario' para ser consistente
    {
        // 2. REFERENCIA DE MODELO Y CLAVE FORÁNEA:
        // Apuntamos al modelo Usuario::class (en lugar de User::class).
        // Especificamos 'id_usuario' como la clave foránea local, coincidiendo con la migración.
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
