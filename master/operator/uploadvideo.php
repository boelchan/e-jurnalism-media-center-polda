<form name="video" enctype="multipart/form-data" method="post" action="">
<input name="MAX_FILE_SIZE" value=" 8388608"  type="hidden"/>
<input type="file" name="uploadvideo" />
<input type="submit" name="upload" value="SUBMIT" />
</form>
<?php
if (isset($_REQUEST['upload']))
{
	$name=$_FILES['uploadvideo']['name'];
	$type=$_FILES['uploadvideo']['type'];
	//$size=$_FILES['uploadvideo']['size'];
	$cname=str_replace(" ","_",$name);
	//$tmp_name=$_FILES['uploadvideo']['tmp_name'];
	//$target_path="./video/";
	//$target_path=$target_path.basename($cname);
	if (move_uploaded_file($_FILES['uploadvideo']['tmp_name'],'video/'.$name)){
		echo "Your video ".$cname." has been successfully uploaded";
	} else {
		echo "Your video ".$cname." has been gagal uploaded";
	}
}
?>