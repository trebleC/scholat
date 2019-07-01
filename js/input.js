$(function() {

		'use strict';

		window.Input = function(selector){
			var $ele
			,    $error_ele
			    ,me=this
			    ,rule = {required:true};

			this.load_validator = function(){
				var val = this.get_val();

				this.validator = new Validator(val,rule);
			}

			this.get_val = function(){
				return $ele.val();
			}
			init();
			function init(){
				find_ele();
				get_error_ele();
				parse_rule();
				me.load_validator();
				listen();

			}
			function listen(){
				$ele.on('change',function() {
					var valid = me.validator.is_valid(me.get_val());
					console.log('error_ele:','#' + $ele.attr('name')+'-input-error');
					if(valid)
						$error_ele.hide();
					else
						$error_ele.show();
				})
			}
			function get_error_selector(){
               return '#' + $ele.attr('name')+'-input-error';

			}
			function get_error_ele(){
				$error_ele=$(get_error_selector());


			}
			
 function find_ele(){
 	if(selector instanceof jQuery)
					$ele = selector;
				else
				$ele = $(selector);


 }
function parse_rule(){
	var i;
var rule_str = $ele.data('rule');
if(!rule_str) return;

var rule_arr = rule_str.split('|');//['min:18','max:100']
for(i = 0; i < rule_arr.length; i++){
	var item_str = rule_arr[i];//'min:18'
	//console.log(item_str);
	var item_arr = item_str.split(':');//['min','18']
	rule[item_arr[0]] = JSON.parse(item_arr[1]);//{min:18}
	console.log(rule);

}
}}
});