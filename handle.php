<?php
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
		
	$song = !empty($_POST['song'])? 'http://weiding.me/demo/resource/song/'. urlencode($_POST['song']) . '.mp3' : 0;
	$story = !empty($_POST['story'])? 'http://weiding.me/demo/resource/story/'. urlencode($_POST['story']). '.mp3' :0;

	if ($value && $song) {
		echo $song;
	 }


	if ($value && $story) {
		echo $story;
	}

?>