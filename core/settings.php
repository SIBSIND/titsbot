<?php
echo "Settings loaded".__FILE__."<br>";
// include 'Botan.php'; //disabled
//url api.telegram.org/bot281890161:AAFvdyIBxkvfwG-8P18vh2DK6uXaldh5hKQ/setWebhook?url=https://vps7.exileed.com/titsbot/index.php?token=281890161:AAFvdyIBxkvfwG-8P18vh2DK6uXaldh5hKQ
error_reporting(E_ALL);
date_default_timezone_set('Europe/Moscow');
$access_token = '281890161:AAFvdyIBxkvfwG-8P18vh2DK6uXaldh5hKQ';
$api = 'https://api.telegram.org/bot' . $access_token;
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$first_name = $output['message']['chat']['first_name'];
$msgid = $output['message']['message_id'];
$message_id = $output['callback_query']['message']['message_id'];
$date = $output['message']['date'];
$message = $output['message']['text'];
$callback_query = $output['callback_query'];
$data = $callback_query['data'];
$message_preg = $output['message']['text'];
$sticker = $output['message']['sticker'];
$photo = $output['message']['file_id'];
$callback_id = $output['callback_query']['id'];
$username =$output['message']['chat']['username'];
$user_id_group = $output['message']['from']['id'];
$user_first_name_group = $output['message']['from']['first_name'];
$user_first_name_group1 = $output['callback_query']['from']['first_name'];
$nice = $output['callback_query']['message']['caption'];
$nice2 = $output['callback_query']['message']['chat']['title'];
$nice3 = $output['callback_query']['message']['date'];
$user_name_group = $output['message']['from']['username'];
$message_id1 = ['callback_query']['message']['message_id'];
$message_id2 = ['callback_query']['message']['id'];
$chat_id_in = $callback_query['message']['chat']['id'];
$chat_id_in2 = $callback_query['from']['id'];
$username_call = $callback_query['message']['chat']['username'];
$username_call2 = $callback_query['from']['username'];
$user_name_group_call = $callback_query['message']['from']['username'];
$user_name_group_call2 = $callback_query['from']['username'];
$username2 = $output['message']['from']['username'];
$first_name2 = $output['message']['from']['first_name'];
$chat_username = $output['message']['chat']['username'];

