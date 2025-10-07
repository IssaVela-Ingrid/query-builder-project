<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario; // ¡USAR EL MODELO CORRECTO!
use App\Models\Pedido;

class DatosInicialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 1. Crear Usuarios (incluyendo IDs 2 y 5 para las consultas C1 y C5)
        // Usamos Usuario::create() en lugar de User::create()
        $userRamon = Usuario::create(['nombre' => 'Ramon Perez', 'correo' => 'ramon@ej.com', 'telefono' => '111-1111']); // Inicia con 'R' (C4)
        $user2     = Usuario::create(['nombre' => 'Maria Lopez', 'correo' => 'maria@ej.com', 'telefono' => '222-2222']); // ID 2 (C1)
        $user5     = Usuario::create(['nombre' => 'Andrea Gomez', 'correo' => 'andrea@ej.com', 'telefono' => '555-5555']); // ID 5 (C5)
        $userOtro  = Usuario::create(['nombre' => 'Rosa Martinez', 'correo' => 'rosa@ej.com', 'telefono' => '444-4444']); // Inicia con 'R' (C4)
        $userFinal = Usuario::create(['nombre' => 'Juan Garcia', 'correo' => 'juan@ej.com', 'telefono' => '333-3333']);

        // 2. Crear Pedidos (incluyendo rangos de total 100-250 para C3)
        // Usamos la clave foránea 'id_usuario' en lugar de 'user_id'
        
        // Pedidos para C1 (ID 2)
        Pedido::create(['id_usuario' => $user2->id, 'producto' => 'Mouse', 'cantidad' => 2, 'total' => 50.00]); // El más económico (C8)
        Pedido::create(['id_usuario' => $user2->id, 'producto' => 'Teclado', 'cantidad' => 1, 'total' => 150.00]); // Pedidos para ID 2 (C1)

        // Pedidos para C5 (ID 5 - Conteo)
        Pedido::create(['id_usuario' => $user5->id, 'producto' => 'Monitor', 'cantidad' => 1, 'total' => 500.00]); 
        Pedido::create(['id_usuario' => $user5->id, 'producto' => 'Cable USB', 'cantidad' => 5, 'total' => 25.00]); // Otro pedido para ID 5

        // Pedidos con rangos y totales variados
        Pedido::create(['id_usuario' => $userRamon->id, 'producto' => 'Laptop', 'cantidad' => 1, 'total' => 200.00]); // En rango 100-250 (C3)
        Pedido::create(['id_usuario' => $userFinal->id, 'producto' => 'Silla', 'cantidad' => 1, 'total' => 250.00]); // En rango 100-250 (C3)
        Pedido::create(['id_usuario' => $userOtro->id, 'producto' => 'Mesa de luz', 'cantidad' => 1, 'total' => 300.00]);
    }
}
