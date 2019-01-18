<?php
session_start();
include("Library/connect.php");
function userLogin($username) {
  include("Library/connect.php");
  $sql_query_user = "SELECT * FROM user WHERE Username = '{$username}'";
  $sql_result_user = mysqli_query($conn,$sql_query_user);

  while ($row_user = mysqli_fetch_array($sql_result_user)) {
    echo $row_user['FullName'];
  }
}

if(!isset($_SESSION["cart"])){
 $_SESSION["cart"] = array();
}

if(isset($_GET['action']) && isset($_GET['WineId']))
{
  $WineId = $_GET['WineId'];
  checkout($WineId);
}

function checkout($WineId)
{
  include("Library/connect.php");
  $WineId = $_GET["WineId"];
  $query = "Select wine.WineId, wine.WineName, wine.WineQuantity, publisher.PublisherName, time_wine.PurchasePrice, time_wine.SellingPrice from wine, publisher, time_wine WHERE wine.WineId = time_wine.WineId and publisher.PublisherId = wine.PublisherId and  wine.WineId = ".$WineId;
  $result = mysqli_query($conn, $query);
  while ($rowsql = mysqli_fetch_array($result)){
    $coroi = false;
    foreach ($_SESSION["cart"] as $key => $row)
    {
      if($key==$WineId)
      {
        $_SESSION['cart'][$key]["quantity"] +=  1;
        $coroi = true;
      }
    }

    if(!$coroi)
    {
      $ten = $rowsql['WineName'];
      $nsx = $rowsql['PublisherName'];
      $price = $rowsql['SellingPrice'];
      $oriprice = $rowsql['PurchasePrice'];//TO_DO: Đã fix
      $cart = array(
        "ten" => $ten,
        "quantity" =>1,
        "gia" => $price,
        "giagoc" => $oriprice,
        "hang" => $nsx);
      $_SESSION['cart'][$WineId]=$cart;
    }
    echo "<script language='javascript'>
    alert('Sản phẩm đã được thêm vào giỏ hàng, truy cập giỏ hàng để xem!');
    </script>";

  }
}
?>
<!DOCTYPE html>
<html lang='vi'>
<head>
	<title>Windsor Shop</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="CT250" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //for-mobile-apps -->
<link rel="shortcut icon" type="image/png" href="icon.ico"/>
<link href="public/client/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/client/css/jquery.toast.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/client/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/client/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- js -->

