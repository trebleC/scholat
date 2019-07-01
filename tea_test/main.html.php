<html xmlns="//www.w3.org/1999/xhtml" xml:lang="zh" lang="zh" class="windows desktop landscape"><head>
<title>软件项目管理</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="shortcut icon" href="//edu-image.nosdn.127.net/32a8dd2a-b9aa-4ec9-abd5-66cd8751befb.png?imageView&amp;quality=100">
<meta http-equiv="x-dns-prefetch-control" content="on">

<link rel="stylesheet" href="../css/mooc.css">

<link rel="stylesheet" href="../css/modal_open.css">
<link rel="stylesheet" href="../css/comment.css">


<link rel="stylesheet" type="text/css" href="../css/layui.css">
<!-- <script src="../js/jquery.js"></script>  -->
<!-- <link rel="stylesheet" type="text/css" href="//layui.hcwl520.com.cn/layui/css/layui.css?v=201801090202" /> -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript">
window.location.hash=="#/learn/announce";
  if (window.location.hash!="#/learn/announce") {
    window.location.hash = "#/learn/announce";
}</script>

<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="https://cdn.90so.net/layui/2.4.5/layui.all.js"></script>
<script  src="../js/config.js"></script>


<script type="text/javascript" src="../js/teacher_main.js"></script>




<script type="text/html" id="toolbarDemo">
  <div class="layui-btn-container">
    <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
    <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
    <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
  </div>
</script>
 
<script type="text/html" id="bartpl">
  <a class="layui-btn layui-btn-xs" lay-event="out">旷课</a>
 <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="late">迟到</a>
 <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="date">请假</a>
 <a class="layui-btn layui-btn-xs" lay-event="cancel">取消</a>


</script>


<script type="text/html" id="manpl">
 <a class="layui-btn layui-btn-xs" lay-event="move">移动</a>
 <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="dele">移除</a>

</script>


</head>



<body class="" id="auto-id-1554020821185" >
<div id="g-body">
<div class="m-cbg"></div>
<div class="j-notice notice" id="j-notice"></div>
<div class="m-learnhead">
<div class="f-cb">
<a hidefocus="true" target="_blank" class="schoolImg f-fl" href="/university/BUPT">
<img class="" id="" src="../img/logo.png" width="220" height="53" >
</a>
<div class="f-fl info">
<div class="f-cb">
<a hidefocus="true" class="f-fl" target="_blank" href="/course/BUPT-1003557005">
<h4 class="f-fc3 courseTxt">软件项目管理</h4>
</a>

</div>
<h5 class="f-fc6 padding-top-5">
<a class="f-fcgreen" href=adir+"tea_team.html" target="_blank">   教学团队    </a>
</h5>

</div>

<div class="f-fr comment" style="border-top-width: 0px;">
<div  id="welname" style="float: left;margin-right: 39px;margin-top: 10px;"><p>欢迎你,老师</p></div>
<div class="comment_link" style="float: right;" id="j-comment-link" ><a href="../html/login.html">退出登录</a></div>


<div class="comment_rating" id="j-comment-rating"></div>
</div>
</div>
</div>
<div class="g-wrap f-cb">
<div class="g-sd1" style="position:absolute; position:fixed;">
<div class="m-learnleft">
<div class="top f-pr">
<img class="" id="" src="https://edu-image.nosdn.127.net/1D86CCF8C169C5F824A3876E7FE5EAA3.jpg?imageView&amp;thumbnail=510y288&amp;quality=100" width="230" height="130" alt="软件项目管理">

