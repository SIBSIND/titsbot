<?php
$vips = R::getAll('SELECT user_name,user_id,reason,date_add,date_unban,banned_by FROM banlist');
if (preg_match_all("/(?<![\w\d])(banlist)(?![\w\d])/uim", $message_preg, $mathes)) {
json_decode($vips);

$list = "";
foreach ($vips as $vip) {

$list .= "@{$vip["user_name"]} [<b>{$vip["user_id"]}</b>] \n причина: <b>{$vip["reason"]}</b> \n Забанил @{$vip["banned_by"]} \n Дата {$vip["date_add"]} \n Разбан через <b>{$vip["date_unban"]}</b> \n ======================= \n";

}
$inline_button1 = array("text"=>"Разбанить","callback_data" =>'/unban');
$inline_button2 = array("text"=>"Список","callback_data" =>'/banlist');
$inline_keyboard = [[$inline_button1,$inline_button2]];
$keyboard=array("inline_keyboard"=>$inline_keyboard);
$replyMarkup = json_encode($keyboard);
sendMessage($chat_id, "Банлист: \n $list", $msgid, $replyMarkup);
}
?>