<?php 
$sqlSelect="SELECT `NewsId`, `NewsNames`, `Title`, `NewsContent`, `EmployeeCode` FROM `news`";
$list_about= mysqli_query($conn,$sqlSelect);
?>
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
	<div class="container">
		<ul>
			<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
			<li>News</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs -->

<!-- about -->
<div class="about">
	<div class="container">	
		<div class="w3ls_about_grids">
			<?php 
			while(list($NewsId,$NewsNames,$Title,$NewsContent, $EmployeeCode) = mysqli_fetch_array($list_about))
			{
				?>
				<h1><?=$NewsNames?></h1>
				<hr/>
				<div class="col-md-6 w3ls_about_grid_left">
					<p><?=$Title?></p>
				</div>
				<div class="clearfix"> </div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<!-- //about -->
