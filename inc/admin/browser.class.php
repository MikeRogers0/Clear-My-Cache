<?php
class browser{
	public $ID;
	
	public static function getBrowsers(){
		global $db;
		$query = $db->prepare('SELECT * FROM '.$db->tableName('browser').'  ORDER BY '.$db->tableName('browser').'.`ID` DESC;');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS, 'browser');
	}
	
	public function editURL(){
		return '<a href="?mode=edit-browser&id='.$this->ID.'">Edit</a>';
	}
	
	public function deleteURL(){
		return '<a href="?mode=delete-browser&id='.$this->ID.'">Delete</a>';
	}
}
?>