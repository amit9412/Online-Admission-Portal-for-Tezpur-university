<?php

//$servername = "localhost";

$servername = "kaushikotp.lakeside.systems";

//$servername = "216.10.248.14";

$username = "subha8xr_kaushikotp";

$db = "subha8xr_placement";

$password = "kaushik@123";



// Create connection

$conn = new mysqli($servername, $username, $password,$db);



// Check connection

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

//echo "Connected successfully";

$sql = "Show Databases";

$result = $conn->query($sql);

// foreach($result as $r){

//     print_r($r);

//     print_r("\n");
// }

?>