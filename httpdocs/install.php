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
/*$db->exec('
CREATE TABLE '.$db->tableName('browsers').' (
  `listing_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `status` enum(\'sale\',\'rent\') DEFAULT NULL,
  `price` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `squarefeet` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `modified` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`listing_ID`)
) ENGINE=INNODB;
');*/

echo '<li>Adding database contents</li>';


echo '</ul>';
echo '<p>Install finished. </p>
<p>Its a good idea to delete this file (or hide it) so your website is not reinstalled.</p>';
?>
</body>
</html>
