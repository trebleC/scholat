<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//添加作业
if(isset($_GET['classId'])){

  
  $title =$_GET["title"];
  $content =$_GET['content'];
  $time =$_GET['time'];
  $type = $_GET['type'];
  $clid = $_GET['classId'];

  if($clid!=-1){
  $sql="INSERT INTO homework (coid,clid,homework.`name`, homework.content,type,end_t) VALUES (1,{$clid},'{$title}', '{$content}',{$type},'{$time}')";
  $result = mysqli_query($conn,$sql);  

  }else{
    $sql1="INSERT INTO homework (coid,clid,homework.`name`, homework.content,type,end_t) VALUES (1,1,'{$title}', '{$content}',{$type},'{$time}')";
    $sql2="INSERT INTO homework (coid,clid,homework.`name`, homework.content,type,end_t) VALUES (1,2,'{$title}', '{$content}',{$type},'{$time}')";
    $sql3="INSERT INTO homework (coid,clid,homework.`name`, homework.content,type,end_t) VALUES (1,3,'{$title}', '{$content}',{$type},'{$time}')";

    $result = mysqli_query($conn,$sql1); 
    $result = mysqli_query($conn,$sql2); 
    $result = mysqli_query($conn,$sql3); 
  }

 if (!$result) {
  $arr = array("code" => 404, "msg" =>"editfail");
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 }
  else{$arr = array("code" => 200, "msg" =>"editsucess");
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
  }

}


//添加班级
else if(isset($_GET['addid'])){
  
  $cltime =$_GET["title"];
  $place =$_GET['content'];
 //查出老师id
  $sql = "SELECT teacher.`tid` FROM teacher WHERE teacher.username = '".$_GET["addid"]."'";  
    $result = mysqli_query($conn,$sql);  
    
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $jarr = array();
    $tid=mysqli_fetch_array($result)[0];


    $sql = "INSERT INTO class (coid,tid,cltime,place,student_num) VALUES (1,{$tid}, '{$cltime}', '{$place}',50)";  
    $result = mysqli_query($conn,$sql);  


 if (!$result) {
  $arr = array("code" => 404, "msg" =>"editfail");
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 }
  else{$arr = array("code" => 200, "msg" =>$jarr);
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
  }
}


//作业的编辑功能
else if(isset($_GET['hid'])&& isset($_GET['title'])&& isset($_GET['content'])&& isset($_GET['time'])){
  $hid = $_GET["hid"];
  $title =$_GET["title"];
  $content =$_GET['content'];
  $time =$_GET['time'];
  $type = $_GET['type'];
  

 
  $sql="UPDATE homework SET type={$type} ,name='{$title}',end_t='{$time}',content='{$content}' WHERE hid =".$hid;
  $result = mysqli_query($conn,$sql);  


 if (!$result) {
  $arr = array("code" => 404, "msg" =>"editfail");
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
 }
  else{$arr = array("code" => 200, "msg" =>"editsucess");
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
  }
}






//公告的编辑功能
else if(isset($_GET['title'])&& isset($_GET['content'])){

  $title = $_GET["title"];
  $content =$_GET["content"];


  if(isset($_GET['date'])){

    $date =$_GET["date"];
    $sql = "insert into anouncement (title,content,adate) values ('".$title."','".$content."','".$date."');"; 


    $result = mysqli_query($conn,$sql);  



    $arr = array("code" => 200, "msg" =>"addsucess");
      echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
    } else{
        $anid =$_GET["anid"];

      
      $sql = "UPDATE anouncement SET title = '".$title."',content='".$content."' WHERE anid = ".$anid; 


    $result = mysqli_query($conn,$sql);  






    $arr = array("code" => 200, "msg" =>"editsucess");
      echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}

//编辑学生信息
else if(isset($_GET['type'])){

  if($_GET['type']=="name"){
   
    $sql = "update cou_attend set sid=".$_GET['sid']." where name ='".$_GET['username']."';"; 


    $result = mysqli_query($conn,$sql);  



    $arr = array("code" => 200, "msg" =>$sql);
      echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
  }
  else if($_GET['type']=="sid"){

    $sql = "update cou_attend set name='".$_GET['username']."' where sid = ".$_GET['sid'].";"; 


    $result = mysqli_query($conn,$sql);  



    $arr = array("code" => 200, "msg" =>"2editsuccess");
      echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);

  }

}


//输出所有班级
else if(isset($_GET['showallclass'])){

  
   
    $sql = "SELECT clid,cltime from class where coid=1"; 


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

    $arr = array("code" => 200, "cl" =>$jarr);
      echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
  
  
}

//移动学生
else if(isset($_GET['moveid'])){

  
   
  $sql = "update cou_attend set clid=".$_GET['moveid']." where coid=1 and sid =".$_GET['sid'].";"; 


  $result = mysqli_query($conn,$sql);  

  
  $arr = array("code" => 200, "msg" =>$sql);
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);

}

//移除学生
else if(isset($_GET['deleid'])){

  
  
  $sql = "DELETE FROM cou_attend WHERE sid=".$_GET['deleid']; 


  $result = mysqli_query($conn,$sql);  

  
  $arr = array("code" => 200, "msg" =>$sql);
  echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);

}


//编辑作业评分
else if(isset($_GET['hwscore'])){


  $sql = "update hw_result set score = {$_GET['score']} , comment = '{$_GET['comment']}' where sid ={$_GET['sid']} and hid = {$_GET['hid']}"; 


  $result = mysqli_query($conn,$sql);  


      $arr = array("code" => 200, "msg" =>$sql);
      echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
}



 mysqli_close($conn);
?>