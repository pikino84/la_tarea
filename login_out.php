<?php
session_start();
if( isset($_SESSION['id_session']) && session_id() == $_SESSION['id_session'] ){
    session_unset();
    session_destroy();
    header("location: index.php");
}