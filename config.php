<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'ABC');

define('DB_DRIVER', 'mysql');
define('DB_PORT','3306');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'roottalent');
define('DB_SERVER_PASSWORD', 'beehive@root');
define('DB_DATABASE', 'socialuser');
define('DB_HOST', 'localhost');

// must end with a slash
define('SITE_URL', 'localhost');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
	//echo "connection started";
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_PORT,DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
  //echo "connection establish";
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

?>