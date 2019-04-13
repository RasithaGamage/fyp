<?php
require 'conn.php';
session_start();

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


?>
