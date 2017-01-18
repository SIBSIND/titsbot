<?if (preg_match_all("/(?<![\w\d])(send [A-zА-я]+{1,9})(?![\w\d])/uim",$message_preg, $mathes)) {
    $users = R::getAll('SELECT username,user_id FROM users WHERE notify=1');
    $message = explode(" ", $message);
    json_decode($users);
    foreach ($users as $user) {
        sendMessage($user["user_id"], "$message[1] $message[2] $message[3] $message[4] $message[5] $message[6] $message[7] $message[8]", "", "");

    }
}