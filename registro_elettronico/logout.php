<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<h1>Logout effettuato</h1>";

    header("Location: ./index_logout.php?=Logout_effettuato");
?>