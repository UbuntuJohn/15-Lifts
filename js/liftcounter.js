$(function() {

//alert("page is working properly!");


$('.add').on("click", function() {
todaysTotalValue += 15;
allTotalValue += 15;


$.ajax({
	url: "xhr/process.php",
	data: {
		ttv: todaysTotalValue
	},
	type: "GET", 

	success: function() {
		//alert("success!");
	},
	error: function() {
		alert("failure!");
	}
});

$('.todaysTotalValue').text(todaysTotalValue);
$('.allTotalValue').text(allTotalValue);



});

$('.minus').on("click", function() {
todaysTotalValue -= 15;
allTotalValue -= 15;
$.ajax({
	url: "xhr/process.php",
	data: {
		ttv: todaysTotalValue
	},
	type: "GET", 

	success: function() {
		//alert("success!");
	},
	error: function() {
		alert("failure!");
	}
});

$('.todaysTotalValue').text(todaysTotalValue);
$('.allTotalValue').text(allTotalValue);
});



if(todaysTotalValue <= 0) {
	todaysTotalValue = 0;
	$('.todaysTotalValue').text(todaysTotalValue);
	$('.allTotalValue').text(allTotalValue);
}






});