<?php 
// helio 26012023 16:16
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);

    header('Location: ../painel/login.php');


?>
