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
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );
  }
} else {
  //error response
  $mrtv_item = array(
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );
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
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );
  }
} else {
  //error response
  $farmer_item = array(
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );
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
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );
  }
} else {
  //error response
  $hluttaw_item = array(
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );
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
      "nid" => $nid,
      "posted_date" => $date,
      "title" => $title,
      "image" => $img
    );
  }
} else {
  //error response
  $nrc_item = array(
    "nid" => "",
    "posted_date" => "",
    "title" => "",
    "image" => ""
  );
}

$records = array(
  "status" => true,
  "message" => "success",
  "mrtv" => $mrtv_item,
  "hluttaw" => $hluttaw_item,
  "farmer" => $farmer_item,
  "nrc" => $nrc_item
);
// set response code - 200 OK
http_response_code(200);
echo  json_encode($records);
