<?php declare(strict_types=1);

/*
 * This file is part of my implementation Bot SDK for Telegram via PHP.
 */

if ($message === '2bd') {
    $video = [
    ];

    foreach ($video as $singlevideo) {
        $Query = "INSERT INTO tits(`file_id`) VALUES ('{$singlevideo}')";
        R::exec($Query);
    }
}
