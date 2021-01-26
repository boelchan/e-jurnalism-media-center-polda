<script src='slide_berita/jquery.min.js' type='text/javascript'></script>

<script type='text/javascript'>
//<![CDATA[

$(document).ready(function() {

//Execute the slideShow, set 6 seconds for each images
slideShow(2000);

});

function slideShow(speed) {

//append a LI item to the UL list for displaying caption
$('ul.slideshow').append('<li id="slideshow-caption" class="caption"><div class="slideshow-caption-container"><h3></h3><p></p></div></li>');

//Set the opacity of all images to 0
$('ul.slideshow li').css({opacity: 0.0});

//Get the first image and display it (set it to full opacity)
$('ul.slideshow li:first').css({opacity: 1.0});

//Get the caption of the first image from REL attribute and display it
$('#slideshow-caption h3').html($('ul.slideshow a:first').find('img').attr('title'));
$('#slideshow-caption p').html($('ul.slideshow a:first').find('img').attr('alt'));

//Display the caption
$('#slideshow-caption').css({opacity: 0.7, bottom:0});

//Call the gallery function to run the slideshow
var timer = setInterval('gallery()',speed);

//pause the slideshow on mouse over
$('ul.slideshow').hover(
        function () {
                clearInterval(timer);
        },
        function () {
                timer = setInterval('gallery()',speed);
        }
);

}

function gallery() {

//if no IMGs have the show class, grab the first image
var current = ($('ul.slideshow li.show')?  $('ul.slideshow li.show') : $('#ul.slideshow li:first'));

//Get next image, if it reached the end of the slideshow, rotate it back to the first image
var next = ((current.next().length) ? ((current.next().attr('id') == 'slideshow-caption')? $('ul.slideshow li:first') :current.next()) : $('ul.slideshow li:first'));

//Get next image caption
var title = next.find('img').attr('title');
var desc = next.find('img').attr('alt');

//Set the fade in effect for the next image, show class has higher z-index
next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);

//Hide the caption first, and then set and display the caption
$('#slideshow-caption').animate({bottom:-80}, 300, function () {
                //Display the content
                $('#slideshow-caption h3').html(title);
                $('#slideshow-caption p').html(desc);
                $('#slideshow-caption').animate({bottom:0}, 500);
});

//Hide the current image
current.animate({opacity: 0.0}, 1000).removeClass('show');

}

//]]>
</script>

<style type="text/css">
ul.slideshow {
	list-style:none;
	width:820px;
	height:510px;
	overflow:hidden;
	position:relative;
	margin:0;
	padding:0;
	font-family:Arial,Helvetica,Trebuchet MS,Verdana;
}
ul.slideshow li {
	position:absolute;
	left:0;
	right:0;
}
ul.slideshow li.show {
	z-index:500;
}
ul img {
	width:200px;
	height:200px;
	border:none;
}
#slideshow-caption {
	width:850px;
	height:70px;
	position:absolute;
	bottom:0;
	left:0;
	color:#fff;
	background:#000;
	z-index:10;
}
#slideshow-caption .slideshow-caption-container {
	padding:5px 10px;
	z-index:1000;
}
#slideshow-caption h3 {
	margin:0;
	padding:0;
	font-size:16px;
}
#slideshow-caption p {
	margin:5px 0 0 0;
	padding:0;
}
</style>

<ul class="slideshow">
	<?php
	include "koneksi.php";
	
	$tgl = date('y-m-d');
	$select=mysql_query("select * from tb_berita where TGL_BERITA =  '$tgl'");
	$cekdata = mysql_num_rows($select);
	
	$tgl2=date('d');
	$tgl3=date('y-m');
	$aa=$tgl2-1;
	$b=$tgl3.-$aa;
	$select2=mysql_query("select * from tb_berita where TGL_BERITA =  '$b'");
	$cekdata2 = mysql_num_rows($select2);
		

	
	if ($cekdata>=1){
		for ($i=1;$i<10;$i++){
			?>
			<div>
			<?php
				$select=mysql_query("select * from tb_berita where TGL_BERITA = '$tgl' order by TGL_BERITA desc");		
				while ($data=mysql_fetch_array($select)){
					?>		
					<li>
						<img src="slide_berita/image/<?php echo $data['IMAGE']?>" 
							alt="<?php echo $data['JENIS_BERITA']?>" 
							title="<?php echo $data['JUDUL_BERITA']?>"/>
							<?php echo $data['ISI_BERITA']?>
							<?php
						}
					?>
			</div>
			<?php
		}
	}elseif ($cekdata2>=1){
		for ($i=1;$i<10;$i++){
			?>
			<div>
			<?php
				$select2=mysql_query("select * from tb_berita where TGL_BERITA = '$b' order by TGL_BERITA desc");		
				while ($data2=mysql_fetch_array($select2)){
					?>		
					<li>
						<img src="slide_berita/image/<?php echo $data2['IMAGE']?>" 
							alt="<?php echo $data2['JENIS_BERITA']?>" 
							title="<?php echo $data2['JUDUL_BERITA']?>"/>
							<?php echo $data2['ISI_BERITA']?>
							<?php
						}
					?>
			</div>
			<?php
		}
	}else{
		for ($i=1;$i<10;$i++){
			?>
			<div>
			<?php
				$select3=mysql_query("select * from tb_berita where TGL_BERITA < '$tgl' order by TGL_BERITA desc");		
				while ($data3=mysql_fetch_array($select3)){
					?>		
					<li>
						<img src="images/<?php echo $data3['IMAGE']?>" 
							alt="<?php echo $data3['JENIS_BERITA']?>" 
							title="<?php echo $data3['JUDUL_BERITA']?>"/>
							<?php echo $data3['ISI_BERITA']?>
							<?php
						}
					?>
			</div>
			<?php
		}
	
	}
?>
</ul>