<?php

function getDB()
{
    $host = "sql5.freemysqlhosting.net";
    $name = "sql5476262";
    $user = "sql5476262";
    $pass = "ubHt8arqDy";


$conn = mysqli_connect($host, $name, $pass, $user);

if(mysqli_connect_error())
{
    echo mysqli_connect_error();
    exit;
}

return $conn;

}
?>