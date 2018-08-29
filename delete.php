<?php
include("config.php");

$date = $_GET['date'];

$result = mysqli_query($mysqli, "DELETE FROM berat WHERE date='".$date."'");

header("Location:index.php");
?>