<script src="public/client/js/jquery.min.js"></script>
<script src="public/client/js/jquery.toast.min.js"></script>
<!-- //js -->
<!-- countdown -->
<link rel="stylesheet" href="public/client/css/jquery.countdown.css" />
<!-- //countdown -->
<!-- cart -->
<script src="public/client/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="public/client/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
</head>
<body>
	<?php
	include("Library/connect.php");
	include("Src/User/UserController.php");
	include("Src/User/UpdateUser.php")
	?>
      <!--
         Modal đăng ký
       -->
       <?php
       include("Src/User/Register.php");
         	// include("Src/About/About_FEV.php");
       ?>
       <script>$(document).ready(function(){
        <?php

        if(!isset($_SESSION['username'])){

          ?>
          $('#myModal88').modal('show');
          <?php }else{ ?>
            $('#myModal88').remove();
            $('#user_modal').remove();
            <?php } ?>
          });
        </script>
        <div class="header">
          <div class="container">
           <div class="w3l_login" id="user_modal">
            <a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
          </div>
          <div class="w3l_logo">
            <h1><a href="index.php">Windsor's Wine<span>The Land & The Folk</span></a></h1>
          </div>
          <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
             <form action="?page=Search" method="post">
              <input type="text" name="WineName" placeholder="Wine's Name...">
              <input type="submit" value="Search">
            </form>
          </div>
        </div>
        <div class="cart box_1">
         <h4 data-toggle="modal" data-target="#myLoginModal" class="text-primary"><?php if(isset($_SESSION["username"])){userLogin($_SESSION["username"]); echo " <a href='Src/User/Signout.php'><span class=' glyphicon glyphicon-log-out'></span></a>";}?></h4>
       </div>
       <div class="clearfix"> </div>

     </div>
   </div>
   <div class="navigation">
    <div class="container">
     <nav class="navbar navbar-default">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header nav_2">
       <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
     <ul class="nav navbar-nav">
      <li class="active"><a href="Index.php" class="act">Homepage</a></li>
      <!-- Mega Menu -->
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <b class="caret"></b></a>
       <ul class="dropdown-menu multi-column columns-3">
        <div class="row">
         <div class="col-sm-3">
          <ul class="multi-column-dropdown">
           <h6>Category</h6>
           <li><a href="?page=Vodka">Vodka<span>New</span></a></li>
           <li><a href="?page=Whisky">Whisky</a></li>
           <li><a href="?page=Chivas">Chivas</a></li>
           <li><a href="?page=Domestic">Domestic</a></li>
           <li><a href="?page=Fruit">Fruit<span>New</span></a></li>
         </ul>
       </div>
       <div class="col-sm-3">
         <ul class="multi-column-dropdown">
          <h6>Country</h6>
          <li><a href="?page=Vietnam">Vietnam</a></li>
          <li><a href="?page=France">France<span>New</span></a></li>
        </ul>
      </div>
      <div class="col-sm-6">
       <div class="w3ls_products_pos">
        <h4>50%<i>Deal of the day</i></h4>
        <img src="public/client/images/1.jpg" alt=" " class="img-responsive" />
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</ul>
</li>
<li><a href="?page=Cart">Cart</a></li>
<li><a href="?page=News">News</a></li>
<li><a href="?page=Contact">Contact</a></li>
<li><a href="?page=About">About</a></li>
<div class="cart-box" id="Normal">
  <ul class="nav navbar-nav">
    <li class="dropdown">
     <button class="btn btn-info btn-circle btn-xl"><a href="?page=Cart"> <span class="glyphicon glyphicon-shopping-cart" style="color:white"></span></a></button>
     <span  class="cart-items-count"><span class=" notification-counter"><?php if((isset($_SESSION['cart'])) && count($_SESSION['cart'])>0) echo count($_SESSION['cart']); else echo '0';?></span></span>
   </li>
 </ul>
</div>
</ul>
</div>
</nav>
</div>
</div>
<!-- //header -->
<!-- banner -->
<div class="banner" id="home1">
  <div class="container">
   <!-- <h3>the Land & the Folk<span>embracing heritage lifting spirits</span></h3> -->
 </div>
