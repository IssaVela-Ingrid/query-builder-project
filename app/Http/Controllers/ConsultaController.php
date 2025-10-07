<?php

namespace App\Http\Controllers;

// Importaciones corregidas: Ahora usamos el modelo Usuario para la tabla 'usuarios'.
use App\Models\Pedido;
use App\Models\Usuario; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    /**
     * C1: Recupera todos los pedidos asociados al usuario con ID 2.
     * Uso: Accede a la relación 'pedidos' del modelo Usuario.
     */
    public function consulta1()
    {
        // Se usa la clase "Usuario" (que mapea a la tabla "usuarios")
        $pedidos = Usuario::findOrFail(2)->pedidos;

        return response()->json([
            'consulta' => 'C1: Pedidos del Usuario ID 2 (Tabla usuarios)',
            'resultado' => $pedidos
        ]);
    }

    /**
     * C2: Obtén la información detallada de los pedidos, incluyendo el nombre y correo
     * electrónico de los usuarios.
     * Uso: Carga ansiosa (Eager Loading) con 'with'.
     */
    public function consulta2()
    {
        // La relación en el modelo Pedido debe llamarse 'usuario' o 'user'.
        $pedidos = Pedido::with('usuario:id,nombre,correo')->get();

        return response()->json([
            'consulta' => 'C2: Pedidos con Nombre y Correo del Usuario',
            'resultado' => $pedidos
        ]);
    }

    /**
     * C3: Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
     * Uso: Método whereBetween.
     */
    public function consulta3()
    {
        // Se aplica el filtro directamente a la tabla 'pedidos'.
        $pedidos = Pedido::whereBetween('total', [100.00, 250.00])->get();

        return response()->json([
            'consulta' => 'C3: Pedidos con Total entre $100 y $250',
            'resultado' => $pedidos
        ]);
    }

    /**
     * C4: Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
     * Uso: Operador LIKE de SQL en la tabla 'usuarios'.
     */
    public function consulta4()
    {
        // Se usa la clase "Usuario" y la columna "nombre".
        $usuarios = Usuario::where('nombre', 'like', 'R%')->get();

        return response()->json([
            'consulta' => 'C4: Usuarios cuyo nombre comienza con "R"',
            'resultado' => $usuarios
        ]);
    }

    /**
     * C5: Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
     * Uso: Agregación count().
     */
    public function consulta5()
    {
        // Filtra por el campo de la llave foránea (user_id o id_usuario) en la tabla 'pedidos'.
        $conteo = Pedido::where('id_usuario', 5)->count(); // Asumo 'user_id' como FK

        return response()->json([
            'consulta' => 'C5: Total de registros de pedidos para el Usuario ID 5',
            'resultado' => $conteo
        ]);
    }

    /**
     * C6: Recupera todos los pedidos junto con la información de los usuarios, ordenándolos
     * de forma descendente según el total del pedido.
     * Uso: with() y orderBy().
     */
    public function consulta6()
    {
        // Carga la relación 'usuario' y ordena por el 'total'.
        $pedidosOrdenados = Pedido::with('usuario')->orderBy('total', 'desc')->get();

        return response()->json([
            'consulta' => 'C6: Todos los pedidos ordenados por Total (Descendente) con info de Usuario',
            'resultado' => $pedidosOrdenados
        ]);
    }

    /**
     * C7: Obtén la suma total del campo "total" en la tabla de pedidos.
     * Uso: Agregación sum().
     */
    public function consulta7()
    {
        // Función de agregación 'sum' aplicada al campo 'total' de la tabla 'pedidos'.
        $sumaTotal = Pedido::sum('total');

        return response()->json([
            'consulta' => 'C7: Suma Total de todos los pedidos',
            'resultado' => $sumaTotal
        ]);
    }

    /**
     * C8: Encuentra el pedido más económico, junto con el nombre del usuario asociado.
     * Uso: orderBy('asc') y first().
     */
    public function consulta8()
    {
        // Carga la relación 'usuario' y ordena ascendentemente por 'total'.
        $pedidoMasEconomico = Pedido::with('usuario')->orderBy('total', 'asc')->first();

        return response()->json([
            'consulta' => 'C8: Pedido más económico con info de Usuario',
            'resultado' => $pedidoMasEconomico
        ]);
    }

    /**
     * C9: Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
     * Uso: Carga de relación a través del modelo 'Usuario' para una representación lógica.
     */
    public function consulta9()
    {
        // Se obtienen todos los usuarios y se cargan sus pedidos (relación 'pedidos').
        // Esto agrupa los pedidos bajo el objeto de cada usuario, que es la mejor práctica en Eloquent.
        $usuariosConPedidos = Usuario::with('pedidos:id_usuario,producto,cantidad,total')->get();

        return response()->json([
            'consulta' => 'C9: Pedidos Agrupados por Usuario (productos, cantidad, total)',
            'resultado' => $usuariosConPedidos
        ]);
    }
}
