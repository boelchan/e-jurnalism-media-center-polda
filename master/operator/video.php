<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$act =$_GET["act"];
	switch($act){
		default:
		$select=mysql_query("select * from tb_video order by TGL_VIDEO desc;");
		
		?>
		<a href="?r=video"><h2>VIDEO</h2></a>
		<hr size="5" color="white">
		<a href="?r=video&act=insert"><img class="icon" src="../icon/add.png">Tambah Video</a></td>
			<table>
				<tr class="td_judul">
					<td ><b>NO</b></td>
					<td ><b>JUDUL</b></td>
					<td ><b>VIDEO</b></td>
					<td ><b>TANGGAL MASUK</b></td>
					<td  width="56px"><b>AKSI</b></td>
				</tr>
				<?php
				$no=1;
				
				while ($data_video=mysql_fetch_array($select)){
				?>
				<tr>
					<td ><?php echo $no?></td>
					<td><?php echo $data_video['JUDUL_VIDEO']?></td>
					<td><?php echo $data_video['VIDEO']?></td>
					<td><?php echo $data_video['TGL_VIDEO']?></td>
					<td><a href="?r=video&act=edit&id=<?php echo $data_video["ID_VIDEO"];?>"><img class="icon" src="../icon/edit.png"></a>
					<a href="aksi.php?module=video&act=delete&id=<?php echo $data_video["ID_VIDEO"];?>" onclick="return confirm("yakin??")"><img tittle="delete"class="icon" src="../icon/delete.png"></a></td>
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
		<a href="?r=video"><h2>VIDEO</h2></a>
		<hr size="5" color="white">
		<h3>Tambah Video</h3>
		<hr size="2" color="white">
		<form method="POST"  enctype="multipart/form-data" action="aksi.php?module=video&act=insert">
			<table>
				<tr>
					<td>JUDUL</td>
					<td><input class="txt" type="text" name="txt_judul"></td>
				</tr>
				<tr>
					<td>VIDEO</td>
					<td><input class="txt" type="file" name="txt_video"></td>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>
					<td><input class="txt" type="date" name="txt_tgl"></td>
				</tr>
				<tr>
					<td colspan="2">
					<input name= "MAX_FILE_SIZE" value= "50000000" type= "hidden" />
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
		$select=mysql_query("select * from tb_VIDEO where ID_VIDEO='$id'");
		$data_video=mysql_fetch_array($select);
		?>
		<a href="?r=video"><h2>VIDEO</h2></a>		
		<hr size="5" color="white">
		<h3>Edit Video</h3>
		<hr size="2" color="white">
		<form method="POST" action="aksi.php?module=video&act=edit" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Judul</td>
					<td><input class="txt" type="text" name="txt_judul" value="<?php echo $data_video['JUDUL_VIDEO'];?>"></td>
				</tr>
				<tr>
					<td>VIDEO</td>
					<td><input class="txt" type="file" name="txt_video" value="<?php echo $data_video['VIDEO'];?>"></td>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>

					<td><input class="txt" type="date" name="txt_tgl" value="<?php echo $data_video['TGL_VIDEO'];?>"></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="txt_id" value="<?php echo $data_video['ID_VIDEO'];?>">
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