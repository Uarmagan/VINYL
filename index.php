<?php
    $page_title = 'home';
    include('includes/header.html');
    include('connect.php');




?>





<head>
	<title></title>
	<style type="text/css">
		
		*{
			margin: 0;
			padding: 0;
		}
		body{
			overflow: hidden;
		}
		video{
			position: absolute;
			top:50%;
			left:50%;
			transform: translate(-50%, -50%);
			min-width: 100%;
			min-height: 100%;
			width: auto;
			height: auto;

		}
		#enter{
			position: absolute;
			z-index: 10;
			top: 20px;
			left: 20px;
		}
		button{
			width: 150px;
			font-size: 40px;
			background: transparent;
			border: none;
			color: white;
		}
		a{
			text-decoration: none;
			color:white;
		}
		a:hover{
			font-style: italic;
			font-size: 46px;
			color: pink;
		}
	</style>
</head>

	<video autoplay loop id="vid">
		<source src="knaan.mp4" type="video/mp4">
	</video>
	

	<div id="enter">
		<link rel="stylesheet" type="text/css" href="">
		<button >
		<a href="">
			ENTER 
		</a>
		</button>
	</div>

</html>
	<script>
		var vid = document.getElementById("vid");
		
		vid.addEventListener("play", myf);
		
		var ct = currentTime;

		function myf(){
			vid.currentTime = 14;
		}
		

	</script>
    <?php include('includes/footer.html');