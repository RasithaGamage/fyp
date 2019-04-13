<?php
require 'conn.php';
session_start();

if(!empty($_POST['post_content']) && !empty($_POST['post_photo'])){

    $uid = $_SESSION["Uid"];
    $post_content = $_POST["post_content"];
    $post_photo = $_POST["post_photo"];
    $date_time = $_POST["date_time"];  //2019-04-03 00:00:00 <---date format
//save photo inside ../dist/img/post_materials
//name should be $uid+$date_time
///////////////////////////////////////////////////////////////////////////////////////////////
    $data = $post_photo;

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    $filename =  $uid.str_replace(" ","",str_replace(":","-",$date_time)).".jpg";

    file_put_contents("../dist/img/post_materials/$filename", $data);

///////////////////////////////////////////////////////////////////////////////////////////


    $stmt = $con->prepare("INSERT INTO post (Uid,date_time,post_photo,post_content) VALUES (?,?,?,?)");
    $stmt->bind_param("isss",$uid ,$date_time ,$filename,$post_content);
    $stmt->execute();
}

if(empty($_POST['post_content']) && empty($_POST['post_photo'])){
    //load all the content in "post" table

    $results = mysqli_query($con,"SELECT p.Uid,u.NAME,p.date_time,p.post_photo,p.post_content  FROM post p , user_credentials u WHERE p.Uid = u.CID");

    $p_array = array();

    while($row = $results->fetch_assoc()) {

        $name =$row["NAME"];
        $content = $row["post_content"];
        $photo = $row["post_photo"];
        $image = file_get_contents('../dist/img/post_materials/'.$photo);
        $p = new Post($name,$content,'data:image/jpg;base64,'.base64_encode($image));
        array_push($p_array,$p );

    }
    $p_array =  array_reverse($p_array);
    echo json_encode($p_array);
}

class Post
{
    var $name;
    var $content;
    var $photo;


 public function __construct($N,$C,$I)
 {
      $this->name = $N;
      $this->content = $C;
      $this->photo = $I;
 }
}

?>
