$(document).ready(function () {

    $('#btnGuardar').on('click', function (e) {
        e.preventDefault();
        if ($('#hdnId').val() == '') {
            insertar();
        } else {
            actualizar();
        }
    });

    $('.btnEditar').on('click', function (e) {
        e.preventDefault();
        var btnClickeado = $(this);
        var id = btnClickeado.data('id');

        var parametros = {
            id: id,
            task: 'get'
        };
        $.ajax({
            cache: false,
            type: 'GET',
            data: parametros,
            url: 'PersonaAjax.php',
            success: function (data) {
                var objPersona = JSON.parse(data);
                $('#hdnId').val(objPersona.id);
                $('#txtNombres').val(objPersona.nombres);
                $('#txtApellidos').val(objPersona.apellidos);
                $('#lstCiudad').val(objPersona.ciudad);
                $('#txtEdad').val(objPersona.edad);
                $('#txtFechaNacimiento').val(objPersona.fechaNacimiento);
                $('#modalFormulario').modal('show');
            },
            error: function (msg) {
                console.log(msg);
            }
        });

    });
    $('.btnEliminar').on('click', function (e) {
        e.preventDefault();
        var btnClickeado = $(this);
        var id = btnClickeado.data('id');

        var parametros = {
            id: id,
            task: 'eliminar'
        };
        $.ajax({
            cache: false,
            type: 'GET',
            data: parametros,
            url: 'PersonaAjax.php',
            success: function (data) {
                $('#tr' + data).remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });

    });

});

function insertar() {
    var parametros = {
        nombres: $('#txtNombres').val(),
        apellidos: $('#txtApellidos').val(),
        edad: $('#txtEdad').val(),
        fechaNacimiento: $('#txtFechaNacimiento').val(),
        ciudad: $('#lstCiudad').val(),
        task: 'insertar'
    };

    $.ajax({
        cache: false,
        type: 'GET',
        data: parametros,
        url: 'PersonaAjax.php',
        success: function (data) {
            var objPersona = JSON.parse(data);
            var html = '<tr id="' + objPersona.id + '">';
            html += '<td>' + objPersona.id + '</td>';
            html += '<td>' + objPersona.nombres + '</td>';
            html += '<td>' + objPersona.apellidos + '</td>';
            html += '<td>' + objPersona.edad + '</td>';
            html += '<td>' + objPersona.fechaNacimiento + '</td>'
            html += '<td>' + objPersona.ciudad + '</td>';
            html += '<td><a class="btn btn-primary btnEditar" data-id="' + objPersona.id + '" href="javascript:void(0)">Editar</a></td>';
            html += '<td><a class="btn btn-info" href="inscribir.php?id=' + objPersona.id + '">Inscribir</a></td>';
            html += '<td><a class="btn btn-danger btnEliminar" data-id="' + objPersona.id + '" href="javascript:void(0)"> Eliminar </a></td>';
            html += '</tr>';
            $('#tblPersona').find('tbody').append(html);
            $('#modalFormulario').modal('hide');
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}
function actualizar() {
    var parametros = {
        id: $('#hdnId').val(),
        nombres: $('#txtNombres').val(),
        apellidos: $('#txtApellidos').val(),
        edad: $('#txtEdad').val(),
        fechaNacimiento: $('#txtFechaNacimiento').val(),
        ciudad: $('#lstCiudad').val(),
        task: 'actualizar'
    };

    $.ajax({
        cache: false,
        type: 'GET',
        data: parametros,
        url: 'PersonaAjax.php',
        success: function (data) {
            var objPersona = JSON.parse(data);
            var trActualizar = $('#tr' + objPersona.id);
            var html = '';
            html += '<td>' + objPersona.id + '</td>'
            html += '<td>' + objPersona.nombres + '</td>'
            html += '<td>' + objPersona.apellidos + '</td>'
            html += '<td>' + objPersona.edad + '</td>'
            html += '<td>' + objPersona.fechaNacimiento + '</td>'
            html += '<td>' + objPersona.ciudad + '</td>'
            html += '<td><a class="btn btn-primary btnEditar" data-id="' + objPersona.id + '" href="javascript:void(0)">Editar</a></td>';
            html += '<td><a class="btn btn-info" href="inscribir.php?id=' + objPersona.id + '">Inscribir</a></td>';
            html += '<td><a class="btn btn-danger btnEliminar" data-id="' + objPersona.id + '" href="javascript:void(0)"> Eliminar </a></td>';
            trActualizar.html(html);
            $('#modalFormulario').modal('hide');
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}