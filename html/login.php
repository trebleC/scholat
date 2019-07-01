<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>在线学习</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--添加 user-scalable=no 可以禁用其缩放（zooming）功能-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 新 Bootstrap 核心 CSS 文件 -->

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
<!--     <link href="../css/main.css" rel="stylesheet"> -->


    <!-- <link href="css/sticky-footer-navbar.css" rel="stylesheet"> -->
   <!--  <link href="https://cdn.bootcss.com/normalize/8.0.1/normalize.css" rel="stylesheet"> -->

    <!-- 可选的Bootstrap主题文件（一般不使用） -->

    <!-- <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script> -->

<!-- font-awesome-4.7.0 CDN 地址-->

    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>

<script src="../js/validator.js"></script>
<script src="../js/input.js"></script>
<script src="../js/main.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->

    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="../js/jquery.json.js"></script> -->
    <script src="../js/jquery.json.js"></script>

    <script type="text/javascript">

        function postJSON(url, jsonStr, successFunction, async=true, dataType="json", contentType="application/text") {
        $.ajax({
          url : url, //发送请求的地址
          type : 'POST', //类型默认值GET
          async : async, //异步请求
          data : jsonStr, //发送到服务器的数据如 {foo:["bar1", "bar2"]} 转换为 '&foo=bar1&foo=bar2'。
          processData : false,//false时为序列化
          dataType : dataType,//预期服务器返回的数据类型
          contentType : contentType,
          success : function(response, status, xhr) {
            var response;
            if (dataType != "json")
              response = $.parseJSON(response);
            if (status != "success")
              alert("未知错误");
            else successFunction(response);
          },
          error : function(xhr, error, exception) {
              // handle the error.
              alert(exception.toString());
          }
        });
      }


      function lgn_btn() {

        var req = {
            username: $("#lgn-username").val(),
            password: $("#lgn-password").val()
        };
        if ($("#lgn-type-stu").prop("checked"))
            req.group = "student";
        else if ($("#lgn-type-tea").prop("checked"))
            req.group = "teacher";
        else
            req.group = "ta_assist";
        var jsonStr = $.toJSON(req);
        alert(jsonStr);
        postJSON("../php/login.php", jsonStr, function showResponse(response) {
            if (response.code == 200) {
                if (req.group == "student")
                    window.location.href="student/Course_list.html";
                else
                    window.location.href="teacher/teacher-center.html";
            } else if (response.code == 1) {
                alert("账号或密码错误");
                $("#lgn-ret").text("账号或密码错误");
                $("#lgn-ret").css("color", "color:#FF0000;");
            } else {
                alert("不存在的账号");
                $("#lgn-ret").text("不存在的账号");
                $("#lgn-ret").css("color", "color:#FF0000;");
            }
        });
      }

        $(document).ready(function(){

            $("#sendMessage").click(function(){

                $('#leaveMessage').submit();

                return false;

            });

        });



    </script>

</head>






<body>


	<div class="position-relative js-header-wrapper ">
    <div class="header header-logged-out width-full pt-5 pb-4" role="banner">
  <div class="container clearfix width-full text-center">
    <a class="header-logo" href="#" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
      <svg height="100" class="octicon octicon-mark-github" viewBox="0 0 16 16" version="1.1" width="48" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
    </a>
  </div>
</div>
</div>


  </div>
<div class="wrap wrap-sm ">
<div class="header"></div>
<form class="form-horizontal" role="form" style="margin-left: 451px;">
  <div class="form-group form-inline">
    <label for="lgn-username" class="col-sm-2 control-label">账号</label>
    <div class="col-sm-3">
      <input type="text" data-rule="required:true|max:9999|min:2" class="form-control" name="username" id="lgn-username" placeholder="请输入账号">
      
      <span class="error" id="username-error">*</span>
      <div  style="display: none;" id="username-input-error"  class="input-erro">输入错误</div>
    </div>
  </div>
  <div class="form-group form-inline">
    <label for="lgn-password" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="lgn-password" placeholder="请输入密码">
      <span class="error">* </span>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox">请记住我
        </label>
      </div>
    </div>
  </div>
  <div class="form-group form-inline" id="lgn-type">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                  <label><input type="radio" name="hwtype" id="lgn-type-stu" checked/>学生</label>&nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="hwtype" id="lgn-type-tea"/>教师</label>&nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="hwtype" id="lgn-type-ta"/>管理员</label>&nbsp;&nbsp;&nbsp;<span class="error">* <?php echo "ok";?></span>
                </div>
              </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" id="delete_btn" onclick="lgn_btn()">登录</button>
    </div>
  </div>
</form>
</div>


</body>
</html>
