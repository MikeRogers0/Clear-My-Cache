<?php
// Start Time, used for performance testing.
define('started', microtime());

// Max out error reporting.
error_reporting(-1);

// Define Database Variables
define('db_host', 'localhost');
define('db_database', 'cmcdotme');
define('db_database_salt', 'j6fm');
define('db_username', 'root');
define('db_password', '');

// Cache information
define('cache_dir', '/Users/MikeRogers/Sites/clearmycache.me/cache');

// Start Sessions
//session_name();
//session_start();

// Include all the required files.
require('browscap.class.php');
require('user_agent.class.php');
require('db.class.php');
?>