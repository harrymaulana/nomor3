<?php
include_once("config.php");

if(isset($_POST['update']))
{	

	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	
	$min = mysqli_real_escape_string($mysqli, $_POST['min']);
	$max = mysqli_real_escape_string($mysqli, $_POST['max']);
	$variant = $max - $min;	
	
	if(empty($min) || empty($max)) {	
			
		if(empty($min)) {
			echo "<font color='red'>min field is empty.</font><br/>";
		}
		
		if(empty($max)) {
			echo "<font color='red'>max field is empty.</font><br/>";
		}	
	} else {	
		$result = mysqli_query($mysqli, "UPDATE berat SET max='$max',min='$min', variant='$variant' WHERE date= '".$date."'");
		
		header("Location: index.php");
	}
}
?>
<?php
$date = $_GET['date'];
echo $date;

$result = mysqli_query($mysqli, "SELECT * FROM berat WHERE date= '".$date."'");

while($res = mysqli_fetch_array($result))
{
	$min = $res['min'];
	$max = $res['max'];
	$variant = $res['variant'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Min</td>
				<td><input type="text" name="min" value="<?php echo $min;?>"></td>
			</tr>
			<tr> 
				<td>Max</td>
				<td><input type="text" name="max" value="<?php echo $max;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="date" value=<?php echo $_GET['date'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
