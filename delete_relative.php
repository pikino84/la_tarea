<?php
session_start();
if( !isset($_SESSION['id_session'])){
    header("location: index.php");
}
echo "Script para eliminar ";