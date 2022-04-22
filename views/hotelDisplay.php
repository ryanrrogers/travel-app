<?php
require 'includes/connection.php';
 // use this when get sql hosting site back up. uncomment it
//$connect = mysqli_connect("localhost", "root", "", "weather");//localhost connection since other expired
$sql = "Select *
        From sql5476262.hotels";

$result = mysqli_query($conn, $sql);

require 'includes/header.php';
?>
    <head>
        <title>Hotels</title>
    </head>
    <style>
        .body {
            color: #203AAD;
        }
    </style>
    <div class='box'>
          <h1 class="temp">Hotels</h1>
        </div>
      </div>
      <span></span>
<?php
if (mysqli_num_rows($result) > 0) {
?>


  <table>
  
  <tr>
    <th>|Name|</th>
    <th>|Price|</th>
    <th>|Address|</th>
    <th>|Star Rating|</th>
  </tr>

<?php
$i=0;
if($row = mysqli_fetch_array($result)) {
?>
<header>  </header>
<tr>
    <td><?php echo $row["Name"]; ?></td>
    
    <td><?php echo $row["Price"]; ?></td>
    <td><?php echo $row["Address"]; ?></td>
    <td><?php echo $row["Rating"]; ?></td>
    
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