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
$data = json_decode(file_get_contents("php://input"));

//data array
$title = array('MRTV_HD', 'MITV', 'MRTV_NEWS', 'MRTV_Sport', 'MRTV_Sport');
$url = array(
  'https://player.twitch.tv/?channel=livestreamingmrtv&parent=mrtv.gov.mm',
  'https://player.twitch.tv/?channel=mitvlivestream&parent=mrtv.gov.mm',
  'https://player.twitch.tv/?channel=mrtvnewslive&parent=mrtv.gov.mm',
  'https://player.twitch.tv/?channel=channelmrtv&parent=mrtv.gov.mm',
  'https://player.twitch.tv/?channel=myanma_radio&parent=mrtv.gov.mm'
);

//to retrieve array data
$post_item = array();

for ($i = 0; $i < 5; $i++) {
  $post_item = array(
    "title" => $title[$i],
    "url" => $url[$i]);

  array_push($post_arr, $post_item);
}
$records = array(
  "status" => true,
  "message" => "success",
  "live" => $post_arr
);

// set response code - 200 OK
http_response_code(200);
echo  json_encode($records);
