<?php
class DBUtil {
$TABLE = "student" /* 表名 */


  /* Connect to a MySQL server  连接数据库服务器 */

  function getlink (){
    $link = mysqli_connect(
                '127.0.0.1',  /* The host to connect to 连接MySQL地址 */
                'root',      /* The user to connect as 连接MySQL用户名 */
                'root',      /* The password to use 连接MySQL密码 */
                'student','3306');  /* The default database to query 连接数据库名称*/
      if (!$link) {
                   printf("Can't connect to MySQL Server. Errorcode: %s ", mysqli_connect_error());
                   exit;
                }
      return $link;
  }
  function getresult ($user,$password) {
    $link = $this->getlink();
   $re = mysqli_query($link, "SELECT * FROM `$TABLE` WHERE id='$user'");
   // 关联数组
   $row=mysqli_fetch_assoc($re);
   echo $row[0];
   mysqli_free_result($re);
   mysqli_close($link);
    return $row;
  }
}

?>
