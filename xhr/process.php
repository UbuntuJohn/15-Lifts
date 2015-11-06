<?php
include "connect.php";
session_start();
$username = $_SESSION['username'];


if(isset($_GET['ttv'])) {
	$todaysTotalValue = $_GET['ttv'];
	echo $todaysTotalValue;
	$todaysDate = date('Y-m-d');


	$sql = "update lifts set totalLifts = '".$todaysTotalValue."' where date='".$todaysDate."' and user='".$username."'";
	$result = mysqli_query($connect, $sql) or die('could not update properties');

}



?>