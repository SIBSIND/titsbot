<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

date_default_timezone_set('Europe/Kiev');
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'core/functions.php';
require 'core/settings.php';
require 'libs/db.php';
$ban = R::findOne('banlist', ' user_name = ? ', [$username2]);
if ($user_id_group == '169723178' || $ban) {

} else {
    require 'core/bot.php';
    require 'core/rating.php';
    require 'core/autoload.php';
}
