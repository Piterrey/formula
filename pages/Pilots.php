<html>
  <head>
    <title>Pilots</title>
  </head>
  <body>
  <?php
	// Create connection
	$con=mysqli_connect("127.0.0.1","root","","Formula1");

	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM Pilots");
	echo "<table border='1'>
		  <tr>
		  <th>pilot_ID </th>
		  <th>name </th>
		  <th>surname </th>
		  <th>number </th>
		  <th>team_ID </th>
		  </tr>";
		  
	while($row = mysqli_fetch_array($result))
	  {
	  echo "<tr>";
	  echo "<td>" . $row['pilot_ID'] . "</td>";
	  echo "<td>" . $row['name'] . "</td>";
	  echo "<td>" . $row['surname'] . "</td>";
	  echo "<td>" . $row['number'] . "</td>";
	  echo "<td>" . $row['team_ID'] . "</td>";
	  echo "</tr>";
	  }
	echo "</table>";
	echo "<form action=\"../script/deletePilot.php\" method=\"GET\">";
	echo "<select name='toDPil'>";
	while($row = mysqli_fetch_array($result))
	  {
	  echo "<option value=\"" . $row['pilot_ID'] . "\">".$row['name']."</option>";
	  }
	echo "<option value=\"mucca\">vacca</option>";
	echo "</select>";
	echo "<input type=\"submit\" value=\"Delete selected\" onclick>";
	echo "</form>";
	mysqli_close($con);
?>
  </body>
</html>