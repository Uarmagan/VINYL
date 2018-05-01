<?php
session_start();
$page_title = "Welcome to Vinyl";
include('includes/header.html');?>


<?php
//check if user is logged in
//if(!isset($_SESSION['type'])) {
//    echo '<button style="margin: 100px auto 20px auto; width: 100%;min-width: 300px;max-width: 800px"
//            type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href=\'login.php\'">Click Here to Login</button>
//    <p class="text-center" style="font-size: larger">I want to register as a...</p>
//    <div style="margin: auto; width: 100%;min-width: 300px;max-width: 800px">
//        <button type="button" class="btn btn-secondary btn-lg" style="width: 40%;float: left;margin: 0% 5% 0 5%"
//                onclick="window.location.href=\'OwnerRegistration.php\'">Store Owner</button>
//        <button type="button" class="btn btn-secondary btn-lg" style="width: 40%;float: left;margin: 0% 5% 0 5%"
//                onclick="window.location.href=\'CustomerRegistration.php\'">Customer</button>
//    </div>';
//} else {
//    echo '<div style="margin: 200px auto auto auto; width: 100%;min-width: 300px;max-width: 800px">
//        <button type="button" class="btn btn-secondary btn-lg" style="width: 40%;float: left;margin: 0% 5% 0 5%"
//                onclick="window.location.href=\'catalog.php\'">Check the Catalog</button>
//        <button type="button" class="btn btn-secondary btn-lg" style="width: 40%;float: left;margin: 0% 5% 0 5%"
//                onclick="window.location.href=\'shoppingCart.php\'">Check your Cart</button>
//    </div>';
//}
?>

<head>
    <style>
        p{
            font-size: 20px;
            color: grey;
        }
        #sec2{
            position: relative;
        }
       h1{
           font-size: 55px;
       }
     #img1{
           border-radius: 60px;
       }
    </style>
 </head>
<div id="containter">
    <div class = "row">
        <div class = "col" style="margin-top: 50px; ">
            <h1 class="text-center">The Vinyl platform made for you</h1>
            <h5 class= "text-center" style="color: gray;">Whether you sell online, on social media, in store, or out of the<br> trunk of your car, Vinyl has you covered.</h5>
            
        </div>
    </div>
    <div class = "row justify-content-md-center" style="margin-top: 60px;">
        
        <div class = "col col-lg-5" >
            <img class = "col align-self-end " id= "img1" src="includes/owner1.jpg" style"width: 100px; border-radius: 30px;">
        </div>

        <div class = "col-4">
            <div class = "col-9" style="margin-left: 80px;" >
                <h2>Your brand, your way</h2>
                <p>No design skills needed</p>
                <p>Establish your brand online with a store name and online store. With instant access to hundreds of the best
                 clients, and complete control over the look and feel, you finally have a
                  gorgeous store of your own that reflects the personality of your business.</p>
        
            </div>
        </div>
    </div>

    <div class = "row justify-content-md-center" style="margin-top: 40px;">
        
        <div class = "col-5 ">
            <div class = "col-9" style="margin-left: 80px; margin-top: 40px;" >
                <h2>Your mission control</h2>
                <p>Everything in one place</p>
                <p>
                    Everything in one place Selling your Vinyl in many places should be every 
                    bit as simple as selling in one
                    . With Vinyl’s ecommerce software, you get one unified platform to 
                    run your business with ease.
                </P>
            </div>
        </div>

        <div class = "col col-lg-5" >
            <img class = "col align-self-end " id= "img1" src="includes/owner3.jpg" style"width: 100px; border-radius: 30px;">
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top: 50px;">
       <div>
            <h2 class="text-center">Get straight to growing your business </h2>
            <p class="text-center">Let us handle the rest</P>
            <p class="text-center">When we say it’s never been easier to start a business, we mean it. Viynl <br> 
            handles everything from marketing and payments, to secure checkout <br> and shipping. Now you 
            can focus on the things you love.</P>
       </div>
    </div>

    <div style="float: left">
        <a href="Vinyl.pptx" id="enter">
            Presentation
        </a>
    </div>
    <div style="float: right">
        <a href="readme.txt" id="enter">
            Readme File
        </a>
    </div>

    
<?php include('includes/footer.html');?>