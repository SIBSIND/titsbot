<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 08.01.17
 * Time: 18:04
 */

if($message == 'Бот ливни'){
    $admins = R::getCol('SELECT user_name FROM viplist WHERE role=2');
    if(in_array($username2, $admins)){
        sendMessage($chat_id,"Как скажешь..",$msgid);
        LeaveChat($chat_id);
    }
}