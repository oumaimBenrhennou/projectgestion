$(document).ready(function () {
    var date = $("#date");
    var etat = $("#etat");
    var employe = $("#employe");
    var __id;
    $.ajax({
        url: 'controller/GestionEmploye.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi un employe</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].cin + '">' + data[i].nom + ' ' + data[i].prenom + '</option>';
            }
            employe.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $.ajax({
        url: 'controller/gestionPointage.php',
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

        if ($('#btn').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/gestionPointage.php',
                data: {op: 'add', date: date.val(), etat: etat.val(), employe: employe.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    employe.val('Choisi un employe');
                    date.val('');
                    etat.val('Choisi une etat');
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
            url: 'controller/gestionPointage.php',
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
        __id = $(this).closest('tr').find('th').eq(0).text();
        var _date = $(this).closest('tr').find('td').eq(0).text().replace(" ","T");
        var _employe = $(this).closest('tr').find('td').eq(2).text();
        var _etat = $(this).closest('tr').find('td').eq(1).text();

        btn.text('Modifier');
        date.eq(0).val(_date);
        employe.val(_employe);
        etat.eq(0).val(_etat);
        $("#id").val(__id);

        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'controller/gestionPointage.php',
                    data: {op: 'update', date: date.val(), etat: etat.val(), employe: employe.val(), id: $("#id").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        employe.val('Choisi un employe');
                        date.val('');
                        etat.val('Choisi une etat');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });

    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].date + '</td>';
            ligne += '<td>' + data[i].etat + '</td>';
            ligne += '<td>' + data[i].employe + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }
});


