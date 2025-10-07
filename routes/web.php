<?php

use App\Http\Controllers\ConsultaController;
use Illuminate\Support\Facades\Route;

// 1. Ruta de inicio (debe estar fuera de cualquier otra función)
Route::get('/', function () {
    return view('welcome');
});

// === 2. RUTAS PARA LAS CONSULTAS DE LA ACTIVIDAD (DEBEN ESTAR AL MISMO NIVEL) ===

// C1: Pedidos del usuario con ID 2
Route::get('/consulta/1', [ConsultaController::class, 'consulta1']);

// C2: Pedidos con info detallada de usuarios
Route::get('/consulta/2', [ConsultaController::class, 'consulta2']);

// C3: Pedidos con total entre $100 y $250
Route::get('/consulta/3', [ConsultaController::class, 'consulta3']);

// C4: Usuarios cuyo nombre comienza con "R"
Route::get('/consulta/4', [ConsultaController::class, 'consulta4']);

// C5: Total de registros de pedidos para el usuario con ID 5
Route::get('/consulta/5', [ConsultaController::class, 'consulta5']);

// C6: Pedidos ordenados por total descendente con info de usuario
Route::get('/consulta/6', [ConsultaController::class, 'consulta6']);

// C7: Suma total del campo "total"
Route::get('/consulta/7', [ConsultaController::class, 'consulta7']);

// C8: Pedido más económico con info de usuario
Route::get('/consulta/8', [ConsultaController::class, 'consulta8']);

// C9: Pedidos agrupados por usuario
Route::get('/consulta/9', [ConsultaController::class, 'consulta9']);