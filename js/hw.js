function btn_submit(ele) {
btn_name = ele.id.split("_")[0];
lid= parseInt(ele.id.split("_")[1]);
hid = parseInt(ele.id.split("_")[1])+1;
var li  = document.getElementById('li_'+lid);
var res =  $("#"+ele.id);
var element=document.getElementById("showdiv");
console.log(btn_name);
if(btn_name=="look"){
    var h2=document.getElementById("beforeshow");
    h2.innerHTML="作业 <button id='backtohw'>返回</button>";
   $.get(adir+"consql_hw_text.php", {
    coid:hid
  },function(response,status){
    var str="<div id=\"announcement_div\">"+
        "<h1>标题："+response.data[0].name+"</h1>"+
        "<p>老师："+response.data[0].tname+"</p>"+
        "<p>截止时间"+response.data[0].end_t+"</p>"+
        "<p>url:"+response.data[0].url+"</p>"+
        "<br><br></div>";
        element.innerHTML=str;
      
  });
   $("#backtohw").on("click",function(){
    $("#btnmain4").trigger("click"); 
   });
}else if(btn_name=="submit"&&li.innerHTML=="提交"){
     
	
	
	console.log(li.innerHTML);
	$("#file").trigger("click");  
    $('#file').off('change').on('change', function() {
    //confirm($('#file').files);
    var f = document.getElementById("file").files;  
    alert(f[0].lastModified+"  "+f[0].name+"   "+f[0].type+"     "+f[0].size);  

      
    $.ajax({
            //几个参数需要注意一下
                url: "upload_file.php",
                type: "POST",//方法类型
                cache: false,
                data: new FormData($("#uploadform")[0]),
                processData: false,
                contentType: false,
                success: function (result) {
                    console.log(result);//打印服务端返回的数据(调试用)
                   
                        alert("SUCCESS");
                        li.innerHTML="已交";
                    
                    
                },
                error : function() {
                    alert("异常！");
                }
            });

  

});

}else if(btn_name=="submit"&&li.innerHTML=="已交"){
     
	//li.innerHTML=("<button><a href= \"//127.0.0.1/scholat/php/download.php?fname=7.txt"+"\">下载文件</a></button>");
  if(window.confirm('你确定要下载 7.txt 吗？')){
  	              $.get("//127.0.0.1/scholat/php/download.php?fname=7.txt",function(data){
  alert("Data Loaded: " + data);
});
                 alert("确定");
                
                 return true;
              }else{
              
                 return false;
             }










}else if(btn_name=="btnfix"){
     $("#file").trigger("click");  
	     $('#file').off('change').on('change', function() {
    //confirm($('#file').files);
    var f = document.getElementById("file").files;  
    alert(f[0].lastModified+"  "+f[0].name+"   "+f[0].type+"     "+f[0].size);  

      
    $.ajax({
            //几个参数需要注意一下
                url: "upload_file.php",
                type: "POST",//方法类型
                cache: false,
                data: new FormData($("#uploadform")[0]),
                processData: false,
                contentType: false,
                success: function (result) {
                    console.log(result);//打印服务端返回的数据(调试用)
                   
                        alert("SUCCESS");
                    
                    
                },
                error : function() {
                    alert("异常！");
                }
            });



});


}

}

