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

});