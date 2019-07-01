<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//header("content-type:text/html;charset=utf-8");//字符编码设置  

  
$sql = "SELECT mid,name,type,download,size,uploadtime,tid FROM material";  
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




$sql1="SELECT COUNT(mid) AS count FROM material";
//执行sql
$query=mysqli_query($conn,$sql1); 
//对结果进行判断
if(mysqli_num_rows( $query)){     
   $rs=mysqli_fetch_array($query);    
   //统计结果
   $count=$rs[0];    
}else{     
    $count=0;
}









$arr = array("code" => 200, "msg" =>"mat", "count" => $count, "data" =>  $jarr );
// $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));
 mysqli_close($conn);
?>