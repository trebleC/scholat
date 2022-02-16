
var element=document.getElementById("showdiv");
showhw(-1);
function showhw(clid) {
    

$.get("consql_hw.php?clid="+clid,function(response,status){
            str_cl="";
            var cltime ="";
            person_count = 50;
            clid_arr = new Array();
            cltime_arr = new Array();
            cl_arr = new Array();
            cltime = "";
            for(var i = 0;i<response.cl.length;i++){
                clid_arr[i] = response.cl[i].clid;
                cltime_arr[i] = response.cl[i].cltime;
                cl_arr[i] = [clid_arr[i],cltime_arr[i]];


                if(clid != response.cl[i].clid)
                temp="<option value="+response.cl[i].clid+">"+response.cl[i].cltime+"</option>";
                else {
                temp="<option value="+response.cl[i].clid+" selected=\"selected\">"+response.cl[i].cltime+"</option>";
                cltime = response.cl[i].cltime;
                }
                str_cl=str_cl+temp;
            }
            if(clid =='-1' ) all_selected="<option value=\"-1\" selected=\"selected\">全部</option>";
            else all_selected="<option value=\"-1\" >全部</option>";
            
            




            var all_str = "<span style=\"color:#000000\"><strong>班级选择</strong> </span>"+
            "<select id=\"classSelected\" style=\"width: 200px; height: 25px; line-height: 25px;\" name=\"selectedClassId\" onchange=\"confirm2()\">"+
            
            all_selected+
            str_cl+
            "</select>"+
            "<div style=\"margin-top: 10px; margin-bottom: 18px;width: 800px;\"><table class=\"datalist\" id=\"datalist\" style=\"margin-bottom: 20px;\" cellspacing=\"1\"><tbody>"+
        "<tr style=\"background: rgb(212, 249, 249) none repeat scroll 0% 0%;height: 46px;\">       <th width=\"130px\"> 班级    </th>    <th  width=\"395px\"text-align=\"center\"> 作业标题    </th>        <th width=\"130px\"> 发布人    </th>    <th width=\"175px\"> 发布时间    </th>   <th width=\"130px\" > 已交/应交    </th>       <th width=\"310px\"> 操作    </th>        <th width=\"100px\">     </th> </tr>";
        
        for (var i = response.count-1;i>=0;i--)
        {               

            for(var j = cl_arr.length-1; j>=0;j--){
                if(cl_arr[j][0]==response.data[i].clid){
              cltime=cl_arr[j][1];

            }
            


            }
            
            if(response.data[i].is_fix==1) var color = ["#b1a5a5","#d2caca","white"]; else var color = ["","white"];
            console.log(response.data[i].clid);
            if(response.data[i].clid==1){person_count = 50;}
            if(response.data[i].clid==2){person_count = 28;}
            if(response.data[i].clid==3){person_count = 30;}
            pcount = 0;
            if(!response.p_count[i]){response.p_count[i]=0}
            if(response.data[i].type==1){
            var type = "<span style=\"padding:1px 8px;color:white;background:#3acbdc;border-radius:8px;font-size:12px;\">不可延时提交</span>";
            }
            else{type='';}
            var str = "<tr class=\"altrow\" style=\"background: rgb(255, 255, 255) none repeat scroll 0% 0%;height: 56.5px;\" >"+
"<td id=\"upload15826\">"+
"<span >"+ cltime+
"</span>"+
"   </td>"+
"   <td style=\"text-align:center;\">"+
"       <a id='a"+response.data[i].hid+"' href=\"S_oneHomework.html?courseId=2185&amp;homeworkId=15826\">"+response.data[i].name+
"</a>"+
"   </td>"+
"   <td>"+
"   <span>"+response.data[i].tname+
"</span>"+
"   </td>"+
"   <td>"+
"   <span id='span"+response.data[i].hid+"'  style=\"font-size:13px;\">"+response.data[i].end_t.split(" ")[0]+
"</span>"+
"<br>"+
type+
"  </td>"+
"<td id=\"upload15826\">"+
"<span >"+
""+response.p_count[i]+"/"+person_count+"</span>"+
"   </td>"+
"           <td style=\"padding-left:0px;width: 325.917px;\">"+
"   <div class=\"layui-btn-group\">"+
//    "<form id=\"uploadform\" enctype=\"multipart/form-data\">"+
//    " <input type=\"file\" id=\"file\" name=\"file\" onchange=\"btn_submit()\"  style=\"filter:alpha(opacity=0);opacity:0;width: 0;height: 0;\"/>   "+
//     " <input type=\"text\" id=\"sid\" name=\"sid\" value=\"16201\"  style=\"filter:alpha(opacity=0);opacity:0;width: 0;height: 0;\"/>   "+

//     "</form>"+
    "<button id = \"edit_"+response.data[i].hid+"\" value='"+response.data[i].hid+"' onclick=\"btn_submit(this)\"class=\"layui-btn layui-btn-sm\"><i class=\"layui-icon\"><a href=\"#/learn/testlist/text\" style=\"color:white\">编辑</a></i></button>"+
    // "<button id = \"look_"+i+"\" onclick=\"btn_submit(this)\"class=\"layui-btn layui-btn-sm\"><i class=\"layui-icon\"><a href=\"#/learn/testlist/text\" style=\"color:white\">查阅</a></i></button>"+
    "<button id = \"download_"+response.data[i].hid+"\" value='"+response.data[i].hid+"' onclick=\"btn_submit(this)\"class=\"layui-btn layui-btn-sm\"><i class=\"layui-icon\"><a href=\"#/learn/testlist/text\" style=\"color:white\">导出</a></i></button>"+
    "<button id = \"delete_"+response.data[i].hid+"\" value='"+response.data[i].hid+"' onclick=\"btn_submit(this)\"class=\"layui-btn layui-btn-sm\"><i id =\"li_"+i+"\"class=\"layui-icon\">删除</i></button>"+
  
            "<input type='hidden' value = '"+response.data[i].tid+"'id='hidden"+response.data[i].hid+"'>"+
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
        });

}




function confirm1(){

  var classId = $("#modalclassSelected option:selected").val();
  //window.location.href = "T_homeworkList.html?courseId="+courseId+"&classId="+classId;
  //console.log(classId);
  console.log(classId);
}

function confirm2(){
    var courseId = $("#courseId").val();
    var classId = $("#classSelected option:selected").val();
    //window.location.href = "T_homeworkList.html?courseId="+courseId+"&classId="+classId;
    //console.log(classId);
    showhw(classId);
}


function btn_submit(ele) {
    
btn_name = ele.id.split("_")[0];
lid= parseInt(ele.id.split("_")[1]);
hid = parseInt(ele.id.split("_")[1])+1;

var li  = document.getElementById('li_'+lid);
var res =  $("#"+ele.id);
var element=document.getElementById("showdiv");
mhid = parseInt(res.val());
console.log(btn_name);
console.log("mid",mhid);


if(btn_name=="edit"){
  tid="#hidden"+mhid;
  $.get("consql_finename.php", {
            id:getQueryString("id")
          },function(response,status){
            
           // $('#welname').html("欢迎您,"+response.data[0].name);
            
           

            if($(tid).val()==response.data[0].tid){
              $.get("consql_hw_text.php", {
               coid:mhid
             },function(response,status){
               console.log(response.data[0].end_t.split(" ")[0]);
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
               "<input id =\"clid\"type = \"hidden\" value=\""+hid+"\">"+
               "标题：<input id =\"title\"type = \"text\" value='"+response.data[0].name+"'style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
               "正文：<input id =\"content\" type=\"text\"value='"+response.data[0].content+"'style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
               "截止时间：<input id =\"time\" type=\"text\"value='"+response.data[0].end_t+"'style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
               "<input id =\"checkbox\" type=\"checkbox\" name=\"sex\" value=\"0\" onchange=\"upperCase(this)\"/><span>不可延时提交   </span>"+
               "</form>"+
               "<button id =\"yes\" name=\"send\"style=\"margin-top: 25px;margin-left: 32px;margin-right: 32px;\">提交</button>"+
               "<button id =\"no\"name=\"cancel\">取消</button>"+
               "</div></div>";
               document.body.appendChild(oLogin);
               // var id = parseInt($(this).attr("id").split("_")[0]);
               // var ele = "div#announcement_div[name='ann"+id+"']";
               console.log("here is ",mhid);
                //var h1 = $("#datalist")[0].children[0].children[9-hid].children[1].children[0];
                var h1t = "#a"+mhid;
                console.log(mhid);
                var h1 = $(h1t);
                var pt = "#span"+mhid;
                var p = $(pt);
                
                
                //var p = $("#datalist")[0].children[0].children[9-hid].children[3].children[0];
           
               //console.log($("#datalist")[0].children[0].children[9-hid].children[3].children[0]);
           
               // //console.log($(p).text()); 
           
               // $("#title").val($(h1).text());
               // $("#content").val($(p).text());
               
              
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
                   var anid1=document.getElementById("clid").value;
                   var title1=document.getElementById("title").value;
                   var content1=document.getElementById("content").value;
                   var time1=document.getElementById("time").value;
                   var type1=document.getElementById("checkbox").value;
                   console.log(anid1);
                    console.log(title1);
                    console.log(content1);
           
                   $.get("tea_consql_edit.php", {
                   hid:anid1-1,
                   title:title1,
                   content:content1,
                   time:time1,
                   type:type1
           
               },function(response,status){
              console.log(response.code);
              if(response.code=="200"){
                   
                   document.body.removeChild(oMask);
                   document.body.removeChild(oLogin);
                   
                   h1.innerHTML=(title1); 
                   p.innerHTML=(time1.split(" ")[0]); 
                   
                   $("#btnmain4").trigger("onclick");
                   alert("修改成功");
				   
                   
               }
           
               });
               }
                 
             });
           
             }
             else{alert("你没有权限");}



          });
 

}

else if(btn_name=="delete"){
  
  tid="#hidden"+mhid;
  $.get("consql_finename.php", {
            id:getQueryString("id")
          },function(response,status){
            
           // $('#welname').html("欢迎您,"+response.data[0].name);
            
           

            if($(tid).val()==response.data[0].tid){
 
  var r=confirm("确定删除吗？")
  
  if (r==true)
    {
      $.get("tea_consql_del.php", {
          anid:mhid
          },function(response,status){
         console.log(response.code);
         if(response.code=="200"){
              alert("删除成功");
              //remove showdiv
              document.getElementById("showdiv").innerHTML="";
              $("#btnmain4").trigger("onclick");
              
          }

      });
    }
  
    else
    {
      //alert("You pressed Cancel!")
    }

  }
  else{alert("你没有权限");}



});



}




else if(btn_name=="download"){
  
  window.open("tea_hwinfo.html?hid="+mhid);
  
}



}


