<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

if ($message === 'Бот ливни') {
    $admins = R::getCol('SELECT user_name FROM viplist WHERE role=2');
    if (in_array($username2, $admins)) {
        $inline_button1 = ["text" => "Да", "callback_data" => "/Botleave_YES"];
        $inline_button2 = ["text" => "Нет", "callback_data" => "/Botleave_NO"];
        $inline_keyboard = [[$inline_button1, $inline_button2]];
        $keyboard = ["inline_keyboard" => $inline_keyboard];
        $replyMarkup = json_encode($keyboard);
        sendMessage($chat_id, "Ты уверен?", $msgid,$replyMarkup);
    }
}

if ($data === '/Botleave_YES') {
    $admins = R::getCol('SELECT user_name FROM viplist WHERE role=2');
    if (in_array($user_name_group_call2, $admins)) {
        answerCallbackQuery($callback_id, "Окей как скажешь.. ((", "true");
        LeaveChat($chat_id);
    }else{
        answerCallbackQuery($callback_id, "У тебя нет на это необходимых прав", "true");

    }
}
if ($data === '/Botleave_NO') {
    answerCallbackQuery($callback_id, "Мне можно пожить с вами тут, ураа", "true");
}
