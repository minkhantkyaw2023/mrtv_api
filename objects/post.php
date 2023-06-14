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
    public function get_video($nid)
    {
        $query = "SELECT fm.filename as filename FROM `node__field_news_video_file_upload` as vf, `file_managed` as
         fm WHERE vf.entity_id = $nid AND vf.field_news_video_file_upload_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
        } else {
            return null;
        }
    }

    //news
    //to retrieve news images
    public function get_img($nid)
    {
        $query = "SELECT fm.filename FROM `node_field_data` as nd, `node__field_news_image` as fi, `file_managed` as 
        fm WHERE fi.entity_id = $nid AND fi.field_news_image_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
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
    public function get_total_catlist($category_id)
    {
        $query = "SELECT COUNT(*) as totalrecords FROM `node_field_data` as nd, `taxonomy_index` as ti, `taxonomy_term_field_data` as tfd 
        WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=$category_id ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['totalrecords'];
    }
    //to retrieve news
    public function get_content_category($begin, $row_per_page, $category_id, $keyword)
    {

        $query = "SELECT nd.nid, nd.title FROM `node_field_data` as nd, `taxonomy_index` as ti, `taxonomy_term_field_data` as tfd 
        WHERE ti.tid = tfd.tid AND nd.nid = ti.nid AND tfd.tid=$category_id";

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

    //radio program
    //get radio image files
    public function get_radio_img($nid)
    {
        $query = "SELECT fm.filename FROM `node_field_data` as nd, `node__field_radio_image` as fri, `file_managed` as fm 
        WHERE fri.entity_id =nd.nid AND fri.field_radio_image_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
        } else {
            return null;
        }
    }
    //radio audio files
    public function get_radio_audio($nid)
    {

        $query = "SELECT fm.filename as filename FROM `node__field_audio_file` as af , `file_managed` as fm WHERE af.entity_id = $nid AND 
        af.field_audio_file_target_id = fm.fid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
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

    //to retrieve schedule image
    public function get_schedule_img($nid)
    {

        $query = "SELECT fm.filename as filename FROM `node_field_data` as nd, `node__field_schedule_photo` as fri, `file_managed` as fm 
        WHERE fri.entity_id =nd.nid AND fri.field_schedule_photo_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
        } else {
            return null;
        }
    }

    //nrc
    //to retrieve nrc total count
    public function get_nrc_total()
    {
        $query = "SELECT COUNT(*) AS totalrecords FROM `node_field_data` WHERE type='nrc_program'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['totalrecords'];
    }

    //to retrieve nrc id and title
    public function get_nrc($begin, $row_per_page)
    {
        $query = "SELECT nid,title  FROM `node_field_data` WHERE `type`='nrc_program' ORDER BY created DESC LIMIT $begin,$row_per_page";
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
        $query = "SELECT fm.filename as filename FROM `node_field_data` as nd, `node__field_nrc_image` as ni, `file_managed` as fm 
        WHERE ni.entity_id =nd.nid AND ni.field_nrc_image_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
        } else {
            return null;
        }
    }


    //tv series
    //to retrieve tv-series total count
    public function get_tv_series_total()
    {

        $query = "SELECT COUNT(*) as totalrecords FROM `node_field_data` WHERE `type`='program'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['totalrecords'];
    }

    //to retrieve tv-series id and title
    public function get_tv_series($begin, $row_per_page)
    {
        $query = "SELECT nid,title  FROM `node_field_data` WHERE `type`='program' ORDER BY created DESC LIMIT $begin,$row_per_page";
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
        $query = "SELECT fm.filename as filename FROM `node_field_data` as nd, `node__field_program_image` as ni, `file_managed` as fm 
        WHERE ni.entity_id =nd.nid AND ni.field_program_image_target_id = fm.fid AND nd.nid=$nid";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $num_row = $stmt->rowCount();
        if ($num_row > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $filename = URL . $row['filename'];
            return $filename;
        } else {
            return null;
        }
    }

   
}
