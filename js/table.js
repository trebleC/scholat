
 count = 1;
$("#attbutton").trigger("onclick");

//考勤功能
function attbtn() {
  document.getElementById("showdiv").innerHTML="<table id=\"demo\" lay-filter=\"test\"></table>";
  layui.use('table', function(){
    var table = layui.table;
    
    //第一个实例
    table.render({
      elem: '#demo'
      ,skin:'line'
      ,skin:'row'
      ,even:"ture"
      //,width:1300
      //,height:1300
      ,url: "tea_consql_class.php?table=1" //数据接口
      ,page: false//开启分页
      ,toolbar: '#toolbarDemo'
      ,size: 'lg'

      ,cols: [[ //表头
        {type:'numbers'}
        ,{type: 'checkbox'}
    
        ,{field: 'name', title: '姓名', width:80,height:100,sort: true}
        ,{field: 'sid', title: '学号', width:80,height:100, sort: true}
        ,{field: 'att', title: '考勤', width:80, sort: true}
        ,{fixed: 'right', title:'操作', toolbar: '#bartpl', width:250,height:100}


    
      ]]
    });
    



  //table功能
  tabfun(table);


    
  });


  showattlist();
  
}

//管理功能
function manbtn() {
  document.getElementById("showdiv").innerHTML="<table id=\"demo\" lay-filter=\"test\"></table>";
  layui.use('table', function(){
    var table = layui.table;
    
    //第一个实例
    table.render({
      elem: '#demo'
      ,skin:'line'
      ,skin:'row'
      ,even:"ture"
      //,width:1300
      //,height:1300
      ,url: "tea_consql_class.php?table=1" //数据接口
      ,page: false//开启分页
      ,toolbar: '#toolbarDemo'
      ,size: 'lg'

      ,cols: [[ //表头
        {type:'numbers'}
        ,{type: 'checkbox'}
    
        ,{field: 'name', title: '姓名', width:80,height:100,sort: true, edit: 'text'}
        ,{field: 'sid', title: '学号', width:80,height:100, sort: true, edit: 'text'}
        ,{field: 'att', title: '考勤', width:80, sort: true}
        ,{fixed: 'right', title:'操作', toolbar: '#manpl', width:250,height:100}


    
      ]]
    });
    



  //table功能
  tabfun(table);


    
  });
  showmanlist();


  
}


