<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$act =$_GET["act"];
	switch($act){
		default:
		$select=mysql_query("select * from tb_berita order by TGL_BERITA desc;");
		
		?>
		<a href="?r=berita"><h2>BERITA</h2></a>
		<hr size="5" color="white">
		<a href="?r=berita&act=insert"><img class="icon" src="../icon/add.png">Tambah Berita</a></td>		
		<label>   --   <label>
		<a href="?r=jb"><i>Lihat Jenis Berita</i></a></td>
		
			<table style="background:#00BCFF">
				<tr class="td_judul">
					<td ><b>NO</b></td>
					<td ><b>JENIS BERITA</b></td>
					<td ><b>JUDUL</b></td>
					<td ><b>ISI</b></td>
					<td ><b>IMAGE</b></td>
					<td ><b>TANGGAL MASUK</b></td>
					<td ><b>AKSI</b></td>
				</tr>
				<?php
				$no=1;
				
				while ($data_berita=mysql_fetch_array($select)){
				?>
				<tr>
					<td  ><?php echo $no?></td>
					<td><?php echo $data_berita['JENIS_BERITA']?></td>
					<td><?php echo $data_berita['JUDUL_BERITA']?></td>
					<td><textarea rows="auto" cols="33" style="border:none;"> <?php echo $data_berita['ISI_BERITA']?></textarea></td>
					<td><textarea rows="3" cols="15" style="border:none;"> <?php echo $data_berita['IMAGE']?></textarea></td>
					<td><?php echo $data_berita['TGL_BERITA']?></td>
					<td><a href="?r=berita&act=edit&id=<?php echo $data_berita["ID_BERITA"];?>"><img class="icon" src="../icon/edit.png"></a>
					<a href="aksi.php?module=berita&act=delete&id=<?php echo $data_berita["ID_BERITA"];?>" onclick=return confirm("yakin??")><img class="icon" src="../icon/delete.png"></a></td>
				</tr>
				<?php
				$no++;
				}
				?>
			</table>
			<?php
		break;
		
		case "insert":
				?>
		<a href="?r=berita"><h2>BERITA</h2></a>
		<hr size="5" color="white">
		<h3>Tambah Berita</h3>
		<hr size="2" color="white">
		<form method="POST" enctype="multipart/form-data" action="aksi.php?module=berita&act=insert">
			<table>
				<tr>		
					<td>Jenis Berita</td>
					<td><select class="txt" name="txt_jenis">
						<option value="">--Jenis Berita--</option>
						<?php
						$select = mysql_query("SELECT * FROM tb_jenis_berita");
						while ($data=mysql_fetch_array($select)){
						?>
						<option value="<?php echo $data['Jenis']?>"><?php echo $data['Jenis']?></option>
						<?php 
						}
						?>
					</select></td>
					<td><a href="?r=jb&act=insert"><i>Tambah Jenis Berita</i></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td><input class="txt" type="text" name="txt_judul"></td>
				</tr>
				<tr>
					<td>Isi Berita</td>
					<td><textarea class="txt" name="txt_isi" rows="10" cols="33"></textarea></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><input class="txt" type="file" name="txt_image"></td>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>
					<td><input class="txt" type="date" name="txt_tgl"></td>
				</tr>
				<tr>
					<td colspan="2">
					<input class="tombolBatal" type="submit" value="BATAL" name="btl">
					<input class="tombolReset" type="reset" value="RESET">
					<input class="tombolSimpan" type="submit" value="SIMPAN" name="ok"></td>
				</tr>
			</table>
		</form>
		<?php
	
		break;
		
		case "edit":
		
		$id =$_GET["id"];
		$select=mysql_query("select * from tb_berita where ID_BERITA='$id'");
		$data_berita=mysql_fetch_array($select);
		?>
		<a href="?r=berita"><h2>BERITA</h2></a>
		<hr size="5" color="white">
		<h3>Edit Berita</h3>
		<hr size="3" color="white">
		<form method="POST" enctype="multipart/form-data" action="aksi.php?module=berita&act=edit">
			<table>
				<tr>		
					<td>Jenis Berita</td>
					<td><select class="txt" name="txt_jenis">
					<option value="<?php echo $data_berita['JENIS_BERITA']?>"><?php echo $data_berita['JENIS_BERITA']?></option>
						<?php
						$select = mysql_query("SELECT * FROM tb_jenis_berita");
						while ($data=mysql_fetch_array($select)){
						?>
						<option value="<?php echo $data['Jenis']?>"><?php echo $data['Jenis']?></option>
						<?php 
						}
						?>
					</select></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td><input class="txt" type="text" name="txt_judul" value="<?php echo $data_berita['JUDUL_BERITA'];?>"></td>
				</tr>
				<tr>
					<td>Isi Berita</td>
					<td><textarea  class="txt" name="txt_isi" rows="10" cols="33"> <?php echo $data_berita['ISI_BERITA']?></textarea></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><input class="txt" type="file" name="txt_image" value="<?php echo $data_berita['IMAGE'];?>"></td>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>
					<td><input class="txt" type="date" name="txt_tgl" value="<?php echo $data_berita['TGL_BERITA'];?>"></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="txt_id" value="<?php echo $data_berita['ID_BERITA'];?>">
					<input class="tombolBatal" type="submit" value="BATAL" name="btl">
					<input class="tombolReset" type="reset" value="RESET">
					<input class="tombolSimpan" type="submit" value="SIMPAN" name="ok"></td>
				</tr>
			</table>
		</form>
		<?php
		break;
	}
?>