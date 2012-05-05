<?php
// Start Time, used for performance testing.
define('started', microtime());

// Max out error reporting.
error_reporting(-1);

// Define Database Variables
define('db_host', 'localhost');
define('db_database', 'clsmgash_cmcdb');
define('db_database_salt', 'f54b');
define('db_username', 'clsmgash_cmcdb');
define('db_password', 'm0%fqKJw+Ocg');

// Cache information
define('cache_dir', '/home/clsmgash/cache');

// Start Sessions
//session_name();
//session_start();

// Set the Timezone
date_default_timezone_set('Europe/London');

// Include all the required files.
require('browscap.class.php');
require('user_agent.class.php');
require('db.class.php');
?>