<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

$admins = R::getCol('SELECT user_name FROM viplist WHERE role=2');

if ($message === '/start') {
    $share_button = R::getRow("SELECT message from messages WHERE text='share_button'");
    $rate_button = R::getRow("SELECT message from messages WHERE text='rate_button'");
    $inline_button1 = ["text" => "{$rate_button['message']} 💋", "url" => "telegram.me/storebot?start=phphelperbot"];
    $inline_button2 = ["text" => "Share", "switch_inline_query" => "{$share_button['message']}"];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    $answer = R::getRow("SELECT * from messages WHERE text='start'");
    sendMessage($chat_id, $answer['message'], $msgid, $replyMarkup);
    $sql = R::getAll("SELECT user_id  FROM users WHERE user_id='{$user_id_group}';");
    if (!$sql) {
        $vote = R::dispense('users');
        $vote->username = $username2;
        $vote->user_id = $user_id_group;
        $vote->from_group = $chat_username;
        $vote->first_name = $first_name2;
        $vote->date_add = date('Y-m-d H:i:s');
        $id = R::store($vote);
        $week = R::getRow("SELECT count(user_id)  as cnt from users WHERE date_add >= DATE_SUB(CURRENT_DATE,INTERVAL 6 DAY);");
        $today = R::getRow("SELECT count(user_id)  as cnt from users WHERE date_add >= DATE_SUB(CURRENT_DATE,INTERVAL 0 DAY)");
        $load = R::getRow("SELECT count(message)  as cnt from logs WHERE date_add >= DATE_SUB(CURRENT_DATE,INTERVAL 0 DAY);");
        $users = R::getRow("SELECT count(user_id) as cnt from users");
        $tits = R::getRow("SELECT count(file_id) as cnt from tits");
        $butts = R::getRow("SELECT count(file_id) as cnt from butts");
        $gifs = R::getRow("SELECT count(file_id) as cnt from gifs");
        $banlist = R::getRow("SELECT count(user_name) as cnt from banlist");
        $viplist = R::getRow("SELECT count(user_id) as cnt from viplist");
        $top2 = R::getRow("SELECT vote_for, count(vote_for) as cnt FROM titsup GROUP BY vote_for ORDER BY count(vote_for) desc LIMIT 1");
        $top = R::getRow("SELECT vote_for, count(vote_for) as cnt FROM buttsup GROUP BY vote_for ORDER BY count(vote_for) desc LIMIT 1");
        $weekload = R::getRow("SELECT count(message)  as cnt from logs WHERE date_add >= DATE_SUB(CURRENT_DATE,INTERVAL 6 DAY);");
        $rateing = json_decode(file_get_contents('https://storebot.me/api/bots/phphelperbot'), true);
        sendMessage(276712063, "Новый пользователь <b>{$first_name}</b> @{$username2} \n ID: <b>{$user_id_group}</b> 
 Нагрузка за день / неделю: <b>{$load['cnt']}</b> / <b>{$weekload['cnt']}</b>
\n За сегодня: <b>{$today['cnt']}</b>, За неделю: <b>{$week['cnt']}</b>, Всего: <b>{$users['cnt']}</b>
Рейтинг: <b>{$rateing['rating']}</b> Отзывы: <b>{$rateing['reviews_n']}</b> Комментарии: <b>{$rateing['comments_n']}</b> \n
<b>Database</b>:
<code>tits</code> - [<b>{$tits['cnt']}</b>]
<code>butts</code>- [<b>{$butts['cnt']}</b>]
<code>gifs</code> - [<b>{$gifs['cnt']}</b>]
<b>Забаненные</b>:
<code>total</code> - [<b>{$banlist['cnt']}</b>]
<b>Випы</b>:
<code>total</code>: - [<b>{$viplist['cnt']}</b>]
<b>Топ фото:</b>
Butts:<code>ID:</code> - <b>{$top['vote_for']}</b> Голосов <b>{$top['cnt']}</b>
Tits:<code>ID:</code> - <b>{$top2['vote_for']}</b> Голосов <b>{$top2['cnt']}</b>
", "", "");
    }
}
if ($message === '/butts' || $message === '/butts@phphelperbot') {
    $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");

    $butts = R::getAll("SELECT * FROM butts");
    $rand = array_rand($butts);
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for={$rand};");
    $inline_button2 = ["text" => "{$rate_button['message']} ⭐️", "url" => "{$rate_button['action']}"];
    $inline_button1 = ["text" => "❤️ {$count[0]['cnt']}", "callback_data" => "/buttsup"];
    $inline_keyboard = [[$inline_button1], [$inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $butts[$rand]["file_id"], $msgid, "{$butts[$rand]["id"]}", $replyMarkup);
}
if ($message === '/tits' || $message === '/tits@phphelperbot') {
    $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");
    $tits = R::getAll("SELECT * FROM tits");
    $rand = array_rand($tits);
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for={$rand};");
    $inline_button2 = ["text" => "{$rate_button['message']} ⭐️", "url" => "{$rate_button['action']}"];
    $inline_button1 = ["text" => "❤️ {$count[0]['cnt']}", "callback_data" => "/buttsup"];
    $inline_keyboard = [[$inline_button1], [$inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $tits[$rand]["file_id"], $msgid, "{$tits[$rand]["id"]}", $replyMarkup);
}
if ($message === '/gif' || $message === '/gif@phphelperbot') {
    $caption = R::getRow("SELECT * from messages WHERE text='gif_caption'");
    $share_button = R::getRow("SELECT * from messages WHERE text='share_button'");
    $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");
    $gifs = R::getAll("SELECT * FROM gifs");
    $rand = array_rand($gifs);
    $inline_button1 = ["text" => "{$rate_button['message']} ⭐️", "url" => "{$rate_button['action']}"];
    $inline_button2 = ["text" => "{$share_button['message']}", "switch_inline_query" => "{$share_button['action']}"];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendDocument($chat_id, $gifs[$rand]["file_id"], $msgid, "{$gifs[$rand]["id"]} {$caption['message']}", $replyMarkup);
}
if ($message === '/bash' || $message === '/bash@phphelperbot') {
    $bash_text = file_get_contents("http://bash.im/best");
    $pattern = '|<div class="text">(.+?)<\/div>|is';
    $bash_text = str_replace("<br>", "", $bash_text);
    preg_match_all($pattern, $bash_text, $out);
    $ranom = rand(1, 45);
    sendMessage($chat_id, iconv('windows-1251', 'utf-8', $out[1][$ranom]), $msgid, "");
    unset($out);
}
if ($message === '/sram' || $message === '/sram@phphelperbot') {
    $share_button = R::getRow("SELECT * from messages WHERE text='share_button'");
    $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");
    $inline_button1 = ["text" => "{$rate_button['message']} ⭐️", "url" => "{$rate_button['action']}"];
    $inline_button2 = ["text" => "{$share_button['message']}", "switch_inline_query" => "{$share_button['action']}"];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    $rand = rand(1, 300);
    $sram_pars = file_get_contents('http://sramu.net/index_'.$rand.'.html');
    preg_match_all('/><p>(.*?)<\/p><\/td><\/tr><tr>/', $sram_pars, $sram);
    $i = rand(0, count($sram[1]) - 1);
    $sram = iconv('windows-1251', 'utf-8', $sram[1][$i]);
    $text = $sram;
    sendMessage($chat_id, $text."\n Page № http://sramu.net/index_{$rand}.html ", $msgid, $replyMarkup);
}
if ($message === '/user_profile' || $message === '/user_profile@phphelperbot') {
    $start = microtime(true);
    $user = R::getRow("SELECT count(message)  as cnt FROM logs WHERE   author_id = ? ", [$user_id_group]);
    $user2 = R::getRow('SELECT username,id,user_id,date_add,first_name FROM users WHERE user_id = ?', [$user_id_group]);
    $butts = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/butts', '/butts@phphelperbot') AND author_id = ?", [$user_id_group]);
    $tits = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/tits', '/tits@phphelperbot') AND author_id = ?", [$user_id_group]);
    $gif = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/gif', '/gif@phphelperbot') AND author_id = ?", [$user_id_group]);
    $bash = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/bash', '/bash@phphelperbot') AND author_id = ?", [$user_id_group]);
    $sram = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/sram', '/sram@phphelperbot') AND author_id = ?", [$user_id_group]);

    $inline_button1 = ["text" => "В главное меню", "callback_data" => '/without_phone'];
    $inline_button2 = ["text" => "Редактировать профиль", "callback_data" => '/edit_profile'];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendMessage($chat_id, "
Your personal data: \n
<b>ID</b>: [{$user2["id"]}] / [{$user2["user_id"]}] \n <code>unique id in system / telegram</code>
<b>Register</b>: [{$user2["date_add"]}]
<b>username</b> : [@{$user2["username"]}]
<b>nickname</b> : [{$user2["first_name"]}]
<b>total requests</b>: [{$user['cnt']}]
<b>butts</b>: [{$butts['cnt']}]
<b>tits</b>: [{$tits['cnt']}]
<b>gif</b>: [{$gif['cnt']}]
<b>bash</b>: [{$bash['cnt']}]
<b>sram</b>: [{$sram['cnt']}]
Время выполнения скрипта: <b>".(microtime(true) - $start)."</b> сек", $replyMarkup);
}
if ($message === '/video' || $message === '/video@phphelperbot') {
    $share_button = R::getRow("SELECT * from messages WHERE text='share_button'");
    $rate_button = R::getRow("SELECT * from messages WHERE text='rate_button'");
    $video = R::getAll("SELECT * FROM video");
    $rand = array_rand($video);
    $inline_button1 = ["text" => "{$rate_button['message']} ⭐️", "url" => "{$rate_button['action']}"];
    $inline_button2 = ["text" => "{$share_button['message']}", "switch_inline_query" => "{$share_button['action']}"];
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = ["inline_keyboard" => $inline_keyboard];
    $replyMarkup = json_encode($keyboard);
    sendVideo($chat_id, $video[$rand]["file_id"], $msgid, "{$video["id"]} Add more video later if you rate us 5 stars \n Video number {$video[$rand]["caption"]}/7 total", $replyMarkup);
}
if ($message === '/reviews' || $message === '/reviews@phphelperbot') {
    if (in_array($username2, $admins)) {
        $comments = json_decode(file_get_contents('https://storebot.me/api/bots/reviews?id=phphelperbot&limit=5'), true);
        foreach ($comments as $comment) {
            $inline_button1 = ["text" => "Написать", "switch_inline_query" => "sendMessage {$comment['userId']}"];
            $inline_button2 = ["text" => "Забанить", "switch_inline_query" => "banUser {$comment['userId']}"];
            $inline_keyboard = [[$inline_button1, $inline_button2]];
            $keyboard = ["inline_keyboard" => $inline_keyboard];
            $replyMarkup = json_encode($keyboard);
            sendMessage($chat_id, "Юзернейм: {$comment["user"]["firstName"]} [<b>{$comment["userId"]}</b>] \nОценка: {$comment["stars"]}\nКомментарий: {$comment['review']} \n ======================= \n", $msgid, $replyMarkup);
        }
    } else {
        sendMessage($chat_id, "нет прав", null, null);
    }

}

