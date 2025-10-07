📚 Actividad 2: Guía de Consultas SQL en Laravel (Query Builder & ORM)
Mentor: Fernando Aguilar 
Autor/a: Ingrid Rubenia Vela Recinos 
Sección: FSJ
Este proyecto contiene la implementación de las 9 consultas requeridas en la Actividad 2, utilizando el ORM Eloquent de Laravel para interactuar con las tablas usuarios y pedidos.

🏗️ Estructura de la Base de DatosLas migraciones fueron creadas basándose en el diagrama proporcionado, respetando la estructura y el uso de la llave foránea:Tabla: usuariosTabla: pedidosPK idPK idnombreproductocorreocantidadtelefonototalFK user_id (Referencia a usuarios.id)💡 Modelos UsadosUsuario.php: Mapea a la tabla usuarios.Pedido.php: Mapea a la tabla pedidos.ConsultaController.php: Contiene la lógica para las 9 consultas.⚙️ Configuración y Ejecución del ProyectoSigue estos pasos para poner en marcha y probar la aplicación:1. Clonar e Instalar Dependencias# Clonar el repositorio
git clone [https://www.youtube.com/watch?v=W3ARA19UB4w](https://www.youtube.com/watch?v=W3ARA19UB4w)
cd [nombre-del-proyecto]

# Instalar dependencias de PHP
composer install
2. Archivo de Entorno (.env)Crea el archivo .env y configura la conexión a tu base de datos.Nota: El SESSION_DRIVER ha sido configurado a file para evitar el error de la tabla sessions faltante.cp .env.example .env
php artisan key:generate
3. Migraciones y SeedsAsegúrate de tener un Seeder que inserte al menos 5 registros en ambas tablas para que las consultas tengan datos de prueba:# Ejecutar las migraciones (creación de tablas)
php artisan migrate

# Ejecutar el Seeder (inserción de datos de prueba)
php artisan db:seed
4. Iniciar el Servidorphp artisan serve

📋 Pruebas de Consultas (ConsultaController)Todas las consultas se prueban a través de rutas GET. Puedes verificar el resultado de cada una en tu navegador, visitando http://127.0.0.1:8000/[ruta].#Descripción de la ConsultaMétodo ORM/Query BuilderRuta de VerificaciónC1Pedidos asociados al Usuario con ID 2.->pedidos (Relación)/consulta/1C2Pedidos con el Nombre y Correo del usuario.with('usuario:...') (Eager Loading)/consulta/2C3Pedidos cuyo total está entre $100.00 y $250.00.whereBetween()/consulta/3C4Usuarios cuyo nombre comienza con la letra "R".where('nombre', 'like', 'R%')/consulta/4C5Total de registros de pedidos para el Usuario ID 5.->count()/consulta/5C6Pedidos ordenados por Total Descendente con info de usuario.with()->orderBy('total', 'desc')/consulta/6C7Suma total del campo "total" de todos los pedidos.Pedido::sum('total')/consulta/7C8Pedido más económico con el nombre del usuario.with()->orderBy('total', 'asc')->first()/consulta/8C9Pedidos agrupados lógicamente por Usuario.Usuario::with('pedidos:...')/consulta/9
