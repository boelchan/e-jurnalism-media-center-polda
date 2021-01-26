<html>
	<head>
		<title>Humas Polda | Kesekretariatan</title>
		<link type="text/css" rel="stylesheet" href="style.css"> 
	</head>
	<body>
	<div id="outer-wrapper">
		<div id="header">
			<?php
				include "header_slide/index.php";
			?>
		</div>
		
		<div id="tbody">
			<div id="content">
		<div id="isi">
				<?php
					include 'slide_berita/index.php';
				?>
				</div>
			
			</div>
			<div id="sidebar">
				<?php
					include 'diagram/index.php';
					include 'videos/index.php';
				?>
			</div>
		</div>
		<div id="footer">
			<?php
				include 'runningtext.php';
			?>
		</div>
	</div>
	</body>
</html>