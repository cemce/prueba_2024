
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
Se ha dejado de lado los Observer, Listeners y Events debido a la poca profundidad de la tarea. Aún así, se ha hecho el Factory, aunque personalmente siempre he usado Seeder para hacer los fakers de  la base de datos.

Tampoco se ha usado Repositories por lo mismo, y todas aquellas funciones necesarias se han usado dentro de los modelos pertinentes.

Por el poco tiempo que he tenido en las manos, se han hecho los todos los métodos de los Controllers posibles para que se vea que entiendo la función de los mismos, pero por problemas ajenos a mi persona (fallo XAMPP MySQL, ida de luz por las lluvias en casa...)
no he podido hacer las vistas de edit.
