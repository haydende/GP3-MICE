<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		
body {
	font-family: source-sans-pro;
	background-color: #f2f2f2;
	margin-top: 0px;
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
	width: 100%;
	height: 100%;
	margin-left: 50px;
	margin-right: auto;
	background-color: #FFFFFF;
	padding-top: 0px;
	margin-top: 5px;
    
}

.mySlides {display:none;}
		
	
	</style>
	
	
	
	
</head>
	
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
<body>


	<div id="container">
		
<div class="w3-content w3-display-container" style="max-width:100%">
  <img class="mySlides" src="assets/images/Casablanca-Rebecca-Rope.png" style="width:100%">
  <img class="mySlides" src="assets/images/The Maltese Falcon.jpg" style="width:100%">
  <img class="mySlides" src="assets/images/Casablanca Still.jpg" style="width:100%">

  <button class="w3-button w3-white w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-white w3-display-right" onclick="plusDivs(1)">&#10095;</button>
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
