<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 08.01.17
 * Time: 17:59
 */

//if (preg_match_all("/(?<![\w\d])(send [a-z]{1,9})(?![\w\d])/uim",$message_preg, $mathes)) {
//    $users = R::getAll('SELECT username,user_id FROM users WHERE notify=1');
//    $message = explode(" ", $message);
//    json_decode($users);
//    foreach($users as $user){
//        $inline_button1 = array("text"=>"Rate us 5 ⭐️","url"=>"telegram.me/storebot?start=phphelperbot");
//        $inline_button2 = array("text"=>"Share","switch_inline_query"=>"Look what I have for you ^^,");
//        $inline_keyboard = [[$inline_button1,$inline_button2]];
//        $keyboard=array("inline_keyboard"=>$inline_keyboard);
//        $replyMarkup = json_encode($keyboard);
//        $inline_button1 = array("text"=>"Unsubscribe","callback_data" =>'/unsubscribe');
//        $inline_keyboard = [[$inline_button1]];
//        $keyboard=array("inline_keyboard"=>$inline_keyboard);
//        $replyMarkup2 = json_encode($keyboard);
//        sendMessage($user["user_id"],"$message[1] $message[2] $message[3] $message[4] $message[5] $message[6] $message[7] $message[8] $message[9] $message[10] $message[11] $message[12] $message[13] $message[14] $message[15] $message[16] $message[17]","",$replyMarkup2);
//        sendPhoto($user["user_id"],AgADAgADB7gxG3FNzRDj1g_P9r1sI6jYgQ0ABJagrWeFnXr9pPsBAAEC,"","Top photo of the week",$replyMarkup);
//    }
//}
if($data == '/unsubscribe'){
    sendMessage($chat_id_in,"Type <b>notify 0</b> to Unsubscribe","","");
}