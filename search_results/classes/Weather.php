<?php

class Weather
{
    public $corrlon;
    public $corrlat;
    public $weatherid;
    public $weathermain;
    public $weatherdescription;
    public $basestationsmaintemp;
    public $basestationsmaintempfeels_like;
    public $basestationsmaintemp_min;
    public $basestationsmaintemp_max;
    public $basestationspressure;
    public $basestationshumidity;
    public $visibility;
    public $windspeed;
    public $winddeg;
    public $cloudsall;
    public $sunrise;
    public $sunset;
    public $timezone;
    public $errors = [];

    public static function getAll($conn)
    {
        $sql = "SELECT *
                FROM weather
                ORDER BY weatherid;";
        
        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
}