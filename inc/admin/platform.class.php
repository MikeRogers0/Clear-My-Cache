<?php
class platform{
	public $ID;
	
	public static function getPlatforms(){
		global $db;
		$query = $db->prepare('SELECT * FROM '.$db->tableName('platform').'  ORDER BY '.$db->tableName('platform').'.`ID` DESC;');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS, 'platform');
	}
	
	public function editURL(){
		return '<a href="?mode=edit-platform&id='.$this->ID.'">Edit</a>';
	}
	
	public function deleteURL(){
		return '<a href="?mode=delete-platform&id='.$this->ID.'">Delete</a>';
	}
}
?>