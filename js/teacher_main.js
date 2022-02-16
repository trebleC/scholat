var dataloader = new SCDIGIS.DataLoader();
var gisConfig = dataloader.getGISConfig();
var host = gisConfig["data"]["host"];
var file = gisConfig["data"]["file"];
var tea_file = gisConfig["data"]["teacherfile"];


adir = "http://"+host+"/"+file+"/"+tea_file+"/";


id="";
function showdiv_fun(res){
    var element=document.getElementById("showdiv");
    console.log("showdiv_fun");
    var h2=document.getElementById("beforeshow");
          if(res=="1"){
            h2.innerHTML="公告<button id='annbutton'"+
            "style=\"margin-left: 39px;background-color: #40C85E;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block;cursor: pointer;border-radius: 5px;\""+
            ">添加公告</button>";
         $.get("consql_ann.php",function(response,status){
            var all_str = "";
           

            for (var i = response.count-1;i>=0;i--)
        {               
            
    var str="<div id=\"announcement_div\" style=\"text-align: center;\" name = \"ann"+response.data[i].anid+"\" style=\"display:inline\">"+
        "<h1 id= title_"+response.data[i].anid+">"+response.data[i].title+"</h1>"+
        "<p  id= adate_"+response.data[i].anid+">"+response.data[i].adate+"</p>"+
        "<p  style=\"font-size: 18px;margin-bottom: 10px;margin-top: 8px;\"id=content_"+response.data[i].anid+">"+response.data[i].content+"</p>"+
        "<button style=\"background-color: #4CAF50;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block; margin: 4px 2px;cursor: pointer;border-radius: 8px;\"id = "+response.data[i].anid+"_editbtn>编辑</button>"+
        "<button style=\"background-color: #e64242;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block; margin: 4px 2px;cursor: pointer;border-radius: 8px;\"id = "+response.data[i].anid+"_delbtn>删除</button>"+
        "<br><br><HR style=\"FILTER: progid:DXImageTransform.Microsoft.Glow(color=#987cb9,strength=10)\" margin-left: 179px ;width=\80%\" color=#987cb9 SIZE=1><br><br></div>";
        all_str = all_str + str ;

        }

        element.innerHTML=all_str;
        
        $("#announcement_div button[id$=btn]").on("click",function(){
            
            var id = parseInt($(this).attr("id").split("_")[0]);
            
            var anid1 = this.id.split("_")[0];
            //console.log(this.id.split("_")[0]);
  

            //删除功能
           if(this.id.split("_")[1]=="delbtn"){
            var r=confirm("确定删除吗？")
            if (r==true)
              {
                $.get("tea_consql_del.php", {
                    anid:anid1
                    },function(response,status){
                   console.log(response.code);
                   if(response.code=="200"){
                        alert("删除成功");
                        var ele = "div#announcement_div[name='ann"+id+"']";
                        $(ele).remove(); 
                    }
     
                });
              }
            
              else
              {
                //alert("You pressed Cancel!")
              }
            }






            //编辑公告
            else{
                
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
                    "<input id =\"anid\"type = \"hidden\" value=\""+id+"\">"+
                    "标题：<input id =\"title\"type = \"text\" style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
                    "正文：<input id =\"content\" type=\"text\"style=\"border-bottom-style: solid;border-bottom-width: 1px;\">"+
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
                    //console.log($(p).text()); 

                    $("#title").val($(h1).text());
                    $("#content").val($(p).text());
                    
                   
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
                    //取消按钮
                    oMask.onclick=no.onclick=function(){
                        document.body.removeChild(oMask);
                        document.body.removeChild(oLogin);
                       }
                    //确认按钮
                    oMask.onclick=yes.onclick=function(){
                        var anid1=document.getElementById("anid").value;
                        var title1=document.getElementById("title").value;
                        var content1=document.getElementById("content").value;
                        console.log(anid1);
                         console.log(title1);
                         console.log(content1);
                        $.get("tea_consql_edit.php", {
                        anid:anid1,
                        title:title1,
                        content:content1

                    },function(response,status){
                   console.log(response.code);
                   if(response.code=="200"){
                        
                        document.body.removeChild(oMask);
                        document.body.removeChild(oLogin);

                        $(h1).text(title1); 
                        $(p).text(content1); 

                        
                        
                        alert("修改成功");
                        
                    }
     
                    });
                    }
                   
                   




            }




});
  //标题中的添加公告

     $("#annbutton").on("click",function() {
         
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
            "<input id =\"anid\"type = \"hidden\" value=\""+id+"\">"+
            "标题：<input id =\"title\"type = \"text\" style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
            "正文：<input id =\"content\" type=\"text\"style=\"border-bottom-style: solid;border-bottom-width: 1px;\">"+
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
             var anid1=document.getElementById("anid").value;
             var title1=document.getElementById("title").value;
             var content1=document.getElementById("content").value;
             var date1=document.getElementById("date").value;
             $.get("tea_consql_edit.php", {
             title:title1,
             content:content1,
             date:date1  

         },function(response,status){
        console.log(response.code);
        if(response.code=="200"){
             alert("发布成功");
             var showdiv=document.getElementById("showdiv").firstChild;
             var anid = showdiv.childNodes[0].id.split("_")[1];
             
             var str = "<div id=\"announcement_div\" style=\"text-align: center;\" name = \"ann"+anid+"\" style=\"display:inline\">"+
             "<h1 id= title_"+anid+">"+title1+"</h1>"+
             "<p  id= adate_"+anid+">"+date1+"</p>"+
             "<p  style=\"font-size: 18px;margin-bottom: 10px;margin-top: 8px;\"id=content_"+anid+">"+content1+"</p>"+
             "<button style=\"background-color: #4CAF50;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block; margin: 4px 2px;cursor: pointer;border-radius: 8px;\"id = "+anid+"_editbtn>编辑</button>"+
             "<button style=\"background-color: #e64242;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block; margin: 4px 2px;cursor: pointer;border-radius: 8px;\"id = "+anid+"_delbtn>删除</button>"+
             "<br><br><HR style=\"FILTER: progid:DXImageTransform.Microsoft.Glow(color=#987cb9,strength=10)\" margin-left: 179px ;width=\80%\" color=#987cb9 SIZE=1><br><br></div>";
             var div = document.createElement("div");
             div.innerHTML = str;
             showdiv.prepend(div);
             document.body.removeChild(oMask);
             document.body.removeChild(oLogin);
             
             

        }

         });


             
            }
        
         
     });
  });


//console.log( $("#announcement_div button[id$=delbtn]"));
 



    }else if(res=="2"){
        h2.innerHTML="评分标准";
        element.innerHTML="<object data=\"../file/cinfo.pdf\" type=\"application\/pdf\" width=\"100%\" height=\"100%\"> 任课教师还没有上传课程大纲呢！</object>";
 //element.innerHTML="<h1>评分标准</h1><br><br><button><a href = \"//127.0.0.1/scholat/file/cinfo.pdf\">下载文件</button>";
       //element.innerHTML="<iframe width=\"100%\" height=\"100%\"> This browser does not support PDFs. Please download the PDF to view it: <a href=\"//127.0.0.1/scholat/test/consql_cinfo.php\">Download PDF</a> </iframe>";
/*
        $.get("http://127.0.0.1/scholat/test/consql_cinfo.php",function(response,status,html){
            var all_str = response;
            


        

        
     
  });*/


    }else if(res=="3"){
        h2.innerHTML=
        "资料<select style=\"width: 200px; height: 25px; line-height: 25px;margin-left: 38px;font-size: 18px;\" id=\"matSelected\" name=\"selectedClassId\"onchange=\"matSelected()\">"+
        "<option value=\"-1\" selected=\"selected\">全部</option>"+
    "<option value=\"0\">教学大纲</option>"+
    "<option value=\"1\" >课件</option>"+
    "<option value=\"2\">实践指导书</option>"+
        "</select><button id='downloadbutton'"+
        "style=\"margin-left: 39px;background-color: #40C85E;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block;cursor: pointer;border-radius: 5px;\""+
        ">上传</button>";
        load("../js/tea_mat.js");
        

            
       









    }else if(res=="4"){

        h2.innerHTML="作业管理<button id='downloadbutton'"+
        "style=\"margin-left: 39px;background-color: #40C85E;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block;cursor: pointer;border-radius: 5px;\""+
        ">添加</button>";

        load("../js/tea_hw.js");











    }else if(res=="5"){
        h2.innerHTML="<span>班级成员 <button id='attbutton' onclick=\"attbtn()\">考勤</button><button id='manbutton' onclick=\"manbtn()\">管理</button></span>";
        element.innerHTML="<table id=\"demo\" lay-filter=\"test\"></table>";
         load("../js/table.js");






    }else if(res=="6"){
        h2.innerHTML="讨论区   <button id=\"askbtn\" style=\"margin-left: 39px;background-color: #40C85E;border: 41px;color: white;padding: 4px 9px;text-align: center;text-decoration: none;display: inline-block;cursor: pointer;border-radius: 5px;\">提问</button>";
        $.get("tea_consql_com.php", {
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
        $.get("tea_consql_com.php", {
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
        "<div class='head'><img src='../img/user.png' alt=''></div>          "+
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


function btn_ann(){
    
    //var a =$("#delbtn5").html();

   var s=$("div button[id$='delbtn']").html();

   var ele = $("#announcement_div button[id$='btn']");
   $("#announcement_div button[id$='btn']").on("click","button",function(){
            
    alert("1345");
});
   console.log(ele);

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
        console.log("我在这啊");
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
    function getTime() {
        var t = new Date();
        var y = t.getFullYear();
        var m = t.getMonth() + 1;
        var d = t.getDate();
        var h = t.getHours();
        var mi = t.getMinutes();
        m = m < 10 ? "0" + m : m;
        d = d < 10 ? "0" + d : d;
        h = h < 10 ? "0" + h : h;
        mi = mi < 10 ? "0" + mi : mi;
        return y + "-" + m + "-" + d + " " + h + ":" + mi;
    }