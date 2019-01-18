<?php session_start(); ?>
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
<link rel="shortcut icon" type="image/png" href="../icon.ico"/>
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
	?>
	<!-- banner -->
	<div class="wthree_agile_admin_info">
		<!-- /w3_agileits_top_nav-->
		<!-- /nav-->
		<div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="second logo"><h1><a href="dashboard.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Windsor </a></h1></li>
			</ul>
			<!-- //nav -->

		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		
		<!-- /inner_content-->
		<div class="inner_content">
			<!-- /inner_content_w3_agile_info-->
			<div class="inner_content_w3_agile_info">
				<?php 
				if (isset($_POST['btnLogin'])) {
					$loginusername = trim($_POST["txtUsername"]);
					$loginpassword = trim($_POST["txtPassword"]);
					$loginpassword = md5($loginpassword);
					$result = mysqli_query($conn,"select employee.EmployeeCode, employee.EmployeePass from employee, role WHERE employee.RoleId = role.RoleId and role.RoleActive =1 and role.RoleId = 3 and employee.EmployeeCode = '$loginusername' and employee.EmployeePass = '$loginpassword'");
					if (mysqli_num_rows($result) == 1)
					{
						$_SESSION["EmployeeCode"] = $loginusername;
						echo "<script>window.location.href='dashboard.php'</script>";
					}else{
						echo '<script> alert("Account name or password is incorrect!");</script>';
					}
				}
				
				?>

				<div class="registration admin_agile">

					<div class="signin-form profile admin">
						<h2>Admin Login</h2>
						<div class="login-form">
							<form action="#" method="post">
								<input type="text" name="txtUsername" placeholder="Username" required="">
								<input type="password" name="txtPassword" placeholder="Password" required="">
								<div class="tp">
									<input type="submit" value="LOGIN" name="btnLogin">
								</div>
							</form>
						</div>

					</div>
					<!-- //inner_content_w3_agile_info-->
				</div>
				<!-- //inner_content-->
			</div>
		</div>
		<!-- banner -->
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
				    text: "Thêm dữ liệu thành công!", // Text that is to be shown in the toast
				    heading: 'Thông báo', // Optional heading to be shown on the toast
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
						"lengthMenu": "Hiển thị _MENU_ số dòng trên trang",
						"info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
						"infoEmpty": "Dữ liệu rỗng",
						"emptyTable": "Chưa có dữ liệu nào",
						"processing": "Đang xử lý...",
						"search": "Tìm kiếm:",
						"loadingRecords": "Đang load dữ liệu...",
						"zeroRecords": "không tìm thấy dữ liệu",
						"infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
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
