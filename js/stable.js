

layui.use('table', function(){
    var table = layui.table;
    
    //第一个实例
    table.render({
      elem: '#demo'
      ,skin:'line'
      ,even:"ture"
      //,width:500
      //,height:500
      ,url: "../tea_test/tea_consql_class.php?table=1" //数据接口
      ,page: false//开启分页
      ,toolbar: '#toolbarDemo'
      ,size: 'lg'
  
      ,cols: [[ //表头
         {type:'numbers'}
        ,{type: 'checkbox'}
    
        ,{field: 'name', title: '姓名', width:80,sort: true}
        ,{field: 'sid', title: '学号', width:80, sort: true}
  
  
    
      ]]
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
    });
  });
  
  
  
  

 
  