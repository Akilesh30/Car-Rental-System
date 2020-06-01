<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//if($_POST)
{
	echo "login okay";
  $u = $_POST["EmailId"];
  $p = $_POST["password"];



$sql = "SELECT * FROM tblusers  WHERE Email LIKE '$u' AND Password LIKE '$p'";
$result = $conn->query($sql);
//xecho ".$user1";

if ($result->num_rows > 0) {
	while($row=$result->fetch_assoc()){

	$id=$row["id"];
    $_SESSION["id"]=$id;
    header("Location:car-listing.php");

	}
    // output data of each row

} else {
    header("Location:login.php?error=User account not found");
}
}
$conn->close();
?>