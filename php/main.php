<?php
/**
 * Created by PhpStorm.
 * User: inaccessible
 * Date: 16/11/30
 * Time: 下午4:45
 */







$raw = file_get_contents('php://input');
$json = json_decode($raw);

$tab_type = $json->tab_type;


        if($tab_type == "1") {

             announcement();
            
        }
        else if($tab_type == "2"){
            echo('{"code":200, "message":"登录成功。","txt":"<p><br></p><p>单元测试：占成绩40%</p><p>课堂讨论：占成绩30%</p><p>考试：&nbsp; &nbsp; &nbsp; &nbsp; 占成绩30%</p><p><span style=\"font-family:&quot;Helvetica Neue&quot;,Helvetica, Arial, sans-serif; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">按百分制计分，60分至84分为合格，85分至100分为优秀</span></p>"}');
        }

        elseif ($tab_type == "3") {
        	 echo('{"code":200, "message":"课件","txt":"这是课件"}');
        }
        elseif ($tab_type == "4") {
        	 echo('{"code":200, "message":"作业","txt":"这是作业"}');
        }
        elseif ($tab_type == "5") {

        	classmate();
        }
        elseif ($tab_type == "6") {
        	echo('{"code":200, "message":"讨论区","txt":"这是讨论区"}');
        }
        else{
        	echo('{"code":500, "message":"未知错误","txt":"ERROR"}');
        }
    


function announcement()
{

//echo('{"code":200, "message":"公告","txt":"这是公告"}');
echo('{"code":200, "message":"announcement","txt":"<div id=\"announcement_div\"><h1>nihao</h1></div>"}');

 }

function classmate()
{

echo('{"code":200, "message":"classmate","txt":"<table id=\"demo\" lay-filter=\"test\"></table>"}');

 }



?>
