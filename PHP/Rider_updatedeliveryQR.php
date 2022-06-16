<?php
if (session_id() == '' || !isset($_SESSION)) {
	session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>
    <link rel="stylesheet" href="CSS/ridercommission.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript">
		function generateBarCode() {
			var nric = "(link website)/foody/rider/updatedelivery.php?Order_ID=<?php echo $_POST['Order_ID'] ?>";			var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
			$('#barcode').attr('src', url);
		}
	</script>
</head>

<body onload="generateBarCode()">
<div class="container pt-5">
    
	<div class="text-center">
		<h2>Delivery Confirmation</h2>
	</div>

	<div class="text-center">
		<div class="qr">
			<img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt="" title="HELLO" margin-left: auto; margin-right: auto; width="300" height="300" />
		</div>
        <form action="Rider_history.php"><button type="submit" class="button" style="width:20%;">Back</button></form>
	</div>
</div>

</body>

</html>