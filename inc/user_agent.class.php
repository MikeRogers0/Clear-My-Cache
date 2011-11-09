<?php
# based on http://www.php.net/manual/en/function.get-browser.php#101125 - was hoping to use get_browser() function, but turned out to be unreliable ಠ_ಠ

class user_agent{
	public $ua, $b, $os, $browsersList;
	
	// Define the default variables. 
	public function __construct(){
		$this->ua = $_SERVER['HTTP_USER_AGENT'];
		$this->b = array('name'=>'Unknown', 'ua_name'=>'unknown', 'version'=>'0.0', 'majorVersion'=>'0');
		$this->os = array('name' => 'Unknown', 'version'=>'10.7');
		$this->browsersList = array('MSIE'=>'Internet Explorer', 'Firefox'=>'Mozilla Firefox', 'Chrome'=>'Google Chrome', 'Safari' => 'Apple Safari', 'Opera'=>'Opera', 'Netscape'=>'Netscape');
	}
	
	
	public function setBrowser(){
	
		// Figure out the browser type
		foreach($this->browsersList as $ua_name => $name){
			if(preg_match('/'.$ua_name.'/i',$this->ua)){ 
	        	$this->b['name'] = $name; 
	        	$this->b['ua_name'] = $ua_name;
	        	break;
	    	}
		}
		
		// Now get the version number
	    $known = array('Version', $this->b['ua_name'], 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $this->ua, $matches)) {
	        // we have no matching number just continue
	    }
	    
	    // see how many we have
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        //we will have two since we are not using 'other' argument yet
	        //see if version is before or after the name
	        if (strripos($this->ua,"Version") < strripos($this->ua,$this->b['ua_name'])){
	            $this->b['version']= $matches['version'][0];
	        }else {
	            $this->b['version']= $matches['version'][1];
	        }
	    }else {
	        $this->b['version']= $matches['version'][0];
	    }
	    
	    preg_match('/([0-9]+)/i', $this->b['version'], $matches);
	    $this->b['majorVersion'] = $matches[0];
	    
	    return $this;
	}
	
	public function setOS(){
		if(preg_match('/linux/i', $this->ua)) {
	        $this->os['name'] = 'Linux';
	    }elseif (preg_match('/macintosh|mac os x/i', $this->ua)) {
	        $this->os['name'] = 'Mac';
	    }elseif (preg_match('/windows|win32/i', $this->ua)) {
	        $this->os['name'] = 'Windows';
	    }
	    
	    return $this;
	}
}
?>