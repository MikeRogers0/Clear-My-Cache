<!doctype html> 
<html lang="en"> 
<head>
	<meta charset="UTF-8"> 
	<title>Clear My Cache - Installer</title>
</head>
<body>
<?php # this page installs the database.

// Get the pages variables set up
require('../inc/init.inc.php');

echo '<h1>Installing</h1><ul>';

// Clean up any spare sessions
echo '<li>Clearing up sessions.</li>';

echo '<li>Connecting &amp; creating the Database</li>';

// Connect to the database
$db = new db('mysql:host='.db_host.';',db_username,db_password); 

// Create the Database
$db->createDatabase(db_database);

// Turn on error warnings.
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 

// Install the database structure - TODO improve database.
echo '<li>Building database Structure</li>';
$db->exec('

CREATE TABLE  '.$db->tableName('browser').' (
`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Browser` VARCHAR( 255 ) NOT NULL ,
`Platform` VARCHAR( 255 ) NOT NULL ,
`Browser_MajorVer` INT NOT NULL DEFAULT 0,
`Browser_HowTo` TEXT NOT NULL ,
`Browser_worked` INT NOT NULL DEFAULT 0,
`Browser_failed` INT NOT NULL DEFAULT 0,
`Browser_lastUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB CHARACTER SET utf16 COLLATE utf16_swedish_ci;

CREATE TABLE  '.$db->tableName('platform').' (
`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Platform` VARCHAR( 255 ) NOT NULL ,
`Platform_HowTo` TEXT NOT NULL ,
`Platform_worked` INT NOT NULL DEFAULT 0 ,
`Platform_failed` INT NOT NULL DEFAULT 0,
`Platform_lastUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB CHARACTER SET utf16 COLLATE utf16_swedish_ci;
');

echo '<li>Adding database contents</li>'; // This is a quick dump of main stuff. No how-to right now.
	echo '<ul>';
	echo '<li>Adding Platforms</li>';
	$platforms = array('Windows', 'Mac');
	
	foreach($platforms as $platform){
		$values = array('Platform' => $platform);	
		$db->prepare('INSERT INTO '.$db->tableName('platform').' '.$db->insert($values).';')
			->execute($db->bind($values));
	}
	
	echo '<li>Adding Browsers</li>';
	$browsers = array('Chrome', 'Firefox', 'Opera', 'IE', 'Safari');
	
	foreach($browsers as $browser){
		foreach($platforms as $platform){
			$values = array('Platform' => $platform, 'Browser'=>$browser);	
			$db->prepare('INSERT INTO '.$db->tableName('browser').' '.$db->insert($values).';')
				->execute($db->bind($values));
		}
	}
	
	echo '</ul>';

echo '</ul>';
echo '<p>Install finished. </p>
<p>Its a good idea to delete this file (or hide it) so your website is not reinstalled.</p>';
?>
</body>
</html>
