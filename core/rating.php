<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 19.01.17
 * Time: 8:25
 */


if ($data == '/titsup') {
    $ban_users = R::getCol('SELECT user_name FROM banlist');
    if(in_array($user_name_group_call2, $ban_users)){
        answerCallbackQuery($callback_id,"Ты забанен, хуесос {$user_name_group_call2}","false");
    }else{
        $voted = explode(" ", $nice);
        $sql = "SELECT COUNT(vote_for) as cnt FROM titsup WHERE vote_for='{$voted[0]}' and user_id='{$chat_id_in2}';";
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
            $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM titsup WHERE vote_for='{$voted[0]}';");
            $inline_button1 = ['text'=>"👍  {$count[0]['cnt']}",'callback_data'=>'/titsup',];
            $inline_button2 = ['text'=>'Rate us ⭐️','url'=>'telegram.me/storebot?start=phphelperbot'];
            $inline_keyboard = [[$inline_button1],[$inline_button2]];
            $keyboard = array('inline_keyboard' => $inline_keyboard);
            $replyMarkup = json_encode($keyboard);
            editMessageReplyMarkup($chat_id_in,$message_id,$replyMarkup);
        }
    }
}


if ($data == '/buttsup') {
    $ban_users = R::getCol('SELECT user_name FROM banlist');
    if(in_array($user_name_group_call2, $ban_users)){
        answerCallbackQuery($callback_id,"Ты забанен, хуесос {$user_name_group_call2}","false");
    }else{
        $voted = explode(" ", $nice);
        $sql = "SELECT COUNT(vote_for) as cnt FROM buttsup WHERE vote_for='{$voted[0]}' and user_id='{$chat_id_in2}';";
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

            $count = R::getAll("SELECT COUNT(vote_for) as cnt  FROM buttsup WHERE vote_for='{$voted[0]}';");

            $inline_button1 = ['text'=>"👍  {$count[0]['cnt']}",'callback_data'=>'/buttsup',];
            $inline_button2 = ['text'=>'Rate us ⭐️','url'=>'telegram.me/storebot?start=phphelperbot'];
            $inline_keyboard = [[$inline_button1],[$inline_button2]];
            $keyboard = array('inline_keyboard' => $inline_keyboard);
            $replyMarkup = json_encode($keyboard);
            editMessageReplyMarkup($chat_id_in,$message_id,$replyMarkup);
        }
    }
}