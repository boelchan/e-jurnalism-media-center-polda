<?php
	error_reporting(0);
	include "koneksi.php";
	
	$username = $_POST['txt_user'];
	$password = md5($_POST['txt_pass']);
	
	$select = mysql_query("SELECT * FROM tb_user WHERE USERNAME = '$username' && PASSWORD ='$password'");
    $cekdata = mysql_num_rows($select);
	$data=mysql_fetch_array($select);
	
	if ($cekdata==1){
		session_start();

		$_SESSION ['username'] = $data ['USERNAME'] ;
		$_SESSION ['level'] = $data ['LEVEL'] ;
		
		if($data ['LEVEL']=="operator"){
			?>
			<script>
				alert("Login Succesfull as Operator");
				window.location.href="master/index.php";
			</script>		
			<?php
		}else if($data ['LEVEL']=="admin"){
			?>
			<script>
				alert("Login Succesfull as Administrator");
				window.location.href="master/admin/index.php";
			</script>		
			<?php
		}
			
	}else{
		?>
		<script>
			alert("Username Anda Tidak Terdaftar");
			window.location.href="index.php";
		</script>		
		<?php	

	}
?>