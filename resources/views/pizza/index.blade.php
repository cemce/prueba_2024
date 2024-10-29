<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pizzas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Pizzas</h1>
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addPizzaModal">
            Añadir Pizza
        </button>

        @if($pizzas->isEmpty())
            <p>No hay pizzas disponibles.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Ingredientes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pizzas as $pizza)
                        <tr>
                            <td>{{ $pizza->nombre }}</td>
                            <td>{{ $pizza->descripcion }}</td>
                            <td>{{ $pizza->precio }}</td>
                            <td>
                                <ul>
                                    @foreach($pizza->ingredientes as $ingrediente)
                                        <li>{{ $ingrediente->nombre }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-show" data-toggle="modal" data-target="#showPizzaModal" data-id="{{ $pizza->id }}">Show</button>
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#deletePizzaModal" data-id="{{ $pizza->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Modal Añadir Pizza -->
        <div class="modal fade" id="addPizzaModal" tabindex="-1" aria-labelledby="addPizzaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPizzaModalLabel">Añadir Pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pizza.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ingredientes">Ingredientes</label>
                                <div id="ingredientes-container">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="ingredientes[]" required>
                                            <option value="">Seleccione un ingrediente</option>
                                            @foreach($ingredientes as $ingrediente)
                                                <option value="{{ $ingrediente->id }}">{{ $ingrediente->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-danger remove-ingrediente" type="button">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" id="add-ingrediente">Añadir Ingrediente</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Mostrar Pizza -->
        <div class="modal fade" id="showPizzaModal" tabindex="-1" aria-labelledby="showPizzaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showPizzaModalLabel">Detalles de la Pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre:</strong> <span id="pizza-nombre"></span></p>
                        <p><strong>Descripción:</strong> <span id="pizza-descripcion"></span></p>
                        <p><strong>Precio:</strong> <span id="pizza-precio"></span></p>
                        <p><strong>Ingredientes:</strong></p>
                        <ul id="pizza-ingredientes"></ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar Pizza -->
        <div class="modal fade" id="deletePizzaModal" tabindex="-1" aria-labelledby="deletePizzaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePizzaModalLabel">Eliminar Pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar esta pizza?</p>
                        <form id="deletePizzaForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-ingrediente').click(function() {
                var ingredienteHtml = `
                    <div class="input-group mb-3">
                        <select class="form-control" name="ingredientes[]" required>
                            <option value="">Seleccione un ingrediente</option>
                            @foreach($ingredientes as $ingrediente)
                                <option value="{{ $ingrediente->id }}">{{ $ingrediente->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-danger remove-ingrediente" type="button">Eliminar</button>
                        </div>
                    </div>`;
                $('#ingredientes-container').append(ingredienteHtml);
            });

            $(document).on('click', '.remove-ingrediente', function() {
                $(this).closest('.input-group').remove();
            });


            $('.btn-show').click(function() {
                var pizzaId = $(this).data('id');
                $.get('/pizzas/' + pizzaId, function(data) {
                    $('#pizza-nombre').text(data.nombre);
                    $('#pizza-descripcion').text(data.descripcion);
                    $('#pizza-precio').text(data.precio);
                    $('#pizza-ingredientes').empty();
                    data.ingredientes.forEach(function(ingrediente) {
                        $('#pizza-ingredientes').append('<li>' + ingrediente.nombre + '</li>');
                    });
                });
            });

            // Configurar el formulario de eliminación
            $('.btn-delete').click(function() {
                var pizzaId = $(this).data('id');
                $('#deletePizzaForm').attr('action', '/pizzas/' + pizzaId);
            });
        });
    </script>
</body>
</html>
