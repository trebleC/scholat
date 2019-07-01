
function getHash(){
var arr = ["#/learn/announce","#/learn/score","#/learn/content","#/learn/testlist","#/learn/examlist","#/learn/forumindex"];
var url=window.location.hash;
//console.log("hashcoming   "+url +"   "+arr[0]);
//alert(url);

switch(url){
	case arr[0]:
		console.log("tab1"); 
		showdiv_fun("1");
		init();
        selected_num("1");
		break;
	case arr[1]:
		console.log("tab2");
		showdiv_fun("2");
		init();
        selected_num("2");
		break;
	case arr[2]:
		console.log("tab3"); 
		showdiv_fun("3");
		init();
       selected_num("3");
		break;
	case arr[3]:
		console.log("tab4");
		showdiv_fun("4"); 
		init();
       selected_num("4");
		break;
	case arr[4]:
		console.log("tab5"); 
		showdiv_fun("5");
		init();
       selected_num("5");
		break;
	case arr[5]:
		console.log("tab6"); 
		showdiv_fun("6");
		init();
        selected_num("6");
		break;
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
/*function selected(ele){
    ele.classList.add("u-curtab");

}*/


function selected_num(tab_num){
    var tab=document.getElementById("btnmain"+tab_num);
    console.log("btnmain"+tab_num);
    tab.classList.add("u-curtab");

}