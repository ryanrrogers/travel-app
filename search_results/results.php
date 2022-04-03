<?php
$connect = mysqli_connect("sql5.freemysqlhosting.net", "sql5476262", "ubHt8arqDy", "sql5476262"); // use this when get sql hosting site back up. uncomment it
//$connect = mysqli_connect("localhost", "root", "", "weather");//localhost connection since other expired
$result = mysqli_query($connect,"SELECT * FROM weather, hotels, flights");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 </head>
<body>
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
    <th>|Hotel Rating|</th>
    <th>|Airline|</th>
  </tr>
<?php
$i=0;
if($row = mysqli_fetch_array($result)) {
?>
<body>Information on Hotel Bliss </body>
<tr>
    <td><?php echo $row["corrlon"]; ?></td>
    </br> </br>
    <td><?php echo $row["corrlat"]; ?></td>
    <td><?php echo $row["weathermain"]; ?></td>
    <td><?php echo $row["windspeed"]; ?></td>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Rating"]; ?></td>
    <td><?php echo $row["airline"]; ?></td>
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
?>
 </body>
</html>