<div class="u-searchIpt search" style="display:none;">
<form action="/search.htm" autocomplete="off" target="_blank">
<input type="text" name="search"><input class="f-icon" type="submit" value="">
</form>
</div>
</div>
<ul id="j-courseTabList" class="tab u-tabul">
<li class="u-greentab j-tabitem f-f0  u-curtab" onclick="btn(this)" data-name="公告" data-type="1" data-id="1208734419" id="btnmain1">
<a class="f-thide f-fc3" href="#/learn/announce">公告</a>
</li>
<li class="u-greentab j-tabitem f-f0" onclick="btn(this)" data-name="教学大纲" data-type="2" data-id="1208734420" id="btnmain2">
<a class="f-thide f-fc3" id = "grandsd"  href="#/learn/score">教学大纲</a>
</li>
<li class="u-greentab j-tabitem f-f0" onclick="btn(this)" data-name="课件" data-type="3" data-id="1208734421" id="btnmain3">
<a class="f-thide f-fc3" href="#/learn/content">课件</a>
</li>
<li class="u-greentab j-tabitem f-f0" onclick="btn(this)"data-name="作业" data-type="4" data-id="1208734422" id="btnmain4">
<a class="f-thide f-fc3" href="#/learn/testlist">作业</a>
</li>
<li class="u-greentab j-tabitem f-f0" onclick="btn(this)"data-name="班级" data-type="5" data-id="1208734423" id="btnmain5">
<a class="f-thide f-fc3" href="#/learn/examlist">班级</a>
</li>
<li class="u-greentab j-tabitem f-f0 last" onclick="btn(this)"data-name="讨论区" data-type="6" data-id="1208734424" id="btnmain6">
<a class="f-thide f-fc3" href="#/learn/forumindex">讨论区</a>
</li>
</ul>
<div class="m-coulshar f-bg f-cb" id="j-courseshare">
<div id="j-coushare">
<div class="f-fl f-fc3 f-f0">课程分享</div>
<div class="u-share f-cb">                <a class="weixin f-fl f-fc6 solo f-icon u-icon-weixin f-pr" title="分享到微信" rel="weixin" id="auto-id-1554020821414">                    <div class="cnt f-f0 f-pa f-dn">                        <img src="http://edu-image.nosdn.127.net/_PhotoUploadUtils_ffae7f67-fe3d-445e-b13e-d57c1d6bdc28.png" class="j-pic" width="125">                        <div class="tip">用微信扫描二维码<br>分享至好友和朋友圈</div>                        <div class="tipBg f-pa"></div>                        <div class="tipTp f-pa"></div>                    </div>                </a>                <a class="solo f-fl f-fc6 sina f-icon u-icon-weibo" title="分享到新浪微博" rel="sina" id="auto-id-1554020821416"></a>                <a class="solo f-fl f-fc6 qzone f-icon u-icon-qq" title="分享到QQ空间" rel="qzone" id="auto-id-1554020821418"></a>                <a class="solo f-fl f-fc6 renren f-icon u-icon-renren" title="分享到人人" rel="renren" id="auto-id-1554020821420" style="display: none;"></a>            </div></div>
<div class="noticeShare f-pr j-noticeShare f-f0" style="display:none">
<p>现在分享好课有奖哦~</p>
<p class="btns"><span class="detail" id="j-activityDetail">查看活动详情</span><span id="j-ignoreActivityNotice">忽略</span></p>
<span class="u-icon-close f-pa" id="j-closeNotice"></span>
<div class="shareDialogArrow"></div>
<div class="shareDialogArrow1"></div>
</div>


</div>


<p class="u-helplink f-fc9">
<a class="f-fcgreen" href="/help/help.htm#/hf?t=0" target="_blank">帮助中心</a>
</p>
</div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          模态框（Modal）标题
        </h4>
      </div>
      <div class="modal-body">
        在这里添加一些文本
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
        </button>
        <button type="button" class="btn btn-primary">
          提交更改
        </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
</div>


<div class="g-mn1">
<div class="g-mn1c m-learnbox" id="courseLearn-inner-box">
<div class="u-learn-modulewidth auto-1554113862460-parent">
	<h2 id="beforeshow" class="u-learn-moduletitle j-moduleName">公告</h2>
	<div class="auto-1554113862460">

		<div id="showdiv" >
    

		</div>

	</div>
</div>
</div>
</div>





</body>
<script type="text/javascript">
$("#btnmain1").trigger("onclick");



$.get(adir+"consql_finename.php", {
            id:getQueryString("id")
          },function(response,status){
            
            $('#welname').html("欢迎您,"+response.data[0].name);
            
          });



function getQueryString(name){
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
</script>
</html>