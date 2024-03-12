<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Отправка письма</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<form id="emailForm">
  <label for="recipient">Получатель:</label>
  <input type="email" id="recipient" name="recipient" required><br><br>
  
  <label for="subject">Тема:</label>
  <input type="text" id="subject" name="subject" required><br><br>
  
  <label for="message">Сообщение:</label><br>
  <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
  
  <input type="submit" value="Отправить">
</form>

<script>
$(document).ready(function(){
  $('#emailForm').submit(function(e){
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'send_email.php', // Укажите URL вашего серверного скрипта для обработки отправки письма
      data: formData,
      success: function(response){
        alert('Письмо отправлено!');
      },
      error: function(xhr, status, error){
        console.error(xhr.responseText);
        alert('Ошибка отправки письма. Пожалуйста, попробуйте позже.');
      }
    });
  });
});
</script>

</body>
</html>
