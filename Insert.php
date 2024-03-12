<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$username=$_POST["fname"];
$password=$_POST["lname"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO MyGuests ( username , password )
VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "Login successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("refresh: 3; url=index1.html");
?>