$(document).ready(function() {

$('.deletetheme').click(function() {
let id_theme = $(this).data('id');
$('#confirmDeleteTheme').data('id', id_theme);
});

$('#confirmDeleteTheme').click(function() {
let theme = $(this);
let id_theme = theme.data('id');
let deleteAllQuestions = false;
if($('#deleteallquestions').is(':checked')) {
deleteAllQuestions = true;
}
$.ajax({
    url:"ajax/delete_theme.php",
    method:"post",
    dataType:"json",
    data: {action:'delete_theme', id_theme:id_theme, deleteAllQuestions:deleteAllQuestions},
    error:function() {
    alert("Délai d'attente dépassé, merci d'actualiser la page");
    },
    success:function(data) {
    if(data.type == 'success') {
    $('table').find('tr').each(function() {
    if($(this).find('td').eq(0).text() == id_theme) {
    $(this).remove();
    }
    })
    $.notify('Thème supprimé', 'success');
    $('#supprimerTheme').modal('hide')
    }
    },
    timeout: 10000
    })
});

$('#searchQuestion').keyup(function() {
let search = $(this).val();
if(search.length >= 2) {
    $.ajax({
        url:"ajax/searchquestion.php",
        method:"post",
        data: {action:'search', search:search},
        error:function() {
        alert("Délai d'attente dépassé, merci d'actualiser la page");
        },
        success:function(data) {
        $('.resultat').html(data);
        },
        timeout: 10000
        })
    }
});

$(document).on('click', '.deletequestion', function() {
    let id_question = $(this).data('id');
    $('#confirmDeleteQuestion').data('id', id_question);
    });

    $('#confirmDeleteQuestion').click(function() {
        let question = $(this);
        let id_question = question.data('id');
        $.ajax({
            url:"ajax/delete_question.php",
            method:"post",
            dataType:"json",
            data: {action:'delete_question', id_question:id_question},
            error:function() {
            alert("Délai d'attente dépassé, merci d'actualiser la page");
            },
            success:function(data) {
            if(data.type == 'success') {
            $('table').find('tr').each(function() {
            if($(this).find('td').eq(0).text() == id_question) {
            $(this).remove();
            }
            })
            $.notify('Question supprimée', 'success');
            $('#supprimerQuestion').modal('hide')
            }
            },
            timeout: 10000
            })
        });

        var eventquestion = null;
        $(document).on('click', '.editquestion', function() {
            let edit = $(this);
            eventquestion = edit;
            let id_question = edit.data('id_question');
            let id_theme = edit.data('id_theme');
            $('#confirmUpdateQuestion').data('id', id_question);
            let intitule = edit.closest('tr').find('td').eq(1).text();
            let question = edit.closest('tr').find('td').eq(2).text();
            let reponse = edit.closest('tr').find('td').eq(3).text();
            $('#intitule').val(intitule);
            $('#question').val(question);
            $('#reponse').val(reponse);
            $('option').removeAttr('selected');
            $('option[data-id_theme="'+id_theme+'"]').attr('selected', 'selected');
        })

        $('#confirmUpdateQuestion').click(function() {
        let update = $(this);
        let id_question = update.data('id');
        let intitule = $('#intitule').val();
        let question = $('#question').val();
        let reponse = $('#reponse').val();
        let theme = $('select option:selected').data('id_theme');
            $.ajax({
                url:"ajax/update_question.php",
                method:"post",
                dataType:"json",
                data: {action:'update_question', id_question:id_question, intitule:intitule, question:question, reponse:reponse, theme:theme},
                error:function() {
                alert("Délai d'attente dépassé, merci d'actualiser la page");
                },
                success:function(data) {
                if(data.type == 'success') {
                eventquestion.closest('tr').find('td').eq(1).text(intitule);
                eventquestion.closest('tr').find('td').eq(2).text(question);
                eventquestion.closest('tr').find('td').eq(3).text(reponse);
                $.notify('Question modifiée', 'success');
                $('#editQuestion').modal('hide');
                }
                },
                timeout: 10000
                })
        });

        $('#adminCreate').click(function() {
        let first_name = $('#first_name').val();
        let last_name = $('#last_name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        var regex = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$');
        if(first_name.length < 2 || last_name.length < 2 || email.length < 2) {
            $.notify('Certains champs sont vides ou incomplets', 'error');
        } else if(regex.test(password) == false) {
            $.notify('Le mot de passe doit contenir 8 caractères dont 1 majuscule, 1 minuscule et un caractère spécial', 'error');
        } else {
            $.ajax({
                url:"ajax/add_admin.php",
                method:"post",
                dataType:"json",
                data: {action:'new_admin', first_name:first_name, last_name:last_name, email:email, password:password},
                error:function() {
                $.notify('Une erreur est survenue', 'error');
                },
                success:function(data) {
                if(data.type == 'error') {
                $.notify(data.message, 'error');
                } else if(data.type == 'success') {
                $.notify('Le compte a été créé', 'success');
                $('#createAdmin').modal('hide');
                $('.table').append('<tr><td>'+data.id_admin+'</td><td>'+first_name+'</td><td>'+last_name+'</td><td>'+email+'</td><td>0</td><td><button type="button" class="btn btn-primary editAdmin" data-toggle="modal" data-id="'+data.id_admin+'" data-target="#editAdmin">Modifier</button> - <button type="button" class="btn btn-danger deleteAdmin" data-toggle="modal" data-target="#deleteAdmin" data-id="'+data.id_admin+'">Supprimer</button></td></tr>');
                }
                },
                timeout: 10000
                })
        }
        });

        let clickEvent = null;
        $('.table').on('click', '.deleteAdmin', function() {
        let click = $(this);
        clickEvent = click;
        let id_admin = click.data('id');
        $('#confirmDeleteAdmin').data('id', id_admin);
        });

        $('#confirmDeleteAdmin').click(function() {
        let click = $(this);
        let id_admin = click.data('id');
        if(Number.isInteger(id_admin)) {
            $.ajax({
                url:"ajax/delete_admin.php",
                method:"post",
                dataType:"json",
                data: {action:'delete_admin', id_admin:id_admin},
                error:function() {
                $.notify('Une erreur est survenue', 'error');
                },
                success:function(data) {
                if(data.type == 'error') {
                $.notify(data.message, 'error');
                } else if(data.type == 'success') {
                $.notify(data.message, 'success');
                $('#deleteAdmin').modal('hide');
                clickEvent.closest('tr').remove();
                }
                },
                timeout: 10000
                })
        } else {
        $.notify('L\'ID du compte administrateur n\'est pas valide', 'error');
        }
        });

    let edit = null;
    $('.table').on('click', '.editAdmin', function() {
    let click = $(this);
    edit = click;
    let id_admin = click.data('id');
    let first_name = click.closest('tr').find('td').eq(1).text();
    let last_name = click.closest('tr').find('td').eq(2).text();
    let email = click.closest('tr').find('td').eq(3).text();
    $('#editAdmin').find('#first_name').val(first_name);
    $('#editAdmin').find('#last_name').val(last_name);
    $('#editAdmin').find('#email').val(email);
    $('#confirmUpdateAdmin').data('id', id_admin);
    })

   

   $('#confirmUpdateAdmin').click(function() {
    let id_admin = $(this).data('id');
    let first_name = $('#editAdmin').find('#first_name').val();
    let last_name = $('#editAdmin').find('#last_name').val();
    let email = $('#editAdmin').find('#email').val();
    let password = $('#editAdmin').find('#password').val();
    let regex = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$');
    if(first_name.length < 2 || last_name.length < 2 || email.length < 2) {
        $.notify('Certains champs sont vides ou incomplets', 'error');
    }  else if(Number.isInteger(id_admin) == false) {
        $.notify('L\'ID du compte administrateur n\'est pas valide', 'error');
    } else {
        let checkpassword = true;
        if(password.length > 0 && regex.test(password) == false) {
        $.notify('Le mot de passe doit contenir 8 caractères dont 1 majuscule, 1 minuscule et un caractère spécial', 'error');
        checkpassword = false;
        }
        if(checkpassword == true) {
            $.ajax({
                url:"ajax/update_admin.php",
                method:"post",
                dataType:"json",
                data: {action:'update_admin', id_admin:id_admin, first_name:first_name, last_name:last_name, email:email, password:password},
                error:function() {
                $.notify('Une erreur est survenue', 'error');
                },
                success:function(data) {
                if(data.type == 'error') {
                $.notify(data.message, 'error');
                } else if(data.type == 'success') {
                $.notify(data.message, 'success');
                $('#editAdmin').modal('hide');
                edit.closest('tr').find('td').eq(1).text(first_name);
                edit.closest('tr').find('td').eq(2).text(last_name);
                edit.closest('tr').find('td').eq(3).text(email);
                }
                },
                timeout: 10000
                })
        }
    }
    });

    let deletepart = null;
    $('.deletepart').click(function() {
    let click = $(this);
    deletepart = click;
    let id_partie = click.data('id');
    $('#confirmDeletePart').data('id', id_partie);
    });

    $('#confirmDeletePart').click(function() {
    let click = $(this);
    let id_partie = click.data('id');
    $.ajax({
        url:"ajax/delete_part.php",
        method:"post",
        dataType:"json",
        data: {action:'delete_part', id_partie:id_partie},
        error:function() {
        $.notify('Une erreur est survenue', 'error');
        },
        success:function(data) {
        if(data.type == 'error') {
        $.notify(data.message, 'error');
        } else if(data.type == 'success') {
        $('#supprimerTheme').modal('hide');
        deletepart.closest('tr').remove();
        $.notify('Partie supprimée', 'success');
        }
        },
        timeout: 10000
        })
    });

    $('#connexion').submit(function() {
        let email = $('#email').val();
        let password = $('#password').val();
        if(email.length == 0 || password.length == 0) {
        $.notify('Certains champs sont vides', 'error');
        } else {
            $.ajax({
                url:"ajax/connexion.php",
                method:"post",
                dataType:"json",
                data:{action:'connexion', email:email, password:password},
                error:function() {
                alert("Délai d'attente dépassé, merci d'actualiser la page");
                },
                success:function(data) {
               if(data.type == 'error') {
                $.notify(data.message, 'error');
               } else if(data.type == 'success') {
                window.location = 'index.php';
               }
                },
                timeout: 10000
                })
        }
        return false;
        });

});