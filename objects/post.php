<?php
class Post
{
    private $conn;

    //constructor with db_connect
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //retrieve video
    public function get_news_video($nid)
    {
        $query = "SELECT fm.uri as URL FROM `node__field_news_video_file_upload` as vf, `file_managed` as
         fm WHERE vf.entity_id = $nid AND vf.field_news_video_file_upload_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = NEWS_VIDEO_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }

    //news
    //to retrieve news images
    public function get_img($nid)
    {
        $query = "SELECT fm.uri AS URL FROM `node_field_data` as nd, `node__field_news_image` as fi, `file_managed` as 
        fm WHERE fi.entity_id = $nid AND fi.field_news_image_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = NEWS_IMG_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }
    //to retrieve news category list
    public function get_category_list()
    {
        $query = "SELECT tid,name FROM taxonomy_term_field_data WHERE vid='news_category'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    //to retrieve total count of news
    public function get_total_catlist($category_id, $keyword, $date)
    {
        $query = "SELECT COUNT(*) as totalrecords FROM `node_field_data` as nd, `taxonomy_index` as ti, `taxonomy_term_field_data` as tfd 
        WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=$category_id ";

        if (isset($keyword)) {
            $query .= " AND nd.title LIKE '%$keyword%'";
        }
        if ($date != "") {
            $timestamp = strtotime($date) + 86399;
            $query .= " AND nd.created < $timestamp";
        }

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['totalrecords'];
    }
    //to retrieve news
    public function get_content_category($begin, $row_per_page, $category_id, $keyword, $date)
    {

        $query = "SELECT nd.nid, nd.title,nd.created FROM `node_field_data` as nd, `taxonomy_index` as ti, `taxonomy_term_field_data` as tfd 
        WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=$category_id";

        if (isset($keyword)) {
            $query .= " AND nd.title LIKE '%$keyword%'";
        }

        if ($date != "") {
            $timestamp = strtotime($date) + 86399;
            $query .= " AND nd.created < $timestamp";
        }

        if (isset($begin) && isset($row_per_page)) {
            $query .= " ORDER BY nd.created DESC LIMIT $begin,$row_per_page";
        }
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    //radio program
    //get radio image files
    public function get_radio_img($nid)
    {
        $query = "SELECT fm.uri AS URL FROM `node_field_data` as nd, `node__field_radio_image` as fri, `file_managed` as fm 
        WHERE fri.entity_id =nd.nid AND fri.field_radio_image_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = RADIO_IMG_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }
    //radio audio files
    public function get_radio_audio($nid)
    {

        $query = "SELECT fm.uri as URL FROM `node__field_audio_file` as af , `file_managed` as fm WHERE af.entity_id = $nid AND 
        af.field_audio_file_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = RADIO_AUDIO_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }
    //to retrieve body
    public function get_body($nid)
    {
        $query = "SELECT nb.body_value as body FROM `node__body` as nb  WHERE nb.entity_id = $nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $body = $row['body'];
            return $body;
        } else {
            return null;
        }
    }

    //to retrieve radio programs
    public function get_radio_program()
    {
        $query = "SELECT tid,name FROM taxonomy_term_field_data WHERE vid='radio_program_type'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    //schedule
    //to retrieve schedule category
    public function get_schedule_tags()
    {
        $query = "SELECT tid,name  FROM `taxonomy_term_field_data` WHERE vid='schedule_tags'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }



    public function schedule_mrtv()
    {
        $query = "SELECT nd.nid, nd.title,nd.created FROM `node_field_data` as nd, `taxonomy_index` as ti, 
        `taxonomy_term_field_data` as tfd WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=223
        ORDER BY nd.created DESC LIMIT 0,1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    public function schedule_farmer()
    {
        $query = "SELECT nd.nid, nd.title,nd.created FROM `node_field_data` as nd, `taxonomy_index` as ti, 
        `taxonomy_term_field_data` as tfd WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=225
        ORDER BY nd.created DESC LIMIT 0,1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    public function schedule_hluttaw()
    {
        $query = "SELECT nd.nid, nd.title,nd.created FROM `node_field_data` as nd, `taxonomy_index` as ti, 
        `taxonomy_term_field_data` as tfd WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=224
        ORDER BY nd.created DESC LIMIT 0,1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    public function schedule_nrc()
    {
        $query = "SELECT nd.nid, nd.title,nd.created FROM `node_field_data` as nd, `taxonomy_index` as ti, 
        `taxonomy_term_field_data` as tfd WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=226
        ORDER BY nd.created DESC LIMIT 0,1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    
    //to retrieve schedule image
    public function get_schedule_img($nid)
    {

        $query = "SELECT fm.uri,fm.created FROM `node_field_data` as nd, `node__field_schedule_photo` as fri, `file_managed` as fm 
        WHERE fri.entity_id =nd.nid AND fri.field_schedule_photo_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['uri']);
            $URL = SCHEDULE_IMG_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }

    //nrc
    //to retrieve nrc total count
    public function get_nrc_total($keyword,$date)
    {
        $query = "SELECT COUNT(*) AS totalrecords FROM `node_field_data` as nd WHERE type='nrc_program'";
        if (isset($keyword)) {
            $query .= " AND nd.title LIKE '%$keyword%'";
        }
        if ($date != "") {
            $timestamp = strtotime($date) + 86399;
            $query .= " AND nd.created < $timestamp";
        }
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['totalrecords'];
    }

    //to retrieve nrc id and title
    public function get_nrc($begin, $row_per_page, $keyword,$date)
    {
        $query = "SELECT nid,title,created  FROM `node_field_data` as nd WHERE `type`='nrc_program'";
        if (isset($keyword)) {
            $query .= " AND nd.title LIKE '%$keyword%'";
        }
        if ($date != "") {
            $timestamp = strtotime($date) + 86399;
            $query .= " AND nd.created < $timestamp";
        }
        if (isset($begin) && isset($row_per_page)) {
            $query .= " ORDER BY nd.created DESC LIMIT $begin,$row_per_page";
        }
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    //to retrieve nrc image
    public function get_nrc_image($nid)
    {
        $query = "SELECT fm.uri as URL FROM `node_field_data` as nd, `node__field_nrc_image` as ni, `file_managed` as fm 
        WHERE ni.entity_id =nd.nid AND ni.field_nrc_image_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = NRC_IMG_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }

    public function get_nrc_video($nid)
    {
        $query = "SELECT fm.uri as URL FROM `node__field_news_video_file_upload` as vf, `file_managed` as
         fm WHERE vf.entity_id = $nid AND vf.field_news_video_file_upload_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = trim($row['URL'], 'public://');
            $URL = NRC_VIDEO_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }


    //tv series
    //to retrieve tv-series total count
    public function get_tv_series_total($keyword)
    {

        $query = "SELECT COUNT(*) as totalrecords FROM `node_field_data` as nd WHERE `type`='program'";

        if (isset($keyword)) {
            $query .= " AND nd.title LIKE '%$keyword%'";
        }

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['totalrecords'];
    }

    //to retrieve tv-series id and title
    public function get_tv_series($begin, $row_per_page, $keyword)
    {
        $query = "SELECT nid,title,created  FROM `node_field_data` as nd WHERE `type`='program'";
        if (isset($keyword)) {
            $query .= " AND nd.title LIKE '%$keyword%'";
        }
        if (isset($begin) && isset($row_per_page)) {
            $query .= " ORDER BY nd.created DESC LIMIT $begin,$row_per_page";
        }
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        //echo $query;        
        // execute query
        $stmt->execute();
        return $stmt;
    }

    //to retrieve tv-series image
    public function get_tv_series_image($nid)
    {
        $query = "SELECT fm.uri as URL FROM `node_field_data` as nd, `node__field_program_image` as ni, `file_managed` as fm 
        WHERE ni.entity_id =nd.nid AND ni.field_program_image_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = TV_SERIES_IMG_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }

    public function get_tv_series_video($nid)
    {
        $query = "SELECT fm.uri as URL FROM `node__field_news_video_file_upload` as vf, `file_managed` as
         fm WHERE vf.entity_id = $nid AND vf.field_news_video_file_upload_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $uri = str_replace('public://', '', $row['URL']);
            $URL = TV_SERIES_VIDEO_URL . str_replace(' ', "%20", $uri);
            return $URL;
        } else {
            return null;
        }
    }
}
