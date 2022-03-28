<?php

class Database
{
    public function getConn()
    {
        $db_host="sql5.freemysqlhosting.net";
        $db_name="sql5476262";
        $db_user="sql5476262";
        $db_pass="ubHt8arqDy";

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

        try {
            $db = new PDO($dsn, $db_user, $db_pass);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

    }
}