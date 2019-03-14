$( document ).ready(function() {
    console.log('test');
    $("#send").click(
        function(){
            sendAjaxForm();
            return false;
        }
    );
});

function sendAjaxForm() {
    $.ajax({
        url:     '/check-answer',
        type:     "POST", //метод отправки
        dataType: "json", //формат данных
        data: $("#quiz").serialize(),  // Сеарилизуем объект
        success: function(response) {
            let answerId = '#answer_' + response.answer_id;
            if (response.status == 'success') {
                $('#answer_'+response.answer_id).css("background-color", "#B6F4D4");
            } else {
                $('#answer_'+response.answer_id).css("background-color", "#F4B6CA");
                $('#answer_'+response.correct_answer).css("background-color", "#B6F4D4");
            }
        },
    });
}
