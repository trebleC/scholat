var element=document.getElementById("showdiv");

showmat(-1);

function showmat(mtype) {
    

$.get(adir+"consql_mat.php",function(response,status){
    
var all_str = "";

    for (var i = response.count-1;i>=0;i--)
{    
    //判断资料的分类type           
    if(mtype==-1){
var str="<div id=\"announcement_div\">"+


"<div>"+
"<h1 id= title_"+i+">"+response.data[i].name+"."+response.data[i].type+"<button style=\"height: 32px;font-size: 17px;margin-left: 39px;background-color: #9CE6AD;border: 50px;color: #333;padding: 4px 9px;border-radius: 5px;\"><a href= \"../php/download.php?fname="+response.data[i].name+"."+response.data[i].type+"\">下载</a></button>"+
"</h1>"+
"<br>"+
"<span  id= sponer_"+i+">"+"发布人："+response.data[i].tname+"&nbsp;&nbsp;|&nbsp;</span>"+
"<span  id= datadate_"+i+">"+"上传时间："+response.data[i].uploadtime+"&nbsp;&nbsp;|&nbsp;</span>"+
"<span  id=downloadcount_"+i+">"+"下载次数："+response.data[i].download+"&nbsp;&nbsp;|&nbsp;</span>"+
"<span  id= datasize_"+i+">"+"文件大小："+response.data[i].size+"kb</span>"+
"<div style=\"margin-top: 14px;\">"+
"<br></div>"+
"<HR style=\"FILTER: progid:DXImageTransform.Microsoft.Glow(color=#987cb9,strength=10)\" margin-left: 179px ;width=\80%\" color=#987cb9 SIZE=1><br><br>";
all_str = all_str + str ;


    }
    else if(mtype==response.data[i].mtype){
        var str="<div id=\"announcement_div\">"+


"<div>"+
"<h1 id= title_"+i+">"+response.data[i].name+"."+response.data[i].type+"<button style=\"height: 32px;font-size: 17px;margin-left: 39px;background-color: #9CE6AD;border: 50px;color: #333;padding: 4px 9px;border-radius: 5px;\"><a href= \"../php/download.php?fname="+response.data[i].name+"."+response.data[i].type+"\">下载</a></button>"+
"</h1>"+
"<br>"+
"<span  id= sponer_"+i+">"+"发布人："+response.data[i].tname+"&nbsp;&nbsp;|&nbsp;</span>"+
"<span  id= datadate_"+i+">"+"上传时间："+response.data[i].uploadtime+"&nbsp;&nbsp;|&nbsp;</span>"+
"<span  id=downloadcount_"+i+">"+"下载次数："+response.data[i].download+"&nbsp;&nbsp;|&nbsp;</span>"+
"<span  id= datasize_"+i+">"+"文件大小："+response.data[i].size+"kb</span>"+
"<div style=\"margin-top: 14px;\">"+
"<br></div>"+
"<HR style=\"FILTER: progid:DXImageTransform.Microsoft.Glow(color=#987cb9,strength=10)\" margin-left: 179px ;width=\80%\" color=#987cb9 SIZE=1><br><br>";
all_str = all_str + str ;

    }

}
element.innerHTML=all_str;

});
}
$("#downloadbutton").on("click",function() {
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
 "<div style=\"margin-left:130px;margin-top: 97px;width: 500px;\">"+
 "<span style=\"font-size: large\";>选择</span>"+
 "<select id=\"modalmatSelected\"  style=\"width: 144px; height: 25px; line-height: 25px;margin-left: 38px;font-size: 18px;\" name=\"selectedClassId\"onchange=\"modalmatSelected()\">"+
        
    "<option value=\"0\">教学大纲</option>"+
    "<option value=\"1\" >课件</option>"+
    "<option value=\"2\">实践指导书</option>"+
        "</select><br>"+
 "<span style=\"font-size: large\";>上传文件：</span><br>"+
 "<form id=\"uploadform\" enctype=\"multipart/form-data\">"+
 
    "<input id=\"mtype\" type=\"hidden\" name='mtype' value=\"0\" >"+
    
    "<input id =\"file\" name='file' type = \"file\">"+
   
    "<input id =\"date\" name = 'date' type=\"text\" value=\""+getTime()+
    "\"style=\"filter:alpha(opacity=0);opacity:0;width: 0;height: 0;\">"+
    
 "</form><br><br>"+
 "<button id =\"yes\" name=\"send\"style=\"margin-top: 25px;margin-left: 40px;margin-right: 32px;\">上传</button>"+
 "<button id =\"no\"name=\"cancel\">取消</button>"+
 "</div></div>";
document.body.appendChild(oLogin);
var id = parseInt($(this).attr("id").split("_")[0]);
var ele = "div#announcement_div[name='ann"+id+"']";
var h1 = "div#announcement_div[name='ann"+id+"'] h1";
var p = "div#announcement_div[name='ann"+id+"'] p[id^='content']";


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

//document.body.removeChild(oMask);
//document.body.removeChild(oLogin);







}

oMask.onclick=yes.onclick=function(){
$.ajax({
    //几个参数需要注意一下
        url: "upload_material.php",
        type: "POST",//方法类型
        cache: false,
        data: new FormData($("#uploadform")[0]),
        processData: false,
        contentType: false,
        success: function (result) {
            if(result.code=="200"){
            //console.log(result);//打印服务端返回的数据(调试用)
            document.body.removeChild(oMask);
            document.body.removeChild(oLogin);

                alert("上传成功");
                $("#btnmain3").trigger("onclick");
                
            }else if(result.code=="500"){
                alert("上传失败，请重试！");
            }
            
            
        },
        error : function() {
            alert("请重试！");
        }
    });



}


});


function modalmatSelected(){
    var modalmatId = $("#modalmatSelected option:selected").val();
    //window.location.href = "T_homeworkList.html?courseId="+courseId+"&classId="+classId;
    //console.log(classId);
    
    $("#mtype").val(modalmatId);
}

function matSelected(){
    var matId = $("#matSelected option:selected").val();
    //window.location.href = "T_homeworkList.html?courseId="+courseId+"&classId="+classId;
    console.log(matId);
    showmat(matId);
}

