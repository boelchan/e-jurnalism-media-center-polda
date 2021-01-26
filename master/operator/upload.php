
	<div id="upload">
		<form action="" method="POST" enctype="multipart/form-data">
			<table>
					<tr><td>gambar</td><td>: <input type="file" name="gambar"></td></tr>
					<tr><td></td><td><input type="submit" name="submit"></td></tr>
			</table>
		</form>
	</div>

<?php
	if(isset($_POST['submit'])){
		$lokasi_file=$_FILES['gambar']['tmp_name'];
		$nama_file=$_FILES['gambar']['name'];
		$move = move_uploaded_file($lokasi_file,'fileupload/'.$nama_file);
		if($move){
			echo "<script language=JavaScript>alert('File Upload Sukses'); document.location='./upload.php'</script>";
		}}
	
?>