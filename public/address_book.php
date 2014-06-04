<?php

$address_book = [];
$errorMessage = "";

class AddressDataStore {

    public $filename = '';

    public function __construct($filename){
    	$this->filename = $filename;
    }

    public function read_address_book()
    {
        // Code to read file $this->filename
		$address_book = [];
		$handle = fopen($this->filename, 'r');
		while(!feof($handle)){
			$row = fgetcsv($handle);
			if(is_array($row)){
				$address_book[] = $row;
			}
		}
		fclose($handle);
		return $address_book;
	}

    public function write_address_book($contacts){
    
        $handle = fopen($this->filename, 'w');
		foreach ($contacts as $fields){
			fputcsv($handle,$fields);
		}
		fclose($handle);
    }

}

$ads = new AddressDataStore('address_book.csv');

$address_book = $ads->read_address_book();

if(!empty($_POST)){
	if(!empty($_POST['name'])&& !empty($_POST['address'])&& !empty($_POST['city'])&& !empty($_POST['state'])&& !empty($_POST['zipcode'])){
		$new_address = [];
		foreach ($_POST as $value) {
			$new_address[] = $value;
		}
		if(empty($new_address[5])){
			$new_address[5] = "N/A";
		}
		$address_book[] = $new_address;
		$ads->write_address_book($address_book);
	} else{
		$error_message = "Error: Please Complete All Required fields";
	}
}

?>

<html>
<head>
	<title>Address_Book</title>
</head>
<body>
	<h1>Address Book</h1>
	<? if ((!empty($error_message))) :?>
		<h2><?= $error_message; ?></h2>
	<? endif; ?>
	<table border="1">
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zipcode</th>
				<th>Phone</th>
			</tr>
			<? foreach ($address_book as $key => $rows) :?>
				<tr>
					<? foreach ($rows as $column) :?>
						 <td><?= htmlspecialchars($column); ?></td>
					<? endforeach; ?>
				</tr>
			<? endforeach; ?>
	</table>
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