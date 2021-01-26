<?php
include "../../koneksi.php";
	?>
	<marquee direction="left" scrollamount="2" align="center">
	<?php
	
	$tgl = date('y-m-d');
	$select=mysql_query("select * from tb_cuplikan where TGL_CUPLIKAN =  '$tgl'");
	
	$cekdata = mysql_num_rows($select);
	
	if ($cekdata>=1){
		for ($i=1;$i<10;$i++){
			$select=mysql_query("select * from tb_cuplikan where TGL_CUPLIKAN = '$tgl' order by TGL_CUPLIKAN desc");
			while ($data=mysql_fetch_array($select)){
				?><img src="image/polisi.gif" height="30px" width="30px">
				<label><?php echo $data['ISI_CUPLIKAN'];?></label>
			<?php
			}
		}
	}
	else {
		for ($i=1;$i<10;$i++){
			$select=mysql_query("select * from tb_cuplikan where TGL_CUPLIKAN <  '$tgl' order by TGL_CUPLIKAN desc");
			while ($data=mysql_fetch_array($select)){
				?><img src="image/polisi.gif" height="30px" width="30px">
				<label><?php echo $data['ISI_CUPLIKAN'];?></label>
			<?php
			}
		}
	}	
?>