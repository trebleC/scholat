$(function(){

	'use strict';

	window.Validator = function(val,rule){

		this.is_valid = function(new_val){
			var key;
			if(new_val)
				val = new_val;
			if(!rule.required && !val)
				return false;
			for(key in rule){
				if(key ==='required')
					continue;
				var r = this['validate_'  +  key]();
				if(!r) return false;

			}return true;

		}
        this.validate_pattern = function() {
	     var reg = new RegExp(rule.pattern);
	      return reg.test(val);
         }
		this.validate_min = function() {
	     pre_max_min();
	      return val >= rule.min;
         }
         this.validate_max = function() {
	     pre_max_min();
	      return val <= rule.max;
         }
         this.validate_minlength = function() {
	     pre_maxlength_minlength();
	      return val >= rule.minlength;
         }
         this.validate_maxlength = function() {
	     pre_maxlength_minlength();
	      return val <= rule.maxlength;
         }
         this.validate_numeric = function() {
	      return $.isNumeric(val);
         }
         this.validate_required = function() {
         	var real = $.trim(val);
	     if(!real&&real!==0)
	     	return false;
	      return true;
         }
         this.validate_nullable = function() {
         	var real = $.trim(val);
	     if(!real&&real!==0)
	     	return false;
	      return true;
         }

/*用于完成this.validata_max 或
          this.validata_min的前置工作*/
function pre_max_min(){
val = parseFloat(val);

}
/*用于完成this.validata_maxlength 或
          this.validata_minlength的前置工作*/
function pre_maxlength_minlength(){
val = val.toString();

}

	}
     






/*选中页面中所有的input[data-rule]*/

/*解析*/

/*开始验证*/

})
