function creatdiv(){
                //创建一个div
		var div = document.createElement('div');
		div.innerHTML = '<img src=' + '"' + '/vtpath/' + data.allPath[i] + '"' + '>'; //设置显示的数据，可以是标签．
		div.className = "video-"+(i+1);//设置div的属性，如：class，title，id 等等
 
		var bo = document.body; //获取body对象.
		//动态插入到body中
		bo.insertBefore(div, bo.lastChild);
}
var ann_div = document.getElementById("detail-tag-button");
    