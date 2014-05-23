<!Doctype>
<html>
<head>
	<title>My First HTML Form</title>
</head>
<body>
	<?php
		echo "<h4>GET</h4>";
		var_dump($_GET);
		echo "<br><br>";
		echo "<h4>POST</h4>";
		var_dump($_POST);
	?>

	<form method="POST" >
	    <p>
	        <label for="username">Username</label>
	        <input id="username" name="username" type="text" placeholder="Username">
	    </p>
	    <p>
	        <label for="password">Password</label>
	        <input id="password" name="password" type="password" placeholder="Username">
	    </p>
	    <p>
	        <button type="submit" >Login</button>
	        <button type="reset">Reset</button>
	    </p>
	</form>

</body>
</html>