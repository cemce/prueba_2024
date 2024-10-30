
# Proyecto de Gestión de Pizzas e Ingredientes
Este proyecto es una aplicación web para gestionar pizzas e ingredientes. Permite a los usuarios añadir, editar y eliminar pizzas e ingredientes, así como ver una lista de todos los ingredientes disponibles. La aplicación está construida utilizando Laravel para el backend y Bootstrap para el frontend.

## Estructura del proyecto

El proyecto sigue una estructura MVC (Modelo-Vista-Controlador) estándar de Laravel. A continuación se describen los componentes principales:

Modelos

Pizza: Representa una pizza en la aplicación.
Ingrediente: Representa un ingrediente en la aplicación.
Controladores
PizzaController: Maneja las operaciones CRUD para las pizzas.
IngredienteController: Maneja las operaciones CRUD para los ingredientes.
Vistas
dashboard.blade.php: Página principal del dashboard.
pizzas/index.blade.php: Lista de pizzas.
pizzas/edit.blade.php: Formulario para editar una pizza.
ingredientes/index.blade.php: Lista de ingredientes.
## Decisión de diseño
Se ha dejado de lado los Observer, Listeners y Events debido a la poca profundidad de la tarea. Aún así, se ha hecho el Factory, aunque no se han usado para que se vea que controlo de la estructura de los mismos.
Había pensado en usar Seeders para la base de datos, pero he prefereido no hacerlo.
Se han hecho comentarios en el código explicando el porque de algunas acciones, como el no uso de Repositories y demás.
