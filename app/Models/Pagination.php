<?php
/*
*
*	Core PHP Pagination
*/
class Pagination extends Database {

	private $page;
	private $pages;
	private $numRows;
	private $links = [];
	public $perPage;
	public $offset;
		//Set parameters for Pagination
	public function setParams($f3,$page,$perPage = 10) {
		$this->numOfRows();
		$this->page = $page;
		$this->perPage = $perPage; 
		$this->offset = ($this->page > 1) ? ($this->page * $this->perPage) - $this->perPage : 0;
		$this->pages = ceil($this->numRows/$this->perPage);
	}
		//Get number of rows
	public function numOfRows () {

		$sql = "SELECT count(*) FROM entries";
		$rows = $this->db->prepare($sql);
		try {
			$rows->execute();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return $this->numRows =  $rows->fetchColumn();

	}
		//Generate links
	public function createLinks($f3) {

		for ($i = max(1,$this->page - 5); $i <= min($this->page + 5,$this->pages) ; $i++) { 
			array_push($this->links, $i);
		}
		return $this->links;
	}
}