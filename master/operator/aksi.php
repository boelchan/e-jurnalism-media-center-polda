<?php
	error_reporting(1);
	include "../../koneksi.php";
	$module=$_GET["module"];
	$act=$_GET["act"];
	switch($module){
	case 'berita':
		if ($act=="insert"){
			if(isset($_POST['ok'])){
				$jenis=$_POST['txt_jenis'];
				$judul=$_POST['txt_judul'];
				$isi=$_POST['txt_isi'];				
				
				$tgl = date('ymd-his');
				$lokasi_file=$_FILES['txt_image']['tmp_name'];
				$nama_file=$tgl.$_FILES['txt_image']['name'];
			

				$tgl=$_POST['txt_tgl'];
				if(	$judul==""||
					$jenis==""||
					$isi==""||
					$nama_file==""||
					$tgl=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=berita&act=insert";
					</script>
					<?php
				}else{
					$insert=mysql_query("INSERT INTO `db_ejurnalism`.`tb_berita` 
					(`ID_BERITA`, `JENIS_BERITA`,`JUDUL_BERITA`, `ISI_BERITA`, `IMAGE`, `TGL_BERITA`) 
					VALUES (NULL, '$jenis', '$judul', '$isi', '$nama_file', '$tgl')");			
					$move = move_uploaded_file($lokasi_file,'../mediaplayer/slide_berita/image/'.$nama_file);
					if($insert){
						?>
						<script>
						alert("Data Berhasil Ditambahkan");
						window.location.href = "index.php?r=berita";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Gagal Menambahkan Data");
						window.location.href = "index.php?r=berita";
						</script>
						<?php
					}
				}
			}
			elseif(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=berita";
				</script>
				<?php
			}
		}
		elseif($act=="edit"){
			if(isset($_POST['ok'])){
					$id=$_POST['txt_id'];
					$jenis=$_POST['txt_jenis'];
					$judul=$_POST['txt_judul'];
					$isi=$_POST['txt_isi'];
					$lokasi_file=$_FILES['txt_image']['tmp_name'];
					$nama_file=$_FILES['txt_image']['name'];
					$tgl=$_POST['txt_tgl'];
					if(	$judul==""||
						$jenis==""||
						$isi==""||
						$nama_file==""||
						$tgl=="")
					{
						?>
						<script>
						alert("Semua Data Harus Diisi");
						window.location.href = "index.php?r=berita&act=edit&id=<?php echo $id;?>";
						</script>
						<?php
					}else{
						$edit=mysql_query("update tb_berita set
						JENIS_BERITA='$jenis',
						JUDUL_BERITA='$judul',
						ISI_BERITA='$isi',
						IMAGE='$nama_file',
						TGL_BERITA='$tgl' where ID_BERITA='$id'");
						$move = move_uploaded_file($lokasi_file,'../mediaplayer/slide_berita/image/'.$nama_file);
						if($edit){
							?>
							<script>
							alert("Edit Data Berhasil");
							window.location.href = "index.php?r=berita";
							</script>
							<?php
						}else{
							?>
							<script>
							alert("Gagal Edit Data");
							window.location.href = "index.php?r=berita&act=edit";
							</script>
							<?php
						}
					}
				}
			elseif(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=berita";
				</script>
				<?php
			}
		}	
		else if($act=="delete"){
			$id=$_GET["id"];
			$del=mysql_query("delete from tb_berita where ID_BERITA='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "index.php?r=berita";
				</script>
				<?php
			}
		}
	break;

	case 'jb':
		if ($act=="insert"){
			if(isset($_POST['ok'])){
				$jenis=$_POST['txt_jenis'];
				if(	$jenis=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=jb&act=insert";
					</script>
					<?php
				}else{
					$insert=mysql_query("INSERT INTO `db_ejurnalism`.`tb_jenis_berita` 
						(`id_jb`, `Jenis`) VALUES (NULL, '$jenis')");			
						if($insert){
							?>
							<script>
							alert("Data Ditambahkan");
							window.location.href = "index.php?r=jb";
							</script>
							<?php
						}else{
							?>
							<script>
							alert("Data Sudah Ada");
							window.location.href = "index.php?r=jb&act=insert";
							</script>
							<?php
						}
					}
				}
			
			elseif(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=jb";
				</script>
				<?php
			}
		}
		elseif($act=="edit"){
			if(isset($_POST['ok'])){
				$id=$_POST['txt_id'];
				$jenis=$_POST['txt_jenis'];
				if(	$jenis=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=berita&act=edit&id=<?php echo $id;?>";
					</script>
					<?php
				}else{
					$insert=mysql_query("UPDATE `db_ejurnalism`.`tb_jenis_berita` SET `Jenis` = '$jenis' WHERE `tb_jenis_berita`.`id_jb` =$id;");			
					if($insert){
						?>
						<script>
						alert("Edit Data Berhasil");
						window.location.href = "index.php?r=jb";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Gagal Edit, Data Sudah Ada !!");
						window.location.href = "index.php?r=jb&act=edit";
						</script>
						<?php
					}
				}				
			}
			elseif(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=jb";
				</script>
				<?php
			}
		}
		else if($act=="delete"){
			$id=$_GET["id"];
			$del=mysql_query("delete from tb_jenis_berita where id_jb='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "index.php?r=jb";
				</script>
				<?php
			}
		}
	break;

	case 'video':
		if ($act=="insert"){
			if(isset($_POST['ok'])){		
				$judul=$_POST["txt_judul"];
				$tgl=$_POST["txt_tgl"];

				$lokasi_file=$_FILES['txt_video']['tmp_name'];
				$nama_file=$_FILES['txt_video']['name'];
				$type =$_FILES ['txt_video' ][ 'type' ];
				$size =$_FILES ['txt_video' ][ 'size' ];
				$maxSize = $_POST['MAX_FILE_SIZE'];

				
				if(	$judul==""||
					$nama_file==""||
					$tgl=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=video&act=insert";
					</script>
					<?php
				}else{
					
					$tgl = date('y-m-d');
					if ($type != "video/mp4" ){
//						$msg= "File video $nama_file harus mp4" ;
						?>
						<script>
						alert("Data Video Harus MP4");
						window.location.href = "index.php?r=video&act=insert";
						</script>
						<?php
					}elseif ($size > $maxSize){
						?>
						<script>
						alert("Data Video Telalu Besar");
						window.location.href = "index.php?r=video&act=insert";
						</script>
						<?php
					}
					else{
						$insert=mysql_query("INSERT INTO `db_ejurnalism`.`tb_video` 
						(`ID_VIDEO`, `JUDUL_VIDEO`, `VIDEO`, `TGL_VIDEO`) 
						VALUES (NULL, '$judul', '$nama_file', '$tgl')");			
						$move=move_uploaded_file($lokasi_file,'../mediaplayer/videos/'.$nama_file);
						
						if($insert && $move){
							?>
							<script>
							alert("Data Berhasil Ditambahkan");
							window.location.href = "index.php?r=video";
							</script>
							<?php
						}	
						else{
						?>
						<script>
						alert("Gagal Menambahkan Data");
						window.location.href = "index.php?r=video";
						</script>
						<?php
					}	}
				}
			}
			elseif(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=video";
				</script>
				<?php
			}
		}	
		elseif($act=="edit"){
			if(isset($_POST['ok'])){
				$video=($_FILES['txt_video']['name']);
				$video_tmp=($_FILES['txt_video']['tmp_name']);
				$id=$_POST['txt_id'];
				$judul=$_POST['txt_judul'];
				$vid=$_POST['txt_video'];
				$tgl=$_POST['txt_tgl'];
				if(	$judul==""||
					$vid==""||
					$tgl=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=video&act=edit&id=<?php echo $id;?>";
					</script>
					<?php
				}else{
					$edit=mysql_query("update tb_video set
					JUDUL_VIDEO='$judul',
					VIDEO='$vid',
					TGL_VIDEO='$tgl' where ID_VIDEO='$id'");
					$move=move_uploaded_file($video_tmp,'videos/'.$video);
					if($edit){
						?>
						<script>
						alert("Edit Data Berhasil");
						window.location.href = "index.php?r=video";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Edit Data Gagal");
						window.location.href = "index.php?r=video&act=edit";
						</script>
						<?php
					}
				}
			}
			elseif(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=video";
				</script>
				<?php
			}
		}
		else if($act=="delete"){
			$id=$_GET["id"];
			$del=mysql_query("delete from tb_video where ID_VIDEO='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "index.php?r=video";
				</script>
				<?php
			}
		}
	break;
	
	case 'cuplikan':
		if ($act=="insert"){
			if(isset($_POST['ok'])){
				$cup=$_POST['txt_cuplikan'];
				$tgl=$_POST['txt_tgl'];
				if(	$cup==""||
					$tgl=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=cuplikan&act=insert";
					</script>
					<?php
				}else{
					$insert=mysql_query("INSERT INTO `db_ejurnalism`.`tb_cuplikan` 
					(`ID_CUPLIKAN`, `ISI_CUPLIKAN`, `TGL_CUPLIKAN`) 
					VALUES (NULL, '$cup', '$tgl')");			
					if($insert){
						?>
						<script>
						alert("Data Berhasil Ditambahkan");
						window.location.href = "index.php?r=cuplikan";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Gagal Menambahkan Data Baru");
						window.location.href = "index.php?r=cuplikan";
						</script>
						<?php
					}
				}
			}
			if(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=cuplikan";
				</script>
				<?php
			}
		}		
		elseif($act=="edit"){
			if(isset($_POST['ok'])){
				$id=$_POST['txt_id'];
				$cup=$_POST['txt_cuplikan'];
				$tgl=$_POST['txt_tgl'];
				if(	$cup==""||
					$tgl=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?r=cuplikan&act=edit&id=<?php echo $id;?>";
					</script>
					<?php
				}else{
					$edit=mysql_query("update tb_cuplikan set
					ISI_CUPLIKAN='$cup',
					TGL_CUPLIKAN='$tgl' where ID_CUPLIKAN='$id'");
					if($edit){
						?>
						<script>
						alert("Edit Data Berhasil");
						window.location.href = "index.php?r=cuplikan";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Gagal Edit Data");
						window.location.href = "index.php?r=cuplikan&act=edit";
						</script>
						<?php
					}
				}
			}
			if(isset($_POST['btl'])){
			?>
				<script>
				window.location.href = "index.php?r=cuplikan";
				</script>
				<?php
			}
		}		
		else if($act=="delete"){
			$id=$_GET["id"];
			$del=mysql_query("delete from tb_cuplikan where ID_CUPLIKAN='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "index.php?r=cuplikan";
				</script>
				<?php
			}
		}
		
	break;
}