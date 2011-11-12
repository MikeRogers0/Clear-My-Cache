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
$addForm = new form();

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="css/style.css">
  <!-- end CSS-->

  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div id="container">
    <header>

    </header>
    <div id="main" role="main">
    
    <ul>
    	<li><a href="?">Overview</a></li>
    	<li><a href="?mode=add-browser">Add Browser</a></li>
    	<li><a href="?mode=add-platform">Add Platform</a></li>
    </ul>
    
    <h2>Platform Overview</h2>
    
    	<table>
    		<thead>
    			<tr>
    				<th>Platform</td>
    				<th>Last Updated</th>
    				<th>Edit</th>
    				<th>Delete</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php
	    		// Do a quick query to pull up the data.
	    		$platforms = platform::getPlatforms();
	    		
	    		foreach($platforms as $platform){ ?>
    			 <tr>
    			 	<td><?php echo $platform->Platform; ?></td>
    			 	<td><?php echo $platform->Platform_lastUpdated; ?></td>
    			 	<td><?php echo $platform->editURL(); ?></td>
    			 	<td><?php echo $platform->deleteURL(); ?></td>
    			 </tr>
				<?php	} ?>
    		</tbody>
    	</table>
    
    <h2>Browser Overview</h2>
    
    	<table>
    		<thead>
    			<tr>
    				<th>Browser</td>
    				<th>Major Version</th>
    				<th>Platform</th>
    				<th>Last Updated</th>
    				<th>Edit</th>
    				<th>Delete</th>
    			</tr>
    		</thead>
    		<tbody>
    
    	<?php
    		// Do a quick query to pull up the data.
    		$browsers = browser::getBrowsers();
    		
    		foreach($browsers as $browser){ ?>
    			 <tr>
    			 	<td><?php echo $browser->Browser; ?></td>
    			 	<td><?php echo $browser->Browser_MajorVer; ?></td>
    			 	<td><?php echo $browser->Platform; ?></td>
    			 	<td><?php echo $browser->Browser_lastUpdated; ?></td>
    			 	<td><?php echo $browser->editURL(); ?></td>
    			 	<td><?php echo $browser->deleteURL(); ?></td>
    			 </tr>
		<?php	} ?>
    </tbody>
    </table>
    
    <h2>Extra Notes</h2>
    <ul>
    	<li>If browser major version == 0, it means default. This will be used if a more accurate browser can't be found.</li>
    </ul>
    </div>
    <footer>
    
    </footer>
  </div> <!--! end of #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts-->


  <script> // Change UA-XXXXX-X to be your site's ID
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>