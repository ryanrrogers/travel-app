<?php

    $servername = "sql5.freemysqlhosting.net";
    $username = "sql5476262";
    $password = "ubHt8arqDy";
    $dbname = "sql5476262";
    


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die('Could not connect to MySQL Server: ' . mysql_error());
}

?>