<?php
$servername = "localhost";
$user = "root";//mmt480_ali
$dbname = "scgfpivz_h2oneeds";


//ali180307

// Create connection
$conn = mysqli_connect($servername, $user ,"", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>