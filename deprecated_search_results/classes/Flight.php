<?php

class Flight
{
    public $airline;
    public $price;
    public $seats;
    public $one_way;
    public $errors = [];

    public static function getAll($conn)
    {
        $sql = "SELECT *
                FROM flights
                ORDER BY price;";
        
        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
}