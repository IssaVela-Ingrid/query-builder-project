# Actividad 2: Guía de Consultas SQL en Laravel (Query Builder & ORM) ✨

[![Laravel](https://img.shields.io/badge/Framework-Laravel-red?style=flat&logo=laravel)](https://laravel.com/)
[![ORM: Eloquent](https://img.shields.io/badge/ORM-Eloquent-orange)](https://laravel.com/docs/eloquent)
[![Sección: FSJ](https://img.shields.io/badge/Secci%C3%B3n-FSJ-blue)](https://github.com/tu-usuario/nombre-proyecto)

---

## 📝 Descripción del Proyecto

Este proyecto contiene la implementación de las **9 consultas requeridas** en la Actividad 2, utilizando el **ORM Eloquent** de Laravel para interactuar con la base de datos. El objetivo principal es demostrar el manejo de relaciones, *Eager Loading* y diversas cláusulas de consulta sobre las tablas `usuarios` y `pedidos`.

* **Mentor:** Fernando Aguilar
* **Autor/a:** Ingrid Rubenia Vela Recinos
* **Sección:** FSJ

---

## 🏗️ Estructura de la Base de Datos

Las migraciones fueron creadas basándose en el diagrama proporcionado, respetando la estructura y el uso de la llave foránea para establecer la relación uno-a-muchos entre usuarios y pedidos.

| Tabla | PK | Otros Campos | Relación (FK) |
| :--- | :--- | :--- | :--- |
| **usuarios** | `id` | `nombre`, `correo`, `telefono` | |
| **pedidos** | `id` | `producto`, `cantidad`, `total` | `user_id` (Referencia a `usuarios.id`) |

### 💡 Modelos Usados

* **`Usuario.php`**: Mapea a la tabla `usuarios`.
* **`Pedido.php`**: Mapea a la tabla `pedidos`.
* **`ConsultaController.php`**: Contiene la lógica para las 9 consultas.

---

## ⚙️ Configuración y Ejecución del Proyecto

Sigue estos pasos para poner en marcha y probar la aplicación:

### 1. Clonar e Instalar Dependencias

> **⚠️ Nota:** La URL de `git clone` proporcionada era de YouTube. Asegúrate de reemplazarla con la URL de tu repositorio de GitHub.

```bash
# Clonar el repositorio
git clone [URL-DE-TU-REPOSITORIO-AQUI]
cd [nombre-del-proyecto]

# Instalar dependencias de PHP
composer install
