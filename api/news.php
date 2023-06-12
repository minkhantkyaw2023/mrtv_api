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
$categoryid = isset($data->categoryid) ? $data->categoryid : '';
$orderBy = isset($data->orderBy) ? $data->orderBy : '';
$keyword = isset($data->keyword) ? $data->keyword : '';
//for pagination
$pageno = isset($data->pageno) ? $data->pageno : "1";
$total_records = $post->get_total_catlist($categoryid); 
$total_pages = 1;
$begin = 0;
$row_per_page = 0;
$current_page = 1;

  $row_per_page = 10;
  $begin = ($pageno * $row_per_page) - $row_per_page;
  $total_pages = ceil($total_records/$row_per_page); 
  $current_page = $pageno;

if($pageno > $total_pages)
{
  $records = array(
    "status" => false,
    "message" => "fail",
    "pagination" => array(
    "total_records"=> 0,
    "total_pages"=> 0,
    "current_page" => 0,
 ),
 "error"=> array(
 "code"=> "error",
"detail"=> "Not Found"
),
    "records" => []
  );
}
else
{
   //to retrieve post list
$post_sql = $post->get_content_category($begin,$row_per_page,$categoryid);
$post_num = $post_sql->rowCount();
  if($post_num > 0 ) // check post
  {
    while ($row_post = $post_sql->fetch(PDO::FETCH_ASSOC)){
      extract($row_post); 
      $nid=$row_post['nid'];
      $title=$row_post['title'];

      
      $post_sqlv = $post->get_video($nid);
      $video= $post_sqlv;

      $post_sqli = $post->get_img($nid);
      $img= $post_sqli;

      $post_sqlb = $post->get_body($nid);
      $body= $post_sqlb;
      
      
      $post_item = array(
                   "nid" => $nid,
                   "title" => $title,  "video" => $video,
                   "image" => $img,
                   "body" => $body);
      
      array_push($post_arr, $post_item);
}
    $records = array(
          "status" => true,
          "message" => "success",
         "pagination" => array(
          "total_records" => $total_records,
          "total_pages" => $total_pages,
          "current_page" => $current_page
         ),
         "records" => $post_arr
        );
    }
    else{
      $records = array(
        "status" => false,
        "message" => "fail",
       "pagination" => array(
        "total_records" => $total_records,
        "total_pages" => $total_pages,
        "current_page" => $current_page
       ),
       "records" => [],
       "error"=> array(
        "code"=> "error",
        "detail"=> "Not Found"
       )
      );
    }
}

      // set response code - 200 OK
      http_response_code(200);
      echo  json_encode($records);