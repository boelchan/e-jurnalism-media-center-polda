<?php
	error_reporting(0);
	$r= $_GET['r'];
	
	switch($r){
		default:
			include "home.php";
		break;
		
		case "berita":
			include "berita.php";
		break;
		
		case "video":
			include "video.php";
		break;
		
		case "cuplikan":
			include "cuplikan.php";
		break;
		
		case "jb":
			include "jb.php";
		break;
				
		case "logout":
			include "logout.php";
		break;
	}
?>