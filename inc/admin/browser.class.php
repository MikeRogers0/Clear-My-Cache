<?php
class browser{
	
	public function __construct($Browser_ID=null){
		if(!isset($this->Browser_ID)){
			// Set the default variables.
			foreach(array('Browser_ID', 'Browser_Name', 'Browser_MajorVer', 'Browser_HowTo', 'Platform_ID', 'Browser_worked', 'Browser_failed', 'Browser_lastUpdated') as $key){
				$this->$key = false;
			}
		}
	
		// If we have an ID, if we have it set this to it's values.
		if(is_numeric($Browser_ID)){
			global $db;
		
			$where = array('Browser_ID'=>$Browser_ID);
			
			$query = $db->prepare('SELECT * FROM '.$db->tableName('browser').' 
			'.$db->where($where).' 
			ORDER BY '.$db->tableName('browser').'.`Browser_ID` DESC 
			LIMIT 0,1;');
			$query->execute($where);
			
			foreach($query->fetch() as $key => $value){
				if(isset($this->$key)){
					$this->$key = $value;
				}
			}
		}
	}
	
	public static function getBrowsers(){
		global $db;
		$query = $db->prepare('SELECT * FROM '.$db->tableName('browser').' 
		LEFT JOIN  '.$db->tableName('platform').' ON  '.$db->tableName('browser').'.`Platform_ID` = '.$db->tableName('platform').'.`Platform_ID`
		ORDER BY '.$db->tableName('browser').'.`Browser_ID` ASC;');
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'browser');
	}
	
	public static function add($Browser_Name, $Browser_HowTo, $Browser_MajorVer, $Platform_ID){
		global $db;
		
		$values = array('Browser_Name' => $Browser_Name, 'Browser_HowTo'=>$Browser_HowTo, 'Browser_MajorVer'=>$Browser_MajorVer, 'Platform_ID'=> $Platform_ID);	
		$db->prepare('INSERT INTO '.$db->tableName('browser').' '.$db->insert($values).';')
			->execute($db->bind($values));
		
		// Now get the new entry:
		$query = $db->prepare('SELECT * FROM '.$db->tableName('browser').'
		'.$db->where($values).' 
		ORDER BY '.$db->tableName('browser').'.`Browser_ID` DESC LIMIT 0,1;');
		$query->execute($values);
		return $query->fetchObject('browser');
	}
	
	public function update(){
		global $db;
		
		$where = array('Browser_ID'=>$this->Browser_ID);
		
		// Cycle through & put fields into array.
		foreach($this as $key => $value){
			if($key == 'Browser_ID'){continue;}
			$values[$key] = $value;
		}
		
		$db->prepare('UPDATE '.$db->tableName('browser').' '.$db->update($values).' '.$db->where($where).';')
			->execute($db->bind(array_merge($values, $where)));
	}
	
	public function delete(){
		global $db;
		
		$where = array('Browser_ID'=>$this->Browser_ID);
		
		$db->prepare('DELETE FROM '.$db->tableName('browser').' '.$db->where($where).';')
			->execute($db->bind($where));
			
		// Set all the local variables to false
		foreach($this as $key => $value){
			$this->$key = false;
		}
	}
	
	public function editURL(){
		return '<a href="?mode=manage-browser&id='.$this->Browser_ID.'">Edit</a>';
	}
	
	public function deleteURL(){
		return '<a href="?mode=manage-browser&delete=true&id='.$this->Browser_ID.'">Delete</a>';
	}
}
?>