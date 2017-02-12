<?php
date_default_timezone_set('Europe/Kiev');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'core/functions.php';               
require 'core/settings.php';
require 'libs/db.php';	
$ban = R::findOne('banlist',' user_name = ? ',[$username2]);
if ($ban) {
	$inline_button1 = array("text"=>"Правила","callback_data" =>'/rules');
    $inline_button2 = array("text"=>"Попросить разбан","url"=>"telegram.me/{$ban->banned_by}");
    $inline_keyboard = [[$inline_button1,$inline_button2]];
    $keyboard=array("inline_keyboard"=>$inline_keyboard);
    $replyMarkup = json_encode($keyboard); 
 sendMessage($chat_id,"<b>{$username2}</b> Ты забанен админом <b>{$ban->banned_by}</b> с причиной <b>{$ban->reason}</b> в $ban->date_add твой бан истекает $ban->date_unban \n 
 	За разбаном пишите админу @{$ban->banned_by}",$msgid,$replyMarkup);
    }else{
require 'core/bot.php';
require 'core/rating.php';
require 'core/autoload.php';
    }
