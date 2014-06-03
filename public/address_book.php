<?php
	var_dump($_POST);

	$address_book = [];

	$famous_address = [
	    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
	    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
	    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
	];

	$address_book = array_merge($address_book,$famous_address);

	$filename = "address_book.csv";

	function write_csv($big_array,$filename){
		$handle = fopen($filename, 'w');
			foreach ($big_array as $fields){
				fputcsv($handle,$fields);
			}
			fclose($handle);
	}

	$isValid = false;
	if(!empty($_POST['name'])&& !empty($_POST['address'])&& !empty($_POST['city'])&& !empty($_POST['state'])&& !empty($_POST['zipcode'])){
		$isValid = true;
		if(!empty($_POST['phone'])){
			$new_address = [];
			foreach ($_POST as $value) {
			$new_address[] = $value;
			}
			array_push($address_book,$new_address);
		} else {
			$new_address = [];
			foreach ($_POST as $value) {
			$new_address[] = $value;
			}
			array_pop($new_address);
			array_push($address_book,$new_address);
		}
	}
	write_csv ($address_book,$filename);

?>
<html>
<head>
	<title>Address_Book</title>
</head>
<body>
	<table border="1">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Phone</th>
			</tr>
			<? foreach ($address_book as $fields) :?>
			<tr>
				<? foreach ($fields as $values) :?>
				<td><?= $values; ?></td>
				<? endforeach; ?>
			</tr>
			<? endforeach; ?>
	</table>
	<? if ((!$isValid) && (!empty($_POST))) :?>
	<h2>Error: Please enter Required fields</h2>
	<? endif; ?>
	<form method="POST">
		<p>
			<label for="name">Name</label>
			<input id="name" name="name" type="text" placeholder="Required">
		</p>
		<p>
			<label for="address">Address</label>
			<input id="address" name="address" type="text" placeholder="Required">
		</p>
		<p>
			<label for="city">City</label>
			<input id="city" name="city" type="text" placeholder="Required">
		</p>
		<p>
			<label for="state">State</label>
			<input id="state" name="state" type="text" placeholder="Required">
		</p>
		<p>
			<label for="zipcode">Zipcode</label>
			<input id="zipcode" name="zipcode" type="text" placeholder="Required">
		</p>
		<p>
			<label for="phone">Phone</label>
			<input id="phone" name="phone" type="text" >
		</p>
		<p>
			<button type="submit">Submit Informaition</button>
		</p>
	</form>

</body>
</html>