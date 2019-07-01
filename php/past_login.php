
<?php
include 'DBUtil.php';
header("Content-Type: text/html;charset=utf-8");
$user=$_POST['ures'];
$password=$_POST['password'];

$b = new DBUtil;
 $re = $b -> getresult($user,$password);

  // $re = mysqli_query($link, "SELECT * FROM `student` WHERE id='$user'");
   /* Send a query to the server 向服务器发送查询请求*/
   //if ($result = mysqli_query($link, 'SELECT Name, Population FROM City ORDER BY Population DESC LIMIT 5')) {



//echo $re[0];
//echo $user;
if ($user == $re) {

  echo "succeed";
}else echo "failed";






?>
