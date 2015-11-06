<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Changing shapes</title>
	<style type="text/css">
	.square {
		width: 300px;
		height: 300px;
		background-color: black;
	}
	</style>
</head>
<body>
<div class="square"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$('.square').on("click", function() {
		$(this).css("width", "600px");
		$(this).css("background-color","red");
	});

});



</script>
</body>
</html>