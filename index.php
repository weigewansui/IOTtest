<?php

	//自动加载类
	function __autoload($class_name){
		require 'DB/'.$class_name.'.class.php';
	}

	/**
	 * 判断是否已被打开
	 */

	//从数据库读取开关状态
		$verify=new verify_sql;

		$value=$verify->verify_status();


	//判断是否已经提交歌名或故事名
		
		// $song = !empty($_POST['song'])? 'resource/song/'. $_POST['song'] . '.mp3' : 0;
		// $story = !empty($_POST['story'])? 'resource/story/'. $_POST['story']. '.mp3' :0;


	//如果状态打开则弹出选歌选故事表单
	if ($value) {
		
		$verify->kid_correct();

	//未开启则显示系统已经关闭
	/*
		此处可写自动跳转到登陆页面
	 */
	
	} else $verify->kid_error();

	// if ($value && $song) {
	// 	header("Location: $song");
	//  }


	// if ($value && $story) {
	// 	header("Location: $story");
	// }

	// function play($addr){
	// 	$player = '<audio src="' . $addr . '" preload="auto" />';
	// 	echo '<center>' . $player . '</center>';
	// 	echo '<br><br><br><br><br>';
	// }
	?>