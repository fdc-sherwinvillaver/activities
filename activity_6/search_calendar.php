<html>
<head>
	<title>Calendar</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>
<body>
<br><br>
<div class="container">
	<form method="POST" id="frmCalendar">
		<label for="Month">Month</label>
		<select name="month" id="month">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
		<label for="year" >Year</label>
		<input type="text" name="year" id="year">
		<button type="submit" name="btnSumbit">Search</button>
	</form>
</div>
<div id="show" class="container">
</div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){


		$('#frmCalendar').on('submit',function(e){
			e.preventDefault();
			$.ajax({
				type:"POST",
				url:"calendar.php",
				data: $("#frmCalendar").serialize(),
				success: function(data){
					$('#show').html(data);
				}
			});
		});

		var year = $('#year').val();

		if(year == ''){
			var d = new Date();
		    var n = d.getMonth();
		    var y = d.getFullYear();

			$.ajax({
				type:"POST",
				url:"calendar.php",
				data: {month: n, year: y},
				success: function(data){
					$('#show').html(data);
				}
			});
		}
	});
</script>
</html>