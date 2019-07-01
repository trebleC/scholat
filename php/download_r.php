<?php
require_once "./connect.php";

$file_name=$_GET['url'];


$file_dir = "../upload/".$_GET['hid']."/".$_GET['sid']."/";        //下载文件存放目录     

//检查文件是否存在    
if (! file_exists ( $file_dir . $file_name )) {  

    echo $file_dir . $file_name."文件找不到";    
    exit ();    
} 
 if(isset($_GET['url'])) {    
    //打开文件    
    
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

//unlink($filedir . $_FILES["file"]["name"]);
?>