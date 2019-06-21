<?php
if( isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['password']) && $_POST['password'] != "" ){
    $email = str_replace(" ", "", $_POST['email']);
    $password = str_replace(" ", "", $_POST['password']);
    $file = fopen('usuarios.txt', 'r+');
    if(!$file){
        return "Error en el archivo";
    }else{ 	
        $i = 0;
        while (!feof($file)) {
            $i++;
            $line = fgets($file);
            $field[$i] = explode ('|', trim($line));
            $file++;
        }
        foreach($field as $val){
            if($email == $val[0] && $password == $val[1] ){
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: relatives_list.php');
                exit();
            }
        }
        header('location: index.php?credentials');
    }
}else{
    header('location: index.php?error');
}
fclose($file);