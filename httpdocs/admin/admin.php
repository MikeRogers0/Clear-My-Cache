<?php
// TODO - Secure up this page.

// Get the pages variables set up
require('../../inc/init.inc.php');
require('../../inc/admin/admin.inc.php');

// Connect to the database, if it fails leta assume the database isn't installed
try {
	$db = new db('mysql:host='.db_host.';dbname='.db_database,db_username,db_password);
}catch (Exception $e) {
    die('<h1>Need to Install</h1><p>The database is not installed. <a href="install.php">Visit the installer to install it.</a></p>');
}
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); // Turn on db errors, so we can debug.

// Set up the classes.
$notices = new notices();

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Clear my Cache - Admin</title>

  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/admin/admin.css">

  <script src="/js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div id="container">
    <header>
	<h1>CMC - Admin</h1>
    </header>
    <nav id="core">
	    <ul>
	    	<li><a href="?">Overview</a></li>
	    	<li><a href="?mode=manage-browser">Add Browser</a></li>
	    	<li><a href="?mode=manage-platform">Add Platform</a></li>
	    </ul>
    </nav>
    
    <div id="main" role="main">
	<?php
	if(!isset($_GET['mode'])){
		$_GET['mode'] = null;
	}
	if(!isset($_GET['id'])){
		$_GET['id'] = null;
	}
	
	switch($_GET['mode']){
		case 'manage-platform': 
			$platform = new platform($_GET['id']);
			include(admin_inc.'/modes/manage-platform.view.php');
		break;
		case 'manage-browser': 
			$browser = new browser($_GET['id']);
			include(admin_inc.'/modes/manage-browser.view.php');
		break;
		default: include(admin_inc.'/modes/overview.view.php');
	}
	
	?>
   
    </div>
    <footer>
    
    </footer>
  </div> <!--! end of #container -->
  
</body>
</html>