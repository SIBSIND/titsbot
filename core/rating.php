<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

//aya
if ($data === '/titsup') {
    $banned_message = R::getRow("SELECT * from messages WHERE text='banned_message'");
    $ban_users = R::getCol('SELECT user_name FROM banlist');
    if (in_array($user_name_group_call2, $ban_users)) {
        answerCallbackQuery($callback_id, "{$banned_message['message']} {$user_name_group_call2}", "{$banned_message['action']}");
    } else {
        $voted = explode(" ", $nice);
        $sql = "SELECT COUNT(vote_for) as cnt FROM titsup WHERE vote_for='{$voted[0]}' and user_id='{$chat_id_in2}';";
        $count = R::getAll($sql);
        if ($count[0]['cnt'] > 0) {
            $voted_twice = R::getRow("SELECT * from message WHERE text='voted_twice'");
            answerCallbackQuery($callback_id, "{$voted_twice['message']}", "{$voted_twice['action']}");
        } else {
            answerCallbackQuery($callback_id, "Ты проголосовал1 👍", "false");
            $vote = R::dispense('titsup');
            $vote->username = $user_name_group_call2;
            $vote->user_id = $chat_id_in2;
            $vote->in_group = $nice2;
            $vote->vote_for = $voted[0];
            $vote->date_add = date('Y-m-d H:i:s');
            $id = R::store($vote);
            $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");
            $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for='{$voted[0]}';");
            $inline_button1 = ['text' => "👍  {$count[0]['cnt']}", 'callback_data' => '/titsup'];
            $inline_button2 = ['text' => "{$rate_button['message']} ⭐️", 'url' => "{$rate_button['action']}"];
            $inline_keyboard = [[$inline_button1], [$inline_button2]];
            $keyboard = ['inline_keyboard' => $inline_keyboard];
            $replyMarkup = json_encode($keyboard);
            editMessageReplyMarkup($chat_id_in, $message_id, $replyMarkup);
        }
    }
}

if ($data === '/buttsup') {
    $ban_users = R::getCol('SELECT user_name FROM banlist');
    if (in_array($user_name_group_call2, $ban_users)) {
        $banned_message = R::getRow("SELECT * from messages WHERE text='banned_message'");
        answerCallbackQuery($callback_id, "{$banned_message['message']} {$user_name_group_call2}", "{$banned_message['action']}");
    } else {
        $voted = explode(" ", $nice);
        $sql = "SELECT COUNT(vote_for) as cnt FROM buttsup WHERE vote_for='{$voted[0]}' and user_id='{$chat_id_in2}';";
        $count = R::getAll($sql);
        if ($count[0]['cnt'] > 0) {
            $voted_twice = R::getRow("SELECT * from messages WHERE text='voted_twice'");
            answerCallbackQuery($callback_id, "{$voted_twice['message']}", "{$voted_twice['action']}");
        } else {
            $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");
            $vote_message = R::getRow("SELECT * from messages WHERE text='vote_message'");
            answerCallbackQuery($callback_id, "{$vote_message['message']}", "{$vote_message['action']}");
            $vote = R::dispense('buttsup');
            $vote->username = $user_name_group_call2;
            $vote->user_id = $chat_id_in2;
            $vote->in_group = $nice2;
            $vote->vote_for = $voted[0];
            $vote->date_add = date('Y-m-d H:i:s');
            $id = R::store($vote);
            $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for='{$voted[0]}';");
            $inline_button1 = ['text' => "👍  {$count[0]['cnt']}", 'callback_data' => '/buttsup'];
            $inline_button2 = ['text' => "{$rate_button['message']} ⭐️", 'url' => "{$rate_button['action']}"];
            $inline_keyboard = [[$inline_button1], [$inline_button2]];
            $keyboard = ['inline_keyboard' => $inline_keyboard];
            $replyMarkup = json_encode($keyboard);
            editMessageReplyMarkup($chat_id_in, $message_id, $replyMarkup);
        }
    }
}
