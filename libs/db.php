<?php
require 'libs/rb.php';
echo "DB include ".__FILE__."<br>";
    R::setup( 'mysql:host=127.0.0.1;dbname=titsbot',
        'root', '123' ); //for both mysql or mariaDB
?>
