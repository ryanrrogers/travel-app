<?php
require 'includes/connection.php';
 // use this when get sql hosting site back up. uncomment it
//$connect = mysqli_connect("localhost", "root", "", "weather");//localhost connection since other expired
$sql = "Select *
        From sql5476262.weather";

$result = mysqli_query($conn, $sql);

require 'includes/header.php';
?>
<!DOCTYPE html>
<html lang = "eng">
    <head>
        <title>Current Weather</title>
    </head>
    <style>
        .body {
            color: #203AAD;
        }
    </style>
    <div class='box'>
          <h1 class="temp">Weather Description</h1>
        </div>
      </div>
      <span></span>
<?php
if (mysqli_num_rows($result) > 0) {
?>


  <table>
  
  <tr>
    <th>|Corrlon|</th>
    <th>|Corrlat|</th>
    <th>|WeatherMain|</th>
    <th>|WindSpeed|</th>
    <th>|ID|</th>
    
  </tr>

<?php
$i=0;
if($row = mysqli_fetch_array($result)) {
?>
<header>  </header>
<tr>
    <td><?php echo $row["corrlon"]; ?></td>
    
    <td><?php echo $row["corrlat"]; ?></td>
    <td><?php echo $row["weathermain"]; ?></td>
    <td><?php echo $row["windspeed"]; ?></td>
    <td><?php echo $row["id"]; ?></td>
    
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}

require 'includes/footer.php';
?>
