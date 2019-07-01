<html xmlns="//www.w3.org/1999/xhtml" xml:lang="zh" lang="zh" class="windows desktop landscape"><head>
<title>软件项目管理_中国大学MOOC(慕课)</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="shortcut icon" href="//edu-image.nosdn.127.net/32a8dd2a-b9aa-4ec9-abd5-66cd8751befb.png?imageView&amp;quality=100">
<meta http-equiv="x-dns-prefetch-control" content="on">
<meta itemprop="name" content="软件项目管理">
<link rel="stylesheet" href="//mc.stu.126.net/pub/s/pt_learn_learn_9b9cd9f2160d30234362450a12538954.css">
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>





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
              alert("报错辽");
          }
        });
      }


      function btn() {
       
          
        var jsonStr = "{\"username\":\"21321\"}";
        alert(jsonStr);
        postJSON("../php/main.php", jsonStr, function showResponse(response) {
            if (response.code == 200) {
            } else if (response.code == 1) {
                alert("账号或密码错误");
               
            }
        });
      }

 



    </script>


</head>

<body class="" id="auto-id-1554020821185">


<div id="g-body">
<div class="m-cbg"></div>
<div class="j-notice notice" id="j-notice"></div>
<div class="m-learnhead">
<div class="f-cb">
<a hidefocus="true" target="_blank" class="schoolImg f-fl" title="北京邮电大学" href="/university/BUPT">
<img class="" id="" src="https://img1.ph.126.net/NcSU2q64Wq3fKH2FQVnjOQ==/2397040901685387124.png" width="108" height="40" alt="北京邮电大学">
</a>
<div class="f-fl info">
<div class="f-cb">
<a hidefocus="true" class="f-fl" target="_blank" href="/course/BUPT-1003557005">
<h4 class="f-fc3 courseTxt">软件项目管理</h4>
</a>

</div>
<h5 class="f-fc6 padding-top-5">
<a class="f-fcgreen" href="/u/mooc78989191435339617" target="_blank">韩万江</a>、<a class="f-fcgreen" href="/u/mooc49341737157983063" target="_blank">张笑燕</a>、<a class="f-fcgreen" href="/u/mooc82611338441570622" target="_blank">陆天波</a>、<a class="f-fcgreen" href="/u/mooc49412893665869849" target="_blank">杨金翠</a>、<a class="f-fcgreen" href="/u/mooc82341851804545401" target="_blank">孙艺</a>
</h5>
</div>
<div class="f-fr comment">
<div class="comment_link" id="j-comment-link">评价课程</div>
<div class="comment_rating" id="j-comment-rating"></div>
</div>
</div>
</div>
<div class="g-wrap f-cb">
<div class="g-sd1">
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
<li class="u-greentab j-tabitem f-f0 first u-curtab" data-name="公告" data-type="1" data-id="1208734419" id="auto-id-1554020821312">
<a class="f-thide f-fc3" href="#/learn/announce">公告</a>
</li>
<li class="u-greentab j-tabitem f-f0" data-name="评分标准" data-type="2" data-id="1208734420" id="auto-id-1554020821313">
<a class="f-thide f-fc3" id = "grandsd" onclick="btn()" href="#/learn/score">评分标准</a>
</li>
<li class="u-greentab j-tabitem f-f0" data-name="课件" data-type="3" data-id="1208734421" id="auto-id-1554020821314">
<a class="f-thide f-fc3" href="#/learn/content">课件</a>
</li>
<li class="u-greentab j-tabitem f-f0" data-name="测验与作业" data-type="4" data-id="1208734422" id="auto-id-1554020821315">
<a class="f-thide f-fc3" href="#/learn/testlist">测验与作业</a>
</li>
<li class="u-greentab j-tabitem f-f0" data-name="考试" data-type="6" data-id="1208734423" id="auto-id-1554020821316">
<a class="f-thide f-fc3" href="#/learn/examlist">考试</a>
</li>
<li class="u-greentab j-tabitem f-f0 last" data-name="讨论区" data-type="7" data-id="1208734424" id="auto-id-1554020821317">
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
<div class="m-coulshar f-bg f-cb hover hidden" id="wxItemTab">
<div class="icon-left"><img src="//edu-image.nosdn.127.net/71fbbf76-c4f8-47ed-b106-4bbf7f126cb8.png?imageView&amp;thumbnail=30y30&amp;quality=100"></div>
<p class="item-title">微信提醒课程进度</p>
<div class="hover-content">
<img src="//edu-image.nosdn.127.net/90912154-6594-4ed2-8f22-fe5dc0087762.jpg?imageView&amp;thumbnail=258y258&amp;quality=100">
<div class="triangle"></div>
</div>
</div>
<div class="m-coulshar f-bg f-cb hover hidden" id="appTab" style="margin-top:-10px;border-top:1px solid #f0f0f0">
<div class="icon-left">
<img src="//edu-image.nosdn.127.net/2ea375bf-a813-405f-885f-a30817fa964d.png?imageView&amp;thumbnail=30y30&amp;quality=100"></div>
<p class="item-title">扫码下载APP</p>
<div class="hover-content">
<img src="//img-ph-mirror.nosdn.127.net/Rg6muO26iMOFWx9vwEHC-g==/6630234335885341999.png">
<div class="triangle"></div>
</div>
</div>
<p class="u-helplink f-fc9">
<a class="f-fcgreen" href="/help/help.htm#/hf?t=0" target="_blank">帮助中心</a>
</p>
</div>
</div>




<div class="g-mn1">
<div class="g-mn1c m-learnbox" id="courseLearn-inner-box">
<div class="u-learn-modulewidth auto-1554113862460-parent">
	<h2 class="u-learn-moduletitle j-moduleName">评分标准</h2>
	<div class="auto-1554113862460">
		<div class="j-content content f-richEditorText f-f0 edueditor_styleclass_16">
			<p><br></p><p>单元测试： 占成绩40%</p><p>课堂讨论： 占成绩30%</p><p>考试：&nbsp; &nbsp; &nbsp; &nbsp; 占成绩30%</p>
			<p><span style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; white-space: pre-wrap; background-color: rgb(255, 255, 255);">按百分制计分，60分至84分为合格，85分至100分为优秀</span></p>
		</div><div class="j-empty empty" style="display: none;">
			<span class="f-ib f-f0 j-emptyTips"></span>
		</div>
	</div>
</div>
</div>
</div>



</body></html>