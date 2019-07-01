<?php  
require_once "../php/connect.php";
header("Content-type:application/json;charset=utf-8");//字符编码设置  

//header("content-type:text/html;charset=utf-8");//字符编码设置  
//$var = $_GET["coid"];
//$hid = $var;

if(isset($_GET['table'])){

    $sql="SELECT cou_attend.clid, student.username as name, student.sid, cou_attend.type as att FROM cou_attend , student WHERE cou_attend.coid = 1 and cou_attend.clid = ".$_GET['table']." AND student.sid = cou_attend.sid";
    //执行sql
    $result = mysqli_query($conn,$sql);  
    //对结果进行判断
   if (!$result) {
       printf("Error: %s\n", mysqli_error($conn));
       exit();
   }
   $jarr=array();
   while ($rows=mysqli_fetch_array($result)){
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        
        for($i=0;$i<$count;$i++){   
            
            unset($rows[$i]);//删除冗余数据 
           
        }
        
       array_push($jarr,$rows);
       
   }
//    $typeid = array_column($jarr, 'typeid' ) ;
//    $comid = array_column( $jarr, 'comid' ) ;
//    $toname = array_column($jarrto, 'toname');


//     $aResult = array();
//     for($i=0;$i<count($jarr);$i++)
//     {
//      $key = $typeid[$i];
//      $comidkey=$comid[$i];
//      $tonamekey = $toname[$i];
//      $aResult[$key][]=$jarr[$i];

//      $aResult[$key][$comidkey]['to']=$toname[$i];

//     }

    //print_r($aResult);


    






    $arr = array("code" => 0, "msg" =>"class", "count" => 3, "data" =>  $jarr );
    // $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
    echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
    str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));


}else if(isset($_GET['classes'])){

    $sql_c = "SELECT COUNT(class.clid) from class where coid =1";
    $sql="SELECT class.clid, class.tid, class.cltime,teacher.`name` FROM class INNER JOIN teacher ON class.tid = teacher.tid WHERE class.coid = 1 and teacher.tid = class.tid";
    //执行sql
    $result = mysqli_query($conn,$sql); 
    $tabcount = mysqli_query($conn,$sql_c);  
    //对结果进行判断
   if (!$result) {
       printf("Error: %s\n", mysqli_error($conn));
       exit();
   }
   $jarr=array();
   while ($rows=mysqli_fetch_array($result)){
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        
        for($i=0;$i<$count;$i++){   
            
            unset($rows[$i]);//删除冗余数据 
           
        }
       array_push($jarr,$rows);
       
   }

//对结果进行判断
if(mysqli_num_rows( $tabcount)){     
   $rs=mysqli_fetch_array($tabcount);    
   //统计结果
   $tabcount=$rs[0];    
}else{
    $tabcount=0;
}

    



    $arr = array("code" => 200, "msg" =>"class", "count" => $tabcount, "data" =>  $jarr );
    // $str = str_replace("\"[","[",str_replace("\\","",json_encode($arr))); 
    echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);
    str_replace("\"[","[",str_replace("]\"","]",str_replace("\\\"","\"",json_encode($arr, JSON_UNESCAPED_UNICODE))));

 }
else{     
        
    
        echo $jarr = array("code"=>500);
    
    
        }

 mysqli_close($conn);
?>