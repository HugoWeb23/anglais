$(document).ready(function() {

$('.deletequestion').click(function() {
let id_theme = $(this).data('id');
$('#confirmDeleteQuestion').data('id', id_theme);
});

$('#confirmDeleteQuestion').click(function() {
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

});