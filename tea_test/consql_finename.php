<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//header("content-type:text/html;charset=utf-8");//字符编码设置  


    $sql = "SELECT teacher.`name`,teacher.tid FROM teacher WHERE teacher.username = '".$_GET["id"]."'";  
    $result = mysqli_query($conn,$sql);  
    
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $jarr = array();
    
    while ($rows=mysqli_fetch_array($result)){
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据  
        }
        array_push($jarr,$rows);
    }






$arr = array("code" => 200, "msg" =>"ann", "data" =>  $jarr );
// $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));

 mysqli_close($conn);
?>