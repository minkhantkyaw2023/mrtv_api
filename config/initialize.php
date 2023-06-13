<?php 
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', "D:". DS .'LocalServer'.DS. 'Apache24'.DS. 'htdocs'.DS.'mrtvapi');
defined('CONFIG_PATH') ? null : define('CONFIG_PATH',SITE_ROOT.DS.'config');
defined('OBJECTS_PATH') ? null : define('OBJECTS_PATH',SITE_ROOT.DS.'objects');
defined('URL')? null : define('URL',"https://mrtv.gov.mm/");
// load the config file first
require_once(CONFIG_PATH.DS."config.php");
//object class
require_once(OBJECTS_PATH.DS."post.php");
?>