<?php 

function redirect($path)
{
    header("Location: http://localhost:8080/Travel-App/" . $path . '.php');
    exit;
}
