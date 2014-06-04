<?php

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

    public  function __destruct(){
    	echo  "Class dismissed";
    }

}