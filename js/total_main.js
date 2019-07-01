var dataloader = new SCDIGIS.DataLoader();
var gisConfig = dataloader.getGISConfig();
var host = gisConfig["data"]["host"];
var file = gisConfig["data"]["file"];
var stu_file = gisConfig["data"]["studentfile"];


adir = "http://"+host+"/"+file+"/"+stu_file+"/";





function showdiv_fun(res){
    var element=document.getElementById("showdiv");
    console.log("showdiv_fun");
    var h2=document.getElementById("beforeshow");
          if(res=="1"){
            h2.innerHTML="公告";
        /*element.innerHTML="<div id=\"announcement_div\">"+
        "<h1 id= title>nihao</h1>"+
        "<p  id= adate>nihao</p>"+
        "<p  id=content>nihao</p>"+
        "<br><br></div>";*/
         $.get(adir+"consql_ann.php",function(response,status){
            var all_str = "";
            for (var i = response.count-1;i>=0;i--)
        {               
            
    var str="<div id=\"announcement_div\" style=\"text-align: center;\" name = \"ann"+response.data[i].anid+"\" style=\"display:inline\">"+
        "<h1 id= title_"+i+">"+response.data[i].title+"</h1>"+
        "<p  id= adate_"+i+">"+response.data[i].adate+"</p>"+
        "<p  id=content_"+i+" style=\"font-size: 18px;margin-bottom: 10px;margin-top: 50px;\">"+response.data[i].content+"</p>"+
        "<br><br><HR style=\"FILTER: progid:DXImageTransform.Microsoft.Glow(color=#987cb9,strength=10)\" margin-left: 179px ;width=\80%\" color=#987cb9 SIZE=1><br><br></div>";
        all_str = all_str + str ;

        }

        element.innerHTML=all_str;
     
  });

     







    }else if(res=="2"){
        h2.innerHTML="评分标准";

        //element.innerHTML="<h1>评分标准</h1><br><br><button><a href = \"//127.0.0.1/scholat/file/cinfo.pdf\">下载文件</button>";

        element.innerHTML="<object data=\"//127.0.0.1/scholat/file/cinfo.pdf\" type=\"application\/pdf\" width=\"100%\" height=\"100%\"> 任课老师还没有上传课程大纲呢！</object>";

       //element.innerHTML="<iframe width=\"100%\" height=\"100%\"> This browser does not support PDFs. Please download the PDF to view it: <a href=\"//127.0.0.1/scholat/test/consql_cinfo.php\">Download PDF</a> </iframe>";
/*
        $.get(adir+"consql_cinfo.php",function(response,status,html){
            var all_str = response;
            


        

        
     
  });*/


    }else if(res=="3"){
        h2.innerHTML=
        "资料<select style=\"width: 200px; height: 25px; line-height: 25px;margin-left: 38px;font-size: 18px;\" id=\"matSelected\" name=\"selectedClassId\"onchange=\"matSelected()\">"+
        "<option value=\"-1\" selected=\"selected\">全部</option>"+
    "<option value=\"0\">教学大纲</option>"+
    "<option value=\"1\" >课件</option>"+
    "<option value=\"2\">实践指导书</option>"+
        "</select>";
        load("../js/stu_mat.js");



    }else if(res=="4"){

        h2.innerHTML="作业";


$.get(adir+"consql_hw.php",function(response,status){
    
            var all_str = "<div style=\"margin-top: 10px; margin-bottom: 18px;\"><table class=\"datalist\" id=\"datalist\" style=\"margin-bottom: 20px;\" cellspacing=\"1\"><tbody>"+
        "<tr style=\"background: rgb(212, 249, 249) none repeat scroll 0% 0%;height: 46px;\">       <th width=\"130px\"> 状态    </th>    <th  width=\"395px\"text-align=\"center\"> 作业标题    </th>        <th width=\"130px\"> 发布人    </th>    <th width=\"175px\"> 截止时间    </th>    <!-- <th width=\"130px\" > 提交时间    </th>-->        <th width=\"310px\"> 操作    </th>        <th width=\"100px\"> 评语    </th> </tr>";
            for (var i = response.count-1;i>=0;i--)
        {               


            if(response.data[i].is_fix==1) var color = ["#b1a5a5","#d2caca","white"]; else var color = ["","white"];


        var str = "<tr class=\"altrow\" style=\"background: rgb(255, 255, 255) none repeat scroll 0% 0%;height: 56.5px;\" >"+
"<td id=\"upload15826\">"+
"<span style=\"padding:2px 14px;color: white;background:#f6223b;border-radius:10px;font-size:12px;\">"+
"未提交</span>"+
"   </td>"+
"   <td style=\"text-align:center;\">"+
"       <a href=\"S_oneHomework.html?courseId=2185&amp;homeworkId=15826\">"+response.data[i].name+
"</a>"+
"   </td>"+
"   <td>"+
"   <a href=\"../lyulaoshi12345678\" target=\"_blank\">"+response.data[i].tname+
"</a>"+
"   </td>"+
"   <td>"+
"   <span style=\"font-size:13px;\">"+response.data[i].end_t.split(" ")[0]+
"</span>"+
"<br>"+
"<span style=\"padding:1px 8px;color:white;background:#3acbdc;border-radius:8px;font-size:12px;\">"+
"不可延时提交</span>"+
"                       </td>"+
"           <td style=\"padding-left:0px;\">"+
"   <div class=\"layui-btn-group\">"+
   "<form id=\"uploadform\" enctype=\"multipart/form-data\">"+
   " <input type=\"file\" id=\"file\" name=\"file\" onchange=\"btn_submit(this)\"  style=\"filter:alpha(opacity=0);opacity:0;width: 0;height: 0;\"/>   "+
    " <input type=\"text\" id=\"sid\" name=\"sid\" value=\"\"  style=\"filter:alpha(opacity=0);opacity:0;width: 0;height: 0;\"/>   "+
    " <input type=\"text\" id=\"hid\" name=\"hid\" value=\""+response.data[i].hid+"\"  style=\"filter:alpha(opacity=0);opacity:0;width: 0;height: 0;\"/>   "+

    "</form>"+
    "<button id = \"look_"+i+"\" onclick=\"btn_submit(this)\"class=\"layui-btn layui-btn-sm\"><i class=\"layui-icon\"><a href=\"#/learn/testlist/text\" style=\"color:white\">查看</a></i></button>"+
   " <button id = \"submit_"+response.data[i].hid+"\"onclick=\"btn_submit(this)\"class=\"layui-btn layui-btn-sm\"><i id =\"li_"+response.data[i].hid+"\"class=\"layui-icon\">提交</i></button>"+
  " <button id = \"btnfix_"+response.data[i].hid+"\" onclick=\"btn_submit(this)\"style=\"background-color:"+color[0]+"\" class=\"layui-btn layui-btn-sm\"><i style=\"color:"+color[1]+"\" class=\"layui-icon\">修改</i></button>"+
  
  "</div>"+
    
    "   </td>"+
"       <td>"+
"       </td>"+
"   </tr>";



all_str = all_str + str ;


        }
all_str=all_str+"</tbody></table></div>";

element.innerHTML=all_str;
//console.log(all_str);

$("#sid").val(getQueryString("sid"));
        });










    }else if(res=="5"){
        h2.innerHTML="班级成员";
        element.innerHTML="<table id=\"demo\" lay-filter=\"test\"></table>";
         load("../js/stable.js");






    }else if(res=="6"){
           h2.innerHTML="讨论区   <button id=\"askbtn\" style=\"margin-left: 39px;background-color: #40C85E;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block;cursor: pointer;border-radius: 5px;\">提问</button>";
        $.get("../tea_test/tea_consql_com.php", {
            coid:8
          },function(response,status){


        var btn="<input type='hidden' value='1' id='coid'><input type='hidden' value='10001' id='sid'><button id= \"askbtn\" style='opacity:0;width: 0;height: 0;'>提问</button>";
        var html_area= "<div id=\"answer1\" style=\"width: 850px; margin: 1px 0px 20px 10px; display: none;\">   <form id=\"oneReply\" name=\"oneReply\" action=\"/course/S_oneReplySave.html\" method=\"post\" style=\"\">    <input type=\"hidden\" name=\"courseId\" value=\"2034\" id=\"oneReply_courseId\">   <input type=\"hidden\" name=\"questionId\" value=\"37595\" id=\"oneReply_questionId\">   <div style=\"width: 850px;\">    <div id=\"check_replyContent\"   style=\"color: #F15191; display: none; font-size: 14px;\">   输入内容请少于2000字！     </div>      <textarea name=\"replyContent\" id=\"replyContent\"   style=\"width: 800px; height: 200px;\"></textarea>        <div style=\"float: right;\">   <input class=\"btn_save_s\" type=\"button\" onclick=\"check_r('replyContent','oneReply')\" value=\"回 复\">   <input class=\"btn_save_s\" type=\"button\" onclick=\"showReply();\" value=\"取消\">      </div>   </div>     </form>    </div><div id = commentdiv>";
        html="";
         
           //console.log(response.data[3].length);
          
    
            for (var i= 1; i <= response.count; i++) {

        


                

                var html2="";
html1="<ul id=pn"+i+"> "+
"<div class='head'><img src='../img/user.png' alt=''></div>          "+
"<div class='content'>             <p class='text'><span class='name'>"+response.data[i][0].from+"：<br></span>"+
response.data[i][0].content+"</p>"+
"<div class='pic'><img src='https://edu-image.nosdn.127.net/1D86CCF8C169C5F824A3876E7FE5EAA3.jpg?imageView&thumbnail=510y288&quality=100' alt=''></div>              "+
"<div class='good'><span class='date'>"+
response.data[i][0].date+
"</span><a class='dzan' href='javascript:;'>赞</a></div>              "+
"<div class='people' total='"+response.data[i][0].likes+"'>"+response.data[i][0].likes+"人觉得很赞</div>"+"<div class='comment-list'>";

for (var j = 1; j < response.data[i].length; j++) {
    var user="";
    if(response.data[i][j].to==response.data[i][j].from){
        user=response.data[i][j].to+":</span>";
    }else user = response.data[i][j].from+":</span>@"+response.data[i][j].to;
    temp="<div class='comment' user='self'> "+ 
    "<div class='comment-left'><img src='../img/user.png' alt=''></div>   "+ 
    "<div class='comment-right'> "+ 
    "<div class='comment-text'><span class='user'>"+user+"   "+response.data[i][j].content+"</div>  "+ 
    "<div class='comment-date'>"+response.data[i][j].date+""+response.data[i][j].likes+"</a> <a class='comment-dele' href='javascript:;'>回复</a> </div>     "+
    " </div></div> ";
    html2=html2+temp;
    //console.log(i,j);
}

//console.log(html2);


html3="</div> <div class='hf'>       <textarea type='text' class='hf-text' autocomplete='off' maxlength='100'>评论…</textarea>         <button class='hf-btn'>回复</button>                 <span class='hf-nub'>0/100</span> </div>              </li>      </ul>";
html=html+html1+html2+html3;


}
//console.log(html);

element.innerHTML=btn+html_area+html+"<div>";









//askbtn
$("#askbtn").on("click",function() {
         
    //获取页面body！内容！的高度和宽度
    var sHeight=document.documentElement.scrollHeight;
    var sWidth=document.documentElement.scrollWidth;
    
    //获取可视区域高度，宽度与页面内容的宽度一样
    var wHeight=document.documentElement.clientHeight;
    //创建遮罩层div并插入body
    var oMask=document.createElement("div");
    oMask.id="mask";
    oMask.style.height=sHeight+"px";
    //宽度直接用100%在样式里
    document.body.appendChild(oMask);
    //创建登录层div并插入body
    var oLogin=document.createElement("div");
    oLogin.id="login";
    oLogin.innerHTML="<div class='annmodal' style=\"width: 525px;height: 322px;margin-left: 100px;\"><div id='close'><img src=\"../img/close.png\"  style=\"width: 25px;margin-left: 3px;margin-top: 2px;\"/></div>"+
    "<div style=\"margin-left: 160px;margin-top: 97px;width: 225px;\"><form>"+
       "<input id =\"sid\"type = \"hidden\" value=\"10001\">"+
       "提问：<input id =\"content\" type=\"text\"style=\"border-bottom-style: solid;border-bottom-width: 1px;\">"+
       "<input id =\"date\" type=\"hidden\" value=\""+getTime()+
       "\">"+
       
    "</form>"+
    "<button id =\"yes\" name=\"send\"style=\"margin-top: 25px;margin-left: 32px;margin-right: 32px;\">提交</button>"+
    "<button id =\"no\"name=\"cancel\">取消</button>"+
    "</div></div>";
    document.body.appendChild(oLogin);
    var id = parseInt($(this).attr("id").split("_")[0]);
    var ele = "div#announcement_div[name='ann"+id+"']";
    var h1 = "div#announcement_div[name='ann"+id+"'] h1";
    var p = "div#announcement_div[name='ann"+id+"'] p[id^='content']";
    console.log(getTime()); 

    //$("#title").val($(h1).text());
    //$("#content").val($(p).text());
    
   
    //获取login的宽度和高度并设置偏移值
    var dHeight=oLogin.offsetHeight;
    var dWidth=oLogin.offsetWidth;
    oLogin.style.left=(sWidth-dWidth)/2+"px";
    oLogin.style.top=(wHeight-dHeight)/2+"px";
   
   
   
   
    //获取关闭按钮
    var oClose=document.getElementById("close");
    var no=document.getElementById("no");
    var yes=document.getElementById("yes");

    
    oMask.onclick=oClose.onclick=function(){
     document.body.removeChild(oMask);
     document.body.removeChild(oLogin);
    }
    oMask.onclick=no.onclick=function(){
        document.body.removeChild(oMask);
        document.body.removeChild(oLogin);
       }
    oMask.onclick=yes.onclick=function(){
        var sid1=document.getElementById("sid").value;
        var content1=document.getElementById("content").value;
        var date1=document.getElementById("date").value;
        $.get(adir+"tea_consql_com.php", {
        sid:sid1,
        content:content1,
        date:date1  

    },function(response,status){
   console.log(response.code);
   if(response.code=="200"){
        alert("发布成功");
        console.log(showdiv);
        var anid = showdiv.childNodes[0].id.split("_")[1];
        
        var str ="<ul id=pn0> "+
        "<div class='head'><img src='http://www.sucainiu.com/themes/images/demo/500x300-2.png' alt=''></div>          "+
        "<div class='content'>             <p class='text'><span class='name'>我：<br></span>"+
        content1+"</p>"+
        "<div class='pic'><img src='https://edu-image.nosdn.127.net/1D86CCF8C169C5F824A3876E7FE5EAA3.jpg?imageView&thumbnail=510y288&quality=100' alt=''></div>              "+
        "<div class='good'><span class='date'>"+
        date1+
        "</span><a class='dzan' href='javascript:;'>赞</a></div>              "+
        "<div class='people' total='0'>"+"0人觉得很赞</div>"+"<div class='comment-list'>";
        html3="</div> <div class='hf'>       <textarea type='text' class='hf-text' autocomplete='off' maxlength='100'>评论…</textarea>         <button class='hf-btn'>回复</button>                 <span class='hf-nub'>0/100</span> </div>              </li>      </ul>";
        var div = document.createElement("div");
        div.innerHTML = str+html3;
        showdiv.prepend(div);
        document.body.removeChild(oMask);
        document.body.removeChild(oLogin);
        
        

   }

    });


        
       }
   
    
});



// $("#askbtn").click(function(){
            
//     if($("#answer1").css("display")=="none"){
//     $("#answer1").css('display','inline'); 
// }else $("#answer1").css('display','none'); 
// });
load("../js/comment.js");

        });


    }




        
    }











function init(){
    var tab1=document.getElementById("btnmain1");
    var tab2=document.getElementById("btnmain2");
    var tab3=document.getElementById("btnmain3");
    var tab4=document.getElementById("btnmain4");
    var tab5=document.getElementById("btnmain5");
    var tab6=document.getElementById("btnmain6");
    
    var tab_1=tab1.classList.remove('u-curtab');
    var tab_2=tab2.classList.remove('u-curtab');
    var tab_3=tab3.classList.remove('u-curtab');
    var tab_4=tab4.classList.remove('u-curtab');
    var tab_5=tab5.classList.remove('u-curtab');
    var tab_6=tab6.classList.remove('u-curtab');


}
function selected(ele){
    ele.classList.add("u-curtab");

}



      function btn(ele) {
      
        var res =  $("#"+ele.id).data("type");
        console.log(res);
        showdiv_fun(res);
        init();
        selected(ele);





      }

 

function load(url){//url：需要加载js路径
        var script = document.createElement("script");
        script.type="text/javascript";
        script.src=url;
        document.body.appendChild(script);
    }