function upperCase(k)
{
    if(k.value==0)
console.log(k.value=1);
else console.log(k.value=0);
}


$("#downloadbutton").on("click",function() {
  $.get("consql_hw.php?clid=-1",function(response,status){
    clid=-1;
    str_cl="";
    clid_arr = new Array();
    cltime_arr = new Array();
    cl_arr = new Array();
   
    for(var i = 0;i<response.cl.length;i++){
        clid_arr[i] = response.cl[i].clid;
        cltime_arr[i] = response.cl[i].cltime;
        cl_arr[i] = [clid_arr[i],cltime_arr[i]];


        if(clid != response.cl[i].clid)
        temp="<option value="+response.cl[i].clid+">"+response.cl[i].cltime+"</option>";
        else {
        temp="<option value="+response.cl[i].clid+" selected=\"selected\">"+response.cl[i].cltime+"</option>";
        cltime = response.cl[i].cltime;
        }
        str_cl=str_cl+temp;
    }

    if(clid =='-1' ) all_selected="<option value=\"-1\" selected=\"selected\">全部</option>";
            else all_selected="<option value=\"-1\" >全部</option>";
            
            




            var all_str = "<br/><br/><span style=\"color:#000000\">班级选择 </span>"+
            "<select id=\"modalclassSelected\" style=\"width: 200px; height: 25px; line-height: 25px;\" name=\"selectedClassId\" onchange=\"confirm1()\">"+
            
            all_selected+
            str_cl+
            "</select>";

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
  "<div style=\"margin-left: 160px;margin-top: 50px;width: 225px;\"><form>"+
  "<input id =\"clid\"type = \"hidden\" value=\"-1\">"+
  "标题：<input id =\"modaltitle\"type = \"text\" value=''style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
  "正文：<input id =\"modalcontent\" type=\"text\"value=''style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
  "截止时间：<input id =\"modaltime\" type=\"text\"value='"+getTime()+"'style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br><br>"+
  "<input id = 'modalcheckbox'type=\"checkbox\" name=\"sex\" value=\"0\" onchange=\"upperCase(this)\"/><span>不可延时提交   </span>"+
  all_str+
  "</form>"+
  "<button id =\"yes\" name=\"send\"style=\"margin-top: 25px;margin-left: 32px;margin-right: 32px;\">提交</button>"+
  "<button id =\"no\"name=\"cancel\">取消</button>"+
  "</div></div>";
  document.body.appendChild(oLogin);
  // var id = parseInt($(this).attr("id").split("_")[0]);
  // var ele = "div#announcement_div[name='ann"+id+"']";


  // //console.log($(p).text()); 

  // $("#title").val($(h1).text());
  // $("#content").val($(p).text());
  
 
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
      //var anid1=document.getElementById("clid").value;
      var title1=document.getElementById("modaltitle").value;
      var content1=document.getElementById("modalcontent").value;
      var time1=document.getElementById("modaltime").value;
      var type1=document.getElementById("modalcheckbox").value;
      var classId1 = $("#modalclassSelected option:selected").val();
    
      $.get("tea_consql_edit.php", {
     
        title:title1,
        content:content1,
        time:time1,
        type:type1,
        classId:classId1

  },function(response,status){
 console.log(response.code);
 if(response.code=="200"){
      
      document.body.removeChild(oMask);
      document.body.removeChild(oLogin);
     
      
      
      alert("修改成功");
      document.getElementById("showdiv").innerHTML="";
      $("#btnmain4").trigger("onclick");
      
  }

  });
  }
    
});
});


















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

function getQueryString(name){
  var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
  var r = window.location.search.substr(1).match(reg);
  if(r!=null)return  unescape(r[2]); return null;
}