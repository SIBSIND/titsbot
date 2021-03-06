<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

if (preg_match_all("/(?<![\w\d])(butts [0-9]{1,9})(?![\w\d])/uim", $message_preg, $mathes)) {
    $message = explode(" ", $message);
    $butts = R::getRow("SELECT * from butts WHERE id = '{$message[1]}'");
    sendChatAction($chat_id, "upload_photo");
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for={$message[1]};");
    $inline_button1 = ["text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot"];
    $inline_button2 = ["text" => "❤️ {$count[0]['cnt']}", "callback_data" => '/buttsup'];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $butts["file_id"], $msgid, "{$message[1]}", $replyMarkup);
}

if (preg_match_all("/(?<![\w\d])(tits [0-9]{1,9})(?![\w\d])/uim", $message_preg, $mathes)) {
    $message = explode(" ", $message);
    $butts = R::getRow("SELECT * from tits WHERE id = '{$message[1]}'");
    sendChatAction($chat_id, "upload_photo");
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for={$message[1]};");
    $inline_button1 = ["text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot"];
    $inline_button2 = ["text" => "❤️ {$count[0]['cnt']}", "callback_data" => '/titsup'];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $butts["file_id"], $msgid, "{$message[1]}", $replyMarkup);
}

if (preg_match_all("/(?<![\w\d])(gif [0-9]{1,9})(?![\w\d])/uim", $message_preg, $mathes)) {
    $message = explode(" ", $message);
    $butts = R::getRow("SELECT * from gifs WHERE id = '{$message[1]}'");
    sendChatAction($chat_id, "upload_photo");
    sendDocument($chat_id, $butts["file_id"], $msgid, "Caption: {$butts["caption"]} URL: {$butts["url"]}", "");
}

if (preg_match_all("/(?<![\w\d])(@phphelperbot sendMessage [0-9]{1,9})(?![\w\d])/uim", $message_preg, $mathes)) {
    $admins = R::getCol('SELECT user_name FROM viplist WHERE role=2');
    if (in_array($username2, $admins)) {
        $message = explode(" ", $message);

        sendMessage($chat_id, "Отправляем сообщение пользователю: {$message[2]} Содержание:$message[3] $message[4] $message[5] $message[6] $message[7] $message[8] $message[9] $message[10] $message[11] $message[12] $message[13] $message[14] $message[15] $message[16] $message[17] $message[18] $message[19] $message[20] $message[21] $message[22] $message[23] $message[24]", $msgid, null);
        sendChatAction($message[2], "typing");
        sendMessage($message[2], "$message[3] $message[4] $message[5] $message[6] $message[7] $message[8] $message[9] $message[10] $message[11] $message[12] $message[13] $message[14] $message[15] $message[16] $message[17] $message[18] $message[19] $message[20] $message[21] $message[22] $message[23] $message[24]", null, null);
    }
}