<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  


 $var = $_GET["anid"];
 $anid = $var;

  
 $sql = "DELETE from anouncement WHERE anid=".$anid; 
 $sql1="alter table anouncement auto_increment=".$anid; 
 
 $result = mysqli_query($conn,$sql);  
 //mysqli_query($conn,$sql1);







 $arr = array("code" => 200, "msg" =>"delsucess");
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);


 mysqli_close($conn);
?>