</div>
<!-- //banner -->
<!-- INCLUDE -->
<?php
if(!isset($_GET['page']) ){
  include_once("Src/Includes/homepage.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Vodka'){
  include("Src/Includes/Vodka.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Chivas'){
  include("Src/Includes/Chivas.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Domestic'){
  include("Src/Includes/Domestic.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Chivas'){
 include("Src/Includes/Chivas.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'France'){
  include("Src/Includes/France.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Vietnam'){
  include("Src/Includes/Vietnam.php");
}
if(isset($_GET['page']) && $_GET['page'] == 'Whisky'){
  include("Src/Includes/Whisky.php");
}
if(isset($_GET['page']) && $_GET['page'] == 'Fruit'){
 include("Src/Includes/Fruit.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Details'){
 include("Src/Includes/Details.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Cart'){
 include("Src/WineCart/Cart.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Checkout'){
 include("Src/WineCart/Checkout.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Search'){
 include("Src/Includes/Search.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'Contact'){
 include("Src/Contact/AddContact.php");
}

if(isset($_GET['page']) && $_GET['page'] == 'About'){
 include("Src/Includes/About.php");
}


if(isset($_GET['page']) && $_GET['page'] == 'News'){
 include("Src/Includes/News.php");

}


if(isset($_GET['page']) && $_GET['page'] == 'ActiveAccount'){
      $username = $_GET['username'];
      $sqlUpdate=
      "UPDATE `user` SET `Status`='1' WHERE `username`='$username'";
      mysqli_query($conn,$sqlUpdate);
      echo '<script> alert("Actived!");</script>';
      echo "<script>window.location.href='http://localhost/CT250/index.php'</script>";
}

?>

<!-- top-brands -->
<div class="top-brands">
  <div class="container">
   <h3>Top Brands</h3>
    <div class="sliderfig">
      <ul id="flexiselDemo1">
        <li>
          <img src="public/client/images/5.png" alt=" " class="img-responsive" />
        </li>
        <li>
          <img src="public/client/images/6.png" alt=" " class="img-responsive" />
        </li>
        <li>
          <img src="public/client/images/7.png" alt=" " class="img-responsive" />
        </li>
        <li>
          <img src="public/client/images/46.jpg" alt=" " class="img-responsive" />
        </li>
      </ul>
    </div>
<script type="text/javascript">
  $(window).load(function() {
   $("#flexiselDemo1").flexisel({
    visibleItems: 4,
    animationSpeed: 1000,
    autoPlay: true,
    autoPlaySpeed: 3000,
    pauseOnHover: true,
    enableResponsiveBreakpoints: true,
    responsiveBreakpoints: {
     portrait: {
      changePoint:480,
      visibleItems: 1
    },
    landscape: {
      changePoint:640,
      visibleItems:2
    },
    tablet: {
      changePoint:768,
      visibleItems: 3
    }
  }
});

 });
</script>
<script type="text/javascript" src="public/client/js/jquery.flexisel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</div>
</div>
<!-- //top-brands -->
<!-- newsletter -->
<div class="newsletter">
  <div class="container">
   <div class="col-md-6 w3agile_newsletter_left">
    <h3>Newsletter</h3>
  </div>
  <div class="col-md-6 w3agile_newsletter_right">
    <form action="#" method="post">
     <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
     <input type="submit" value="" />
   </form>
 </div>
 <div class="clearfix"> </div>
</div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
  <div class="container">
   <div class="w3_footer_grids">
    <div class="col-md-3 w3_footer_grid">
     <h3>Contact</h3>
     <ul class="address">
      <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>3/2, Ninh Kieu, Can Tho</li>
      <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">windsor.shop@gmail.com</a></li>
      <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
    </ul>
  </div>
  <div class="col-md-3 w3_footer_grid">
   <h3>Producer</h3>
   <?php
   $sqlSelect = "SELECT `PublisherName` FROM Publisher";
   $list_publisher= mysqli_query($conn,$sqlSelect);

   ?>
   <ul class="info">
    <?php
    while(list($name) = mysqli_fetch_array($list_publisher))
    {
     ?>
     <li><a href="?page=<?=$name?>"><?= $name;?></a></li>
     <?php
   }
   ?>
 </ul>
</div>
<div class="col-md-3 w3_footer_grid">
 <h3>Category</h3>
 <?php
 $sqlSelect = "SELECT `CategoryId`, `CategoryName`, `CategoryDescription` FROM Category";
 $list_category= mysqli_query($conn, $sqlSelect);

 ?>
 <ul class="info">
  <?php
  while(list($CategoryId, $name, $details) = mysqli_fetch_array($list_category))
  {
   ?>
   <li><a href="?page=<?=$name?>"><?= $name;?></a></li>
   <?php
 }
 ?>
</ul>
</div>
<div class="col-md-3 w3_footer_grid">
 <h3>Follow Us</h3>
 <div class="agileits_social_button">
  <ul>
   <li><a href="#" class="facebook"> </a></li>
   <li><a href="#" class="twitter"> </a></li>
   <li><a href="#" class="google"> </a></li>
 </ul>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
<div class="footer-copy">
 <div class="footer-copy1">
  <div class="footer-copy-pos">
   <a href="#home1" class="scroll"><img src="public/client/images/arrow.png" alt=" " class="img-responsive" /></a>
 </div>
</div>
<div class="container">
  <p>&copy; 2018 Wine's Shop All rights reserved</p>
</div>
</div>
</div>
<!-- //footer -->
<script src="Library/Others/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js"></script>
<script> $("input[id='wine-quantity']").TouchSpin({min: 1, max: 100, step: 1, boostat: 5, maxboostedstep: 10, }); </script>
</body>
</html>
