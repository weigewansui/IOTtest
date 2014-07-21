<?php
	
/**
 * Common.class.php中可以写入判断session状态的函数
 */
	Class verify_sql extends Common{

		private function verify_user($username,$password){
			//连接数据库
			include_once "DB/ez_sql_core.php";
			include_once "DB/ez_sql_mysql.php";
			$config= require "DB/Config.php";

			$this->db_host=$config['db_host'];
			$this->db_username=$config['db_username'];
			$this->db_pwd=$config['db_pwd'];
			$this->db_name=$config['db_name'];
			$this->db_prefix=$config['db_prefix'];

			$this->db = new ezSQL_mysql($this->db_username,$this->db_pwd,$this->db_name,$this->db_host);


			//验证过程
			//
			//
			return true;

		}

		public function verify_status($username='test',$password=''){

			if ($this->verify_user($username,$password)) {
				if ($users=$this->db->get_row("SELECT status FROM xx_user WHERE username='$username'")) {
					return $users->status;
					
				} else {
					$this->db->show_errors();
				}
			}
		}

		public function turn_on($username='test',$password='test'){

			if ($this->verify_user($username,$password)) {
				$this->db->query("UPDATE xx_user SET status = 1 WHERE username = '$username'");
			} else $this->error();
		}

		public function turn_off($username='test',$password='test'){

			if ($this->verify_user($username,$password)){
			$this->db->query("UPDATE xx_user SET status = 0 WHERE username = '$username'");
			}else $this->error();
		}

		public function on(){
			echo '<center>打开成功</center>';
		}

		public function off(){
			echo '<center>关闭成功</center>';
		}
		//开关关闭时，小孩端显示的函数
		public function kid_error(){
			echo '<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></head>';
			echo '<html><body>';
			echo '<br><br><br>';
			echo '<center><h1>系统已关闭，请让你妈开一下!!</h1></center><br>';
			echo '</body></html>';
		}

		//开关打开是显示
		public function kid_correct(){

			echo <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>点播页面</title>
	<script src="player/audio.js"></script>
	<script>
	  audiojs.events.ready(function() {
	    var as = audiojs.createAll();
	  });
	</script>
	</head>
	<body>
		<center>
		<br><br><br>
		<h1>输入歌曲或故事名</h1>
		<br><br><br>
		<form action="handle.php" method="post">
	歌曲名：	<input type="text" name="song">
	故事名： <input type="text" name="story">
			<input type="hidden" name="value" value=1> 
			<input type="submit" value="提交">
		</form>
		</center>
		<br><br><br><br><br><br>
		<center>
			歌曲有：小苹果，找朋友<br>故事有：丑小鸭，灰姑娘<br><br><br><br><br>
		</center>
		</body>
		</html>
HTML;
		}
	}
	
	


