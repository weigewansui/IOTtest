<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>开关</title>
	<link rel="stylesheet" type="text/css" href="Public/style.css" />
	<script language="javascript">  
	function postwith (to,p) {  
	  var myForm = document.createElement("form");  
	  myForm.method="post" ;  
	  myForm.action = to ;
	  for (var k in p) {  
	    var myInput = document.createElement("input") ;  
	    myInput.setAttribute("name", k) ;  
	    myInput.setAttribute("value", p[k]);  
	    myForm.appendChild(myInput) ;  
	  }  
	  document.body.appendChild(myForm) ;  
	  myForm.submit() ;  
	  document.body.removeChild(myForm) ;  
	}  
</script>  
</head>
<body> 
		<div class="demo-foot fix">
		 <h1>开关</h1>                        
		 <a href="javascript:postwith('',{value:1})" class="button button-khaki"><span>On</span></a>            
		 <a href="javascript:postwith('',{value:0})" class="button button-blue"><span>Off</span></a>  
		 <!-- 更多按钮   -->        
		 <!-- <a href="#" class="button button-brown"><span>Button</span></a>
		 <br>            
		 <a href="#" class="button button-red"><span>Button</span></a>            
		 <a href="#" class="button button-purple"><span>Button</span></a>
		 <a href="#" class="button button-green"><span>Button</span></a>
		 <br>
		 <a href="#" class="button button-black"><span>Button</span></a>
		 <a href="#" class="button button-orange"><span>Button</span></a>
		 <a href="#" class="button button-silver"><span>Button</span></a>-->
		 <br><br>
	</div>
</body>
</html>

<?php
/**
 * 用于开关操作
 *
 */
	function __autoload($class_name){
			require 'DB/'.$class_name.'.class.php';
	}

	$handle=new verify_sql;

//turn_on和turn_off函数需要传递参数$username用于验证该用户开关状态,默认设置为test用户
	if (isset($_POST['value'])) {
		if ($_POST['value']) {

			$handle->turn_on();
			//显示成功
			$handle->on();

		} else {

			$handle->turn_off();
			//显示失败
			$handle->off();

		}
	} else {

		if ($handle->verify_status()) {
			echo '当前状态为：开启';
		} else {
			echo '当前状态为：关闭';
		}
	}
	
	?>