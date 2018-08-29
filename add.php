<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$max = mysqli_real_escape_string($mysqli, $_POST['max']);
	$min = mysqli_real_escape_string($mysqli, $_POST['min']);
	$date = date('Y-m-d');
	$variant = $max - $min;
		
	if(empty($max) || empty($min)) {
				
		if(empty($max)) {
			echo "<font color='red'>Max field is empty.</font><br/>";
		}
		
		if(empty($min)) {
			echo "<font color='red'>Min field is empty.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$result = mysqli_query($mysqli, "INSERT INTO berat(date,max,min,variant) VALUES('$date','$max','$min','$variant')");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
