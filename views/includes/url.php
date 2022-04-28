<?php 

function redirect($path)
{
    header("Location: http://localhost/Travel-App/" . $path . '.php');
    exit;
}
