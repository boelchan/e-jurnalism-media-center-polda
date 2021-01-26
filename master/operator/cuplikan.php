<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$act =$_GET["act"];
	switch($act){
		default:
	
		$select=mysql_query("select * from tb_cuplikan order by TGL_CUPLIKAN desc ");
		
		?>
		<a href="?r=cuplikan"><h2>CUPLIKAN</h2></a>		
		<hr size="5" color="white">
		<a href="?r=cuplikan&act=insert"><img class="icon" src="../icon/add.png">Tambah Cuplikan</a>
			<table>
				<tr class="td_judul">
					<td ><b>NO</b></td>
					<td ><b>CUPLIKAN</b></td>
					<td ><b>TANGGAL MASUK</b></td>
					<td  width="56px"><b>AKSI</b></td>
				</tr>
				<?php
				$no=1;
				
				while ($data_cuplikan=mysql_fetch_array($select)){
				?>
				<tr>
					<td ><?php echo $no?></td>
					<td><textarea  class="txtcup" name="txt_isi" rows="3" cols=""> <?php echo $data_cuplikan['ISI_CUPLIKAN']?></textarea></td>
					<td><?php echo $data_cuplikan['TGL_CUPLIKAN']?></td>
					<td><a href="?r=cuplikan&act=edit&id=<?php echo $data_cuplikan["ID_CUPLIKAN"];?>"><img class="icon" src="../icon/edit.png"></a>
					<a href="aksi.php?module=cuplikan&act=delete&id=<?php echo $data_cuplikan["ID_CUPLIKAN"];?>" onclick=return confirm("yakin??")><img class="icon" src="../icon/delete.png"></a></td>
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
		<a href="?r=cuplikan"><h2>CUPLIKAN</h2></a>		
		<hr size="5" color="white">
		<h3>Tambah Cuplikan</h3>
		<hr size="2" color="white">
		<form method="POST" action="aksi.php?module=cuplikan&act=insert">
			<table>
				<tr>
					<td>Isi Cuplikan</td>
					<td><textarea class="txt" name="txt_cuplikan" rows="10" cols="33"></textarea></td>

					
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
		$select=mysql_query("select * from tb_cuplikan where ID_CUPLIKAN='$id'");
		$data_cuplikan=mysql_fetch_array($select);
		?>
		<a href="?r=cuplikan"><h2>CUPLIKAN</h2></a>		
		<hr size="5" color="white">
		<h3>Edit Cuplikan</h3>
		<hr size="2" color="white">
<form method="POST" action="aksi.php?module=cuplikan&act=edit">
			<table>
				<tr>
					<td>Isi Cuplikan</td>
					<td><textarea class="txt" name="txt_cuplikan" rows="10" cols="33"><?php echo $data_cuplikan['ISI_CUPLIKAN'];?></textarea>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>
					<td><input class="txt" type="date" name="txt_tgl" value="<?php echo $data_cuplikan['TGL_CUPLIKAN'];?>"></td>
				</tr>
				<tr>
					<td colspan="2">	
					<input type="hidden" name="txt_id" value="<?php echo $data_cuplikan['ID_CUPLIKAN'];?>">
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