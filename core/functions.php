<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

function sendKeyboard($chat_id, $message, $reply)
{
    file_get_contents($GLOBALS['api']."/sendmessage?chat_id=".$chat_id."&text={$message}&reply_markup=".$reply);
}

/**
 * @param $chat_id
 * @param $message
 * @param $msgid
 * @param $replyMarkup
 */
function sendMessage($chat_id, $message, $msgid, $replyMarkup)
{
    file_get_contents($GLOBALS['api'].'/sendMessage?chat_id='.$chat_id.'&parse_mode=HTML&disable_web_page_preview=false'.'&reply_to_message_id='.$msgid.'&text='.urlencode($message).'&reply_markup='.$replyMarkup);
}

/**
 * @param $chat_id
 * @param $latitude
 * @param $longitude
 */
function sendLocation($chat_id, $latitude, $longitude)
{
    file_get_contents($GLOBALS['api'].'/sendLocation?chat_id='.$chat_id.'&latitude='.$latitude.'&longitude='.$longitude);
}

/**
 * @param $chat_id
 * @param $sticker
 */
function sendSticker($chat_id, $sticker)
{
    file_get_contents($GLOBALS['api'].'/sendSticker?chat_id='.$chat_id.'&sticker='.$sticker);
}

/**
 * @param $chat_id
 * @param $photo_id
 * @param $msgid
 * @param $caption
 * @param $replyMarkup
 */
function sendPhoto($chat_id, $photo_id, $msgid, $caption, $replyMarkup)
{
    file_get_contents($GLOBALS['api'].'/sendPhoto?chat_id='.$chat_id.'&reply_to_message_id='.$msgid.'&photo='.$photo_id.'&caption='.$caption.'&reply_markup='.$replyMarkup);
}

/**
 * @param $chat_id
 * @param $document_id
 * @param $msgid
 * @param $caption
 * @param $replyMarkup
 */
function sendDocument($chat_id, $document_id, $msgid, $caption, $replyMarkup)
{
    file_get_contents($GLOBALS['api'].'/sendDocument?chat_id='.$chat_id.'&reply_to_message_id='.$msgid.'&document='.$document_id.'&caption='.$caption.'&reply_markup='.$replyMarkup);
}

/**
 * @param $chat_id
 * @param $action
 */
function sendChatAction($chat_id, $action)
{
    file_get_contents($GLOBALS['api'].'/sendChatAction?chat_id='.$chat_id.'&action='.$action);
}

/**
 * @param $chat_id
 */
function leaveChat($chat_id)
{
    file_get_contents($GLOBALS['api'].'/LeaveChat?chat_id='.$chat_id);
}

/**
 * @param $callback_query_id
 * @param $text
 * @param $show
 */
function answerCallbackQuery($callback_query_id, $text, $show)
{
    file_get_contents($GLOBALS['api'].'/answerCallbackQuery?callback_query_id='.$callback_query_id.'&text='.$text.'&show_alert='.$show);
}

/**
 * @param $chat_id
 * @param $user_id
 */
function kickchatmember($chat_id, $user_id)
{
    file_get_contents($GLOBALS['api'].'/kickchatmember?chat_id='.$chat_id."&user_id=".$user_id);
}

/**
 * @param $chat_id
 * @param $video_id
 * @param $msgid
 * @param $caption
 * @param $replyMarkup
 */
function sendVideo($chat_id, $video_id, $msgid, $caption,$replyMarkup)
{
    file_get_contents($GLOBALS['api'].'/sendVideo?chat_id='.$chat_id.'&reply_to_message_id='.$msgid.'&video='.$video_id.'&caption='.$caption.'&reply_markup='.$replyMarkup);
}

/**
 * @param $chat_id
 * @param $group
 */
function getChatAdministrators($chat_id)
{
    file_get_contents($GLOBALS['api'] . "/getChatAdministrators?chat_id=" . $chat_id);
}

/**
 * @param $chat_id
 * @param $message_id
 * @param $text
 */
function editMessageText($chat_id, $message_id, $text)
{
    file_get_contents($GLOBALS['api']."/editMessageText?chat_id=".$chat_id."&message_id=".$message_id."&text=".$text);
}

/**
 * @param $chat_id
 * @param $message_id
 * @param $replyMarkup
 */
function editMessageReplyMarkup($chat_id, $message_id, $replyMarkup)
{
    file_get_contents($GLOBALS['api']."/editMessageReplyMarkup?chat_id=".$chat_id."&message_id=".$message_id."&reply_markup=".$replyMarkup);
}

function stringSplit($string): array
{
    $arr = explode(" ", $string);
    $command = array_shift($arr);
    $arr2 = implode(" ", $arr);
    return [$command, $arr2];
}
