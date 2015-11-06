<?php
session_start();

if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];

	if(empty($username)) {
		unset($username);
		header("Location: login.php?errorcode=1");
	}

} else {
	header("Location: login.php");
}

echo "<span class='user'>Hello, {$username} (<a href='xhr/logout.php'>Logout</a>)</span>";

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>15 Lifts</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
</head>
<body>

<div class="container">
	<h2>15 Lifts</h2>
	<ul>
		<li><img src="images/add.png" class="add" /></li>
		<li><img src="images/minus.png" class="minus" /></li>
	</ul>
	<div class="stats">
	<div class="todaysDate"><?php //echo date('Y-m-d'); ?></div>
	<div class="todaysTotal">Today's total: 
		<?php
		include "xhr/connect.php";
		$today = date('Y-m-d');
		
		$sql = "select totalLifts from lifts where date='".$today."' and user='".$username."'";
		$result = mysqli_query($connect, $sql) or die("couldn't select total lifts for the day.");

		if(mysqli_num_rows($result) == 0) {
			
			$sql2 = "insert into lifts (totalLifts, date, user) values ('0', '$today', '$username')";
			$result2 = mysqli_query($connect, $sql2) or die("Could not create new day");

			//issue isn't here but when this isn't here, it's blank... still need to refresh screen
			if($result2) {
				echo "<span class='todaysTotalValue'>0</span>";
			}

		}

		while($row = mysqli_fetch_assoc($result)) {
			extract($row);
			echo "<span class='todaysTotalValue'>{$totalLifts}</span>"; 

		?>

		<script type="text/javascript">

		var todaysTotalValue = <?php echo ($totalLifts); ?>;

		</script>
		<?php
			
		}

		?>
	</div>
	<div class="allTotal">
		Total Lifts:

		<?php
		include "xhr/connect.php";
		$sql3 = "select sum(totalLifts) total from lifts where user='".$username."'";
		$result3 = mysqli_query($connect, $sql3) or die("could not select sum.");

		while($row3 = mysqli_fetch_assoc($result3)) {
			extract($row3);

			echo "<span class='allTotalValue'>{$total}</span>";

			?>

		<script type="text/javascript">

		var allTotalValue = <?php echo ($total); ?>
		</script>
		<?php
		}

		?>


		
	</div>
	<div class="error">Buttons not working?<br /> <a href='index.php'>Click here!</a></div>	
</div>
</div>
<div class="notes">
	<h2>Notes:</h2>
	<p>Things to build:</p>
	<ol>
	<li>All time record</li>
	<li>Scrolling list of all days and record</li>
	<li>Automate the all total value (check if worked! - Big Night)</li>
	</ol>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/liftcounter.js"></script>
</body>
</html>