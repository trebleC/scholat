<?php 
//thrprmaguzzwbehh
function getemail(){
    require_once "pdo.php";
    $email = stripslashes(trim($_POST['email']));
    $sql =  "SELECT student_info.sid,student_info.`name`,student.`password`,student_info.email FROM student_info INNER JOIN student ON student_info.sid = student.sid WHERE student_info.email  ='{$email}'";
    //echo($sql);
    $data = [];
    if($smt=$pdo->query($sql)){
        $row = $smt->fetch(PDO::FETCH_BOTH);
        if($data['email'] = $row['email']){
            $data['mess'] = "接受成功！";
            $data['success'] = 1;
            $u_id = $row['sid'];
            $data['sid'] = $u_id;
            $token = md5($u_id.$row['name'].$row['password']);
            $data['token'] = $token;
            $url = "http://127.0.0.1/scholat/php/reset.php?email=".$email."&token=".$token;
            $time = date('Y-m-d H:i:s');
            $data['time'] = $time;
            $result = sendemail($time,$email,$url);
            if($result){
                $msg = '系统已向您的邮箱发送了一封邮件<br/>请登录到您的邮箱及时重置您的密码！';
                $update_time = time();
                $sql1 = "update student set update_time='$update_time' where sid='$u_id'";
                echo "<script>
                
                alert('提交成功！请注意接受邮箱');
               
                </script>";
                
                $pdo->query($sql1);
            }else{
                $msg = $result;
            }
            $data['msg'] = $msg;
        }else{
            $data['mess'] = "接收失败！";
            $data['email'] = "";
            $data['sid'] = "";
            $data['token'] = "";
            $time = date('Y-m-d H:i:s');
            $data['time'] = $time;
            $data['success'] = 0;
            $data['msg'] = '';
            echo("该邮箱并未注册！");
        }
    }else{
        $data['email'] = "";
        $data['sid'] = "";
        $data['token'] = "";
        $time = date('Y-m-d H:i:s');
        $data['time'] = $time;
        $data['mess'] = "该邮箱并未注册！";
        $data['success'] = 0;
        $data['msg'] = '';
        echo("该邮箱并未注册！");
    }
   // echo json_encode($data);
}
 
getemail();
 
function sendemail($time,$email,$url){
    // 引入PHPMailer的核心文件
    require_once("PHPMailer/src/PHPMailer.php");
    require_once("PHPMailer/src/SMTP.php");
    
    
    // 实例化PHPMailer核心类
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->SMTPDebug = 1;
    // 使用smtp鉴权方式发送邮件
    $mail->isSMTP();
    // smtp需要鉴权 这个必须是true
    $mail->SMTPAuth = true;
    // 链接qq域名邮箱的服务器地址
    $mail->Host = 'smtp.qq.com';
    // 设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = 'ssl';
    // 设置ssl连接smtp服务器的远程服务器端口号
    $mail->Port = 465;
    // 设置发送的邮件的编码
    $mail->CharSet = 'UTF-8';
    // 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = '在线学习网站';
    // smtp登录的账号 QQ邮箱即可
    $mail->Username = 'feng947512302@qq.com';
    // smtp登录的密码 使用生成的授权码
    $mail->Password = 'thrprmaguzzwbehh';
    // 设置发件人邮箱地址 同登录账号
    $mail->From = 'feng947512302@qq.com';
    // 邮件正文是否为html编码 注意此处是一个方法
    $mail->isHTML(true);
    // 设置收件人邮箱地址
    $mail->addAddress($email);
    // 添加多个收件人 则多次调用方法即可
    //$mail->addAddress('87654321@163.com');
    // 添加该邮件的主题
    $mail->Subject = "找回密码";
    // 添加邮件正文
    $mail->Body = "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码
（按钮24小时内有效）。<br/><a href='".$url."' target='_blank'>".$url."</a>";
    // 为该邮件添加附件
    //$mail->addAttachment('./example.pdf');
    // 发送邮件 返回状态
    $result = $mail->send();
    return $result;
    /* require_once("smtp.class.php");
    $smtpserver = "smtp.qq.com"; //SMTP服务器，如smtp.163.com
    $smtpserverport = 465; //SMTP服务器端口
    $smtpusermail = "feng947512302@qq.com"; //SMTP服务器的用户邮箱
    $smtpuser = "feng947512302@qq.com"; //SMTP服务器的用户帐号
    $smtppass = ""; //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
    //这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
    $smtpemailto = $email;
    $smtpemailfrom = $smtpusermail;
    $emailsubject = "Helloweba.com - 找回密码";
    $emailbody = "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码
（按钮24小时内有效）。<br/><a href='".$url."' target='_blank'>".$url."</a>";
    $result = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    
    return $result; */
}
 
 
// function sendemail($time,$email,$url){ require("PHPMailer/src/PHPMailer.php");
//         require("PHPMailer/src/SMTP.php");
//         session_start();
//         $mail = new PHPMailer\PHPMailer\PHPMailer();
//         $email='@163.com';//获取收件人邮箱
//         //return $email;
//         $sendmail = '@qq.com'; //发件人邮箱
//         $sendmailpswd = "drapjeisvmoabfid"; //客户端授权密码,而不是邮箱的登录密码，就是手机发送短信之后弹出来的一长串的密码
//         $send_name = 'lh';// 设置发件人信息，如邮件格式说明中的发件人，
//         $toemail = $email;//定义收件人的邮箱
//         $to_name = 'hl';//设置收件人信息，如邮件格式说明中的收件人
//         // $mail = new PHPMailer();
//         $mail->isSMTP();// 使用SMTP服务
//         $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
//         $mail->Host = "smtp.qq.com";// 发送方的SMTP服务器地址
//         $mail->SMTPAuth = true;// 是否使用身份验证
//         $mail->Username = $sendmail;//// 发送方的
//         $mail->Password = $sendmailpswd;//客户端授权密码,而不是邮箱的登录密码！
//         $mail->SMTPSecure = "ssl";// 使用ssl协议方式
//         $mail->Port = 465;//  qq端口465或587）
//         $mail->setFrom($sendmail, $send_name);// 设置发件人信息，如邮件格式说明中的发件人，
//         $mail->addAddress($toemail, $to_name);// 设置收件人信息，如邮件格式说明中的收件人，
//         $mail->addReplyTo($sendmail, $send_name);// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
//         $mail->Subject = "这里是邮件标题";// 邮件标题
//         $code=rand(100000,999999);
//         $_SESSION["code"] = $code;
//         //return $code."----".session("code");
//         $mail->Body = "邮件内容是 <b>您的验证码是：$code</b>，如果非本人操作无需理会！";// 邮件正文
//         //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用
//         if (!$mail->send()) { // 发送邮件
//             echo "Message could not be sent.";
//             echo "Mailer Error: " . $mail->ErrorInfo;// 输出错误信息
//         } else {
//             return "发送成功";
//         }
   
// }
 
?>
