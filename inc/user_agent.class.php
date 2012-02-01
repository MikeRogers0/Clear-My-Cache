<?php
class user_agent{
	public $browscap, $ua, $db_info;
	
	// Define the default variables. 
	public function __construct($data=null){
		
		$this->browscap = new Browscap(cache_dir);
		$this->db_info = array(
			'Browser'=>'Unknown', 'Browser_MajorVer'=>'Unknown', 'Browser_HowTo'=>false,'Browser_worked'=>0, 'Browser_failed'=>0, 
			'Platform'=>'Unknown', 'Platform_HowTo'=>false,'Platform_worked'=>0, 'Platform_failed'=>0 
		);
		
		// List of different platforms converting them to main OS.
		$this->platforms = array('MacOSX'=>'Mac', 'MacPPC'=>'Mac', 'Linux'=>'Linux');
		
		// Set the browser / OS info and set how to.
		$this->setData($data)->setHowTo();
	}
	
	// Set the browser/os data based on the useragent (via browscap) or from what the $data is set.
	public function setData($data=null){
		$this->ua = $data;
		if($data === null){
			$this->ua = $this->browscap->getBrowser(null, true);
		}
		
		// Quickly tidy up the platform names.
		$this->setPlatform();
		
		return $this;
	}
	
	public function setPlatform(){
		// Backup detailed platform incase we want to use it.
		$this->ua['Platform_detailed'] = $this->ua['Platform'];
		
		// Lets assume the main platform is Windows.
		$this->ua['Platform'] = 'Windows';
		
		// If the detailed platform is in the list, convert it.
		if(isset($this->platforms[$this->ua['Platform_detailed']])){
			$this->ua['Platform'] = $this->platforms[$this->ua['Platform_detailed']];
		}
		
	}
	
	public function setHowTo(){
		global $db;
		// Do a DB lookup.
		
		$query = $db->prepare('SELECT * FROM '.$db->tableName('browser').' 
			RIGHT JOIN  '.$db->tableName('platform').' ON  '.$db->tableName('browser').'.`Platform_ID` = '.$db->tableName('platform').'.`Platform_ID`
			WHERE '.$db->tableName('browser').'.`Browser_Name` = :Browser 
			AND '.$db->tableName('browser').'.`Browser_MajorVer` <= :Browser_MajorVer
			AND '.$db->tableName('platform').'.`Platform_Name` = :Platform_Name
			ORDER BY '.$db->tableName('browser').'.`Browser_MajorVer`
			DESC;');
		$query->execute(array(':Browser' => $this->ua['Browser'], ':Browser_MajorVer' => (int) $this->ua['MajorVer'], ':Platform_Name'=>$this->ua['Platform']));
		
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		
		var_dump($result);
		
		// If we have a result
		if($result){
			$this->db_info = $result;
		}
		
		return $this;
	}
}
?>