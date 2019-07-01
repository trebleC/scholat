<?php 
require_once('pdo.php');
if(isset($_POST['password']) || isset($_POST['repassword'])){
    if($_POST['password']==null || $_POST['password']=='' || $_POST['repassword']==null || $_POST['repassword']==''){
        echo "<script>alert('请输入密码！');location='../html/reset_psw.html';</script>";
    }else{
        $password = trim($_POST['password']);
        $repassword = trim($_POST['repassword']);
        /* echo $_COOKIE['email']."<br>";
        echo $password."<br>";
        echo $repassword."<br>";  */
        if($password == $repassword){
            $pwd = md5($password);
            $email = $_COOKIE['email'];
            $time = date('Y-m-d H:i:s');
            $sql = "update student set password='$pwd',reset_time='$time' where sid = (SELECT student_info.sid FROM student_info WHERE student_info.email ='$email')";
            if($pdo->query($sql)){
                echo "<script>confirm('修改密码成功，即将跳转至登录页面！');location='../html/login.html'</script>";
                setcookie('email','',time()-1,'/');
            }else{
                echo "<script>alert('修改密码失败！');location='../html/reset_psw.html'</script>";
            }
        }else{
            echo "<script>location='../html/reset_psw.html';alert('两次输入密码不一致！');</script>";
        }
    }
}else{
    echo "<script>alert('请输入密码！');location='../html/reset_psw.html';</script>";
}
?>
