<?php
class platform{

	public function __construct($Platform_ID=null){
		if(!isset($this->Platform_ID)){
			// Set the default variables.
			foreach(array('Platform_ID', 'Platform_Name', 'Platform_HowTo', 'Platform_worked', 'Platform_failed', 'Platform_lastUpdated') as $key){
				$this->$key = false;
			}
		}
	
		// If we have an ID, if we have it set this to it's values.
		if(is_numeric($Platform_ID)){
			global $db;
		
			$where = array('Platform_ID'=>$Platform_ID);
			
			$query = $db->prepare('SELECT * FROM '.$db->tableName('platform').' 
			'.$db->where($where).' 
			ORDER BY '.$db->tableName('platform').'.`Platform_ID` DESC 
			LIMIT 0,1;');
			$query->execute($where);
			
			foreach($query->fetch() as $key => $value){
				if(isset($this->$key)){
					$this->$key = $value;
				}
			}
		}
	}
	
	public static function getPlatforms(){
		global $db;
		$query = $db->prepare('SELECT * FROM '.$db->tableName('platform').'  
		ORDER BY '.$db->tableName('platform').'.`Platform_ID` ASC;');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'platform');
	}
	
	public static function add($Platform_Name, $Platform_HowTo){
		global $db;
		
		$values = array('Platform_Name' => $Platform_Name, 'Platform_HowTo'=>$Platform_HowTo);
		
		$db->prepare('INSERT INTO '.$db->tableName('platform').' '.$db->insert($values).';')
			->execute($db->bind($values));
		
		// Now get the new entry:
		$query = $db->prepare('SELECT * FROM '.$db->tableName('platform').'
		'.$db->where($values).' 
		ORDER BY '.$db->tableName('platform').'.`Platform_ID` DESC LIMIT 0,1;');
		$query->execute($values);
		return $query->fetchObject('platform');
	}
	
	public function update(){
		global $db;
		
		$where = array('Platform_ID'=>$this->Platform_ID);
		
		// Cycle through & put fields into array.
		foreach($this as $key => $value){
			if($key == 'Platform_ID'){continue;}
			$values[$key] = $value;
		}
		
		
		$db->prepare('UPDATE '.$db->tableName('platform').' '.$db->update($values).' '.$db->where($where).';')
			->execute($db->bind(array_merge($values, $where)));
	}
	
	public function delete(){
		global $db;
		
		$where = array('Platform_ID'=>$this->Platform_ID);
		
		$db->prepare('DELETE FROM '.$db->tableName('platform').' '.$db->where($where).';')
			->execute($db->bind($where));
			
		// Set all the local variables to false
		foreach($this as $key => $value){
			$this->$key = false;
		}
	}
	
	public function editURL(){
		return '<a href="?mode=manage-platform&id='.$this->Platform_ID.'">Edit</a>';
	}
	
	public function deleteURL(){
		return '<a href="?mode=manage-platform&delete=true&id='.$this->Platform_ID.'">Delete</a>';
	}
}
?>