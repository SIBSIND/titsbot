<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

//TODO add something better
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
