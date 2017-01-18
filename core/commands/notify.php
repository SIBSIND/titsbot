<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 08.01.17
 * Time: 18:00
 */

//if (preg_match_all("/(?<![\w\d])(notify [0-9]{1,9})(?![\w\d])/uim", $message_preg, $mathes)) {
//    $message = explode(" ", $message);
//    $inline_button1 = array("text"=>"Сохранить","callback_data" =>'/save_notify');
//    $inline_button2 = array("text"=>"Пред. шаг","callback_data" =>'/summa');
//    $inline_keyboard = [[$inline_button1, $inline_button2]];
//    $keyboard = array("inline_keyboard" => $inline_keyboard);
//    $replyMarkup = json_encode($keyboard);
//    $sQuery = "UPDATE users SET notify= '$message[1]' WHERE user_id= '$chat_id' ";
//    R::exec( $sQuery );
//    sendMessage($chat_id, "You set notify <b>{$message[1]}</b> ", $msgid, "");
//}