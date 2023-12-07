<?php

function connection(){
    $home = "localhost";
    $usuario = "root";
    $pass = "";

    $bd = "papelarte";

    $connect = mysqli_connect($home, $usuario, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}
?>