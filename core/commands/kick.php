<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 08.01.17
 * Time: 18:01
 */

$vips = R::getCol('SELECT user_name FROM viplist WHERE role=2');
if(in_array($username2, $vips)){
    if (preg_match_all("/(?<![\w\d])(kick [A-Za-z]+[A-Za-z0-9_]+)(?![\w\d])/uim",$message_preg, $mathes)) {
        $message = explode(" ", $message);
        $pages = R::findOne('users',' username = ? ',[$message[1]]);
        if ($pages) {
            kickchatmember($chat_id,$pages->user_id);
            $banlist = R::dispense('banlist');
            $banlist->user_name = $pages->username;
            $banlist->user_id = $pages->user_id;
            $banlist->reason = $message[2];
            $banlist->date_add = date('Y-m-d H:i:s');
            $banlist->date_unban = "NULL";
            $banlist->banned_by = $username2;
            $id = R::store($banlist);
            sendMessage($chat_id,"ID пользователя: $pages->user_id Записали в базу юзера <b>{$message[1]}</b>  дату [".date('Y-m-d H:i:s')."] причину <b>{$message[2]}</b> \n Забанен админом - <b>{$username2}</b> \n Посмотреть - банлист",$msgid,$replyMarkup);
        }
    }
}


$vips = R::getCol('SELECT user_name FROM viplist WHERE role=2');
if(in_array($username2, $vips)){
    if (preg_match_all("/(?<![\w\d])(ban [A-Za-z]+[A-Za-z0-9_]+)(?![\w\d])/uim",$message_preg, $mathes)) {
            $message = explode(" ", $message);
            $banlist = R::dispense('banlist');
            $banlist->user_name = $message[1];
            $banlist->user_id = NULL;
            $banlist->reason = $message[2];
            $banlist->date_add = date('Y-m-d H:i:s');
            $banlist->date_unban = "NULL";
            $banlist->banned_by = $username2;
            $id = R::store($banlist);
            $inline_button1 = array("text" => "Rate us ⭐️", "url" => "telegram.me/storebot?start=phphelperbot");
            $inline_button2 = array("text"=>"Banlist","callback_data" =>'/banlist');
            $inline_keyboard = [[$inline_button1, $inline_button2]];
            $keyboard = array("inline_keyboard" => $inline_keyboard);
            $replyMarkup = json_encode($keyboard);
            sendMessage($chat_id,"Забанили юзера <b>{$message[1]}</b>  дату [".date('Y-m-d H:i:s')."] причину <b>{$message[2]}</b> \n Забанен админом - <b>{$username2}</b> \n Посмотреть - банлист",$msgid,$replyMarkup);

    }
}

if($data == '/banlist' && $username_call2 == 'oneerror'){
    $vips = R::getAll('SELECT user_name,user_id,reason,date_add,date_unban,banned_by FROM banlist');
        $list = "";
        foreach ($vips as $vip) {

            $list .= "@{$vip["user_name"]} [<b>{$vip["user_id"]}</b>] \n причина: <b>{$vip["reason"]}</b> \n Забанил @{$vip["banned_by"]} \n Дата {$vip["date_add"]} \n Разбан через <b>{$vip["date_unban"]}</b> \n ======================= \n";

        }
        sendMessage($chat_id_in, "Банлист: \n $list","","");
    }