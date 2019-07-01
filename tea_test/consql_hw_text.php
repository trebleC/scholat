<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//header("content-type:text/html;charset=utf-8");//字符编码设置  

//输出作业详情
if(isset($_GET["coid"])){
    $var = $_GET["coid"];
    $hid = $var;

    
    $sql = "SELECT homework.name,homework.hid,homework.clid,homework.content, homework.end_t, homework.url, homework.tid, teacher.name as tname FROM homework INNER JOIN teacher ON homework.tid = teacher.tid WHERE homework.hid = ".$hid;  
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




    $sql1="SELECT COUNT(hid) AS count FROM homework where hid = ".$hid;
    //执行sql
    $query=mysqli_query($conn,$sql1); 
    //对结果进行判断
    if(mysqli_num_rows($query)){     
    $rs=mysqli_fetch_array($query);    
    //统计结果
    $count=$rs[0];    
    }else{
        $count=0;
    }


    $sql = "SELECT *  FROM class I WHERE clid = ".$jarr[0]['clid'];  
    $result = mysqli_query($conn,$sql);  
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }

    $jarr2 = array();

    while ($rows=mysqli_fetch_array($result)){
    $count2=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$count2;$i++){  
        unset($rows[$i]);//删除冗余数据  
    }
    array_push($jarr2,$rows);
    }








    $arr = array("code" => 200, "msg" =>"hw_text", "count" => $count, "data" =>  $jarr ,"cl"=>$jarr2);
    // $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
    echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
    str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));

}


//输出已交作业详情
else if(isset($_GET["hwinfo"])){
 
    


    $sql = "SELECT * FROM hw_result WHERE hw_result.hid = ".$_GET["hwinfo"];  
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

    //获得sid的值
    
    for($i=0;$i<sizeof($jarr);$i++){
       


        //打印学生名字
        $sql = "SELECT * FROM student WHERE sid = ".$jarr[$i]["sid"];  
        $result = mysqli_query($conn,$sql);  
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $jarr[$i]["sname"]=mysqli_fetch_array($result)[1];

        

    }

    $arr = array("code" => 200, "msg" =>"hw_text",  "data" => $jarr);
    
    echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
}

 mysqli_close($conn);
?>