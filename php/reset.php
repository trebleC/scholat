<?php 
require_once('pdo.php');
$token = stripslashes(trim($_GET['token']));
$email = stripslashes(trim($_GET['email']));
$sql = "SELECT student_info.sid,student_info.`name`,student.`password`,student.`update_time`,student_info.email FROM student_info INNER JOIN student ON student_info.sid = student.sid WHERE student_info.email ='{$email}'";
$smt = $pdo->query($sql);
$row = $smt->fetch(PDO::FETCH_BOTH);
if($row){
    $mt = md5($row['sid'].$row['name'].$row['password']);
    if($mt==$token){
        if((time()-$row['update_time'])>24*60*60){
            $msg = "该链接已过期！";
        }else{
            $msg = 1;
            setcookie('email',$email,time()+3600,'/');
        }
    }else{
        $msg = "无效的链接！";
    }
}else{
    $msg = "错误的链接！";
}
echo "<script>
if($msg==1){
alert('请重新设置密码！');
location='../html/reset_psw.html';
}else{
alert($msg);
}
</script>";
 
?>
