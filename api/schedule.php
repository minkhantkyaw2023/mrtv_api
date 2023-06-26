<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initializing our api
include_once('../config/initialize.php');
//instantiate post
$post = new Post($db);
$post_arr = array();
$schedule_arr = array();
//to retrieve mrtv-schedule
$post_sql = $post->schedule_mrtv();
$post_num = $post_sql->rowCount();
if ($post_num > 0) // check post
{
  while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)) {
    extract($row_post);
    $nid = $row_post['nid'];
    $title = $row_post['title'];
    $date = date("M d, Y", $row_post['created']);
    $post_sqli = $post->get_schedule_img($nid);
    $img = $post_sqli;
    $mrtv_item = array(
      "name" => "MRTV",
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );

    array_push($schedule_arr, $mrtv_item);
  }
} else {
  //error response
  $mrtv_item = array(
    "name"=>"MRTV",
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );

  array_push($schedule_arr, $mrtv_item);
}

//to retrieve farmer-schedule
$post_sql = $post->schedule_farmer();
$post_num = $post_sql->rowCount();
if ($post_num > 0) // check post
{
  while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)) {
    extract($row_post);
    $nid = $row_post['nid'];
    $title = $row_post['title'];
    $date = date("M d, Y", $row_post['created']);
    $post_sqli = $post->get_schedule_img($nid);
    $img = $post_sqli;
    $farmer_item = array(
      "name"=>"Farmer",
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );

    array_push($schedule_arr, $farmer_item);
  }
} else {
  //error response
  $farmer_item = array(
    "name"=>"Farmer",
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );

  array_push($schedule_arr, $farmer_item);
}

//to retrieve hluttaw schedule

$post_sql = $post->schedule_hluttaw();
$post_num = $post_sql->rowCount();
if ($post_num > 0) // check post
{
  while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)) {
    extract($row_post);
    $nid = $row_post['nid'];
    $title = $row_post['title'];
    $date = date("M d, Y", $row_post['created']);
    $post_sqli = $post->get_schedule_img($nid);
    $img = $post_sqli;
    $hluttaw_item = array(
      "name"=>"Hluttaw",
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );

    array_push($schedule_arr, $hluttaw_item);
  }
} else {
  //error response
  $hluttaw_item = array(
    "name"=>"Hluttaw",
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );

  array_push($schedule_arr, $hluttaw_item);
}

//to retrieve nrc-schedule

$post_sql = $post->schedule_nrc();
$post_num = $post_sql->rowCount();
if ($post_num > 0) // check post
{
  while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)) {
    extract($row_post);
    $nid = $row_post['nid'];
    $title = $row_post['title'];
    $date = date("M d, Y", $row_post['created']);
    $post_sqli = $post->get_schedule_img($nid);
    $img = $post_sqli;
    $nrc_item = array(
      "name"=>"NRC",
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );

    array_push($schedule_arr, $nrc_item);
  }
} else {
  //error response
  $nrc_item = array(
    "name"=>"NRC",
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );

  array_push($schedule_arr, $nrc_item);
}

//to retrieve radio-schedule

$post_sql = $post->schedule_radio();
$post_num = $post_sql->rowCount(); 
if ($post_num > 0) // check post
{
  while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)) {
    extract($row_post);
    $nid = $row_post['nid'];
    $title = $row_post['title'];
    $date = date("M d, Y", $row_post['created']);
    $post_sqla = $post->get_radio_audio($nid);
    $audio = $post_sqla;
    $post_sqli = $post->get_radio_img($nid);
    $img = $post_sqli;
    $post_sqlb = $post->get_body($nid);
    $body = $post_sqlb;

    $radio_item = array(
      "name"=>"Radio",
      "nid" => $nid,
      "title" => $title,
      "posted_date" => $date,
      "image" => $img,
      "audio" => $audio,
      "body" => $body
    );

    array_push($schedule_arr, $radio_item);

  }
} else {
  //error response
  $Radio_item = array(
    "name"=>"Radio",
    "nid" => "",
    "title" => "",
    "posted_date" => "",
    "image" => "",
    "audio" => "",
    "body" => ""
  );

  array_push($schedule_arr, $Radio_item);
}

$records = array(
  "status" => true,
  "message" => "success",
  "schedule" => $schedule_arr
);

// set response code - 200 OK
http_response_code(200);
echo  json_encode($records);
