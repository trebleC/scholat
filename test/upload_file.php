<?php
require_once "../php/connect.php";
// 允许上传的图片后缀
echo $_POST["sid"]."   ";
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$filedir = "../upload/".$_POST["hid"]."/".$_POST["sid"]."/";
echo $_FILES["file"]["size"];$_POST["sid"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{   
    
    $sql = "update hw_result set url='".$_FILES["file"]["name"]."'  where hid =".$_POST["hid"]." and sid=".$_POST["sid"].";";  
    $result = mysqli_query($conn,$sql); 
    echo($sql);


    
	$filedir = iconv("UTF-8", "GBK", $filedir);
        if (!file_exists($filedir)){mkdir ($filedir,0777,true);}
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {


        

        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists($filedir . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
            unlink($filedir . $_FILES["file"]["name"]);
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], $filedir . $_FILES["file"]["name"]);
            echo "文件存储在: " .$filedir . $_FILES["file"]["name"];
        }
    }
}
else
{
    echo "非法的文件格式";
}
mysqli_close($conn);
?>