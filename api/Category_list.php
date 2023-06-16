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

//to retrieve category list
$post_sql = $post->get_category_list();
$post_num = $post_sql->rowCount();
if ($post_num > 0) // check category list
{
  while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)) {
    extract($row_post);
    $tid = $row_post['tid'];
    $name = $row_post['name'];

    $post_item = array(
      "tid" => $tid,
      "name" => $name
    );

    array_push($post_arr, $post_item);
  }
  $records = array(
    "status" => true,
    "message" => "success",
    "Category_list" => $post_arr
  );
} else {
  $records = array(
    "status" => false,
    "message" => "fail",
    "records" => [],
    "error" => array(
      "code" => "error",
      "detail" => "Not Found"
    )
  );
}

// set response code - 200 OK
http_response_code(200);
echo  json_encode($records);
