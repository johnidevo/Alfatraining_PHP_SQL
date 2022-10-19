<?php


namespace Draft\Controller;

class Youtube {
	
	public $sKey;

	public function __construct(){
		$this->sKey = "AIzaSyBQnsqFY61VFgaOm1sdsRh_xlTIEwsyflI";
	}

	public function getItems(){
		$client = new \Google\Client();
		$client->setApplicationName("PHP/MySQL");
		$client->setDeveloperKey($this->sKey);
		$service = new \Google\Service\YouTube($client);
	}
	
	public function dump($s) {
		print '<pre>';
		var_dump($s);
		print '</pre>';
	}
}

?>


