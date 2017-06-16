<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

$ball = R::getRow("SELECT * from settings WHERE 8ball='on'");
if($ball){
    require 'commands/8ball.php';
}
$addvip = R::getRow("SELECT * from settings WHERE addvip='on'");
if($addvip){
    require 'commands/addvip.php';
}
$banlist = R::getRow("SELECT * from settings WHERE banlist='on'");
if($banlist)
{
    require 'commands/banlist.php';
}
$insert2bd = R::getRow("SELECT * from settings WHERE insert2bd='on'");
if($insert2bd)
{
    require 'commands/insert2bd.php';
}
$kick = R::getRow("SELECT * from settings WHERE kick='on'");
if($kick)
{
    require 'commands/kick.php';
}
$leaveBot = R::getRow("SELECT * from settings WHERE leaveBot='on'");
if($leaveBot)
{
    require 'commands/leaveBot.php';
}
$logger = R::getRow("SELECT * from settings WHERE logger='on'");
if($logger){
    require 'commands/logger.php';
}
$notify = R::getRow("SELECT * from settings WHERE notify='on'");
if($notify)
{
    require 'commands/notify.php';
}
//require 'commands/sendmessage.php';
$custom_butts = R::getRow("SELECT * from settings WHERE custom_butts='on'");
if($custom_butts)
{
    require 'commands/custom_commands/custom_butts.php';
}
$showme = R::getRow("SELECT * from settings WHERE showme='on'");
if($showme)
{
    require 'commands/custom_commands/showme.php';
}
