<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 08.01.17
 * Time: 18:09
 */

if ($message == '/start') {
    $inline_button1 = array("text" => "Rate us 💋", "url" => "telegram.me/storebot?start=phphelperbot");
    $inline_button2 = array("text" => "Share", "switch_inline_query" => "Best TitsBot");
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendMessage($chat_id, "Boobs and butts erotic pictures (no porn).
   <b>Note</b>: all models are <b>18</b> years of age or older.

/tits - Random Boobs picture or choice tits 2000
/butts - Random butts picture or choice butts 150
/gif - Best gifs or choice gif 140
/sram - vulgar stories
/bash - RuNet Stories

If you have any ideas or want to leave feedback, please do it @oneerror <b>creator</b>", $msgid, $replyMarkup);
    $sql = R::getAll("SELECT user_id  FROM users WHERE user_id='{$user_id_group}';");
    if ($sql) {
    } else {
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
        sendMessage(276712063, "Новый пользователь <b>{$first_name}</b> @{$username2} \n ID: <b>{$user_id_group}</b> 
 Нагрузка за день / неделю: <b>{$load['cnt']}</b> / <b>{$weekload['cnt']}</b>
\n За сегодня: <b>{$today['cnt']}</b>, За неделю: <b>{$week['cnt']}</b>, Всего: <b>{$users['cnt']}</b>
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
","","");
    }
}
if ($message == '/butts' || $message == '/butts@phphelperbot') {
    $rand = mt_rand(0, 1886);
    $butts = R::getAll("SELECT * FROM butts");
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for={$rand};");
    $inline_button2 = ["text"=>"Rate us ⭐️","url"=>"telegram.me/storebot?start=phphelperbot",];
    $inline_button1 = ["text"=>"❤️ {$count[0]['cnt']}","callback_data"=>"/buttsup",];
    $inline_keyboard = [[$inline_button1],[$inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $butts[$rand]["file_id"], $msgid, "{$butts[$rand]["id"]}", $replyMarkup);
}
if ($message == '/tits' || $message == '/tits@phphelperbot') {
    $count_rand = R::getAll("SELECT COUNT(file_id) as cnt  FROM tits");
    $rand = mt_rand(0, 2700);
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for={$rand};");
    $tits = R::getRow("SELECT * FROM tits WHERE id={$rand}");
    $inline_button2 = ["text"=>"Rate us ⭐️","url"=>"telegram.me/storebot?start=phphelperbot",];
    $inline_button1 = ["text"=>"❤️ {$count[0]['cnt']}","callback_data"=>"/titsup",];
    $inline_keyboard = [[$inline_button1],[$inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $tits["file_id"], $msgid, "{$tits["id"]}", $replyMarkup);
}
if ($message == '/gif' || $message == '/gif@phphelperbot') {
    $rand = mt_rand(0, 82);
    $butts = R::getAll("SELECT * FROM gifs");
    $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
    $inline_button2 = array("text" => "Share", "switch_inline_query" => "Лучший сиськобот ^^,");
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendDocument($chat_id, $butts[$rand]["file_id"], $msgid, "{$butts[$rand]["id"]}", $replyMarkup);
}
if ($message == '/bash' || $message == '/bash@phphelperbot') {
    $bash_text = file_get_contents("http://bash.im/best");
    $pattern = '|<div class="text">(.+?)<\/div>|is';
    $bash_text = str_replace("<br>", "", $bash_text);
    preg_match_all($pattern, $bash_text, $out);
    $ranom = rand(1, 45);
    sendMessage($chat_id, iconv('windows-1251', 'utf-8', $out[1][$ranom]), $msgid, "");
    unset($out);
}
if ($message == '/sram' || $message == '/sram@phphelperbot') {
    $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
    $inline_button2 = array("text" => "Share", "switch_inline_query" => "Лучший сиськобот ^^,");
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    $rand = rand(1, 300);
    $sram_pars = file_get_contents('http://sramu.net/index_' . $rand . '.html');
    preg_match_all('/><p>(.*?)<\/p><\/td><\/tr><tr>/', $sram_pars, $sram);
    $i = rand(0, count($sram[1]) - 1);
    $sram = iconv('windows-1251', 'utf-8', $sram[1][$i]);
    $text = $sram;
    sendMessage($chat_id, $text . "\n Page № http://sramu.net/index_{$rand}.html ", $msgid, $replyMarkup);
}
if ($message == '/user_profile' || $message == '/user_profile@phphelperbot'){
    $user = R::getRow("SELECT count(message)  as cnt FROM logs WHERE   author_id = ? ", [$user_id_group]);
    $user2 = R::getRow('SELECT username,id,user_id,date_add,first_name FROM users WHERE user_id = ?', [$user_id_group]);
    $butts = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/butts', '/butts@phphelperbot') AND author_id = ?", [$user_id_group]);
    $tits = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/tits', '/tits@phphelperbot') AND author_id = ?", [$user_id_group]);
    $gif = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/gif', '/gif@phphelperbot') AND author_id = ?", [$user_id_group]);
    $bash = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/bash', '/bash@phphelperbot') AND author_id = ?", [$user_id_group]);
    $sram = R::getRow("SELECT count(message) as cnt,author_id FROM logs WHERE message in ('/sram', '/sram@phphelperbot') AND author_id = ?", [$user_id_group]);

    $inline_button1 = array("text"=>"В главное меню","callback_data" =>'/without_phone');
    $inline_button2 = array("text"=>"Редактировать профиль","callback_data" =>'/edit_profile');
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendMessage($chat_id,"
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

",$replyMarkup);
}
if ($message == '/video' || $message == '/video@phphelperbot'){
    $rand = mt_rand(0, 2);
    $video = R::getRow("SELECT * FROM video WHERE id={$rand}");
    sendVideo($chat_id, $video["file_id"], $msgid, "{$tits["id"]}", $replyMarkup);
}
