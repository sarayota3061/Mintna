<?php
include 'con_db.php';
include 'menu.php';

$sql = "SELECT id,firstname,lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
?>

<html lang="en">
	<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  	</head>
<body>

  <div class="container mt-3">
	<?php
	echo "<form action='mysql_update.php' method='POST'>";
  echo "id: ' . $row['id']. ' - Name: ";
	echo "<div class='mb-3 mt-3'>";
	echo "<input type='text' class='form-control' name='fname' value='".$row["firstname"]."'>";
	echo "<input type='text' class='form-control' name='lname' value='".$row["lastname"]."'>";
	echo "<input type='hidden' class='form-control' name='id' value='".$row["id"]."'>";
	echo "</div>";
	echo "<input type='submit' class='btn btn-primary' value='update'>";
	echo "</form>";

	

	echo "<form action='mysql_delete.php' method='POST'>";
 	echo "<input type='hidden' name='id' value='".$row["id"]."'>";
	echo "<input type='submit' class='btn btn-primary' value='delete'>";
	echo "</form>";
	echo "</div>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>