//渲染考勤班级列表
function showattlist() {
  //渲染班级列表
  $.get("tea_consql_class.php?classes=1"
  ,function(response,status){
    var count = response.count;
    

    html="";
    for (var i = 0; i <count; i++) {
      str = "<div class='classtab' clid='"+response.data[i].clid+"'><a>"+response.data[i].cltime+
      //"("+response.data[i].name+")"+
      "</a></div>";
      html=html+str;
    }
    $("#showdiv").append(" <div id= 'classlist'class='classshow'><b>班级列表     <a href=\"javascript:;\" "+
    "onclick=\"addclass()\""+
    ">+</a> </b> "+
    html+
    "</div>");

    var praise = document.getElementsByClassName("classshow")[0].children[1];
    console.log(praise);
    praise.className='classtab classtabSelect ';

    var lists = new Array();
    for (var i = 1; i < document.getElementsByClassName("classshow")[0].children.length; i++) {
      var key = "tabsb"+i.toString();
      console.log(key);
        lists[i] = document.getElementsByClassName("classshow")[0].children[i];
        //初始化样式
        if(i==1){lists[i].className="classtab classtabSelect";}else lists[i].className="classtab";
        lists[i].addEventListener('click', showMsg, false); //鼠标单击的时候调用showMes这个函数  
        
        function showMsg() {
          
          //初始化样式
          for (let index = 1; index < lists.length; index++) {
            lists[index].className="classtab";
            
          }
          var clid =  this.attributes["clid"].nodeValue
          
          this.className="classtab classtabSelect";
          layui.use('table', function(){
            var table = layui.table;
            
            //第一个实例
            table.render({
              elem: '#demo'
              ,skin:'line'
              ,even:"ture"
              
              ,url: "tea_consql_class.php?table="+clid //数据接口
              ,page: false//开启分页
              ,toolbar: '#toolbarDemo'
              ,size: 'lg'
          
              ,cols: [[ //表头
                {type:'numbers'}
              ,{type: 'checkbox'}
          
              ,{field: 'name', title: '姓名', width:80,sort: true, edit: 'text'}
              ,{field: 'sid', title: '学号', width:80, sort: true, edit: 'text'}
              ,{field: 'att', title: '考勤', width:80, sort: true}
              ,{fixed: 'right', title:'操作', toolbar: '#bartpl', width:300,height:100}
              
            
              ]]
            });
          
        //table功能
          
            tabfun(table);

          });
            
        }

      
  }
  //选中被选班级
  console.log($("#classlist .classtabSelect")[0].attributes["clid"].nodeValue);
    //console.log(lists[1]);

  });
}
//渲染考勤班级列表
function showmanlist() {
  //渲染班级列表
  $.get("tea_consql_class.php?classes=1"
  ,function(response,status){
    var count = response.count;
    

    html="";
    for (var i = 0; i <count; i++) {
      str = "<div class='classtab' clid='"+response.data[i].clid+"'><a>"+response.data[i].cltime+
      //"("+response.data[i].name+")"+
      "</a></div>";
      html=html+str;
    }
    $("#showdiv").append(" <div id= 'classlist'class='classshow'><b>班级列表     <a href=\"javascript:;\" "+
    "onclick=\"addclass()\""+
    ">+</a> </b> "+
    html+
    "</div>");

    var praise = document.getElementsByClassName("classshow")[0].children[1];
    console.log(praise);
    praise.className='classtab classtabSelect ';

    var lists = new Array();
    for (var i = 1; i < document.getElementsByClassName("classshow")[0].children.length; i++) {
      var key = "tabsb"+i.toString();
      console.log(key);
        lists[i] = document.getElementsByClassName("classshow")[0].children[i];
        //初始化样式
        if(i==1){lists[i].className="classtab classtabSelect";}else lists[i].className="classtab";
        lists[i].addEventListener('click', showMsg, false); //鼠标单击的时候调用showMes这个函数  
        
        function showMsg() {
          
          //初始化样式
          for (let index = 1; index < lists.length; index++) {
            lists[index].className="classtab";
            
          }
          var clid =  this.attributes["clid"].nodeValue
          
          this.className="classtab classtabSelect";
          layui.use('table', function(){
            var table = layui.table;
            
            //第一个实例
            table.render({
              elem: '#demo'
              ,skin:'line'
              ,even:"ture"
              
              ,url: "tea_consql_class.php?table="+clid //数据接口
              ,page: false//开启分页
              ,toolbar: '#toolbarDemo'
              ,size: 'lg'
          
              ,cols: [[ //表头
                {type:'numbers'}
              ,{type: 'checkbox'}
          
              ,{field: 'name', title: '姓名', width:80,sort: true, edit: 'text'}
              ,{field: 'sid', title: '学号', width:80, sort: true, edit: 'text'}
              ,{field: 'att', title: '考勤', width:80, sort: true}
              ,{fixed: 'right', title:'操作', toolbar: '#manpl', width:300,height:100}
              
            
              ]]
            });
          
        //table功能
          
            tabfun(table);

          });
            
        }

      
  }
  //选中被选班级
  console.log($("#classlist .classtabSelect")[0].attributes["clid"].nodeValue);
    //console.log(lists[1]);

  });
}



function table_select() {
  var lists = new Array();
  
  for (var i = 1; i < document.getElementsByClassName("classshow")[0].children.length; i++) {
    var key = "tabsb"+i.toString();
    console.log(key);
       lists[i] = document.getElementsByClassName("classshow")[0].children[i];
       
       

    
}
 
  //console.log(lists[1]);

  console.log("aaa",$("#classlist .classtabSelect")[0].attributes["clid"].nodeValue);

}

//增加教学班级
function addclass() {
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
     "上课时间：<input id =\"title\"type = \"text\"style=\"border-bottom-style: solid;border-bottom-width: 1px;\"><br>"+
     "备    注：<input id =\"content\" type=\"text\"style=\"border-bottom-style: solid;border-bottom-width: 1px;\">"+
     

     
  "</form>"+
  "<button id =\"yes\" name=\"send\"style=\"margin-top: 25px;margin-left: 32px;margin-right: 32px;\">提交</button>"+
  "<button id =\"no\"name=\"cancel\">取消</button>"+
  "</div>"
  document.body.appendChild(oLogin);
  
 
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
      var anid1=getQueryString("id");
      var title1=document.getElementById("title").value;
      var content1=document.getElementById("content").value;
      
        $.get("tea_consql_edit.php", {
        addid:anid1,
        title:title1,
        content:content1

    },function(response,status){
   console.log(response.code);
   if(response.code=="200"){
        alert("修改成功");
        document.body.removeChild(oMask);
        document.body.removeChild(oLogin);
        $("#attbutton").trigger("onclick");
      
      

   }

    });


      
     }
 
 

  
}


function getQueryString(name){
  var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
  var r = window.location.search.substr(1).match(reg);
  if(r!=null)return  unescape(r[2]); return null;
}


