$(function() {
	'use strict';
/*选中页面中所有的input[data-rule]*/

/*解析*/

/*开始验证*/
/*var validator = new Validator('19',{
	max:100,
	min:18,
});
var result = validator.validate_min();*/
var lgn_username;
var lgn_username = new Input('#lgn-username');
console.log($("#lgn-username").val());
var result = lgn_username.validator.is_valid($("#lgn-username").val());
console.log('result111:',result);

})