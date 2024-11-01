<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pizzas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
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
            <table id="pizzasTable" class="table table-bordered">
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
                                <a href="{{ route('pizza.edit', $pizza->id) }}"  style="display:inline;">
                                    <button type="submit" class="btn btn-info">Editar</button>
                                </a>
                                <form action="{{ route('pizza.delete', $pizza->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pizza?');">
                                        Borrar
                                    </button>
                                </form>
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
    </div>

    <!-- Scripts -->
<script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#pizzasTable').DataTable();


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
        });
    </script>
</body>
</html>
