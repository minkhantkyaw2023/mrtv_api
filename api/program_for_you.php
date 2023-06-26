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
$title = array('Speech', 'Current News', 'Business News', 'Youth', 'Health', 'Sports', 'Travel', 'Agriculture', 'Documentary', 'Election', 'Discussion', 'Education', 'Asean', 'Movies/TV Series', 'Special', 'Significant Days', 'Covid-19', 'Ethnic');
$url = array(
  MRTVapi.'speech',
  MRTVapi.'current-affairs',
  MRTVapi.'business',
  MRTVapi.'youth',
  MRTVapi.'health',
  MRTVapi.'sport',
  MRTVapi.'travelogue',
  MRTVapi.'agriculture',
  MRTVapi.'documentary',
  MRTVapi.'election',
  MRTVapi.'political',
  MRTVapi.'education',
  MRTVapi.'asean',
  MRTVapi.'tv-series',
  MRTVapi.'MRTV-special',
  MRTVapi.'myanmar-significance-days',
  MRTVapi.'covid-19',
  MRTVapi.'nrc-program'
);
$img = array(
  MRTVapi.'img/speech_program.png',
  MRTVapi.'img/current_program.png',
  MRTVapi.'img/business_program.jpg',
  MRTVapi.'img/youth_program.png',
  MRTVapi.'img/health_program.png',
  MRTVapi.'img/sports_program.png',
  MRTVapi.'img/travel_program.png',
  MRTVapi.'img/agriculture_program.jpg',
  MRTVapi.'img/documentary_program.png',
  MRTVapi.'img/election_program.png',
  MRTVapi.'img/disscussion_program.png',
  MRTVapi.'img/education_program.png',
  MRTVapi.'img/asean_program.png',
  MRTVapi.'img/movietv_series.jpg',
  MRTVapi.'img/special_program.png',
  MRTVapi.'img/significant_day_program.png',
  MRTVapi.'img/covid_19_program.png',
  MRTVapi.'img/ethnic_program.png'
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
