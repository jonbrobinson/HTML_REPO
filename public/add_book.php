<?php

$addressBook = [];
$errorMessage = '';

class AddressDataStore {

    public $filename = '';

    public function __construct($filename){
    	$this->filename = $filename;
    }

    public function readAddressBook()
    {

        $addresses = [];
        $handle = fopen($this->filename, "r");
        while(!feof($handle)){
        	$row = fgetcsv($handle);
        	if(is_array($row)){
        		$addresses [] = $row;
        	}
        }
        fclose($handle);
        return $addresses;
    }

    public function writeAddressBook($addresses)
    {
        if (is_writable($this->filename)){
        	$handle = fopen($this->filename, "w");
        	foreach ($addresses as $entries) {
        		fputcsv($open, $entries);
        	}
        	fclose($handle);
    	}
    }

}

$ads = new AddressDataStore('address_book.csv');
//$ads->filename = 'address_book.csv';

$addressBook = $ads->readAddressBook();

if (!empty($_POST))
{
	// we must be trying to add a new address
	if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty(['zipcode']))
	{
		// validation success
		$newAddress = [];
		$newAddress['name'] = $_POST['name'];
		$newAddress['address'] = $_POST['address'];
		$newAddress['city'] = $_POST['city'];
		$newAddress['state'] = $_POST['state'];
		$newAddress['zipcode'] = $_POST['zipcode'];
		if(empty($_POST['phone'])){
			$newAddress['phone'] = "N/A";
		} else {
			$newAddress['phone'] = $_POST['phone'];
		}
		$addressBook[] = $newAddress;

		// save the address book
		$ads->writeAddressBook($addressBook);
	}
	else
	{
		// validation failed
		$errorMessage = "Validation failed. Please complete all fields.";
	}
}
var_dump($_FILES);
// Verify there were uploaded files and no errors
if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {

    if ($_FILES['file1']["type"] != "text/csv") {
        echo "ERROR: file must be in text/csv!";
    } else {
        // Set the destination directory for uploads
        // Grab the filename from the uploaded file by using basename
        $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
        $uploadFilename = basename($_FILES['file1']['name']);
        // Create the saved filename using the file's original name and our upload directory
        $saved_filename = $upload_dir . $uploadFilename;
        // Move the file from the temp location to our uploads directory
        move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

        // load the new todos
        // merge with existing list
        $ups = new AddressDataStore($saved_filename);
        $address_uploaded = $ups->readAddressBook();
        $addressBook = array_marge($addressBook, $address_uploaded);
        var_dump($address_book);
        $ads->writeAddressBook($addressBook);
    }
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Address Book</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<h1>Address Book</h1>
		<? if (!empty($errorMessage)) : ?>
			<p><?=$errorMessage;?></p>
		<? endif; ?>
		<p>
			<table>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Zip</th>
					<th>Phone</th>
				</tr>
				<? foreach ($addressBook as $index => $row) : ?>
					<tr>
						<? foreach ($row as $column) : ?>
							<td><?=$column;?></td>
						<? endforeach; ?>
					</tr>

				<? endforeach; ?>
			</table>
		</p>
			<form action="address_book.php" method="POST">
				<p>
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Requied">
				</p>
				<p>
					<label for="address">Address</label>
					<input type="text" name="address" id="address" placeholder="Required">
				</p>
				<p>
					<label for="address">Address</label>
					<input type="text" name="city" id="city" placeholder="Required">
				</p>
				<p>
					<label for="state">State</label>
					<input type="text" name="state" id="state" placeholder="Required">
				</p>
				<p>
					<label for="zipcode">Zipcode</label>
					<input type="text" name="zipcode" id="zipcode" placeholder="Required">
				</p>
				<p>
					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone">
				</p>
				<p>
				<button type="submit">Submit</button>
				</p>

			</form>
	</body>
</html>