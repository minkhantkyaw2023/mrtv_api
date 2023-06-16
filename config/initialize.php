<?php 
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', "D:". DS .'LocalServer' .DS . 'Apache24'.DS. 'htdocs'.DS.'mrtvapi');
defined('CONFIG_PATH') ? null : define('CONFIG_PATH',SITE_ROOT.DS.'config');
defined('OBJECTS_PATH') ? null : define('OBJECTS_PATH',SITE_ROOT.DS.'objects');
defined('RADIO_IMG_URL')? null : define('RADIO_IMG_URL',"https://mrtv.gov.mm/sites/default/files/styles/medium/public/radio-images/");
defined('RADIO_AUDIO_URL')? null : define('RADIO_AUDIO_URL',"https://mrtv.gov.mm/sites/default/files/mp3files/");
defined('NEWS_VIDEO_URL')? null : define('NEWS_VIDEO_URL',"https://mrtv.gov.mm/sites/default/files/news-videos/");
defined('NEWS_IMG_URL')? null : define('NEWS_IMG_URL',"https://mrtv.gov.mm/sites/default/files/news-images/");
defined('SCHEDULE_IMG_OURL')? null : define('SCHEDULE_IMG_URL',"https://mrtv.gov.mm/sites/default/files/schedule-images/");
defined('NRC_IMG_URL')? null : define('NRC_IMG_URL',"https://mrtv.gov.mm/sites/default/files/styles/mrtv_three_col/public/uploads/nrc-images/");
defined('NRC_VIDEO_URL')? null : define('NRC_VIDEO_URL',"https://mrtv.gov.mm/sites/default/files/news-videos/");
defined('TV_SERIES_IMG_URL')? null : define('TV_SERIES_IMG_URL',"https://mrtv.gov.mm/sites/default/files/styles/mrtv_three_col/public/program-images/");
defined('TV_SERIES_VIDEO_URL')? null : define('TV_SERIES_VIDEO_URL',"https://mrtv.gov.mm/sites/default/files/tv-program-videos/");

// load the config file first
require_once(CONFIG_PATH.DS."config.php");
//object class
require_once(OBJECTS_PATH.DS."post.php");
?>