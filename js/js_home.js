var div1 = document.getElementById("detail-tag-button"),
    div2 = document.getElementById("review-tag-button"),
    div1_content = document.getElementById("content-section"),
    div2_comment = document.getElementById("comment-section");
    div_video = document.getElementById("j-courseImg");
  div1.onclick = function() {
    
    alert('hello world');
    div2_comment.style.display = 'none'; 
    div1_content.style.display = 'inline';    //每次点击都先隐藏掉div，并移除class
            div2.classList.remove('selected');
                         //给当前div显示出来
        div1.classList.add('selected');                      //增加class
}
  div2.onclick = function() {
    
    alert('review-tag-button');
    div2_comment.style.display = 'inline';    //每次点击都先隐藏掉div，并移除class
            div1.classList.remove('selected');
               div1_content.style.display = 'none';           //给当前div显示出来
        div2.classList.add('selected');                      //增加class
}

/*div1.onclick = function(){
	alter('why so cool');
	 div2_comment.style.display = 'none';    //每次点击都先隐藏掉div，并移除class
            div2.classList.remove('selected');
               div1.style.display = 'inline';           //给当前div显示出来
        div1.classList.add('selected');                      //增加class
}
div2.onclick = function(){
	alter('why so c2222222ool');
	div1_content.style.display = 'none';    //每次点击都先隐藏掉div，并移除class
            div1.classList.remove('selected');
             div2.style.display = 'inline';           //给当前div显示出来
        div2.classList.add('selected');                      //增加class
}
*/