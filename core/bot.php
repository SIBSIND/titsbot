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
        sendMessage(276712063, "Новый пользователь {$first_name} {$first_name2} @{$username2}  | ID: {$user_id_group}","","");
    }
}


if ($message == '/butts' || $message == '/butts@phphelperbot') {
    $rand = mt_rand(0, 1886);
    $butts = R::getAll("SELECT * FROM butts");
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for={$rand};");
    $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
    $inline_button2 = array("text"=>"❤️ {$count[0]['cnt']}","callback_data" =>'/buttsup');
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $butts[$rand]["file_id"], $msgid, "{$butts[$rand]["id"]}", $replyMarkup);
}
if ($message == '/tits' || $message == '/tits@phphelperbot') {
    $count_rand = R::getAll("SELECT COUNT(file_id) as cnt  FROM tits");
    $rand = mt_rand(0, $count_rand[0]['cnt']);
    $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for={$rand};");
    $tits = R::getRow("SELECT * FROM tits WHERE id={$rand}");
    $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
    $inline_button2 = array("text"=>"❤️ {$count[0]['cnt']}","callback_data" =>'/titsup');
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendPhoto($chat_id, $tits["file_id"], $msgid, "{$tits[$rand]["id"]}", $replyMarkup);
}
if ($message == '/gif' || $message == '/gif@phphelperbot') {
    $rand = mt_rand(0, 46);
    $butts = R::getAll("SELECT * FROM gifs");
    $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
    $inline_button2 = array("text" => "Share", "switch_inline_query" => "Лучший сиськобот ^^,");
    $inline_keyboard = [[$inline_button1, $inline_button2]];
    $keyboard = array("inline_keyboard" => $inline_keyboard);
    $replyMarkup = json_encode($keyboard);
    sendDocument($chat_id, $butts[$rand]["file_id"], $msgid, "Photo ID: {$butts[$rand]["id"]} Caption: {$butts[$rand]["caption"]} URL:{$butts[$rand]["url"]}", $replyMarkup);

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

if ($data == '/titsup') {
    $ban_users = R::getCol('SELECT user_name FROM banlist');
    if(in_array($user_name_group_call2, $ban_users)){
        answerCallbackQuery($callback_id,"Ты забанен, хуесос {$user_name_group_call2}","false");
    }else{
        $voted = explode(" ", $nice);
        $sql = "SELECT COUNT(vote_for) as cnt FROM titsup WHERE vote_for='{$voted[0]}' and user_id='{$user_id_group}';";
        $count = R::getAll($sql);
        if ($count[0]['cnt'] > 0) {
            answerCallbackQuery($callback_id,"Нельзя голосовать дважды","false");
        }else{
            answerCallbackQuery($callback_id,"Ты проголосовал 👍","false");
            $vote = R::dispense('titsup');
            $vote->username = $user_name_group_call2;
            $vote->user_id = $chat_id_in2;
            $vote->in_group = $nice2;
            $vote->vote_for = $voted[0];
            $vote->date_add = date('Y-m-d H:i:s');
            $id = R::store( $vote );
            $count_rand = R::getAll("SELECT COUNT(file_id) as cnt  FROM tits");
            $rand = mt_rand(0, $count_rand[0]['cnt']);
            $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for={$rand};");
            $tits = R::getRow("SELECT * FROM tits WHERE id={$rand}");
            $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
            $inline_button2 = array("text"=>"❤️ {$count[0]['cnt']}","callback_data" =>'/buttsup');
            $inline_keyboard = [[$inline_button1, $inline_button2]];
            $keyboard = array("inline_keyboard" => $inline_keyboard);
            $replyMarkup = json_encode($keyboard);
            sendPhoto($chat_id_in, $tits["file_id"], $msgid, "{$tits["id"]}", $replyMarkup);
        }
    }
}

if ($data == '/buttsup') {
    $ban_users = R::getCol('SELECT user_name FROM banlist');
    if(in_array($user_name_group_call2, $ban_users)){
        answerCallbackQuery($callback_id,"Ты забанен, хуесос {$user_name_group_call2}","false");
    }else{
        $voted = explode(" ", $nice);
        $sql = "SELECT COUNT(vote_for) as cnt FROM buttsup WHERE vote_for='{$voted[0]}' and user_id='{$user_id_group}';";
        $count = R::getAll($sql);
        if ($count[0]['cnt'] > 0) {
            answerCallbackQuery($callback_id,"Нельзя голосовать дважды","false");
        }else{
            answerCallbackQuery($callback_id,"Ты проголосовал 👍","false");
            $vote = R::dispense('buttsup');
            $vote->username = $user_name_group_call2;
            $vote->user_id = $chat_id_in2;
            $vote->in_group = $nice2;
            $vote->vote_for = $voted[0];
            $vote->date_add = date('Y-m-d H:i:s');
            $id = R::store( $vote );
            $count_rand = R::getAll("SELECT COUNT(file_id) as cnt  FROM butts");
            $rand = mt_rand(0, $count_rand[0]['cnt']);
            $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for={$rand};");
            $butts = R::getRow("SELECT * FROM butts WHERE id={$rand}");
            $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
            $inline_button2 = array("text"=>"❤️ {$count[0]['cnt']}","callback_data" =>'/buttsup');
            $inline_keyboard = [[$inline_button1, $inline_button2]];
            $keyboard = array("inline_keyboard" => $inline_keyboard);
            $replyMarkup = json_encode($keyboard);
            sendPhoto($chat_id_in, $butts["file_id"], $msgid, "{$butts["id"]}", $replyMarkup);
        }
    }
}