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
`Browser_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Browser_Name` VARCHAR( 255 ) NOT NULL ,
`Platform_ID` int NOT NULL DEFAULT 0,
`Browser_MajorVer` INT NOT NULL DEFAULT 0,
`Browser_HowTo` TEXT NOT NULL ,
`Browser_worked` INT NOT NULL DEFAULT 0,
`Browser_failed` INT NOT NULL DEFAULT 0,
`Browser_lastUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB CHARACTER SET utf16 COLLATE utf16_swedish_ci;

CREATE TABLE  '.$db->tableName('platform').' (
`Platform_ID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Platform_Name` VARCHAR( 255 ) NOT NULL ,
`Platform_HowTo` TEXT NOT NULL ,
`Platform_worked` INT NOT NULL DEFAULT 0 ,
`Platform_failed` INT NOT NULL DEFAULT 0,
`Platform_lastUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB CHARACTER SET utf16 COLLATE utf16_swedish_ci;
');

echo '<li>Adding database contents</li>'; // This is a quick dump of main stuff. No how-to right now.
	echo '<ul>';
	echo '<li>Adding Platforms</li>';
	$platforms = array(1=>'Windows', 2=>'Mac');
	
	foreach($platforms as $platform){
		$values = array('Platform_Name' => $platform, 'Platform_HowTo' => '<ul>
						<li class="step">
							<h4>Step 1.</h4>
							<div class="details">
								<p>
									Open Terminal<br />
									Press <strong>cmd + shift + backspace</strong> together
								</p>
							</div>
						</li>
						<li class="step">
							<h4>Step 2.</h4>
							<div class="details">
								<p>
									Select time range to <strong>Everything</strong> or desired time range. We also recommend selecting Cookies. And click <strong>Clear Now</strong>.
								</p>
							</div>
						</li>
					</ul>');	
		$db->prepare('INSERT INTO '.$db->tableName('platform').' '.$db->insert($values).';')
			->execute($db->bind($values));
	}
	
	echo '<li>Adding Browsers</li>';
	$browsers = array('Chrome', 'Firefox', 'Opera', 'IE', 'Safari');
	
	foreach($browsers as $browser_name){
		foreach($platforms as $platform_id => $platform_name){
			$values = array('Platform_ID' => $platform_id, 'Browser_Name'=>$browser_name, 'Browser_HowTo' => '<ul>
						<li class="step">
							<h4>Step 1.</h4>
							<div class="details">
								<p>
									Open Firefox<br />
									Press <strong>cmd + shift + backspace</strong> together
								</p>
							</div>
						</li>
						<li class="step">
							<h4>Step 2.</h4>
							<div class="details">
								<p>
									Select time range to <strong>Everything</strong> or desired time range. We also recommend selecting Cookies. And click <strong>Clear Now</strong>.
								</p>
								<p>	
									<img src="/assets/img/firefox.clear.history.png" alt="Image showing the clear cache/history modal window" />
								</p>
							</div>
						</li>
						<li class="step">
							<h4>Step 3.</h4>
							<div class="details">
								<p>Restart Firefox.</p>
							</div>
						</li>
					</ul>');	
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
