<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jQuery UI Datepicker - Display month &amp; year menus</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css">
		body {
	font-family: Arial, Helvetica, sans-serif;
}

table {
	font-size: 1em;
}

.ui-draggable, .ui-droppable {
	background-position: top;
}
	</style>
	<script>
	$( function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            defaultDate: new Date(),
            yearRange: "-100:+0"
		});
	} );
	</script>

</head>
<body>

<p>Date: <input type="text" id="datepicker"></p>


</body>
</html>