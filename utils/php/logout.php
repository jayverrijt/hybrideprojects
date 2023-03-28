<?php
    session_start();
    if(session_destroy()) {
    header("location: ../.././");
    }
    else {
    echo "Sorry uw systeem is te incompetable om uit te loggen!";
    }
?>