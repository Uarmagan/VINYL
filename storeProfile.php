
<?php
    session_start();
    $page_title = 'Store Profile';
    include('includes/header.html');
    include('connect.php');

    $storeID = $_SESSION['storeID'];
    $storeName = $_SESSION['storeName'];

    $cq = "SELECT comment FROM Review where customerID = '2'";
    $cqr = mysqli_query($db,$cq);
    




?>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		body{
			width: 100%;
			height: 100%;
            min-width: 1000px;
			
		}
		#container{
			position: relative;
		}

		#left{
			position: fixed;
			width: 200px;
			top:150px;
			margin-left: 130px;
            text-align: center;
			
		}
		#right{
			margin-top: 40px;
			margin-left: 360px;
			width: 900px;
			padding: 30px;
			margin-right: 150px;
			justify-content: center;
		}
		
		#flex{
			display: flex;
			justify-content: center;
		}
		#imgDiv img{
			width: 200px;
			height: 200px;
		}
		#imgDiv{
			display: flex;
			justify-content: center;
			width: 200px;
		}
		#comment{
			width: 400px;
		}
		#flex-comment{
           
			display: flex;
			padding: 20px;
			justify-content: space-between;
			background: lightgrey;
			border-radius: 30px;
			margin-bottom: 30px;

		}
		.checked{
			color: orange;
		}
		#rightSide{
			padding: 4px;
		}
        #right h1{
            border-bottom: solid;
        }
        #left h3{
            margin-bottom:0px;
            
        }
		
	</style>

<div id="container">
		
		<div id ="left" >
				<h3><?php echo"$storeName";?></h3><br>
				<h7> ADDRESSS<h7>
				<div id="imgDiv">
					<img src="includes/vimage.png">
				</div><br>
				<button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">Add Feedback </button>
                
		</div>
<!-- this for the pop up   -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-l">
				<div class="modal-content">
       				 <div class="modal-header">
						<h4 class="modal-title">Feedback</h4>	
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					</div>	
					<div class="modal-body">
						<div>
							<textarea class="form-conrol col-12" rows="5" placeholder="Comment"></textarea><br><br>
							<button type = "button" class="btn btn-primary" data-dimiss="modal">submit</button>
						</div>	
					</div>
					<div class="modal-footer">
          				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      			  	</div>		
				</div>	

			</div>	
		</div>




		<div id="flex"> 
			<div id ="right">
				<h1>Feedback</h1><br>
                <?php
                    $count = 1;
                    while($crow = mysqli_fetch_array($cqr)){
                        echo '<div id = "flex-comment">';
                        echo '<p id = "comment">'.$crow['comment'].'</p>';
                        echo '<div id= "rightSide"';
                        echo  '<h2>costomer'.$count.'</h2>';
                        echo '<div class= "starts">';
                        echo '<span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star"></span>
                             <span class="fa fa-star"></span>';
                        echo'</div>';
                        echo'</div>';
                        echo'</div>';
                       $count++; 
                        
                    }


                ?>
                 
			</div>
		</div>
	</div>	






<?php include('includes/footer.html');