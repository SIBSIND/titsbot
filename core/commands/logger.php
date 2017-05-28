<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

//if($output['message']['chat']['type'] === 'private') {
    $log = R::dispense('logs');
    $log->message = $message;
    $log->author = $username2;
    $log->author_id = $user_id_group;
    $log->first_name = $first_name2;
    $log->chat_id = $output['message']['chat']['id'];
    $log->chat_title = $output['message']['chat']['title'];
    $log->chat_username = $output['message']['chat']['username'];
    $log->chat_type = $output['message']['chat']['type'];
    $log->date_add = date('Y-m-d H:i:s');
    R::store($log);
//}
