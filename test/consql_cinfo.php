<?php

$file_name = "cinfo.pdf";
$file_dir = "../file/";        //下载文件存放目录     

//检查文件是否存在    
if (! file_exists ( $file_dir . $file_name )) {    
    echo "文件找不到";    
    
} else {    
    //打开文件    
    $file = fopen ( $file_dir . $file_name, "r" );    
    //输入文件标签     
    // 读取第一行
            header('Content-type: application/pdf');

        header('filename='.$file_name);

        echo readfile($file_dir . $file_name);
    //输出文件内容     
    //读取文件内容并直接输出到浏览器    
    //echo $data= fread ( $file, filesize ( $file_dir . $file_name ) );    
    //echo iconv('gbk', 'utf-8', $data);
    fclose ( $file );    



}    
?>