function tabfun(table) {
   //编辑事件
 
  
  
  //监听单元格编辑
  table.on('edit(test)', function(obj){
    var value = obj.value //得到修改后的值
    ,data = obj.data //得到所在行所有键值
    ,field = obj.field; //得到字段
    //layer.msg('[ID: '+ data.sid +'] ' + field + ' 字段更改为：'+ value);

    if(data.sid==value){
    //ajax修改表中的值
    $.get("tea_consql_edit.php", {
        type:"name",
        username:data.name,
        sid:data.sid,

  },function(response,status){
 if(response.code=="200"){
      
    layer.msg('修改成功');
      
  }

  });
}else{
    $.get("tea_consql_edit.php", {
        type:"sid",
        username:data.name,
        sid:data.sid,

  },function(response,status){
 if(response.code=="200"){
      
    layer.msg('修改成功');
      
  }

  });

  }
   
  });


//头工具栏事件
table.on('toolbar(test)', function(obj){
  var checkStatus = table.checkStatus(obj.config.id);
  switch(obj.event){
    case 'getCheckData':
      var data = checkStatus.data;
      layer.alert(JSON.stringify(data));
    break;
    case 'getCheckLength':
      var data = checkStatus.data;
      layer.msg('选中了：'+ data.length + ' 个');
    break;
    case 'isAll':
      layer.msg(checkStatus.isAll ? '全选': '未全选');
    break;
  };
});
//监听行工具事件
table.on('tool(test)', function(obj){
  var data = obj.data;
  console.log(obj)
  if(obj.event === "out"){
    obj.update({
      att: "旷课"
    });
  } else if(obj.event === 'late'){
    obj.update({
      att: "迟到"
    });
  } else if(obj.event === 'date') {
    
    obj.update({
      att: "请假"
    });
  } else if(obj.event === 'cancel'){
    obj.update({
      att: ""
    });
  }


  //移动学生到别的班级
  else if(obj.event === 'move'){
    $.get("tea_consql_edit.php?showallclass=-1",function(response,status){
  
    str_cl="";
    clid_arr = new Array();
    cltime_arr = new Array();
    cl_arr = new Array();
   
    for(var i = 0;i<response.cl.length;i++){
        clid_arr[i] = response.cl[i].clid;
        cltime_arr[i] = response.cl[i].cltime;
        cl_arr[i] = [clid_arr[i],cltime_arr[i]];


        
        temp="<option value="+response.cl[i].clid+" selected=\"selected\">"+response.cl[i].cltime+"</option>";
        cltime = response.cl[i].cltime;
        
        str_cl=str_cl+temp;
    }

  
            
            




            var all_str = "<br/><br/><span style=\"color:#000000\">班级选择 </span>"+
            "<select id=\"modalclassSelected\" style=\"width: 200px; height: 25px; line-height: 25px;\" name=\"selectedClassId\" onchange=\"confirm1()\">"+
            
           
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
  
  
  all_str+
  "</form>"+
  "<button id =\"yes\" name=\"send\"style=\"margin-top: 25px;margin-left: 32px;margin-right: 32px;\">提交</button>"+
  "<button id =\"no\"name=\"cancel\">取消</button>"+
  "</div></div>";
  document.body.appendChild(oLogin);

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

      var classId = $("#modalclassSelected option:selected").val();
     
      $.get("tea_consql_edit.php", {
     
        sid:obj.data.sid,
        moveid:classId

  },function(response,status){
 console.log(response.code);
 if(response.code=="200"){
      
      document.body.removeChild(oMask);
      document.body.removeChild(oLogin);
     
      
      
      alert("修改成功");
      document.getElementById("showdiv").innerHTML="";
      $("#manbutton").trigger("onclick");
      
  }

  });
  }
    
});
  }

  //移除学生
  else if(obj.event === 'dele'){

    var r=confirm("确认移除？")
    if (r==true)
      {
        $.get("tea_consql_edit.php", {
     
          
          deleid:obj.data.sid
  
    },function(response,status){
   console.log(response.code);
   if(response.code=="200"){
        
        alert("修改成功");
        document.getElementById("showdiv").innerHTML="";
        $("#manbutton").trigger("onclick");
        
    }
  
    });
      }
    else
      {
    //取消按钮
      }

   
  }

});
}


function confirm1(){

  var classId = $("#modalclassSelected option:selected").val();
  //window.location.href = "T_homeworkList.html?courseId="+courseId+"&classId="+classId;
  //console.log(classId);
  console.log(classId);
}
//ajax修改表中的值
//     $.get("tea_consql_edit.php", {
     
//         title:title1,
//         content:content1,

//   },function(response,status){
//  if(response.code=="200"){
      
//     layer.msg('修改成功');
      
//   }

//   });