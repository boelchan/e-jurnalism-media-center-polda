
<div>
<script type="text/javascript" src="header_slide/jquery.min.js"></script>
<script src="header_slide/translucentslideshow.js" type="text/javascript"></script>

<script type="text/javascript">
	var translideshow1=new translideshow({
		wrapperid: "myslideshow", //ID of blank DIV on page to house Slideshow
		dimensions: [1350, 100], //width/height of gallery in pixels. Should reflect dimensions of largest image
		imagearray: [
			["header_slide/image/header1.png"],
			["header_slide/image/header2.png"] //<--no trailing comma after very last image element!
		],
		displaymode: {type:'auto', pause:2000, cycles:100, pauseonmouseover:false},
		orientation: "h", //Valid values: "h" or "v"
		persist: true, //remember last viewed slide and recall within same session?
		slideduration: 400 //transition duration (milliseconds)
		})
</script>
<div id="myslideshow"></div>
</div>
