<?php
// Get the pages variables set up
require('inc/init.inc.php');

// Connect to the database, if it fails leta assume the database isn't installed
try {
	$db = new db('mysql:host='.db_host.';dbname='.db_database,db_username,db_password);
}catch (Exception $e) {
    die('<h1>Need to Install</h1><p>The database is not installed. <a href="install.php">Visit the installer to install it.</a></p>');
}
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); // Turn on db errors, so we can debug.

// If the user wants to see a different browser.
$data = null;
if( isset($_GET['Browser']) && isset($_GET['majorVer']) && isset($_GET['Platform']) ){
	$data = array('Browser'=>$_GET['Browser'], 'majorVer' => $_GET['majorVer'], 'Platform' => $_GET['Platform']);
}

// Get the users agen & pull the howto.
$user_agent = new user_agent($data);

//var_dump($user_agent->ua, $user_agent->db_info);


	$good = array(
		"Get in!",
		"Winning!",
		"Awesomes!",
		"Good choice!",
		"Nice!",
		"Fancy Pants!",
		"Check you Out!",
		"Ooh La La!",
	);

	$bad = array(
		"Yikes!",
		"Bad choice!",
	);

	$os = strtolower(isset($_GET["os"]) ? $_GET["os"] : $user_agent->ua['Platform']); # Lower case, no formatting.
	$browser_vendor = strtolower(isset($_GET["browser"]) ? $_GET["browser"] : $user_agent->ua['Browser']); # Lower case, no formatting.
	$browser_version = isset($_GET["version"]) ? $_GET["version"] : 'v'.$user_agent->ua['MajorVer']; # Used on body class, needs to be prefixed with a 'v' otherwise invalid (can't start with a number)

	$friendly_browser_version = str_replace(array("v", "-"),
											array("", "."),
											$browser_version);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title>Clear My Cache</title>

	<link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/assets/css/wide.css" media="screen and (min-width:1281px)" />
	<link rel="stylesheet" type="text/css" href="/assets/css/thin.css" media="screen and (max-width:960px)" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body id="home" class="<?php echo $os; ?> <?php echo $browser_vendor; ?> <?php echo $browser_version; ?>">
	<header id="mast">
		<div class="sleeve">
			<h1><a href="/" id="logo"><span>Clear My Cache</span></a></h1>
		</div>
	</header>
	<section id="what_am_i">
		<hgroup>
			<h2>Hello <?php echo ucfirst($os); ?> User!</h2>
			<h3>You&rsquo;re using <?php echo $browser_vendor; ?> <?php echo $friendly_browser_version; ?>, <?php echo $good[rand(0, count($good)-1)] ?></h3>
		</hgroup>
		<p class="update">However, Firefox 21 is out now! <a href="#">Get it here</a></p>
	</section>
	<section id="how_to_clear">
		<div class="sleeve">
			<h2>Here&rsquo;s how you clear your cache for &hellip;</h2>
			<section id="your_headers">
				<header class="browser">
					<img src="/assets/img/browsers/<?php echo $browser_vendor; ?>.png" alt="" />
					<h3><span>Your browser, </span><?php echo $browser_vendor; ?> <?php echo $friendly_browser_version; ?></h3>
					<a href="#your_browser" class="skip">Skip to your Browser instructions</a>
					<p class="view"><a href="#">View User Agent String</a></p>
				</header>
				<header class="os">
					<img src="/assets/img/os/<?php echo $os; ?>.png" alt="" />
					<h3><span>Your Operating System, </span><?php echo ucfirst($os); ?></h3>
					<a href="#your_os" class="skip">Skip to your Operating System instructions</a>
				</header>
			</section>
			<section class="how_tos">
				<section id="your_browser" class="how_to">
					<?php echo $user_agent->db_info['Browser_HowTo']; ?>
					<!--
<ul>
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
</ul>
					-->
				</section>
				<section id="your_os" class="how_to">
					<?php echo $user_agent->db_info['Platform_HowTo']; ?>
					<!--
<ul>
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
		</div>
	</li>
</ul>
					-->
				</section>
			</section>
		</div>
	</section>
	<footer id="footer">
		<img src="/assets/img/bgs/<?php echo $browser_vendor; ?>.png" alt="<?php echo ucfirst($browser_vendor); ?>" id="browser_image" />
		<div class="sleeve">
			<p>Clear My Cache is a free service brought to you by <a href="http://twitter.com/MikeRogers0/">Mike</a>, <a href="http://www.twitter.com/_danedwards/">Dan</a>, <a href="http://twitter.com/Lletnek/">Tom</a> &amp; <a href="http://twitter.com/Lletnek/">Tom</a>.</p>
			<p>Made with passion and awesome on <img src="/assets/img/apple.logo.png" alt="Apple gear" /> <a href="http://events.apple.com.edgesuite.net/10oiuhfvojb23/event/index.html">Thank you Steve</a></p>
			<small>All logos are copyright of their respective owners. Clear My Cache accept no liability for any damages or losses incurred while following the advice on this website.</small>
		</div>
	</footer>
</body>
</html>