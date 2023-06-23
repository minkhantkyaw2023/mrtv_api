<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initializing our api
include_once('../config/initialize.php');
//instantiate post
$post = new Post($db);
$post_arr = array();
$category_arr = array();

//data array
$title = array('Speech', 'Current_news', 'Business_news', 'Youth', 'Health','Sports','Travel','Agriculture','Documentary','Election','Discussion','Education','Asean','Movies/TV_series','Special','Significant_days','Covid_19','Ethnic');
$url = array(
  'https://mrtv.gov.mm/en/speech',
  'https://mrtv.gov.mm/index.php/en/current-affairs',
  'https://mrtv.gov.mm/index.php/en/business',
  'https://mrtv.gov.mm/index.php/en/youth',
  'https://mrtv.gov.mm/index.php/en/health',
  'https://mrtv.gov.mm/index.php/en/sport',
  'https://mrtv.gov.mm/index.php/en/travelogue',
  'https://mrtv.gov.mm/index.php/en/agriculture',
  'https://mrtv.gov.mm/index.php/en/documentary',
  'https://mrtv.gov.mm/index.php/en/election',
  'https://mrtv.gov.mm/en/political',
  'https://mrtv.gov.mm/en/education',
  'https://mrtv.gov.mm/en/asean',
  'https://mrtv.gov.mm/en/tv-series',
  'https://mrtv.gov.mm/en/MRTV-special',
  'https://mrtv.gov.mm/en/myanmar-significance-days',
  'https://mrtv.gov.mm/en/covid-19',
  'https://mrtv.gov.mm/mm/nrc-program'
);
$img = array(
  '../img/Speech_Program_Program_for_You.png',
  '../img/Current_Program_Program_for_You.png',
  '../img/Business_Program_Program_for_You.jpg',
  '../img/Youth_Program_Program_for_You.png',
  '../img/Health_Program_Program_for_You.png',
  '../img/Sports_Program_Program_for_You.png',
  '../img/Travel_Program_Program_for_You.png',
  '../img/Agriculture_Program_Program_for_You.jpg',
  '../img/Documentary_Program_Program_for_You.png',
  '../img/Election_Program_Program_for_You.png',
  '../img/Disscussion_Program_Program_for_You.png',
  '../img/Education_Program_Program_for_You.png',
  '../img/ASEAN_Program_Program_for_You.png',
  '../img/Movie,TV_Series_Program_Program_for_You.jpg',
  '../img/Special_Program_Program_for_You.png',
  '../img/Significant_Day_Program_Program_for_You.png',
  '../img/Covid_19_Program_Program_for_You.png',
  '../img/Ethnic_Program_Program_for_You.png'
);

//to retrieve array data
$post_item = array();

for ($i = 0; $i < 18; $i++) {
  $post_item = array(
    "id" => $i+1,
    "title" => $title[$i],
    "url" => $url[$i],
    "image" => $img[$i]
  );

  array_push($post_arr, $post_item);
}
$records = array(
  "status" => true,
  "message" => "success",
  "program_for_you" => $post_arr
);

// set response code - 200 OK
http_response_code(200);
echo  json_encode($records);
