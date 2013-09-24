<?php
include_once( APPPATH.'/libraries/upyun.class.php' );

class Test extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function upload()
	{
		
		$upyun = new UpYun('your bucket', 'your username', 'your password');
		
		if(!empty($_POST['sub'])){
			move_uploaded_file($_FILES['up']['tmp_name'],$_FILES['up']['name']);
			$fh = fopen($_FILES['up']['name'],'r');
			var_dump($fh);
		    var_dump($upyun->writeFile("/test.jpg", $fh)); 
			fclose($fh);
			unlink($_FILES['up']['name']);
		}
	}
}
?>