<?php

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM berat ORDER BY date DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Date</td>
		<td>Max</td>
		<td>Min</td>
		<td>Variant</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['date']."</td>";
		echo "<td>".$res['max']."</td>";
		echo "<td>".$res['min']."</td>";	
		echo "<td>".$res['variant']."</td>";
		echo "<td><a href=\"edit.php?date=$res[date]\">Edit</a> | <a href=\"delete.php?date=$res[date]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
