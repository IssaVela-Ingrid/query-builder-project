<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // 1. ESPECIFICAR TABLA: Para que Eloquent sepa usar la tabla 'usuarios'
    protected $table = 'usuarios'; 

    // 2. ASIGNACIÓN MASIVA (VITAL para el Seeder):
    // Permite que los métodos Usuario::create() inserten datos en estos campos.
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
    ];
    
    /**
     * Define la relación Uno-a-Muchos: Un usuario tiene muchos pedidos.
     */
    public function pedidos()
    {
        // 3. ESPECIFICAR CLAVE FORÁNEA:
        // Se usa 'id_usuario' para coincidir con el nombre de la FK en la tabla 'pedidos'.
        return $this->hasMany(Pedido::class, 'id_usuario');
    }
}
