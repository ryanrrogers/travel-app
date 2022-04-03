<?php
$apiKey = "98196938f3021ed1a72d700a33ef4d42";
$cityId = "833";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);

echo($response);
$test = json_decode($response, true);
$currentTime = time();

$connect = mysqli_connect("sql5.freemysqlhosting.net", "sql5476262", "ubHt8arqDy", "sql5476262"); // use this when get sql hosting site back up. uncomment it
//$connect = mysqli_connect("localhost", "root", "", "weather");//localhost connection since other expired
  

            $query = ''; 

            $table_data = ''; 

            

            $filename = "weather.json"; 

            

            $data = file_get_contents($filename);  

            

            $array = json_decode($data, true);  

            

            foreach($array as $row) { 

            

                $query .=  

                "INSERT INTO weather VALUES  

                ('".$row["corr-lon"]."', '".$row["corr-lat"]."',  

                '".$row["weather-id"]. "', '" .$row["id"]. "', '" .$row["weather-main"]. "', '" .$row["weather-description"]. "', '" .$row["base-stations-main-temp"]. "', '" .$row["base-stations-main-temp-feels_like"]."', '" .$row["base-stations-main-temp_min"]."', '" .$row["base-stations-temp_max"]."', '" .$row["base-stations-pressure"]."', '" .$row["base-stations-humidity"]."', '" .$row["visibility"]."', '" .$row["wind-speed"]."', '" .$row["wind-deg"]."', '" .$row["clouds-all"]."', '" .$row["sunrise"]."', '" .$row["sunset"]."', '" .$row["timezone"]."'); ";  

           
               

                $table_data .= ' 

                <tr> 

                    <td>'.$row["corr-lon"].' ,

                    '.$row["corr-lat"].' ,

                    '.$row["weather-id"].' ,

                    '.$row["id"].', 

                    '.$row["weather-main"].',

                    '.$row["weather-description"].',

                    '.$row["base-stations-main-temp"].',

                    '.$row["base-stations-main-temp-feels_like"].',

                    '.$row["base-stations-main-temp_min"].',

                    '.$row["base-stations-temp_max"].',

                    '.$row["base-stations-pressure"].',

                    '.$row["base-stations-humidity"].',

                    '.$row["visibility"].',

                    '.$row["wind-speed"].',

                    '.$row["wind-deg"].',

                    '.$row["clouds-all"].',

                    '.$row["sunrise"].',

                    '.$row["sunset"].',

                    '.$row["timezone"].'

                    

                    </td> 

                </tr> 

                '; 

            } 

  

            if(mysqli_multi_query($connect, $query)) { 

                echo '<h3>Inserted JSON Data Into Sql Table</h3><br />'; 

                echo ' 

                <table class="table table-bordered"> 

                <tr> 

                    <th width="10%">corr-lon,

                    corr-lat,

                    weather-id,

                    id,

                    weather-main,

                    weather-description,

                    base-stations-main-temp,

                    base-stations-main-temp-feels_like,

                    base-stations-main-temp_min,

                    base-stations-temp_max,

                    base-stations-pressure,

                    base-stations-humidity,

                    visibility,

                    wind-speed,

                    wind-deg,

                    clouds-all,

                    sunrise,

                    sunset,

                    timezone


                    </th> 


                </tr> 

                '; 

                echo $table_data;   

                echo '</table>'; 

            } 



?>