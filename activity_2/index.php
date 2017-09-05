<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Activity 2</title>
</head>
<body>
	<h1>Hello <span id="newname">Bob</span></h1>

	<label for="name">Enter name: </label>
	<input type="text" id="name">
	<button>Change User</button>
</body>
<script>
	var name = document.querySelector('span');
	document.querySelector('button').onclick = function(){
		document.getElementById('newname').innerHTML = document.getElementById('name').value;
	}
</script>
</html>