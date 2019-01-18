	<?php
	include_once("PromotionController.php");
	$PromotionId = 0;
	if(isset($_GET['PromotionId'])){
		$PromotionId=$_GET['PromotionId'];
	}

	$name="";
	$discount="";
	$content="";
	$PromotionActive="";
	$PromotionClose="";
	$PromotionOpen="";
	$PromotionActive = date_default_timezone_set('Asia/Ho_Chi_Minh');
	$PromotionClose = date_default_timezone_set('Asia/Ho_Chi_Minh');
	$result = searchPromotion($PromotionId);
	//Lấy dữ liệu đưa vào mảng
	if(isset($result))
	{
		list($PromotionId,$name,$discount,$content,$PromotionActive,$PromotionClose,$PromotionOpen)=mysqli_fetch_array($result);
	}
	//Cập nhật lại dữ liệu
	if(isset($_POST['btnUpdate']))
	{
		$PromotionId=$_GET['PromotionId'];
		$name=$_POST['txtName'];
		$discount=$_POST['txtDiscount'];
		$content=$_POST['txtContent'];
		$PromotionActive=$_POST['PromotionActive'];
		$PromotionClose=$_POST['PromotionClose'];
		$PromotionOpen=$_POST['PromotionOpen'];
		updatePromotion($PromotionId, $name,$discount,$content,$PromotionActive,$PromotionClose,$PromotionOpen);
		echo '<script> alert("Cập nhật thành công!");</script>';
		echo "<script>window.location.href='?page=promotion'</script>";
	}

	?>
	<div class="row">
		<div class="col-md-12"/>
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Update Promotion</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" Promotion="form" >

			<div class="form-group">
				<label class="control-label col-md-2" for="txtNum">Num:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="txtNum" name="txtNum"
					required  readonly="true" value="<?php echo $PromotionId;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Promotion name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName" placeholder="Nhập vào tên khuyến mãi" name="txtName"
					required autofocus value="<?php echo $name;?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtDiscount">Discount:</label>
				<div class="col-md-10">
					<input type="text" name="txtDiscount" id="txtDiscount" class="form-control" value="<?php echo $discount;?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtContent">Details:</label>
				<div class="col-md-10">
					<textarea name="txtContent" id="txtContent" class="form-control"><?php echo $content?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="PromotionActive">Start:</label>
				<div class="col-md-10">
					<input type="date" name="PromotionActive" id="PromotionActive" class="form-control" value="<?php echo $PromotionActive;?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="PromotionClose">End:</label>
				<div class="col-md-10">
					<input type="date" name="PromotionClose" id="PromotionClose" class="form-control" value="<?php echo $PromotionClose;?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="PromotionOpen">Status:</label>
				<div class="col-md-10">
					<span class="form-group">
						<input type="radio" name="PromotionOpen" id="PromotionOpen" class="form-inline" value="0"<?php echo ($PromotionOpen == 0) ? ' checked' : '' ?>>Close
						<input type="radio" name="PromotionOpen" id="PromotionOpen" class="form-inline" value="1"<?php echo ($PromotionOpen == 1) ? ' checked' : '' ?>>Open
					</span>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Update</button>
					<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel</button>
				</div>
			</div>
		</form>
	</div>

<!-- Begin javascript -->

<!-- Tích hợp TinyMCE -->
<script src="../Public/admin/extensions/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<!-- End javascript -->
