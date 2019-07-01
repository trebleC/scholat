<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//header("content-type:text/html;charset=utf-8");//字符编码设置  
if(isset($_GET["clid"])){




    $sql = "SELECT teacher.tid, teacher.class,teacher.username,teacher.`name`,teacher.college,teacher.direction FROM teacher WHERE teacher.`class` = ".$_GET["clid"];  
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





}else if(isset($_GET["pl"])){




    $sql = "SELECT teacher.tid, teacher.class,teacher.pl,teacher.username,teacher.`name`,teacher.college,teacher.direction FROM teacher WHERE teacher.`pl` = ".$_GET["pl"];  
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





}else if(isset($_GET["name"])){
$sql = "SELECT teacher.tid, teacher.pl,teacher.class,teacher.username,teacher.`name`,teacher.college,teacher.direction FROM teacher WHERE teacher.`name` LIKE '%".$_GET["name"]."%'";  
$result = mysqli_query($conn,$sql);  

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
if(mysqli_num_rows($result)==0){
    $sql = "SELECT teacher.tid, teacher.pl,teacher.class,teacher.username,teacher.`name`,teacher.college,teacher.direction FROM teacher WHERE teacher.`username` LIKE '%".$_GET["name"]."%'";  
    $result = mysqli_query($conn,$sql);  
    }
$jarr = array();

while ($rows=mysqli_fetch_array($result)){
    $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($rows[$i]);//删除冗余数据  
    }
    array_push($jarr,$rows);
}




$sql1="SELECT COUNT(anid) AS count FROM anouncement";
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




}
else if (isset($_GET["tid"])){
    $sql="UPDATE teacher SET pl = 1 WHERE tid=".$_GET["tid"];
    $jarr = array("success");

    $result = mysqli_query($conn,$sql);  

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}
else if (isset($_GET["plid"])){
    $sql="UPDATE teacher SET class=1,pl = 0 WHERE tid=".$_GET["plid"];
    $jarr = array("success");

    $result = mysqli_query($conn,$sql);  

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}



$arr = array("code" => 200, "msg" =>"ann", "data" =>  $jarr );
// $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));

 mysqli_close($conn);
?>