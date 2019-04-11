
<?php 
session_start();
session_destroy();


echo ("<script LANGUAGE='JavaScript'>
      window.location.href='../index.php';
      </script>");

?>