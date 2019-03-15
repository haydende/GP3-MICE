<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		
body {
	font-family: source-sans-pro;
	background-color: #f2f2f2;
	margin-top: 15px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	font-style: normal;
	font-weight: 200;
}
		
		
		h1 {text-align: center; font-family: Calibri; color: black; font-size: 45pt; padding-bottom: 0.5px}
		h2 {text-align: center; font-family: Calibri; color: black; font-size: 45pt; padding-top: 0.5px}
		p.p-centre { text-align: center; font-family: Arial; }
		#reel { display: block; padding-top: 40px; margin-left: auto; margin-right: auto; border: bold }	
		
#container {
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	background-color: #FFFFFF;
}
		
.stats {
	color: #717070;
	margin-bottom: 5px;
}
.gallery {
	clear: both;
	display: inline-block;
	width: 100%;
	background-color: #FFFFFF;
	/* [disabled]min-width: 400px;
*/
	padding-bottom: 35px;
	padding-top: 0px;
	margin-top: -5px;
	margin-bottom: 0px;
}
.thumbnail {
	width: 25%;
	text-align: center;
	float: left;
	margin-top: 35px;
}
.gallery .thumbnail h4 {
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
	color: #52BAD5;
}
.gallery .thumbnail p {
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	color: #A3A3A3;
}
	
.mySlides {display:none;}
		
	
	</style>
	
	
	
	
</head>
	
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
<body>


	<div id="container">
	<!--<div align="center">
	<img id="MICE_LOGO" src="assets/images/MICE_LOGO.jpg" alt="MICE_LOGO" height="260" width="380">
	</div>-->
		
<div class="w3-content w3-display-container" style="max-width:100%">
  <img class="mySlides" src="assets/images/image1.jpg" style="width:100%">
  <img class="mySlides" src="assets/images/image2.jpg" style="width:100%">
  <img class="mySlides" src="assets/images/image3.jpg" style="width:100%">

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>	
	

	<h1>Official MICE old film festival website</h1>

	<p class="p-centre">This site offers a range of functionality</p>
	<p class="p-centre">Click one of the navigation links to begin.</p>
	
	
	
 <!-- Stats Gallery Section -->
  <div class="gallery">
    <div class="thumbnail">
      <img class="poster" src="assets/images/salt-poster.jpg" style="width:50%">
      <h4>TITLE</h4>
      <p>One line description</p>
    </div>
    <div class="thumbnail">
      <img class="poster" src="assets/images/Captain-Marvel-poster.jpg" style="width:50%">
      <h4>TITLE</h4>
      <p>One line description</p>
    </div>
    <div class="thumbnail">
      <img class="poster" src="assets/images/avengers-poster.jpg" style="width:50%">
      <h4>TITLE</h4>
      <p>One line description</p>
    </div>
    <div class="thumbnail">
      <img class="poster" src="assets/images/kristy-poster.jpg" style="width:50%">
      <h4>TITLE</h4>
      <p>One line description</p>
    </div>
  </div>
		
		

	
		
		
</div>
	
	
	<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
	

	
	

	
</body>
</html>
