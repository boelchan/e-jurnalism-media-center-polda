<div>
<?php
	include "koneksi.php";

	$query_jenis_berita = mysql_query("select distinct(jenis_berita) from tb_berita"); 
	$jenis_berita = array("Bulan"); $i_bulan=1; 
	while($hasil_jenis_berita = mysql_fetch_array($query_jenis_berita)){ 
		$jenis_berita[$i_bulan] = $hasil_jenis_berita[0]; 
		$i_bulan++; 
	} 
	
	$query_bulan = mysql_query("select distinct(month(tgl_berita)) from tb_berita order by month(tgl_berita) asc"); 
	$jumlah_berita = array(); $i_bulan=0;
	while($hasil_bulan = mysql_fetch_array($query_bulan)){ 
		$jumlah_berita[$i_bulan] = $hasil_bulan[0]; 
		for($i=1; $i<count($jenis_berita); $i++){ 
			$query_jumlah_berita = mysql_query("select count(jenis_berita) from tb_berita where month(tgl_berita)='".$hasil_bulan[0]."' and jenis_berita='".$jenis_berita[$i]."' "); 
			while($hasil_jumlah_berita = mysql_fetch_array($query_jumlah_berita)){ 
				$jumlah_berita[$i_bulan][$i] = $hasil_jumlah_berita[0].", ";
			}
			//echo $jenis_berita[$i]."<br>";
		}
		$i_bulan++; 
	}
				
?>
  <head>
    <script type="text/javascript" src="diagram/jsapi.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
		/*
      function drawChart() {
      //==================Format Data======================
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales','sda','FJKHAK', 'Expenses'],
          ['2004',  1000,  222, 1212,   400],
          ['2005',  1170,     312, 121,460],
          ['2006',  660,     213,  112,2310],
          ['2007',  1030,     132, 540,2312],
		  ['2007',  1030,     132, 540,2312]
        ]);
		*/
		function drawChart() {
		//==================Format Data======================
        var data = google.visualization.arrayToDataTable([
			
			[<?php for($i=0; $i<count($jenis_berita)-1; $i++){ echo "'".$jenis_berita[$i]."',"; } echo "'".$jenis_berita[count($jenis_berita)-1]."'"; ?>],
			<?php
				for($i=0; $i<count($jumlah_berita)-1; $i++){
					echo "['Bulan ".$jumlah_berita[$i][0]."',";
					for($j=1; $j<count($jenis_berita)-1; $j++){
						echo $jumlah_berita[$i][$j].",";
					}
					echo $jumlah_berita[$i][count($jumlah_berita)-1]."],";
				}
				
				//last value
				echo "['Bulan ".$jumlah_berita[count($jumlah_berita)-1][0]."',";
				for($j=1; $j<count($jenis_berita)-1; $j++){
					echo $jumlah_berita[count($jumlah_berita)-1][$j].",";
				}
				echo $jumlah_berita[count($jumlah_berita)-1][count($jumlah_berita)-1]."]";
			?>
        ]);
      //==================Format Data======================
       
      //==================Setting Chart====================
        var options = {
          title: 'DIAGRAM KASUS JATIM',
          hAxis: {title: 'TAHUN 2014', titleTextStyle: {color: 'red'}}
        };
      //==================Setting Chart====================
       
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 450px; height: 250px;"></div>
  </body>
  </div>