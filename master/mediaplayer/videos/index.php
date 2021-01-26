<?php
	
	$tgl = date('y-m-d');
	
	include "koneksi.php";
	
	$select=mysql_query("select * from tb_video where TGL_VIDEO = '$tgl' ");	
	$cekdata = mysql_num_rows($select);

	$tgl2=date('d');
	$tgl3=date('y-m');
	$aa=$tgl2-1;
	$b=$tgl3.-$aa;
	$select2=mysql_query("select * from tb_video where TGL_VIDEO = '$b' ");	
	$cekdata2 = mysql_num_rows($select2);

	if ($cekdata>0){
	?>
		<figure >
			<video width="400" height="300" controls id="video_player" autoplay onended="run()">
				<source src="videos/asd.mp4" type="video/mp4">
			</video>
		</figure>

		<script>
		index_video = 0;
		videoPlayer = document.getElementById("video_player");

		var title_video = [ 
		<?php
		$select=mysql_query("select * from tb_video where TGL_VIDEO = '$tgl' order by TGL_VIDEO desc ");
			
		while($dataildeo = mysql_fetch_array($select)){ 
			echo "'videos/".$dataildeo['VIDEO']."',";
		} 
		?>
		];

		function run(){
			index_video++;
				
			if (index_video == <?php echo $cekdata?>) index_video = 0;
				var nextVideo = title_video[index_video];
				videoPlayer.src = nextVideo;
				videoPlayer.play();
		};
		</script>
	<?php
	}elseif($cekdata2>0){

	?>
		<figure >
			<video width="400" height="300" controls id="video_player" autoplay onended="run()">
				<source src="videos/asd.mp4" type="video/mp4">
			</video>
		</figure>

		<script>
		index_video = 0;
		videoPlayer = document.getElementById("video_player");

		var title_video = [ 
		<?php
		$select=mysql_query("select * from tb_video where TGL_VIDEO = '$b' order by TGL_VIDEO desc ");
			
		while($dataildeo = mysql_fetch_array($select)){ 
			echo "'videos/".$dataildeo['VIDEO']."',";
		} 
		?>
		];

		function run(){
			index_video++;
				
			if (index_video == <?php echo $cekdata2?>) index_video = 0;
				var nextVideo = title_video[index_video];
				videoPlayer.src = nextVideo;
				videoPlayer.play();
		};
		</script>
	<?php
	
	}else{

	?>
		<figure >
			<video width="400" height="300" controls id="video_player" autoplay onended="run()">
				<source src="videos/asd.mp4" type="video/mp4">
			</video>
		</figure>

		<script>
		index_video = 0;
		videoPlayer = document.getElementById("video_player");

		var title_video = [ 
		<?php
		$select3=mysql_query("select * from tb_video where TGL_VIDEO < '$tgl' order by TGL_VIDEO desc ");
		$cekdata3 = mysql_num_rows($select3);
		while($dataildeo3 = mysql_fetch_array($select3)){ 
			echo "'videos/".$dataildeo3['VIDEO']."',";
		} 
		?>
		];

		function run(){
			index_video++;
				
			if (index_video == <?php echo $cekdata3?>) index_video = 0;
				var nextVideo = title_video[index_video];
				videoPlayer.src = nextVideo;
				videoPlayer.play();
		};
		</script>
	<?php
	}
	?>