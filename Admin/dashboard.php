<?php
session_start();
$conn = mysqli_connect("localhost","root","","a_huy");
mysqli_set_charset($conn,'utf8');
if(!isset($_SESSION['EmployeeCode'])){
	echo '<meta http-equiv="refresh" content="0; URL=Index.php"/>';
}

function employeeLogin($EmployeeCode) {
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
  $sql_query_employee = "SELECT * FROM employee WHERE EmployeeCode = '{$EmployeeCode}'";
  $sql_result_employee = mysqli_query($conn,$sql_query_employee);

  while ($row_employee = mysqli_fetch_array($sql_result_employee)) {
    echo $row_employee['EmployeeName'];
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Windsor Shop</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="CT250" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="../public/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../public/admin/css/table-style.css" />
<link rel="stylesheet" type="text/css" href="../public/admin/css/basictable.css" />
<link href="../public/admin/css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/admin/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/admin/css/jquery.toast.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="../public/admin/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
	<?php
	include_once("../Library/connect.php");
	include_once("../Src/Category/CategoryController.php");
	include_once("../Src/Publisher/PublisherController.php");
	include_once("../Src/Country/CountryController.php");
	include_once("../Src/Role//RoleController.php");
	include_once("../Src/Subject/SubjectController.php");
	include_once("../Src/PaymentMethod/PaymentMethodController.php");
	include_once("../Src/Employee/EmployeeController.php");
	include_once("../Src/Promotion/PromotionController.php");
	include_once("../Src/News/NewsController.php");
	include_once("../Src/Wine/WineController.php");
	include_once("../Src/Time/TimeController.php");
	include_once("../Src/Statistic/StatisticController.php");
	include_once("../Src/About/AboutController.php");

	?>
	<!-- banner -->
	<div class="wthree_agile_admin_info">
		<!-- /w3_agileits_top_nav-->
		<!-- /nav-->
		<div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
				<!-- /nav_agile_w3l -->
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Category</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1">
							<ul class="gn-menu agile_menu_drop">
								<li>
									<a href="?page=customer"><i class="fa fa-opencart" aria-hidden="true"></i>Orders</a>
								</li>
								<li class="employee"><a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i>General management <i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="gn-submenu">
										<li class="mini_list_agile"> <a href="?page=about"> <i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
										<li class="mini_list_w3"><a href="?page=paymentmethod"> <i class="fa fa-money" aria-hidden="true"></i> Payments</a></li>
										<li class="mini_list_agile error"><a href="#"> <i class="fa fa-mail-reply-all" aria-hidden="true"></i> Feedback</a></li>
										<li class="mini_list_w3_line"><a href="?page=subject"> <i class="fa fa-send" aria-hidden="true"></i> Contact subject</a></li>
										<li class="mini_list_w3_line"><a href="?page=contact"> <i class="fa fa-tty" aria-hidden="true"></i> Contact</a></li>
									</ul>
								</li>

								<li class="product"><a href="#"><i class="fa fa-product-hunt" aria-hidden="true"></i>Product management<i class="fa fa-angle-down" aria-hidden="true"> </i></a>
									<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="?page=publisher"><i class="fa fa-caret-right" aria-hidden="true"></i> Producer</a></li>
										<li class="mini_list_w3"><a href="?page=category"> <i class="fa fa-caret-right" aria-hidden="true"></i> Category</a></li>
										<li class="mini_list_agile"><a href="?page=country"><i class="fa fa-caret-right" aria-hidden="true"></i> Origin</a></li>
										<li class="mini_list_w3"><a href="?page=promotion"> <i class="fa fa-caret-right" aria-hidden="true"></i> Promotion</a></li>
										<li class="mini_list_agile"><a href="?page=wine"><i class="fa fa-caret-right" aria-hidden="true"></i> Wine</a></li>
										<li class="mini_list_agile"><a href="?page=time"><i class="fa fa-caret-right" aria-hidden="true"></i> Updated Times</a></li>

										<li class="mini_list_w3"><a href="?page=PriceHistory"> <i class="fa fa-caret-right" aria-hidden="true"></i> Price</a></li>

									</ul>
								</li>

								<li class="employee"><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i>Employee management<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="gn-submenu">
										<li class="mini_list_agile"> <a href="?page=employee"> <i class="fa fa-caret-right" aria-hidden="true"></i> Information</a></li>
										<li class="mini_list_w3"><a href="?page=news"> <i class="fa fa-caret-right" aria-hidden="true"></i> News</a></li>
										<li class="mini_list_w3_line"><a href="?page=role"> <i class="fa fa-caret-right" aria-hidden="true"></i> Role</a></li>
									</ul>
								</li>
								<li class="customer"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Customer management<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="?page=user"><i class="fa fa-caret-right" aria-hidden="true"></i> Customer Info</a></li>
										<li class="mini_list_agile"><a href="?page=customer"><i class="fa fa-caret-right" aria-hidden="true"></i>Bill</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<!-- //nav_agile_w3l -->
				<li class="second logo"><h1><a href="dashboard.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Windsor </a></h1></li>
				<li class="second logo"><h1><a href="SignOut.php"><?php if(isset($_SESSION["EmployeeCode"])){employeeLogin($_SESSION["EmployeeCode"]); echo "  <i class='fa fa-power-off text-danger'></i>"; }?> </a></h1></li>
			</ul>
			<!-- //nav -->

		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
		<div class="inner_content">
			<!-- /inner_content_w3_agile_info-->
			<div class="inner_content_w3_agile_info">
				<!-- /agile_top_w3_grids-->
				<div class="agile_top_w3_grids">
					<ul class="ca-menu">
						<li>
							<a href="?page=promotion">

								<i class="fa fa-magic" aria-hidden="true"></i>
								<div class="ca-content">
									<?php

									$result = mysqli_query($conn,
										"SELECT `PromotionId`, `PromotionName`, `PromotionDiscount`, `PromotionContent`, `PromotionActive`, `PromotionClose`, `PromotionOpen` FROM `Promotion` where PromotionOpen = 0");
									$num_rows = mysqli_num_rows($result);
									?>
									<h4 class="ca-main"><?=$num_rows?></h4>
									<h3 class="ca-sub">Promotion</h3>
								</div>
							</a>
						</li>
						<li>
							<a href="?page=customer">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
								<div class="ca-content">
									<?php

									$result = mysqli_query($conn,
										"SELECT
										o.OrderId,w.WineName ,o.OrderCreateDate, o.OrderDeliverDate,
										o.OrderDeliverPlace, o.OrderStatus, u.FullName,
										p.PaymentMethodName,or1.WineSoldPrice, or1.WineOrderQuantity
										FROM `order` o
										JOIN paymentmethod p ON o.PaymentMethodId = p.PaymentMethodId
										JOIN user u ON o.Username = u.Username
										JOIN orderwinedetails or1 ON o.OrderId = or1.OrderId
										JOIN wine w ON or1.WineOrderId = w.WineId and o.OrderStatus=0");
									$num_rows = mysqli_num_rows($result);
									?>
									<h4 class="ca-main one"><?=$num_rows?></h4>
									<h3 class="ca-sub one">Pending Orders</h3>
								</div>
							</a>
						</li>
						<li>
							<a href="?page=user">
								<i class="fa fa-users" aria-hidden="true"></i>
								<div class="ca-content">
									<?php

									$result = mysqli_query($conn,
										"SELECT * from User");
									$num_rows = mysqli_num_rows($result);
									?>
									<h4 class="ca-main one"><?=$num_rows?></h4>
									<h3 class="ca-sub two">Customers</h3>
								</div>
							</a>
						</li>
						<li>
							<a href="?page=statistic">
								<i class="fa fa-money" aria-hidden="true"></i>
								<div class="ca-content">
									<?php
									$result = mysqli_query($conn,
										"SELECT sum(`WineSoldPrice`) as total_money FROM `orderwinedetails`,`order` WHERE  `order`.`OrderId` = `orderwinedetails`.`OrderId` AND `order`.`OrderStatus`=1");
									while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
										?>
										<h4 class="ca-main four"><?=$row['total_money']?></h4>
										<?php } ?>
										<h3 class="ca-sub three">Statistic</h3>
									</div>
								</a>
							</li>
							<li>
								<a href="?page=contact">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<div class="ca-content">
										<?php

										$result = mysqli_query($conn,
											"SELECT * FROM contact c JOIN subject s ON c.Subject = s.SubjectId and c.RelyContact = 0");
										$num_rows = mysqli_num_rows($result);
										?>
										<h4 class="ca-main four"><?=$num_rows?></h4>
										<h3 class="ca-sub four">Unread feedback</h3>
									</div>
								</a>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<!-- //agile_top_w3_grids-->
					<?php
							//Category
					if(isset($_GET['page']) && $_GET['page'] == "category"){
						include_once("../Src/Category/Category.php");
					}
					if(isset($_GET['page']) && $_GET['page'] == "UpadateCategory"){
						include_once("../Src/Category/UpdateCategory.php");
					}

					if (isset($_GET['page']) && $_GET['page'] == "AddCategory") {
						include_once("../Src/Category/AddCategory.php");

					}
					if(isset($_GET['page']) && $_GET['page'] =='DeleteCategory'){
						deleteCategory($_GET['CategoryId']);
						echo "<script>window.location.href='?page=category'</script>";
					}
							//Publisher
					if(isset($_GET['page'])&& $_GET['page']=="publisher"){
						include_once("../Src/Publisher/Publisher.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="UpdatePublisher"){
						include_once("../Src/Publisher/UpdatePublisher.php");
					}
					if (isset($_GET['page'])&&$_GET['page']=="AddPublisher") {
						include_once('../Src/Publisher/AddPublisher.php');
					}
					if (isset($_GET['page'])&&$_GET['page'] =='DeletePublisher') {
						deletePublisher($_GET['PublisherId']);
						echo "<script>window.location.href='?page=publisher'</script>";
					}
							//Country
					if(isset($_GET['page']) && $_GET['page'] == "country")
					{
						include_once("../Src/Country/Country.php");

					}
					if(isset($_GET['page']) &&$_GET['page'] == "UpdateCountry"){
						include_once("../Src/Country/UpdateCountry.php");
					}
					if (isset($_GET['page']) &&$_GET['page'] == "AddCountry") {
						include_once("../Src/Country/AddCountry.php");

					}
					if(isset($_GET['page']) && $_GET['page'] == 'DeleteCountry'){
						deleteCountry($_GET['CountryId']);
						echo "<script>window.location.href='?page=country'</script>";
					}
							//Role
					if(isset($_GET['page'])&& $_GET['page']=="role")
					{
						include_once("../Src/Role/Role.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="UpadateRole")
					{

						include_once("../Src/Role/UpdateRole.php");
					}
					if (isset($_GET['page'])&& $_GET['page']=="AddRole") {
						include_once('../Src/Role/AddRole.php');
					}
					if(isset($_GET['page'])&& $_GET['page']=='DeleteRole'){
						deleteRole($_GET['RoleId']);
						echo "<script>window.location.href='?page=role'</script>";
					}
							//Subject
					if(isset($_GET['page'])&& $_GET['page']=="subject")
					{
						include_once("../Src/Subject/Subject.php");
					}
					if(isset($_GET['page'])&&$_GET['page']=="UpadateSubject")
					{
						include_once("../Src/Subject/UpdateSubject.php");
					}
					if (isset($_GET['page'])&&$_GET['page']=="AddSubject") {
						include_once('../Src/Subject/AddSubject.php');
					}
					if(isset($_GET['page'])&&$_GET['page']=='DeleteSubject'){
						deleteSubject($_GET['SubjectId']);
						echo "<script>window.location.href='?page=subject'</script>";
					}

							//Contact
					if(isset($_GET['page'])&& $_GET['page']=="contact")
					{
						include_once("../Src/Contact/Contact.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="ActiveContact"){

						if($_GET['RelyContact'] == 0){
							$status = 1;
						}
						else{
							$status = 0;
						}
						$updateStatus = "UPDATE `contact` SET `RelyContact`=".$status." where `ContactId` = '".$_GET['ContactId']."'";
						mysqli_query($conn,$updateStatus);
						echo "<script>window.location.href='?page=contact'</script>";
					}
							//Payment Method
					if(isset($_GET['page'])&& $_GET['page']=="paymentmethod")
					{
						include_once("../Src/PaymentMethod/PaymentMethod.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="UpadatePaymentMethod")
					{

						include_once("../Src/PaymentMethod/UpdatePaymentMethod.php");
					}
					if (isset($_GET['page'])&& $_GET['page']=="AddPaymentMethod") {
						include_once('../Src/PaymentMethod/AddPaymentMethod.php');
					}
					if(isset($_GET['page'])&& $_GET['page']=='DeletePaymentMethod'){
						deletePaymentMethod($_GET['PaymentMethodId']);
						echo "<script>window.location.href='?page=paymentmethod'</script>";
					}

							// Import - Export Data
					if(isset($_GET['page'])&& $_GET['page']=="iof")
					{
						include_once("../Src/InputOutputFile/IOFController.php");
					}
							//Wine
					if(isset($_GET['page'])&& $_GET['page']=="wine")
					{
						include_once("../Src/Wine/Wine.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="UpdateWine")
					{
						include_once("../Src/Wine/UpdateWine.php");
					}

					if(isset($_GET['page']) && $_GET['page']=="UpdateQuantityWine")
					{
						include_once("../Src/Wine/UpdateQuantity.php");
					}

					if (isset($_GET['page'])&&$_GET['page']=="AddWine") {
						include_once('../Src/Wine/AddWine.php');
					}
					if(isset($_GET['page'])&&$_GET['page']=="DeleteWine"){
						deleteWine($_GET['WineId']);
						echo "<script>window.location.href='?page=wine'</script>";
					}

							//Employee
					if(isset($_GET['page'])&& $_GET['page']=="employee")
					{
						include_once("../Src/Employee/Employee.php");
					}
					if(isset($_GET['page'])&&$_GET['page']=="UpadateEmployee")
					{
						include_once("../Src/Employee/UpdateEmployee.php");
					}
					if (isset($_GET['page'])&&$_GET['page']=="AddEmployee") {
						include_once('../Src/Employee/AddEmployee.php');
					}
					if(isset($_GET['page'])&&$_GET['page']=="DeleteEmployee"){
						deleteEmployee($_GET['empCode']);
						echo "<script>window.location.href='?page=employee'</script>";
					}

					if (isset($_GET['page'])&&$_GET['page']=='UploadImageEmployee') {
						include_once('../Src/Employee/UploadImageEmployee.php');
					}
					if (isset($_GET['page'])&&$_GET['page']=='DeleteEmployeeImage') {
						deleteImageEmployee($_GET['ImgEmployeeId']);
						echo "<script>window.location.href='?page=UploadImageEmployee&&empCode=".$_GET['empCode']."'</script>";
					}

							//Promotion
					if(isset($_GET['page']) && $_GET['page']=="promotion")
					{
						include_once("../Src/Promotion/Promotion.php");
					}
					if(isset($_GET['page'])&&$_GET['page']=="UpdatePromotion")
					{

						include_once("../Src/Promotion/UpdatePromotion.php");
					}
					if (isset($_GET['page'])&&$_GET['page']=="AddPromotion") {
						include_once('../Src/Promotion/AddPromotion.php');
					}
					if(isset($_GET['page']) &&$_GET['page']=="DeletePromotion"){
						deletePromotion($_GET['PromotionId']);
						echo "<script>window.location.href='?page=promotion'</script>";
					}
					if(isset($_GET['page'])&&$_GET['page']=="ChangeActive"){
						changeActive($_GET['PromotionId'],$_GET['Do']);
						echo "<script>window.location.href='?page=promotion'</script>";
					}

							//News
					if(isset($_GET['page'])&& $_GET['page']=="news")
					{
						include_once("../Src/News/News.php");
					}
					if(isset($_GET['page'])&&$_GET['page']=="UpadateNews")
					{

						include_once("../Src/News/UpdateNews.php");
					}
					if (isset($_GET['page'])&&$_GET['page']=="AddNews") {
						include_once('../Src/News/AddNews.php');
					}
					if(isset($_GET['page'])&&$_GET['page']=="DeleteNews"){
						deleteNews($_GET['NewsId']);
						echo "<script>window.location.href='?page=news'</script>";
					}
					if (isset($_GET['page'])&&$_GET['page']=='UploadImageNews') {
						include_once('../Src/News/UploadImgNews.php');
					}
					if (isset($_GET['page'])&&$_GET['page']=='DeleteNewsImage') {
						deleteImageNews($_GET['ImgNewsId']);
						echo "<script>window.location.href='?page=UploadImageNews&&NewsId=".$_GET['NewsId']."'</script>";
					}


							//Khuyen Mai
					if(isset($_GET['page'])&&$_GET['page']=="ChangeActive"){
						changeActive($_GET['PromotionId'],$_GET['Do']);
						echo "<script>window.location.href='?page=promotion'</script>";
					}

							//User
					if(isset($_GET['page'])&& $_GET['page']=="user")
					{
						include_once("../Src/User/User.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="DeleteUser"){
						deletePromotion($_GET['UserId']);
						echo "<script>window.location.href='?page=user'</script>";
					}

					if(isset($_GET['page'])&& $_GET['page']=="ActiveUser"){

						if($_GET['Status'] == 0){
							$status = 1;
						}
						else{
							$status = 0;
						}
						$updateStatus = "UPDATE `user` SET `Status`=".$status." where `UserName` = '".$_GET['UserId']."'";
						mysqli_query($conn,$updateStatus);
						echo "<script>window.location.href='?page=user'</script>";
					}

							//Price History
					if(isset($_GET['page'])&& $_GET['page']=="PriceHistory")
					{
						include_once("../Src/Wine/PriceHistory.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="addwineprice")
					{
						include_once("../Src/Wine/AddWinePrice.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="DeleteWinePrice")
					{
						DeleteWinePrice($_GET['WineId'], $_GET['TimeId']);
						echo "<script>window.location.href='?page=PriceHistory&&WineId=".$_GET['WineId']."'</script>";
					}
					if(isset($_GET['page'])&&$_GET['page']=="UpdateWinePrice")
					{
						include_once("../Src/Wine/UpdateWinePrice.php");
					}
					if(isset($_GET['page'])&&$_GET['page']=="AddWinePrice")
					{
						include_once("../Src/Wine/AddWinePrice.php");
					}
							//Time
					if(isset($_GET['page'])&& $_GET['page']=="time")
					{
						include_once("../Src/Time/Time.php");
					}
					if(isset($_GET['page'])&&$_GET['page']=="UpadateTime")
					{

						include_once("../Src/Time/UpdateTime.php");
					}
					if (isset($_GET['page'])&&$_GET['page']=="AddTime") {
						include_once('../Src/Time/AddTime.php');
					}
					if(isset($_GET['page'])&&$_GET['page']=='DeleteTime'){
						deleteTime($_GET['TimeId']);
						echo "<script>window.location.href='?page=time'</script>";
					}
							//Customer
					if(isset($_GET['page'])&& $_GET['page']=="customer")
					{
						include_once("../Src/Customer/CustomerOrder.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="ActiveOrder"){

						if($_GET['OrderStatus'] == 0){
							$status = 1;
						}
						else{
							$status = 0;
						}
						$updateStatus = "UPDATE `order` SET `OrderStatus`=".$status." where `OrderId` = '".$_GET['OrderId']."'";
						mysqli_query($conn,$updateStatus);
						echo "<script>window.location.href='?page=customer'</script>";
					}
							// About
					if(isset($_GET['page'])&& $_GET['page']=="about")
					{
						include_once("../Src/About/About.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="AddAbout")
					{
						include_once("../Src/About/AddAbout.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="UpdateAbout")
					{
						include_once("../Src/About/UpdateAbout.php");
					}

					if (isset($_GET['page'])&&$_GET['page']=='UploadImageAbout') {
						include_once('../Src/About/UploadImgAbout.php');
					}

					if (isset($_GET['page'])&&$_GET['page']=='UploadImageWine') {
						include_once('../Src/Wine/UploadImageWine.php');
					}

					if (isset($_GET['page'])&&$_GET['page']=='DeleteAboutImage') {
						deleteImageAbout($_GET['ImgAboutId']);
						echo "<script>window.location.href='?page=UploadImageAbout&&AboutId=".$_GET['AboutId']."'</script>";
					}


					if (isset($_GET['page'])&&$_GET['page']=='DeleteWineImage') {
						deleteImageWine($_GET['ImgWineId']);
						echo "<script>window.location.href='?page=UploadImageWine&&WineId=".$_GET['WineId']."'</script>";
					}

					if (isset($_GET['page'])&&$_GET['page']=='PromotionHistory') {
						include_once('../Src/Wine/PromotionHistory.php');
					}
					if (isset($_GET['page'])&&$_GET['page']=='AddWinePromotion') {
						include_once('../Src/Wine/AddWinePromotion.php');
					}

							// Statistic
					if(isset($_GET['page'])&& $_GET['page']=="statistic")
					{
						include_once("../Src/Statistic/Statistic.php");
					}
					if(isset($_GET['page'])&& $_GET['page']=="more_statistic")
					{
						include_once("../Src/Statistic/MoreStatistic.php");
					}
					if(!isset($_GET['page'])){
						$sql="SELECT WineId, WineName, WineStrength, WineUpdateDate,WineQuantity, wine.CategoryId, wine.PublisherId, wine.CountryId FROM wine, category, country, publisher WHERE wine.CategoryId = category.CategoryId AND wine.PublisherId = publisher.PublisherId AND wine.CountryId = country.CountryId and wine.WineQuantity = 0";
						$listwine = mysqli_query($conn,$sql);
						?>
						<h3 class="text-center text-danger">Sold Out Wines</h3>
						<br>
						<br>
						<table id="myTable" class="table-striped table-hover">
							<thead >
								<tr>
									<th><strong>No</strong></th>
									<th><strong>Wine</strong></th>
									<th><strong>Alcohol level</strong></th>
									<th><strong>Update Date</strong></th>
									<th><strong>Quantity</strong></th>
									<th><strong>Category</strong></th>
									<th><strong>Producer</strong></th>
									<th><strong>Origin</strong></th>
									<th><strong>Action</strong></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$num = 1;
								while(list($WineId,$name,$strength,$wineupdate,$quantity,$idCat, $idPub,$idCountry) = mysqli_fetch_array($listwine))
								{
									?>
									<tr>
										<td class="col-md-1"><?= $num;?> </td>
										<td class="col-md-2"><?= $name;?> </td>
										<td class="col-md-1"><?= $strength;?> </td>
										<td class="col-md-2"><?= $wineupdate;?> </td>
										<td class="col-md-1"><?= $quantity;?> </td>
										<?php
										$result = searchCategory($idCat);
										if(isset($result))
										{
											list($CategoryId,$CategoryName)=mysqli_fetch_array($result);
										} ?>
										<td class="col-md-2"><?= $CategoryName?> </td>
										<?php
										$result = searchPublisher($idPub);
										if(isset($result))
										{
											list($PublisherId,$PublisherName)=mysqli_fetch_array($result);
										} ?>
										<td class="col-md-2"><?= $PublisherName?> </td>
										<?php
										$result = searchCountry($idCountry);
										if(isset($result))
										{
											list($CountryId,$CountryName)=mysqli_fetch_array($result);
										} ?>
										<td class="col-md-2"><?= $CountryName?> </td>
										<td class="text-center col-md-2">
											<a class="btn btn-warning" href="?page=UpdateQuantityWine&WineId=<?php echo $WineId; ?>"><i class="fa fa-edit"></i></a>

										</td>
									</tr>
									<?php
									$num++;
								}}
								?>
							</tbody>
						</table>
						<!-- END WINE -->
					</div>
					<!-- //inner_content-->
				</div>

				<div class="copyrights">
					<p>© 2018 CT250 - Teams 01. All Rights Reserved</p>
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="../public/admin/js/modernizr.custom.js"></script>

				<script src="../public/admin/js/classie.js"></script>
				<script src="../public/admin/js/gnmenu.js"></script>
				<script>
					new gnMenu( document.getElementById( 'gn-menu' ) );
				</script>
				<script type="text/javascript" src="../public/admin/js/jquery.basictable.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#table').basictable();

						$('#table-breakpoint').basictable({
							breakpoint: 768
						});

						$('#table-swap-axis').basictable({
							swapAxis: true
						});

						$('#table-force-off').basictable({
							forceResponsive: false
						});

						$('#table-no-resize').basictable({
							noResize: true
						});

						$('#table-two-axis').basictable();

						$('#table-max-height').basictable({
							tableWrapper: true
						});

						$("ul.gn-submenu").slideUp('fast');

						$("ul.gn-menu li.employee").click(function () {
							$(this).children("ul.gn-submenu").slideDown('slow');
						});

						$("ul.gn-menu li.employee").mouseleave(function(){
							$(this).children("ul.gn-submenu").slideUp('slow');
						});

						$("ul.gn-menu li.about").click(function () {
							$(this).children("ul.gn-submenu").slideDown('slow');
						});

						$("ul.gn-menu li.about").mouseleave(function(){
							$(this).children("ul.gn-submenu").slideUp('slow');
						});

						$("ul.gn-menu li.product").mouseleave(function(){
							$(this).children("ul.gn-submenu").slideUp('slow');
						});

						$("ul.gn-menu li.product").click(function () {
							$(this).children("ul.gn-submenu").slideDown('slow');
						});

						$("ul.gn-menu li.customer").mouseleave(function(){
							$(this).children("ul.gn-submenu").slideUp('slow');
						});

						$("ul.gn-menu li.customer").click(function () {
							$(this).children("ul.gn-submenu").slideDown('slow');
						});
					});
				</script>
				<!-- //js -->
				<script src="../public/admin/js/screenfull.js"></script>
				<script>
					$(function () {
						$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

						if (!screenfull.enabled) {
							return false;
						}



						$('#toggle').click(function () {
							screenfull.toggle($('#container')[0]);
						});
					});
				</script>

				<script src="../Public/admin/js/bars.js"></script>
				<script src="../Public/admin/js/jquery.nicescroll.js"></script>
				<script src="../Public/admin/js/scripts.js"></script>
				<script src="../Public/admin/js/jquery.toast.min.js"></script>
				<script src="../Public/admin/js/bootstrap-3.1.1.min.js"></script>
				<link rel="stylesheet" type="text/css" href="../Public/admin/css/jquery.dataTables.min.css">
				<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#btnAdd").click(function(){
							$.toast({
				    text: "Add  successful data!", // Text that is to be shown in the toast
				    heading: 'Notification', // Optional heading to be shown on the toast
				    icon: 'success', // Type of toast icon
				    showHideTransition: 'slide', // fade, slide or plain
				    allowToastClose: true, // Boolean value true or false
				    hideAfter: 1000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
				    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
				    position: 'top-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
				    textAlign: 'left',  // Text alignment i.e. left, right or center
				    loader: true,  // Whether to show loader or not. True by default
				    loaderBg: 'white',  // Background color of the toast loader
				    bgColor: '#17a2b8',
				});
						})

						$('#myTable').DataTable({
							responsive: true,
							"language": {
							// "lengthMenu": "Hiển thị _MENU_ số dòng trên trang",
							// "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
							"infoEmpty": "Empty data",
							"emptyTable": "Data not available",
							"processing": "Processing...",
							"search": "Search:",
							"loadingRecords": "Loading Data...",
							"zeroRecords": "Data not found",
							// "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
							"paginate": {
								"first": "|<",
								"last": ">|",
								"next": ">>",
								"previous": "<<"
							}
						},
						"lengthMenu": [[5, 10, 15, 20, 25, 30, -1], [5, 10, 15, 20, 25, 30, "Tất cả"]]
					});


					})
				</script>
			</body>
			</html>
