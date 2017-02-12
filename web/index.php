
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <script src="js/modernizr.js"></script> <!-- Modernizr -->
  
  <title>Send Message via Telegram</title>
</head>
<body>
  <form method=post class="cd-form floating-labels" action="send.php">
    <fieldset>
     <legend>Форма обратной связи...</legend>
     <div class="error-message">
      <p>Введите email адрес</p>
    </div>

    <div class="icon">
      <label class="cd-label" for="cd-name">Имя</label>
      <input class="user" type="text" name="cd-name" id="cd-name" required>
    </div> 


    <div>

      <p class="cd-select icon">
       <select class="budget" name="select-choice" id="select-choice">
        <option  hidden value="Тема не выбрана">Тема сообщения</option>
        <option value="Срочно">Срочно</option>
        <option value="❤️ Dota ❤️">Дота</option>
        <option value="Попиздеть">Попиздеть</option>
      </select>
    </p>
  </div> 

  <div class="icon">
    <label class="cd-label" for="cd-email">Email</label>
    <input class="email error" type="email" name="cd-email" id="cd-email" required>
  </div>
</fieldset>

<fieldset>
  <legend>Ваше сообщение</legend>
  <div>
    <h4>Отправить в</h4>

    <ul class="cd-form-list">
      <li>
        <input type="checkbox" id="telegram">
        <label for="cd-checkbox-1"><img src="https://cdn3.iconfinder.com/data/icons/social-media-chat-1/512/Telegram-16.png"></label>
      </li>

      <li>
        <input type="checkbox" id="vk">
        <label for="cd-checkbox-2"><img src="https://cdn4.iconfinder.com/data/icons/social-network-icons-color-2/1024/vk-16.png"></label>
      </li>

      <li>
        <input type="checkbox" id="skype">
        <label for="cd-checkbox-3"><img src="https://cdn0.iconfinder.com/data/icons/social-15/200/skype-16.png"></label>
      </li>
      <li>
        <input type="checkbox" id="phone">
        <label for="cd-checkbox-3"><img src="https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/phone-16.png"></label>
      </li>
    </ul>
  </div>
  <div class="icon">
    <label class="cd-label" for="cd-textarea">Текст сообщения</label>
    <textarea class="message" name="cd-textarea" id="cd-textarea" required></textarea>
  </div>

  <div>
    <?php 
    $botToken = "281890161:AAEmjZSV_5_-P9qwwfJCEMcjX66qPdTt6NM";
    $url = "https://api.telegram.org/bot".$botToken;
    ?>
    <form action ="<?php echo $url.'/sendPhoto' ?>" method=post enctype="multipart/form-data"
      <input type="text" hidden name="chat_id" value="276712063" />
      <input type="file" name="photo" />
    </form>
    <input type="submit" value="Отправить">
  </div>
</fieldset>
</form>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
