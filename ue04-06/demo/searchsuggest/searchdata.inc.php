<?php

class SearchData {
	private $titles;
	
	function __construct() {
		$this->titles = array("Die FH", "HM2", "FH", "Hagenberg", "jQuery", "Medientechnik und -design", "MTD15", "MTD", "PHP", "JavaScript", "Österreich", "Bla", "Gut/Böse");
	}
	
	public function getTitles() {
		return $this->titles;
	}
}