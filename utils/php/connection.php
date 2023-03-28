<?php
    date_default_timezone_set('Europe/Amsterdam');
    $deploy = 0;
    $serverPasswd = 'fBtthaOvJBlhbjAPuey86JpR9oy4JCTOV4';

    if($deploy != 0) {
        $database = 'dbss';
    } else {
        $database = 'sstest0';
    }

    $server = mysqli_connect('localhost', 'jayv', $serverPasswd, $database);
?>
