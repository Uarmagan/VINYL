<?php
    $page_title = 'home';
    




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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>index page</title>
</head>

	<video autoplay loop muted id="vid">
		<source src="includes/knaan.mp4" type="">
	</video>
	

	<div id="enter">
		<link rel="stylesheet" type="text/css" href="">
		<button >
		<a href="home.php" id="enter">
			ENTER 
		</a>
		</button>
	</div>

</html>
	<script>
		var vid = document.getElementById("vid");
		
		vid.addEventListener("play", myf);
		
        
        
		function myf(){
			vid.currentTime = 14;
		}
	</script>

    <?php include('includes/footer.html');