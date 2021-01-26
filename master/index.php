<?php
	session_start();
	include '../koneksi.php';
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
			<h1>ADMINISTRATOR</h1> 
		</div>
		<div id="tbody">
			<div class="content">
				<h2>SELAMAT DATANG DI POLDA JATIM</h2>
				<h2>BIDANG HUMAS POLDA JATIM</h2>
				<h2>E-JURNALISM MEDIA CENTER</h2>
				<div class="menuUtama1">
					<a href="mediaplayer/index.php"><img class="play" src="play3.png"></a>
				</div>
				<div class="menuUtama2">
					<a href="operator/index.php"><img class="menu" src="file.png"></a>
				</div>
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