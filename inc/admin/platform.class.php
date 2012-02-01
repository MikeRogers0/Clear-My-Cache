<?php
class platform{
	public $ID;
	
	public static function getPlatforms(){
		global $db;
		$query = $db->prepare('SELECT * FROM '.$db->tableName('platform').'  
		ORDER BY '.$db->tableName('platform').'.`ID` DESC;');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS, 'platform');
	}
	
	public static function get($id){
		global $db;
		
		$where = array('ID'=>$this->id);
		
		$query = $db->prepare('SELECT * FROM '.$db->tableName('platform').' 
		'.$db->where($where).' 
		ORDER BY '.$db->tableName('platform').'.`ID` DESC 
		LIMIT 0,1;');
		$query->execute($where);
		return $query->fetch(PDO::FETCH_CLASS, 'platform');
	}
	
	public static function add($platform_name, $Platform_HowTo){
		global $db;
		
		$values = array('Platform_Name' => $platform_name, 'Platform_HowTo'=>$Platform_HowTo);	
		$db->prepare('INSERT INTO '.$db->tableName('platform').' '.$db->insert($values).';')
			->execute($db->bind($values));
	}
	
	public function update($values){
		global $db;
		
		$where = array('ID'=>$this->id);
		
		$db->prepare('UPDATE '.$db->tableName('platform').' '.$db->update($values).' '.$db->where($where).';')
			->execute($db->bind(array_merge($values, $where)));
	}
	
	public function delete(){
		global $db;
		
		$where = array('ID'=>$this->id);
		
		$db->prepare('DELETE FROM '.$db->tableName('platform').' '.$db->where($where).';')
			->execute($db->bind($where));
	}
	
	public function editURL(){
		return '<a href="?mode=edit-platform&id='.$this->ID.'">Edit</a>';
	}
	
	public function deleteURL(){
		return '<a href="?mode=delete-platform&id='.$this->ID.'">Delete</a>';
	}
}
?>