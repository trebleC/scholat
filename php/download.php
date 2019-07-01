<?php
require_once "./connect.php";

$file_name="";
if(isset($_GET['fname'])){$var = $_GET["fname"]; $file_name = $var;}
if(isset($_GET['mid'])){
    $var = $_GET["mid"]; 
    $sql="SELECT material.`name`,material.type FROM material WHERE material.mid =".$_GET['mid'];
    $data = mysqli_query($conn,$sql); 
    $jarr = array();

    $rows=mysqli_fetch_array($data);
    $name = $rows['name'];
    $type = $rows['type'];
    $file_name = $name.".".$type;

}
    

$file_dir = "../file/";        //下载文件存放目录     

//检查文件是否存在    
if (! file_exists ( $file_dir . $file_name )) {  

    echo $file_dir . $file_name."文件找不到";    
    exit ();    
} 
 if(isset($_GET['fname'])) {    
    //打开文件    
    $str=explode('.', $file_name)[0];
    $sql_downloadcount = "update material set download=download+1 where name = '".$str."'";  
    $result = mysqli_query($conn,$sql_downloadcount); 
    $file = fopen ( $file_dir . $file_name, "r" );    
    //输入文件标签     
    Header ( "Content-type: application/octet-stream" );    
    Header ( "Accept-Ranges: bytes" );    
    Header ( "Accept-Length: " . filesize ( $file_dir . $file_name ) );    
    Header ( "Content-Disposition: attachment; filename=" . $file_name );    
    //输出文件内容     
    //读取文件内容并直接输出到浏览器    
    echo fread ( $file, filesize ( $file_dir . $file_name ) );    
    fclose ( $file );    
    exit ();    


}    
 if(isset($_GET['mid'])){
    
    $sql_downloadcount = "DELETE FROM material where mid = ".$_GET['mid'];  
    $result = mysqli_query($conn,$sql_downloadcount); 

    


    if($result){
    unlink($file_dir .$file_name);
    header("Content-type:application/json;charset=utf-8");//字符编码设置  
    $arr = array("code" => 200, "msg" =>"delsuccess");

    echo 	json_encode($arr, JSON_UNESCAPED_UNICODE);


    }
    //确保重定向后，后续代码不会被执行   
    exit;  
}
//unlink($filedir . $_FILES["file"]["name"]);
?>