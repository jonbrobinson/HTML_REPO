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
			<input id="email_to" name="EMto" type="email" placeholder="Recepient">
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
			<label>Would you like to send a copy of your email to yourself?</label>
			<input type="checkbox" name="save_email" checked="checked">
		</p>
		<p>
	        <button type="submit">Send</button>
	    </p>
	</form>

</body>
</html>
	<form>
		<h3>Multiple Choice Test</h3>
			<p>Who will win the NBA Championship?</p>
			<p>
				<label for="team1">
					<input type="radio" id="team1" name="team" value="Heat">
					Heat
				</label>
				<label for="team2">
					<input type="radio" id="team2" name="team" value="Spurs">
					Spurs
				</label>
				<label for="team3">
					<input type="radio" id="team3" name="team" value="Pacers">
					Pacers
				</label>
				<label for="team4">
					<input type="radio" id="team4" name="team" value="Thunder">
					Thunder
				</label>
			</p>
			<p>What is the Best Luxury Car?</p>
			<p>
				<label for="car1">
					<input type="radio" id="car1" name="car" value="Audi">
					Audi
				</label>
				<label for="car2">
					<input type="radio" id="car2" name="car" value="BMW">
					BMW
				</label>
				<label for="car3">
					<input type="radio" id="car3" name="car" value="Lexus">
					Lexus
				</label>
				<label for="car4">
					<input type="radio" id="car4" name="car" value="Mercedes">
					Mercedes
				</label>
			</p>
			<p>
	        	<button type="submit">Submit</button>
	    	</p>
	</form>