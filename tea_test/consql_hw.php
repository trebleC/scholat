<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//\header("content-type:text/html;charset=utf-8");//字符编码设置  

if($_GET["clid"]=='-1')
$sql = "SELECT homework.clid,homework.hid,homework.tid,homework.`name`,homework.content, homework.type, homework.is_fix, homework.end_t, teacher.name as tname FROM homework INNER JOIN teacher ON homework.tid = teacher.tid ";
else $sql = "SELECT homework.hid, homework.clid, homework.tid, homework.`name`, homework.content, homework.type, homework.is_fix, homework.end_t, teacher.`name` AS tname FROM homework INNER JOIN teacher ON homework.tid = teacher.tid WHERE homework.clid =".$_GET["clid"];  
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



if($_GET["clid"]=='-1')
$sql1="SELECT COUNT(hid) AS count FROM homework ";
else
$sql1="SELECT COUNT(hid) AS count FROM homework where clid =".$_GET["clid"];
//echo $sql1;
//执行sql
$query=mysqli_query($conn,$sql1); 
//对结果进行判断
if(mysqli_num_rows($query)){    
    
   $rs=mysqli_fetch_array($query);    
   //统计结果
   $count_cl=$rs[0]; 
   
}else{
    $count_cl=0;
}


//班级选择
$sql_cli = "SELECT class.clid, class.cltime  FROM class INNER JOIN homework ON homework.clid = class.clid WHERE class.clid = class.clid AND class.coid = class.coid GROUP BY class.cltime ";  
$result_cli = mysqli_query($conn,$sql_cli);  
if (!$result_cli) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$jarr_cli = array();

while ($rows=mysqli_fetch_array($result_cli)){
    $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($rows[$i]);//删除冗余数据  
    }
    array_push($jarr_cli,$rows);
}




$psql = "SELECT count(hw_ma.hid = 1 or null) 'hid1',count(hw_ma.hid = 2 or null) 'hid2',count(hw_ma.hid = 3 or null) 'hid3',count(hw_ma.hid = 4 or null) 'hid4', count(hw_ma.hid = 5 or null) 'hid5' FROM hw_ma";  
$presult = mysqli_query($conn,$psql);  
if (!$presult) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$pjarr = array();

while ($rows=mysqli_fetch_array($presult)){
    $pcount=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$pcount;$i++){  
        unset($rows[$i]);//删除冗余数据  
        
    }
    for($i=1;$i<=count($rows);$i++)
    array_push($pjarr,$rows['hid'.$i]);
}




$arr = array("code" => 200, "msg" =>"hw", "p_count"=> $pjarr,"count" => $count_cl,"cl" => $jarr_cli , "data" =>  $jarr );
// $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));
 mysqli_close($conn);
?>