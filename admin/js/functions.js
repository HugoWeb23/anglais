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

});