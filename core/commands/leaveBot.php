<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

if ($message === 'Бот ливни') {
    $admins = R::getCol('SELECT user_name FROM viplist WHERE role=2');
    if (in_array($username2, $admins)) {
        sendMessage($chat_id, "Как скажешь..", $msgid);
        LeaveChat($chat_id);
    }
}
