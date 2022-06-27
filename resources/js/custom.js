listar = function () {
    $('#formRegistrar').hide();
    $('#formEditar').hide();
    $.ajax({
        url: "/usuarios",
        method: "get",
        success: (response) => {
            $("#bodyTable").html(response);
            $('#divLista').show();
            $('#divMenu').append('<div class="alert alert-secondary alert-dismissible fade show" role="alert">Mensaje<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

            setTimeout(() => {
                var alertNode = document.querySelector('#divMenu .alert');
                var alert = new bootstrap.Alert.getInstance(alertNode);
                alert.close();
            }, 2000);
        }
    });
};

mostrarFormAgregar = function() {
    $('#divLista').hide();
    $('#formEditar').hide();
    $('#formRegistrar').show();
};

editarUsuario = function(id) {
    $('#divLista').hide();
    $('#formRegistrar').hide();
    $('#formEditar').show();

    $.ajax({
        url: "/usuarios/"+id,
        method: "get",
        success: (response) => {
            response = JSON.parse(response);
            console.log(response[0]);
            $("#editarUsuario #id").val(response[0]['id']);
            $("#editarUsuario #tipo_documento").val(response[0]['tipo_documento']);
            $("#editarUsuario #cedula").val(response[0]['cedula']);
            $("#editarUsuario #nombres").val(response[0]['nombres']);
            $("#editarUsuario #apellidos").val(response[0]['apellidos']);
            $("#editarUsuario #fecha_nacimiento").val(response[0]['fecha_nacimiento']);
            $("#editarUsuario #ciudad_nacimiento").val(response[0]['ciudad_nacimiento']);
            $("#editarUsuario #email").val(response[0]['email']);
            $("#editarUsuario #password").val(response[0]['password']);
        }
    });
};

eliminarUsuario = function(id) {

    var csrf_token = $('#eliminarUsuario [name="_token"]').val();

    $.ajax({
        data: {
            _token: csrf_token,
            values: id
        },
        url: "/usuarios/eliminar",
        method: "post",
        success: (response) => {
            response = JSON.parse(response);
            if(response['status']==1){
                var btnDeshacer = '<span class="position-absolute top-50 end-0 translate-middle-y pe-5"><buttton onclick="deshacerEliminarUsuario('+id+');" class="btn btn-primary">Deshacer</buttton></span>';
                $('#divMenu').append('<div class="alert alert-success alert-dismissible fade show" role="alert">Usuario eliminado'+btnDeshacer+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }else{
                $('#divMenu').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">El usuario no pudo ser eliminado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
            setTimeout(() => { 
                var alertNode = document.querySelector('#divMenu .alert');
                var alert = new bootstrap.Alert.getInstance(alertNode);
                alert.close();
             }, 2000);
            listar();
        }
    });
};

deshacerEliminarUsuario = function(id) {

    var csrf_token = $('#deshacerEliminarUsuario [name="_token"]').val();

    $.ajax({
        data: {
            _token: csrf_token,
            values: id
        },
        url: "/usuarios/deshacerEliminar",
        method: "post",
        success: (response) => {
            response = JSON.parse(response);
            
            if(response['status']==1){
                $('#divMenu').append('<div class="alert alert-success alert-dismissible fade show" role="alert">Usuario restaurado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }else{
                $('#divMenu').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">El usuario no pudo ser restaurado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
            setTimeout(() => { 
                var alertNode = document.querySelector('#divMenu .alert');
                var alert = new bootstrap.Alert.getInstance(alertNode);
                alert.close();
            }, 2000);
            listar();
        }
    });
};

$(function() {
    $("#nuevoUsuario").on("submit", function(event) {
        event.preventDefault();

        var csrf_token = $('#nuevoUsuario [name="_token"]').val();
        var formValues = $(this).serializeJSON();
        //console.log(formValues);

        $.ajax({
            data: {
                _token: csrf_token,
                values: formValues
            },
            url: "/usuarios/registrar",
            method: "post",
            success: (response) => {
                response = JSON.parse(response);
                if(response['status']==1){
                    $('#divMenu').append('<div class="alert alert-success alert-dismissible fade show" role="alert">Usuario registrado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    listar();
                }else{
                    $('#divMenu').append('<div class="alert alert-warning alert-dismissible fade show" role="alert">Todos los campos deben ser llenados<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
            }
        });
        
    });

    $("#editarUsuario").on("submit", function(event) {
        event.preventDefault();

        var csrf_token = $('#editarUsuario [name="_token"]').val();
        var formValues = $(this).serializeJSON();

        $.ajax({
            data: {
                _token: csrf_token,
                values: formValues
            },
            url: "/usuarios/editar",
            method: "post",
            success: (response) => {
                response = JSON.parse(response);
                if(response['status']==1){
                    $('#divMenu').append('<div class="alert alert-success alert-dismissible fade show" role="alert">Usuario actualizado<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    listar();
                }else{
                    $('#divMenu').append('<div class="alert alert-warning alert-dismissible fade show" role="alert">Todos los campos deben ser llenados<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
            }
        });
    });

    listar();
});