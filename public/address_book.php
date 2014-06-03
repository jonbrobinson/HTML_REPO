<?php
	var_dump($_POST);

	$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
	];

	$filename = "address_book.csv";

	function write_csv($bigArray,$filename){
		if(is_writable($filename)){
		$handle = fopen($filename, 'w');
			foreach ($bigArray as $fields){
				fputcsv($handle,$fields);
			}
			fclose($handle);
		}
	}

	if(!empty($_POST)){
		$new_address = [];
		foreach ($_POST as $key => $value) {
			$new_address[] = $value;
		}
		array_push($address_book,$new_address);
		write_csv ($address_book,$filename);
	}
?>
<html>
<head>
	<title>Address_Book</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($address_book as $fields) :?>
				<tr>
					<? foreach ($fields as $values) :?>
					<td><?= $values; ?></td>
					<? endforeach; ?>
				</tr>
			<? endforeach; ?>

		</tbody>
	</table>
	<form method="POST">
		<p>
			<label for="name">Name</label>
			<input id="name" name="name" type="text" placeholder="Full Name">
		</p>
		<p>
			<label for="address">Address</label>
			<input id="address" name="address" type="text" placeholder="Address">
		</p>
		<p>
			<label for="city">City</label>
			<input id="city" name="city" type="text" placeholder="City">
		</p>
		<p>
			<label for="state">State</label>
			<input id="state" name="state" type="text" placeholder="State">
		</p>
		<p>
			<label for="zipcode">Zipcode</label>
			<input id="zipcode" name="zipcode" type="text" placeholder="Zipcode">
		</p>
		<p>
			<label for="phone">Phone</label>
			<input id="phone" name="phone" type="text" placeholder="Phone Number">
		</p>
		<p>
			<button type="submit">Submit Informaition</button>
		</p>
	</form>

</body>
</html>