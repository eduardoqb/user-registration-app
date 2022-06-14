<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container" id="divMenu">
        <div class="row py-3">
            <div class="col-12 py-2">
                <h1 class="text-muted m-0">Sistema Usuarios</h1>
            </div>
            <div class="col-12 p-2">
                <div class="d-flex justify-content-evenly">
                    <div class="col-2">
                        <button onclick="listar();" class="btn btn-primary w-100">Ver lista</button>
                    </div>
                    <div class="col-2">
                        <button onclick="mostrarFormAgregar();" class="btn btn-primary w-100">Registrar usuario</button>
                    </div>
                </div>
            </div>
        </div>
        @if(session('info'))
        <div class="row">
            <div class="col">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="container" id="divLista">
        <div class="row">
            <div class="col">
                <h3>Usuarios Registrados</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Tipo de documento</th>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Fecha de nacimiento</th>
                            <th>Ciudad de nacimiento</th>
                            <th>Correo electrónico</th>
                            <th>Contraseña</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="formRegistrar" style="display: none;">
                    <form id="nuevoUsuario">
                        @csrf
                        <h3>Registrar Usuario</h3>
                        <div class="row">
                            <div class="col">
                                <label for="tipo_documento" class="form-label">Tipo de documento</label>
                                <select name="tipo_documento" id="tipo_documento" class="form-select">
                                    <option value="" selected>Seleccionar</option>
                                    <option value="1">CC</option>
                                    <option value="2">CE</option>
                                    <option value="3">Pasaporte</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="cedula" class="form-label">
                                    Cédula
                                </label>
                                <input type="number" name="cedula" id="cedula" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nombres">
                                    Nombres
                                </label>
                                <input type="text" name="nombres" id="nombres" class="form-control">
                            </div>
                            <div class="col">
                                <label for="apellidos">
                                    Apellidos
                                </label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="fecha_nacimiento">
                                    Fecha de nacimiento
                                </label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ciudad_nacimiento">
                                    Ciudad de nacimiento
                                </label>
                                <input type="text" name="ciudad_nacimiento" id="ciudad_nacimiento" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">
                                    Correo electrónico
                                </label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="col">
                                <label for="password">
                                    Contraseña
                                </label>
                                <input type="Password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 text-center p-3">
                                <input type="submit" value="Registrar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div id="formEditar" style="display: none;">
                    <form id="editarUsuario">
                        @csrf
                        <h3>Editar Usuario</h3>
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="col">
                                <label for="tipo_documento" class="form-label">Tipo de documento</label>
                                <select name="tipo_documento" id="tipo_documento" class="form-select">
                                    <option value="">Seleccionar</option>
                                    <option value="1">CC</option>
                                    <option value="2">CE</option>
                                    <option value="3">Pasaporte</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="cedula" class="form-label">
                                    Cédula
                                </label>
                                <input type="number" name="cedula" id="cedula" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nombres">
                                    Nombres
                                </label>
                                <input type="text" name="nombres" id="nombres" class="form-control">
                            </div>
                            <div class="col">
                                <label for="apellidos">
                                    Apellidos
                                </label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="fecha_nacimiento">
                                    Fecha de nacimiento
                                </label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
                            </div>
                            <div class="col">
                                <label for="ciudad_nacimiento">
                                    Ciudad de nacimiento
                                </label>
                                <input type="text" name="ciudad_nacimiento" id="ciudad_nacimiento" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="email">
                                    Correo electrónico
                                </label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="col">
                                <label for="password">
                                    Contraseña
                                </label>
                                <input type="Password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-3 text-center p-3">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form id="eliminarUsuario" style="display: none;">
        @csrf
    </form>

    <form id="deshacerEliminarUsuario" style="display: none;">
        @csrf
    </form>
</body>

</html>