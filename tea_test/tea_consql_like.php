<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

if(isset($_GET['typeid'])){
        
    $sql = "UPDATE `comment` SET likes=likes+1 WHERE comid=0 and typeid =".$_GET['typeid']; 
    if($result = mysqli_query($conn,$sql)){
        
        echo 	json_encode(array("code" => 200, "msg" =>"likes_have_set"), JSON_UNESCAPED_UNICODE);
    }else{
        echo 	json_encode(array("code" => 500, "msg" =>"likes_set_fail"), JSON_UNESCAPED_UNICODE);}  
   

    
    

    
}

 mysqli_close($conn);
?>