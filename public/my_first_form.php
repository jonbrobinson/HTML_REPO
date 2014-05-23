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
	        <button type="submit">Login</button>
	        <button type="reset">Reset</button>
	    </p>
	</form>
	<form method="POST">
		<h3>Send an Email</h3>
		<p>
			<label for="email_to">To</label>
			<input id="email_to" name="EMto" type="email" placeholder="Recepiant">
		</p>
		<p>
			<label for="email_from">From</label>
			<input id="email_from" name="EMfrom" type="email" placeholder="Sender">
		</p>
		<p>
			<label for="email_subject">Subject</label>
			<input id="email_subject" name="EMsubject" type="text" placeholder="Subject">
		</p>
		<p>
			<textarea id="email_subject" name="EMbody" rows="5" cols="30" placeholder="Enter Content"></textarea>
		</p>
		<p>
	        <button type="submit">Send</button>
	    </p>
	</form>

</body>
</html>