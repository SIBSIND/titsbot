<?php
/**
 * Created by PhpStorm.
 * User: systemfailure
 * Date: 08.01.17
 * Time: 18:04
 */

if($message == '2bd'){
    $video = [
    ];

    foreach($video as $singlevideo){
        $Query = "INSERT INTO tits(`file_id`) VALUES ('{$singlevideo}')";
        R::exec( $Query );
    }
}