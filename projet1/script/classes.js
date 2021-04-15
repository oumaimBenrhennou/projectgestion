$(document).ready(function () {

    $.ajax({
        url: 'controller/gestionfiliere.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            load(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $.ajax({
        url: 'controller/gestionclasses.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#btn').click(function () {
        var code = $("#code");
        var filiere = $("#filiere");
        if ($('#btn').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/gestionclasses.php',
                data: {op: 'add', filiere: filiere.val(), code: code.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    code.val('');
                    filiere.val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }

    });
    $(document).on('click', '.supprimer', function () {
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: 'controller/gestionclasses.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });
    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
        var id = $(this).closest('tr').find('th').text();
        var code = $(this).closest('tr').find('td').eq(0).text();
        btn.text('Modifier');
        $("#code").val(code);
        $("#id").val(id);
        btn.click(function () {
            if ($('#btn').text() === 'Modifier') {
                $.ajax({
                    url: 'controller/gestionclasses.php',
                    data: {op: 'update', id: $("#id").val(), code: $("#code").val(), filiere: $("#filiere").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        $("#code").val('');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });

    function load(data) {
        var options = "";
        data.forEach(e => {
            options += "<option value =" + e.id + ">" + e.code + "</option>";
        });
        $("#filiere").html(options);
    }
});


function remplir(data) {
    var contenu = $('#table-content');
    var ligne = "";
    for (i = 0; i < data.length; i++) {
        ligne += '<tr><th scope="row">' + data[i].id + '</th>';
        ligne += '<td>' + data[i].code + '</td>';
        ligne += '<td value="' + data[i].IdFiliere + '">' + data[i].codef + '</td>';
        ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
        ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
    }
    contenu.html(ligne);
}