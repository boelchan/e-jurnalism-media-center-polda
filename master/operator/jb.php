<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$act =$_GET["act"];
	switch($act){
		default:
		$select=mysql_query("select * from tb_jenis_berita ;");
		
		?>
		<a href="?r=jb"><h2>JENIS BERITA</h2></a>		
		<hr size="5" color="white">
		<a href="?r=jb&act=insert"><img class="icon" src="../icon/add.png">Tambah Jenis Berita</a></td>
			<table>
				<tr>
					<td class="b_judul"><b>NO</b></td>
					<td class="b_judul"><b>JENIS BERITA</b></td>
					<td  class="b_judul" width="56px"><b>AKSI</b></td>
				</tr>
				<?php
				$no=1;
				
				while ($data_berita=mysql_fetch_array($select)){
				?>
				<tr>
					<td class="b_judul"><?php echo $no?></td>
					<td><?php echo $data_berita['Jenis']?></td>
					<td><a href="?r=jb&act=edit&id=<?php echo $data_berita["id_jb"];?>"><img class="icon" src="../icon/edit.png"></a>
					<a href="aksi.php?module=jb&act=delete&id=<?php echo $data_berita["id_jb"];?>" onclick=return confirm("yakin??")><img class="icon" src="../icon/delete.png"></a></td>
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
		<a href="?r=jb"><h2>JENIS BERITA</h2></a>		
		<hr size="5" color="white">
		<h3>Tambah Jenis Berita</h3>
		<hr size="2" color="white">
		<form method="POST" action="aksi.php?module=jb&act=insert">
			<table>
				<tr>
					<td>Nama Jenis Berita</td>
					<td><input class="txt" type="text" name="txt_jenis"></td>
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
		$select=mysql_query("select * from tb_jenis_berita where id_jb='$id'");
		$data_berita=mysql_fetch_array($select);
		?>
		<a href="?r=jb"><h2>JENIS BERITA</h2></a>		
		<hr size="5" color="white">
		<h3>Edit Jenis Berita</h3>
		<hr size="2" color="white"><form method="POST" action="aksi.php?module=jb&act=edit">
			<table>
				<tr>
					<td>Nama Jenis Berita</td>
					<td><input class="txt" type="text" name="txt_jenis" value="<?php echo $data_berita['Jenis'];?>"></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="txt_id" value="<?php echo $data_berita['id_jb'];?>">
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