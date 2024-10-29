
 
Proyecto de Gestión de Pizzas e Ingredientes
Descripción
Este proyecto es una aplicación web para gestionar pizzas e ingredientes. Permite a los usuarios añadir, editar y eliminar pizzas e ingredientes, así como ver una lista de todos los ingredientes disponibles. La aplicación está construida utilizando Laravel y Bootstrap para el frontend.

Estructura del Proyecto
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
Decisiones de Diseño
No Uso de Repositories
El patrón Repository es una buena práctica para desacoplar la lógica de acceso a datos de la lógica de negocio. Sin embargo, en este proyecto decidí no utilizar el patrón Repository por las siguientes razones:

Simplicidad: La aplicación es relativamente pequeña y sencilla. Añadir una capa adicional de abstracción con Repositories podría complicar innecesariamente el código sin aportar beneficios significativos.
Mantenimiento: En proyectos pequeños, mantener una capa adicional de Repositories puede ser más costoso en términos de tiempo y esfuerzo. La lógica de acceso a datos es mínima y puede manejarse fácilmente dentro de los controladores.
Rapidez de Desarrollo: Al no utilizar Repositories, se reduce el tiempo de desarrollo inicial, permitiendo centrarse en la funcionalidad principal de la aplicación.
No Uso de Observers, Eventos y Listeners
Laravel proporciona una potente funcionalidad para manejar eventos y listeners, así como observers para observar cambios en los modelos. Sin embargo, en este proyecto decidí no utilizar estas características por las siguientes razones:

Simplicidad: La lógica de negocio en esta aplicación es bastante directa y no requiere la complejidad adicional de eventos y listeners. La mayoría de las operaciones pueden manejarse directamente en los controladores.
Mantenimiento: Añadir observers y eventos puede hacer que el flujo de la aplicación sea más difícil de seguir y depurar. En una aplicación pequeña, es más fácil mantener la lógica de negocio en un solo lugar.
Escalabilidad: Aunque los observers y eventos son útiles en aplicaciones grandes y complejas, en este proyecto no se espera un crecimiento significativo que justifique su uso.
