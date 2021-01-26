<?php
	session_start();
	include '../../koneksi.php';
	$user = $_SESSION['username'];
	$level = $_SESSION['level'];
	if ( $user == "" || $level ==""){
		?>
		<script>
			alert("Login Dulu");
			window.location.href="../../index.php";
		</script>		
		<?php
	} else {
	?>
	<html>
	<head>
		<title>Humas Polda | Kesekretariatan</title>
		<link type="text/css" rel="stylesheet" href="style.css"> 
	</head>
	<body>
	<div id="outer-wrapper">
		<div id="header">
			<a href="../index.php"><h1>ADMINISTRATOR</h1></a> 
		</div>
		<div id="tbody">
			<div class="menu">
				<div class='img' id='img-1'>
				<div class='mask'></div>
				<a href="index.php?r=home"><img src="image/home.png"/></a>
				</div>
				<div class='img' id='img-1'>
				<div class='mask'></div>
				<a href="index.php?r=berita"><img src="image/berita.png"/></a>
				</div>
				<div class='img' id='img-1'>
				<div class='mask'></div>
				<a href="?r=video"><img src="image/video.png"/></a>
				</div>
				<div class='img' id='img-1'>
				<div class='mask'></div>
				<a href="?r=cuplikan"><img src="image/cuplikan.png"/></a>
				</div>
				<div class='img' id='img-1'>
				<div class='mask'></div>
				<a href="?r=logout"><img src="image/logout.png"/></a>
				</div>
			</div>
			<div class="content">
				<?php
				include "content.php";
				?>
			</div>
		</div>
		<div id="footer">
			<label><marquee direction="left" scrollamount="4" align="center">&copy copy right Humas Polda Jatim</marquee>
			</label>
		</div>
	</div>
	</body>
	</html>
<?php
}
?>