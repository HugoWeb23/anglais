$(document).ready(function() {

function valider_reponse(reponse, id_question, current_question) {
    $.ajax({
        url:"ajax/check_response.php",
        method:"post",
        data:{reponse:reponse, id_question: id_question},
        error:function() {
        alert("Délai d'attente dépassé, merci d'actualiser la page");
        },
        success:function(data) {
            $.ajax({
                url:"ajax/next_question.php",
                method:"post",
                dataType:"json",
                error:function() {
                alert("Délai d'attente dépassé, merci d'actualiser la page");
                },
                success:function(data) {
                if(data.check == true) {
                current_question++;
                $('#current_question').text(current_question);
                $('#intitule').text(data.intitule+' :');
                $('#text_question').text(data.question);
                $('#theme').text('Thème : '+data.theme);
                $('#reponse').val('');
                $('#reponse').focus();
                $('#valider_reponse').data('id_question', data.id_question);
                $('#valider_reponse').removeAttr('disabled');
                $('#valider_reponse').val('Valider la réponse');
                } else if(data.check == false) {
                window.location = 'resultats.php?id='+data.id_partie+'';
                }
                },
                timeout: 10000
                })
        },
        timeout: 10000
        })
}

$('#valider_reponse').click(function() {
let submit = $(this);
let reponse = $('#reponse').val();
let id_question = submit.data('id_question');
let current_question = $('#current_question').text();
if(document.getElementById('valider_reponse').hasAttribute('disabled') == false) {
submit.attr('disabled', 'disabled');
submit.val('Veuillez patienter ...');
valider_reponse(reponse, id_question, current_question);
}
})

$('#reponse').keypress(function() {
let reponse = $('#reponse').val();
let id_question = $('#valider_reponse').data('id_question');
let current_question = $('#current_question').text();
if(event.which == 13) {
if(document.getElementById('valider_reponse').hasAttribute('disabled') == false) {
valider_reponse(reponse, id_question, current_question);
$('#valider_reponse').attr('disabled', 'disabled');
$('#valider_reponse').val('Veuillez patienter ...');
}
}
})

$('#indice').click(function() {
let id_question = $('#valider_reponse').data('id_question');
    $.ajax({
        url:"ajax/indice.php",
        method:"post",
        dataType:"json",
        data:{id_question: id_question},
        error:function() {
        alert("Délai d'attente dépassé, merci d'actualiser la page");
        },
        success:function(data) {
        $('#reponse').val(data.reponse);
        },
        timeout: 10000
        })
});

$('#theme').change(function() {
let id_theme = $(this).val();
if(id_theme == 'auto') {
$('.themes-speciaux').css('display', 'block');
} else {
$('.themes-speciaux').css('display', 'none');
}
});

$('#lancerPartie').submit(function() {
let special_questions = $('#special_questions').val();
let theme = $('#theme').val();
let nb_questions = $('#nb_questions').val();
if(document.getElementById('start_button').hasAttribute('disabled') == false) {
if(theme == 0 || nb_questions == 0 || theme == undefined || nb_questions == undefined) {
$.notify('Certains champs sont vides', 'error');
} else if(theme == 'auto' && special_questions == 0 || special_questions == undefined) {
$.notify('Certains champs sont vides', 'error');
} else {
$('#start_button').attr('disabled', 'disabled');
$('#start_button').text('Veuillez patienter ...');
startPart(special_questions, theme, nb_questions);
}
}
return false;
});



$('#manual-selection').click(function() {
let themeA = $('#theme').val();
let themeB = $('#special_questions').val();
if(themeA == 'auto') {
if(themeB == 0 || themeB == undefined) {
$.notify('Tu dois sélectionner un sous-thème !', 'error');
} else {
    $('#select_questions').modal('show');
}
} else {
if(themeA == 0 || themeA == undefined) {
    $.notify('Tu dois sélectionner un thème !', 'error');
} else if(themeA == 'random') {
    $.notify('Non disponible pour les questions aléatoires', 'error');
} else {
    $.ajax({
        url:"ajax/select_questions.php",
        method:"post",
        dataType:"json",
        data:{action:'select_questions', id_theme:themeA, type:1},
        error:function() {
        alert("Délai d'attente dépassé, merci d'actualiser la page");
        },
        success:function(data) {
            let body = $('#select_questions').find('.modal-body');
            body.empty();
            $.each(data, function(i, obj) {
                body.append('<p><div class="custom-control custom-checkbox mr-sm-2"><input type="checkbox" class="custom-control-input question" id="'+obj.id+'" data-id="'+obj.id+'"> <label class="custom-control-label" for="'+obj.id+'">'+obj.question+'</div></p>');
               });
            if(data.length == 0) {
            body.append('Aucune question');
            }
            $('#select_questions').modal('show');
       
        },
        timeout: 10000
        })
    
}
}
});

$('#selectSpecificQuestions').click(function() {
let questions = new Array();
let special_questions = $('#special_questions').val();
let theme = $('#theme').val();
let nb_questions = 0;
$('.modal-body').find('input:checked').each(function() {
questions.push($(this).data('id'));
});
if(questions.length > 0) {
startPart(special_questions, theme, nb_questions, questions);
} else {
 $.notify('Tu dois au moins sélectionner une question', 'error');
}
});

function startPart(special_questions, theme, nb_questions, manual_questions = null) {
    $.ajax({
        url:"ajax/start_part.php",
        method:"post",
        dataType:"json",
        data:{action:'start_part', special_part:special_questions, theme:theme, nb_questions:nb_questions, manual_questions:manual_questions},
        error:function() {
        alert("Délai d'attente dépassé, merci d'actualiser la page");
        },
        success:function(data) {
       if(data.type == 'error') {
        $.notify(data.message, 'error');
        $('#start_button').removeAttr('disabled');
        $('#start_button').val('Lancer la partie');
       } else if(data.type == 'success') {
        window.location = 'partie.php';
       }
        },
        timeout: 10000
        })
}

$('#restart-part').click(function() {
let last_part = $(this).data('id');
let id_theme = $(this).data('id_theme');
if(id_theme == 'random' || Number.isInteger(last_part) && Number.isInteger(id_theme)) {
    $.ajax({
        url:"ajax/restart_part.php",
        method:"post",
        dataType:"json",
        data:{action:'restart_part', last_part:last_part, id_theme:id_theme},
        error:function() {
        alert("Délai d'attente dépassé, merci d'actualiser la page");
        },
        success:function(data) {
       if(data.type == 'error') {
        $.notify(data.message, 'error');
       } else if(data.type == 'success') {
        window.location = 'partie.php';
       }
        },
        timeout: 10000
        })
} else {
$.notify('ID de partie ou de thème invalide', 'error');
}
});

});