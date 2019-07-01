<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>软件工程课程论坛</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--添加 user-scalable=no 可以禁用其缩放（zooming）功能-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 新 Bootstrap 核心 CSS 文件 -->

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->

    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- 可选的Bootstrap主题文件（一般不使用） -->

    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>

<!-- font-awesome-4.7.0 CDN 地址-->

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>



    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->

    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.json.js"></script>

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
        postJSON("common/login/login.php", jsonStr, function showResponse(response) {
            if (response.code == 200) {
                if (req.group == "student")
                    window.location.href="student/Course_list.html";
                else
                    window.location.href="teacher/teacher-center.html";
            } else if (response.code == 1) {
                $("#lgn-ret").text("账号或密码错误");
                $("#lgn-ret").css("color", "color:#FF0000;");
            } else {
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

<div class="container">

    <div class="row clearfix">

        <div class="col-md-12 column">

            <div class="carousel slide" id="carousel-751185">

                <ol class="carousel-indicators">

                    <li class="active" data-slide-to="0" data-target="#carousel-751185">

                    </li>

                    <li data-slide-to="1" data-target="#carousel-751185">

                    </li>

                    <li data-slide-to="2" data-target="#carousel-751185">

                    </li>

                </ol>

                <div class="carousel-inner">

                    <div class="item active">

                        <img alt="" src="../img/banner.jpg" width="100%" />

                        <div class="carousel-caption">

                            <h2>

                                软件工程教学辅助系统上线啦！

                            </h2>

                            <p>

                                系统为学生提供了方便的在线作业、资料获取、在线学习交流功能；同时辅助教师完成日常教学，可以进行作业管理、课程通知、资料管理等工作；游客也能浏览课程相关信息，并可以留言。

                            </p>

                        </div>

                    </div>

                    <div class="item">

                        <img alt="" src="../img/banner.jpg"  width="100%"/>

                        <div class="carousel-caption">

                            <h2>

                                软件需求工程

                            </h2>

                            <p>

                                本学期开设了软件需求工程，旨在理论和实践相结合，帮助学生了解软件开发过程中的需求开发、分析、维护的过程。

                            </p>

                        </div>

                    </div>

                    <div class="item">

                        <img alt="" src="../img/banner.jpg" width="100%" />

                        <div class="carousel-caption">

                            <h2>

                                软件工程管理

                            </h2>

                            <p>

                                本学期开设了软件工程管理，旨在理论和实践相结合，帮助学生学习工程管理的相关知识，对CMMI有初步和整体的了解。

                            </p>

                        </div>

                    </div>

                </div> <a class="left carousel-control" href="#carousel-751185" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-751185" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

            </div>

            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

                <div class="navbar-header">

                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">软件工程教学辅助系统</a>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li>

                            <a id="modal-365839" href="#modal-container-365839" role="button" class="btn" data-toggle="modal">游客留言</a>

                        </li>

                        <li>

                             <a class="btn" data-toggle="modal" href="#modal-container-login">登录</a>

                        </li>


                        <li>

                             <a class="btn" data-toggle="modal" href="common/register/register.html">注册</a>

                        </li>

                        <li class="dropdown">

                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统相关<strong class="caret"></strong></a>

                            <ul class="dropdown-menu">

                                <li>

                                     <a href="#">系统帮助</a>

                                </li>

                                <li class="divider">

                                </li>

                                <li>

                                     <a href="#">反馈</a>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </nav>

        </div>

    </div>



    <div class="row clearfix">

        <div class="col-md-12 column">

            <div class="modal fade" id="modal-container-365839" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">

                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            <h4 class="modal-title" id="myModalLabel">

                                请留下你的建议吧！

                            </h4>

                        </div>

                        <div class="modal-body">

                            <form id="leaveMessage" role="form" method="POST" action="leaveMessage.php">

                                <div class="form-group">

                                <label for="message_text">留言内容</label>

                                <textarea name="message_text" id="message_text" class="form-control" rows="7" style="resize: none;overflow-y: visible;"></textarea>

                                </div>

                                <div class="form-group">

                                <label for="email">邮箱</label>

                                <input class="form-control" type="email" name="email" id="email" placeholder="留下你的邮箱，方便我们联系你~">

                                </div>

                            </form>

                        </div>

                        <div class="modal-footer">

                             <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> <button type="button" class="btn btn-primary" id="sendMessage">保存</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="page-header text-left"><h3>教师介绍</h3></div>




<div id="g-container">
<div class="web-nav-container">
<div class="m-navTop-func">
<div class="m-navTop-func-i">
<div class="u-navLogin-container">
<div class="u-navLogin-logo new-nav-spoc-logo">
<a href="//www.icourse163.org" target="_top">
<img src="//edu-image.nosdn.127.net/C0124E0336721FF65563B76A16A8143F.png?imageView&amp;thumbnail=190y28&amp;quality=100" width="190" height="28">
</a>
</div>
<div class="e-hover-source u-navLogin-course">
<a href="//www.icourse163.org/category/all" target="_top">
<span class="nav">课程</span>
</a>
<div class="e-hover-target">
<div class="e-hover-arrow"></div>
<div class="e-hover-arrow-border"></div>
<div class="e-hover-content">
<div class="j-nav-CateBox u-cateBox-container"><div class="u-cateNavR-container  f-cb"><!--Regular if40--><!--Regular list--><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/guojiajingpin" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-elite cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">国家精品</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/computer" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-computer cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">计算机</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/foreign-language" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-foreign-language cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">外语</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/psychology" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-psychology cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">心理学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/ECO" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-economics cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">经济学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/management theory" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-management cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">管理学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/law" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-law cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">法学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/literature" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-literature cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">文学文化</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/historiography" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-history cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">历史</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/philosophy" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-philosophy cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">哲学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/engineering" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-engineering cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">工学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/science" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-science cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">理学</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/biomedicine" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-biomedicine cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">医药卫生</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/agriculture" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-agriculture cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">农林园艺</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/art-design" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-art cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">艺术设计</span></div></a></div></div><div class="cateNavR-container-f"><div class="f-fl cateNavR-container-f_div185"><a href="/category/teaching-method" target="_blank" class="cateNavR-container-f_div185_a186"><div class="u-icon-teaching-method cateNavR-container-f_div185_a186_div187"></div><div class="f-thide cateNavR-container-f_div185_a186_div188"><span class="f-thide cateNavR-container-f_div185_a186_div188_span189">教育教学</span></div></a></div></div></div></div>
</div>
</div>
</div>
<div class="u-navLogin-school">
<a href="//www.icourse163.org/university/view/all.htm" target="_top">
<span class="nav">名校</span>
</a>
</div>
<div class="u-navLogin-discuss">
<a href="//kaoyan.icourse163.org" target="_top">
<span class="nav">2020考研</span>
</a>
</div>
<div class=" u-navLogin-cloud">
<a href="//www.icourse163.org/spoc/schoolcloud/index.htm" target="_blank">
<span class="nav">学校云</span>
</a>
</div>
<div class="j-kaoyan-link u-navLogin-kaoyan" id="auto-id-1553585047181">
<a href="//www.icourse163.org/topics/topmszl/" target="_blank">
<span class="nav">名师专栏</span>
</a>
</div>
<div class="j-latest-mark u-navLogin-mark f-f0 f-dn">
<span>新</span>
</div>
<div class="web-nav-right-part">
<div class="u-navLogin-app">
<img src="//edu-image.nosdn.127.net/03CC83FA97B35119DFB8C772754765CC.png?imageView&amp;thumbnail=13y22&amp;quality=100" width="13" height="21">
</div>
<div class="e-hover-source u-navLogin-appText">
<a href="//www.icourse163.org/mobile.htm?from=navibar&amp;mobiletopbar=hidden" target="_top">
<span class="nav">客户端</span>
</a>
<div class="e-hover-target">
<div class="e-hover-arrow"></div>
<div class="e-hover-arrow-border"></div>
<div class="e-hover-content">
<div class="u-app-download-container">
<div class="u-app-tip">
<span>扫码下载官方APP</span>
</div>
<div class="u-app-qrcode">
<img src="//img-ph-mirror.nosdn.127.net/Rg6muO26iMOFWx9vwEHC-g==/6630234335885341999.png" width="140" height="140">
</div>
<div class="u-app-iphone-link">
<a href="//itunes.apple.com/cn/app/id977883304" target="_blank"></a>
</div>
<div class="u-app-android-link">
<a href="//study.163.com/pub/ucmooc/ucmooc-android-official.apk" target="_blank"></a>
</div>
</div>
</div>
</div>
</div>
<div class="u-navLogin-searchFunc">
<div class="u-navLogin-searchFunc-i">
<div class="j-search-box u-search-container">
<div class="j-input u-search-input"><div class="u-sugInput">                <div class="iptArea f-cb">                    <div class="ipt"><div class="u-insug">                        <div class="area"><div class="u-baseinputui" style="height: 30px;">         <input type="text" name="search" class="j-textarea inputtxt" autocomplete="off" id="auto-id-1553585047130" style="height: 20px;">           <label class="j-hint inputhint" for="inputtxt" id="auto-id-1553585047128">搜索感兴趣的课程</label>      </div></div>                        <div class="sug" style="display:none">                            <div class="f-thide s-fc6 ar j-basetxt">请选择或继续输入...</div>                            <div class=""></div>                        </div>                    </div></div>                </div>            </div></div>
<div class="u-search-icon">
<span class="u-icon-search2 j-searchBtn" id="auto-id-1553585047136"></span>
</div>
</div>
</div>
</div>
<div class="u-navLogin-loginBox">
<div class="u-navLogin-loginBox-i">
<div class="m-navlinks" id="j-topnav">
<div class="unlogin">
<a class="f-f0 navLoginBtn" id="auto-id-1553585047112">登录<span class="huo">&nbsp;&nbsp;|&nbsp;&nbsp;</span>注册</a>
</div>
</div></div>
</div>
</div>
</div>
</div>
</div>
</div><div id="g-body"><div class="m-top f-cb f-pr f-f0">
<div class="g-flow">
<div id="j-breadcrumb"><div class="breadcrumb">
<!--Regular list-->
<!--Regular if29-->
<!--Regular if30-->
<a href="/" class="breadcrumb_item">首页</a>


<!--Regular if31-->
<span class="breadcrumb_sep">&gt;</span>


<!--Regular if32-->
<!--Regular if33-->
<a href="/category/all" class="breadcrumb_item">全部课程</a>


<!--Regular if34-->
<span class="breadcrumb_sep">&gt;</span>


<!--Regular if35-->
<span class="breadcrumb_item">
<!--Regular list-->
<a class="breadcrumb_item" target="_blank" href="/category/computer">计算机</a>
<!--Regular if36-->

</span>

<!--Regular if37-->

</div></div>
<div class="g-sd1 video-intro">
<div id="j-courseImg" class="m-recimg canlick">
<img class="img" id="" src="https://edu-image.nosdn.127.net/1D86CCF8C169C5F824A3876E7FE5EAA3.jpg?imageView&amp;thumbnail=510y288&amp;quality=100" alt="图片" width="510" height="288">
<div class="click-btn-wrapper f-pa">
<a class="clickBtn">
<span class="u-icon-play f-ib f-vam"></span>
<span class="f-ib f-vam">播放视频简介</span>
</a>
</div>
</div>
</div>
<div class="g-mn1 course-enroll-info-wrapper">
<div class="title-wrapper">
<div class="f-cb f-pr">
<div class="f-fl course-title-wrapper">
<span class="course-title f-ib f-vam">软件项目管理</span>
<span id="j-teacherAssistMark" class="f-fcf f-f0 taMark" style="display:none;"></span>
</div>
<div class="f-fr f-f0 f-fs1 course-share f-pa" id="j-coushare">
<span class="f-ib f-vam">分享</span>
<div class="u-share f-cb">                <a class="weixin f-fl f-fc6 solo f-icon u-icon-weixin f-pr" title="分享到微信" rel="weixin" id="auto-id-1553585047186">                    <div class="cnt f-f0 f-pa f-dn">                        <img src="http://edu-image.nosdn.127.net/_PhotoUploadUtils_082f720e-8472-4ab8-8097-c9216ab39411.png" class="j-pic" width="125">                        <div class="tip">用微信扫描二维码<br>分享至好友和朋友圈</div>                        <div class="tipBg f-pa"></div>                        <div class="tipTp f-pa"></div>                    </div>                </a>                <a class="solo f-fl f-fc6 sina f-icon u-icon-weibo" title="分享到新浪微博" rel="sina" id="auto-id-1553585047188"></a>                <a class="solo f-fl f-fc6 qzone f-icon u-icon-qq" title="分享到QQ空间" rel="qzone" id="auto-id-1553585047190"></a>                <a class="solo f-fl f-fc6 renren f-icon u-icon-renren" title="分享到人人" rel="renren" id="auto-id-1553585047192" style="display: none;"></a>            </div></div>
</div>
<div id="course-enroll-info"><div class="course-enroll-info">
<div class="course-enroll-info_course-info">
<div class="course-enroll-info_course-info_term-select">
<!--Regular if19-->
<div class="ux-dropdown course-enroll-info_course-info_term-select_dropdown">
    <!--inlcude-->
        <div class="ux-dropdown_hd f-thide th-bd2" title="第2次开课">
            <i class="ux-icon-caret-down"></i>

            <span class="ux-dropdown_cnt th-fs0fc5 ux-btn-toggle">第2次开课 </span>
        </div>
        <div style="display: none;" class="ux-dropdown_bd">
            <ul class="ux-dropdown_listview th-bd2">
            <!--Regular if20-->
            <!--Regular if21-->
            <!--Regular list-->
            <li class="f-thide th-fs0fc5" title="第1次开课">
                <!--Regular if22-->
                    第1次开课
                
            </li>
            
            <li class="f-thide th-fs0fc5 z-sel" title="第2次开课">
                <!--Regular if23-->
                    第2次开课
                
            </li>
            
            
            </ul>
        </div>
    
<!--Regular if24-->
</div>

</div>
<div class="course-enroll-info_course-info_term-info">
<div class="course-enroll-info_course-info_term-info_term-time">
<span>开课时间：</span>
<span>2019年03月04日 ~ 2019年07月07日</span>
</div>
<div class="course-enroll-info_course-info_term-info_term-progress ongoing">
进行至第4周，共18周
</div>
</div>
<div class="course-enroll-info_course-info_term-workload">
<span>学时安排：</span>
<span>2-3</span>
</div>
</div>
<div class="course-enroll-info_course-enroll">
<div class="course-enroll-info_course-enroll_price-enroll">
<!--Regular if25-->
<span class="course-enroll-info_course-enroll_price-enroll_enroll-count">已有1888人参加</span>
</div>
<!--Regular if26-->
<div class="course-enroll-info_course-enroll_buttons">
<div class="course-enroll-info_course-enroll_buttons_enroll-btn">
<span class="ux-btn  ux-btn- ux-btn-w220 ">
    <!--Regular if27-->
    立即参加
    
</span>
</div>
<!--Regular if28-->
</div>

</div>
</div></div>
</div>
</div>
</div>
</div>
<div class="g-flow">
<div class="b-40"></div>
<div class="g-wrap f-cb">
<div class="g-mn2">
<div class="g-mn2c f-bgw m-infomation f-f0">
<div class="m-infomation_tabs">
<div data-action="点击详情tab" data-label="1206093204" class="ga-click m-infomation_tabs_tab selected f-ib f-vam" id="detail-tag-button">课程详情</div>
<div data-action="点击评价tab" data-label="1206093204" class="ga-click m-infomation_tabs_tab f-ib f-vam" id="review-tag-button">课程评价<span id="review-tag-num">(16)</span></div>
</div>
<div id="content-section" class="m-infomation_content-section">
<div id="j-rectxt" class="f-dn">spContent=《软件项目管理》是软件工程专业的专业课程，本课程有贯穿始终的项目案例， 让学生切身体会软件项目管理过程，本课程于2007年度获得教育部-IBM精品课程, 教材《软件项目管理案例教程》是北京市精品教材，十一五国家规划教教材，有百余所高校采用，具有不错口碑。</div>
<div id="j-course-heading-intro" class="course-heading-intro">
<div class="course-heading-intro_intro" id="j-rectxt2">《软件项目管理》是软件工程专业的专业课程，本课程有贯穿始终的项目案例， 让学生切身体会软件项目管理过程，本课程于2007年度获得教育部-IBM精品课程, 教材《软件项目管理案例教程》是北京市精品教材，十一五国家规划教教材，有百余所高校采用，具有不错口碑。</div>
<div class="course-heading-intro_team">—— 课程团队</div>
</div>
<div class="category-title f-f0">
<span class="category-title_icon f-ib f-vam u-icon-categories"></span>
<span class="f-ib f-vam">课程概述</span>
</div>
<div class="category-content j-cover-overflow">
<div class="f-richEditorText"><p><span style=";font-family:'Arial',sans-serif">&nbsp;&nbsp;</span><span style=";font-family:宋体">《软件项目管理》是软件工程专业的专业课程，以培养软件项目管理能力为目的，本课程以路线图的形式讲述了软件项目管理的理论、方法以及技巧，包括项目初始、项目计划、项目执行控制、项目结束。本课程将</span><span style=";font-family:'Arial',sans-serif">CDIO</span><span style=";font-family:宋体">工程教育模式引入到课堂教学中来，以实现</span><span style=";font-family:'Arial',sans-serif">“</span><span style=";font-family:宋体">做中学</span><span style=";font-family:'Arial',sans-serif">”</span><span style=";font-family:宋体">和</span><span style=";font-family:'Arial',sans-serif">“</span><span style=";font-family:宋体">基于项目的学习</span><span style=";font-family:'Arial',sans-serif">”</span><span style=";font-family:宋体">。通过贯穿始终的项目案例和情景项目展示，同时通过一个</span><span style=";font-family:'Arial',sans-serif">Web</span><span style=";font-family:宋体">项目实践</span><span style=";font-family:'Arial',sans-serif">,</span><span style=";font-family:宋体">完成了基于敏捷模型的项目开发和管理过程</span><span style=";font-family:'Arial',sans-serif">. </span><span style=";font-family:宋体">让学生切身体会软件项目管理过程，从而更好地将软件项目管理理论与实践相结合。</span></p><p><br></p></div>
</div>
<div class="category-title f-f0">
<span class="category-title_icon f-ib f-vam u-icon-scholar"></span>
<span class="f-ib f-vam">授课目标</span>
</div>
<div class="category-content j-cover-overflow">
<div class="f-richEditorText"><p style="text-indent:28px;line-height:150%"><span style="font-family:宋体">通过本课程的学习和实践，学生可以具有系统的工程实践学习经历，培养学生具有一定的组织管理能力、表达能力和人际交往能力以及在团队中发挥作用的能力。课程教学理念是“以学生为中心”，培养和提高学生的实践能力，培养学生团队工程素养以及带领团队管理好一个软件项目的能力，其中包括项目计划能力、项目需求分析建模能力、软件实现和执行能力、软件控制管理能力等。最后满足企业对软件项目人才的要求。达到满足企业对软件项目人才要求是培养的核心目标。</span></p><p><br></p></div>
</div>
<div class="category-title f-f0">
<span class="category-title_icon f-ib f-vam u-icon-bookmark"></span>
<span class="f-ib f-vam">课程大纲</span>
</div>
<div class="category-content j-cover-overflow" id="j-course-outline"><div class="outline">
<!--Regular if2-->
<div class="outline__new-outline">
<!--Regular list-->
<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">01</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目管理基本概念</span>
</div>
<!--Regular if3-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">1.1.软件项目管理 基本概念</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">1.2.PMBOK与软件项目管理知识体系</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">1.3.敏捷项目管理</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">1.4.软件项目管理过程图</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">02</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目确立</span>
</div>
<!--Regular if4-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">2.1.项目立项</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">2.2.项目招投标流程</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">2.3.项目章程</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">2.4.项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">03</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">生存期模型</span>
</div>
<!--Regular if5-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">3.1.生存期模型选择</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">3.2.预测生存期模型</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">3.3.迭代生存期模型</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">3.4.增量生存期模型</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">3.5.敏捷生存期模型</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">3.6.项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">04</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目需求管理</span>
</div>
<!--Regular if6-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">4.1.软件需求管理过程</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">4.2.传统需求建模方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">4.3.敏捷需求建模方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">4.4.项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">05</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目任务分解</span>
</div>
<!--Regular if7-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">5.1.任务分解定义</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">5.2.任务分解方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">5.3.敏捷任务分解</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">5.4.项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">06</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目成本计划</span>
</div>
<!--Regular if8-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.1. 成本估算-代码行估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.2. 成本估算-功能点估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.3. 成本估算-用例点估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.4. 成本估算-类比 (自顶向下)估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.5. 成本估算-自下而上估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.6. 成本估算-三点估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.7. 成本估算-参数估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.8. 成本估算-专家估算法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.9. 成本估算-敏捷估算方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.10  成本预算</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">6.11. 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">07</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目进度计划</span>
</div>
<!--Regular if9-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.1-进度管理基本知识</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.2.1 进度估算-传统估算方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.2.2 进度估算-敏捷估算方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.3.1进度计划编排-超前与滞后方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.3.2 进度编排方法-关键路径法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.3.3 进度编排方法-时间压缩法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.3.4进度编排方法-资源优化</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.3.5 进度编排方法-敏捷计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.4 项目进度 模型(SPSP)</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">7.5 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">08</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text"> 软件项目质量计划</span>
</div>
<!--Regular if10-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">8.1 -  软件质量基本概念</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">8.2 -  软件项目质量活动</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">8.3 -  敏捷项目质量活动</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">8.4 -软件项目质量计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">8.5- 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">09</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目配置管理计划</span>
</div>
<!--Regular if11-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">9.1 -  软件配置管理基本概念</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">9.2 -  软件项目配置管理过程</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">9.3- 软件项目配置管理计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">9.4 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">10</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目团队计划</span>
</div>
<!--Regular if12-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">10.1-团队计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">10.2-敏捷团队计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">10.3-项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">11</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目风险计划</span>
</div>
<!--Regular if13-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">11-1-风险管理过程</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">11-2-风险管理计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">11-3-项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">12</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">软件项目合同计划</span>
</div>
<!--Regular if14-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">12-1-项目合同类型</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">12-2-项目合同计划</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">13</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">项目集成计划执行控制</span>
</div>
<!--Regular if15-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">13.1  集成计划执行控制</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">13.2 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">14</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">项目核心计划执行控制</span>
</div>
<!--Regular if16-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14–1  软件项目范围管理- 传统与敏捷</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14-2-1-成本进度管理-  图解控制法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14-2-2 -成本进度管理- 挣值分析法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14-2-3 -成本进度管理- 网络图分析</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14-2-4-成本进度管理-  敏捷方法</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14-3 质量管理- 传统与敏捷</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">14-4-项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">15</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">项目辅助计划执行控制</span>
</div>
<!--Regular if17-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">15-1  软件项目辅助计划执行控制</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">15-2 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

<div class="outline__new-outline__chapter f-cb">
<div class="outline__new-outline__chapter__number f-fl">16</div>
<div class="outline__new-outline__chapter__content f-fl">
<div class="outline__new-outline__chapter__content__title">
<span class="outline__new-outline__chapter__content__title__text">项目结束过程</span>
</div>
<!--Regular if18-->
<div class="outline__new-outline__chapter__content__plan">
<div class="outline__new-outline__chapter__content__plan__title">课时</div>
<div class="outline__new-outline__chapter__content__plan__lessons">
<!--Regular list-->
<div class="outline__new-outline__chapter__content__plan__lessons__lesson">16-1 项目结束过程</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson">16-2 项目案例</div>

<div class="outline__new-outline__chapter__content__plan__lessons__lesson"></div>

</div>
</div>
</div>
</div>

</div>

</div></div>
<div class="category-title f-f0">
<span class="category-title_icon f-ib f-vam u-icon-scholar"></span>
<span class="f-ib f-vam">预备知识</span>
</div>
<div class="category-content j-cover-overflow">
<div class="f-richEditorText"><p style=";margin-bottom:0;background:white"><span style="font-size: 12px">希望选课的同学在开始这门课程之前，对下属内容有所掌握：</span><span style="font-size: 12px;font-family: Helvetica, sans-serif"></span></p><p style=";margin-bottom:0;background:white"><span style="font-size: 13px;font-family: Symbol">·<span style="font-variant-numeric: normal;font-variant-east-asian: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style="font-size: 12px">软件工程导论</span></p><p style=";margin-bottom:0;background:white"><span style="font-size: 13px;font-family: Symbol">·<span style="font-variant-numeric: normal;font-variant-east-asian: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style="font-size: 12px">掌握一门以上编程语言（</span><span style="font-size: 12px;font-family: Helvetica, sans-serif">JAVA</span><span style="font-size: 12px">，</span><span style="font-size: 12px;font-family: Helvetica, sans-serif">C</span><span style="font-size: 12px">，</span><span style="font-size: 12px;font-family: Helvetica, sans-serif">C++</span><span style="font-size: 12px">等）</span></p><p style=";margin-bottom:0;background:white"><span style="font-size: 13px;font-family: Symbol">·<span style="font-variant-numeric: normal;font-variant-east-asian: normal;font-stretch: normal;font-size: 9px;line-height: normal;font-family: 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style="font-size: 12px">了解软件开发过程</span></p><p><br></p></div>
</div>
<div class="category-title f-f0" id="requirements">
<span class="category-title_icon  f-ib f-vam f-15 u-icon-cert2"></span>
<span class="f-ib f-vam">证书要求</span>
</div>
<div class="category-content j-cover-overflow">
<div class="f-richEditorText"><p><br></p><ol class=" list-paddingleft-2" style="list-style-type: decimal;"><li><p>单元测试:40%</p></li><li><p>单元作业:30%</p></li><li><p>考试: 30%</p><p><br></p><p><br></p></li></ol><p><span style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);">按百分制计分，60分至84分为合格，85分至100分为优秀</span></p></div>
</div>
<div class="category-title f-f0">
<span class="category-title_icon f-ib f-vam f-18 u-icon-stacks"></span>
<span class="f-ib f-vam">参考资料</span>
</div>
<div class="category-content j-cover-overflow">
<div class="f-richEditorText"><p style="line-height:150%"><span style="font-family:宋体"></span></p><p style="text-align:left;line-height:21px"><span style=";font-family:宋体;color:#666666">1</span><span style=";font-family:宋体;color:#666666">、《软件项目管理案例教程 第3版》；韩万江等编著；机械工业出版社； 2015年6月出版。</span></p><p style="text-align:left;line-height:21px"><span style=";font-family:宋体;color:#666666">2</span><span style=";font-family:宋体;color:#666666">、软件项目管理(原书第5版), [英]Bob Hughes MikeCotterell 著 ,机械工业出版社； 2010年7月</span></p><p style="text-align:left;line-height:21px"><span style=";font-family:宋体;color:#666666">3<span style="font-family: 宋体;">、</span>PMBOK® </span><span style=";font-family:宋体;color:#666666">指南 第6版,PMI 2017年出版</span></p><p style="text-align:left;line-height:21px"><span style=";font-family:宋体;color:#666666">4<span style="font-family: 宋体;">、</span></span><span style=";font-family:宋体;color:#666666">《软件工程案例教程 第3版》, 韩万江等编著,机械工业出版社,2017年3月</span></p><p style="text-align:left;line-height:21px"><span style=";font-family:'Arial',sans-serif;color:#666666">5<span style="font-family: 宋体;">、</span><span style="font-family: 宋体;">《</span></span><span style=";font-family:宋体;color:#666666">软件工程</span><span style=";font-family:'Arial',sans-serif;color:#666666"><span style="font-family: 宋体;">》</span></span><span style=";font-family:宋体;color:#666666">(</span><span style=";font-family:宋体;color:#666666">原书第10版), [英]Ian Sommerville 著 ,机械工业出版社,2018年1月</span></p><p style="line-height:150%"><span style="font-family:宋体"><span style="font-family: 宋体;"><span style="font-family: 宋体;"></span></span></span><br></p><p style="line-height:150%"><br></p><p><br></p></div>
</div>
</div>
<div id="comment-section"></div>
</div>
</div>
<div class="g-sd2 m-sd2">
<div class="m-sdCourse" id="j-sdCourse"></div>
<div class="m-sdinfo">
<div id="j-center" class="m-center f-dn"></div>
<div class="f-bgw">
<div class="m-teachers">
<a data-cate="课程介绍页" data-action="点击学校logo" data-label="57001-北京邮电大学" class="ga-click m-teachers_school-img f-ib" href="/university/BUPT" target="_blank">
<img class="" id="" src="https://img1.ph.126.net/NcSU2q64Wq3fKH2FQVnjOQ==/2397040901685387124.png" alt="北京邮电大学" width="220" height="80">
</a>
<div class="padding: 30px 25px;
text-align: left;">
<div class="t-title f-fc3 f-f0">授课老师</div>
<a data-cate="课程介绍页" data-action="点击课程团队头像" data-label="1206093204-韩万江" class="ga-click u-tchcard f-cb" href="/u/mooc78989191435339617" target="_blank">
<img class="f-fl" id="" src="https://edu-image.nosdn.127.net/B8CB0FE954BF8681034E7AE8CAFF77AC.jpg?imageView&amp;thumbnail=582y582&amp;quality=100" alt="韩万江" width="55" height="55">
<div class="cnt f-fl">
<h3 class="f-fc3">韩万江</h3>
<p class="lector-title f-fc9 f-f0">副教授</p>
</div>
</a>
<a data-cate="课程介绍页" data-action="点击课程团队头像" data-label="1206093204-张笑燕" class="ga-click u-tchcard f-cb" href="/u/mooc49341737157983063" target="_blank">
<img class="f-fl" id="" src="https://edu-image.nosdn.127.net/5A63F59542717B1192F2430630496F14.jpg?imageView&amp;thumbnail=582y582&amp;quality=100" alt="张笑燕" width="55" height="55">
<div class="cnt f-fl">
<h3 class="f-fc3">张笑燕</h3>
<p class="f-fc6 f-f0">教授</p>
</div>
</a>
<a data-cate="课程介绍页" data-action="点击课程团队头像" data-label="1206093204-陆天波" class="ga-click u-tchcard f-cb" href="/u/mooc82611338441570622" target="_blank">
<img class="f-fl" id="" src="https://edu-image.nosdn.127.net/74A38D06E376B84FE52428AA89B14984.jpg?imageView&amp;thumbnail=582y582&amp;quality=100" alt="陆天波" width="55" height="55">
<div class="cnt f-fl">
<h3 class="f-fc3">陆天波</h3>
<p class="f-fc6 f-f0">教授</p>
</div>
</a>
<a data-cate="课程介绍页" data-action="点击课程团队头像" data-label="1206093204-杨金翠" class="ga-click u-tchcard f-cb" href="/u/mooc49412893665869849" target="_blank">
<img class="f-fl" id="" src="https://edu-image.nosdn.127.net/31CC5FA5A450FCCB5FF3CB6795B75445.jpg?imageView&amp;thumbnail=582y582&amp;quality=100" alt="杨金翠" width="55" height="55">
<div class="cnt f-fl">
<h3 class="f-fc3">杨金翠</h3>
<p class="f-fc6 f-f0">讲师</p>
</div>
</a>
<a data-cate="课程介绍页" data-action="点击课程团队头像" data-label="1206093204-孙艺" class="ga-click u-tchcard f-cb" href="/u/mooc82341851804545401" target="_blank">
<img class="f-fl" id="" src="https://edu-image.nosdn.127.net/C5259CA8291DEEE963BCE2080592304C.jpg?imageView&amp;thumbnail=582y582&amp;quality=100" alt="孙艺" width="55" height="55">
<div class="cnt f-fl">
<h3 class="f-fc3">孙艺</h3>
<p class="f-fc6 f-f0">高级工程师</p>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="g-wrap m-foot f-pr" id="j-footer">
<div class="g-flow f-cb">
<div class="f1 f-fl">
<div class="logo"></div>
<p class="f-fc14 f-fc9">由高教社联手网易推出，让每一个有提升愿望的用户能够学到中国知名高校的课程，并获得认证。</p>
</div>
<div class="f4 f-fr f-pr">
<h4 class="f-fcc">友情链接</h4>
<div class="f-cb">
<a href="https://www.kada.com/?utm_source=www.icourse163.org/&amp;utm_medium=bottom_links&amp;utm_campaign=business&amp;utm_content=kada2018092902" target="_blank" class="f-fc9 f4a">网易卡搭编程</a>
<a href="//study.163.com/" target="_blank" class="f-fc9 f4a">网易云课堂</a>
<a href="//100.163.com/" target="_blank" class="f-fc9 f4a">网易100分</a>
</div>
</div>
<div class="f3 f-fr f-pr">
<h4 class="f-fcc">关注我们</h4>
<div class="f-cb">
<a class="f-icon f-fc9 u-icon-weixin weixin gzIc f-pr f-fl">
<div class="tipQrcode f-pa">
<div class="qrImag">
<img src="//edu-image.nosdn.127.net/ceff46a7-e151-4a3a-b208-90e41721870c.jpg?imageView&amp;thumbnail=860y860&amp;quality=100" alt="加中M微信好友" width="120px" height="120px">
</div>
<div class="tip f-pa"></div>
</div>
</a>
<a href="//weibo.com/icourse163" target="_blank" class="f-icon f-fc9 gzIc f-fs1 f-fl u-icon-weibo weibo"></a>
</div>
</div>
<div class="f2 f-fr f-pr">
<h4 class="f-fcc">关于我们</h4>
<div class="f-cb">
<a href="/about/aboutus.htm" target="_blank" class="f-fc9 f2a">关于我们</a>
<a href="/spoc/schoolcloud/index.htm" target="_blank" class="f-fc9 f2a">学校云</a>
<a href="/about/contactus.htm#/contactus?type=2" target="_blank" class="f-fc9 f2a">联系我们</a>
<a href="/help/help.htm" target="_blank" class="f-fc9 f2a">常见问题</a>
<a href="/about/contactus.htm#/contactus?type=4" target="_blank" class="f-fc9 f2a">意见反馈</a>
<a href="/about/contactus.htm#/contactus?type=5" target="_blank" class="f-fc9 f2a">法律条款</a>
</div>
</div>
</div>
<div class="beian"><p class="f-fc12 f-fc6"> <a class="f-fc6" target="_blank" href="//www.miitbeian.gov.cn/state/outPortal/loginPortal.action">粤B2-20090191-26</a> | 京ICP备12020869号-2 | <a class="f-fc6" target="_blank" href="//www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602000207">京公网安备44010602000207</a> <br>©2014-2019 icourse163.org </p></div>
</div>
</div>





</div>





<div class="footer">

    <div class="container">

        <div class="row footer-top">

            <div class="col-md-6">

                <h4>软件工程教学辅助系统</h4>

                <p>

                    开发完成于2016-12-31, 项目开源代码见<a href="https://github.com/lannooo/SETA_system">github</a>

                    <br/>

                    成员组成: xxx,xxx,xxx,xxx,xxx

                </p>

            </div>

            <div class="col-md-6">

                <div class="row about">

                    <div class="col-md-6">

                        <h4>课外学习</h4>

                        <ul class="list-unstyled">

                            <li><a href="http://www.softwareengineerinsider.com/">Software Engineer Insider</a></li>

                            <li><a href="http://www.tutorialspoint.com/cmmi/">SEI CMMI Tutorial</a></li>

                        </ul>

                    </div>

                    <div class="col-md-6">

                        <h4>友情链接</h4>

                        <ul class="list-unstyled">

                            <li><a href="http://127.0.0.1/">浙江大学现代教务管理系统</a></li>

                            <li><a href="http://127.0.0.1">计算机科学与技术学院办公网</a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="row footer-bottom">

            <ul class="list-inline text-center">

                <li>软件需求工程&软件工程管理[G01]</li>

            </ul>

        </div>

    </div>

</div>


    <div class="modal fade" id="modal-container-login" role="dialog" aria-labelledby="modify-block" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="modify-block">用户登录</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-sm-2 control-label">账号</label>
                <div class="col-sm-8"><input type="text" class="form-control" id="lgn-username" /></div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-8"><input type="password" class="form-control" id="lgn-password"/></div>
              </div>
              <div class="form-group" id="lgn-type">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                  <label><input type="radio" name="hwtype" id="lgn-type-stu" checked/>学生</label>&nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="hwtype" id="lgn-type-tea"/>教师</label>&nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="hwtype" id="lgn-type-ta"/>助教</label>&nbsp;&nbsp;&nbsp;
                </div>
              </div>
              <div class="form-group" id="lgn-type">
                <label class="col-sm-10 pull-right" id="lgn-ret"></label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-danger" href="common/passwordModify/find_pwd.html">忘记密码</a>
            <button type="button" class="btn btn-primary" id="delete_btn" onclick="lgn_btn()">登录</button>
          </div>
        </div>
      </div>
    </div>



</body>

</html>
