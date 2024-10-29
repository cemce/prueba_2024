<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pizza</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Pizza</h1>

        <!-- Mensaje de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de edición de pizza -->
        <form action="{{ route('pizza.update', $pizza->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $pizza->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $pizza->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $pizza->precio }}" required>
            </div>

            <div class="form-group">
                <label for="ingredientes">Ingredientes</label>
                <div id="ingredientes-container">
                    @foreach($pizza->ingredientes as $ingrediente)
                        <div class="input-group mb-3">
                            <select class="form-control" name="ingredientes[]" required>
                                <option value="">Seleccione un ingrediente</option>
                                @foreach($ingredientes as $opcionIngrediente)
                                    <option value="{{ $opcionIngrediente->id }}"
                                        {{ $opcionIngrediente->id == $ingrediente->id ? 'selected' : '' }}>
                                        {{ $opcionIngrediente->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-danger remove-ingrediente" type="button">Eliminar</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" id="add-ingrediente">Añadir Ingrediente</button>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('pizza.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Scripts de jQuery y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para añadir y eliminar ingredientes dinámicamente -->
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
        });
    </script>
</body>
</html>
