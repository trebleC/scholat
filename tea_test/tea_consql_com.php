<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//header("content-type:text/html;charset=utf-8");//字符编码设置  
//$var = $_GET["coid"];
//$hid = $var;

if(isset($_GET['likesadd'])){
        
    $sql = "UPDATE `comment` SET likes=likes+1 WHERE comid=0 and typeid =".$_GET['likesadd']; 
    if($result = mysqli_query($conn,$sql)){
        
        echo 	json_encode(array("code" => 200, "msg" =>"likes_have_add"), JSON_UNESCAPED_UNICODE);
    }else{
        echo 	json_encode(array("code" => 500, "msg" =>"likes_set_fail"), JSON_UNESCAPED_UNICODE);
    }  
   

    
    
}else if(isset($_GET['likesred'])){

    $sql = "UPDATE `comment` SET likes=likes-1 WHERE comid=0 and typeid =".$_GET['likesred']; 
    if($result = mysqli_query($conn,$sql)){
        
        echo 	json_encode(array("code" => 200, "msg" =>"likes_have_reduce"), JSON_UNESCAPED_UNICODE);
    }else{
        echo 	json_encode(array("code" => 500, "msg" =>"likes_set_fail"), JSON_UNESCAPED_UNICODE);
    }  

}else if(isset($_GET['coid'])){

    $sql1="SELECT COUNT(a.typeid) AS count FROM (SELECT`comment`.typeid FROM`comment`GROUP BY`comment`.typeid) as a";
    //执行sql
    $query=mysqli_query($conn,$sql1); 
    //对结果进行判断
    if(mysqli_num_rows($query)){     
   $rs=mysqli_fetch_array($query);    
   //统计结果
   $count=$rs[0];    


   $sql = " SELECT a.typeid,a.comid,a.`from`,a.content,a.date,a.likes from (SELECT  `comment`.typeid, `comment`.comid, `comment`.from_id, `comment`.content, `comment`.date, `comment`.likes,   student.username as 'from' FROM `comment` , student WHERE student.sid = `comment`.from_id) as a  GROUP BY a.comid,a.typeid ORDER BY a.typeid,a.comid   ";  
   $sqlto = "SELECT username as toname FROM `comment` ,student WHERE student.sid = `comment`.to_id GROUP BY typeid, comid";
   $result = mysqli_query($conn,$sql);  
   if (!$result) {
       printf("Error: %s\n", mysqli_error($conn));
       exit();
   }
   $resultto= mysqli_query($conn,$sqlto);
   $jarr = array();
   $jarrto = array();
   
   while ($rows=mysqli_fetch_array($result)){
        $count1=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        
        for($i=0;$i<$count1;$i++){   
            
            unset($rows[$i]);//删除冗余数据 
           
        }
       array_push($jarr,$rows);
       
   }
   while ($rows=mysqli_fetch_array($resultto)){
    $count1=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    
    for($i=0;$i<$count1;$i++){   
        
        unset($rows[$i]);//删除冗余数据 
       
    }
   array_push($jarrto,$rows);
   
    }
   $typeid = array_column($jarr, 'typeid' ) ;
   $comid = array_column( $jarr, 'comid' ) ;
   $toname = array_column($jarrto, 'toname');


    $aResult = array();
    for($i=0;$i<count($jarr);$i++)
    {
     $key = $typeid[$i];
     $comidkey=$comid[$i];
     $tonamekey = $toname[$i];
     $aResult[$key][]=$jarr[$i];

     $aResult[$key][$comidkey]['to']=$toname[$i];

    }

    //print_r($aResult);


    }else{     
    $count=0;

    $jarr = array("code"=>500);


    }






    $arr = array("code" => 200, "msg" =>"hw_text", "count" => $count, "data" =>  $aResult );
    // $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
    echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
    str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));
    
}else if(isset($_GET['content'])&&isset($_GET['date'])&&isset($_GET['typeid'])){
    $sql = "insert into `comment` (from_id,coid,typeid,content,date) values ( 10001,1,". $_GET['typeid'].",'".$_GET['content']."','".$_GET['date']. "')"; 
    if($result = mysqli_query($conn,$sql)){
        
        echo 	json_encode(array("code" => 200, "msg" =>"content_change_successfully"), JSON_UNESCAPED_UNICODE);
    }else{
        echo 	json_encode(array("code" => 500, "msg" =>"content_change_fail"), JSON_UNESCAPED_UNICODE);
    }  

}
    else if(isset($_GET['sid'])&&isset($_GET['content'])&&isset($_GET['date'])){
    $sql = "insert into `comment` (coid,typeid,content,date) values (1,4,'".$_GET['content']."','".$_GET['date']. "')"; 
    if($result = mysqli_query($conn,$sql)){
        
        echo 	json_encode(array("code" => 200, "msg" =>"content_change_successfully"), JSON_UNESCAPED_UNICODE);
    }else{
        echo 	json_encode(array("code" => 500, "msg" =>"content_change_fail"), JSON_UNESCAPED_UNICODE);
    }  

}
 mysqli_close($conn);
?>