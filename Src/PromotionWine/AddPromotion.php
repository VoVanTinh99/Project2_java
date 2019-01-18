
<?php
include_once("PromotionController.php");
$name="";
$discount="";
$content="";
$PromotionActive="";
$PromotionClose="";
$PromotionOpen="";
$PromotionActive = date_default_timezone_set('Asia/Ho_Chi_Minh');
$PromotionClose = date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_POST["btnAdd"]))
{
	$name = $_POST["txtName"];
	$discount = $_POST["txtDiscount"];
	$content = $_POST["txtContent"];"";
	$PromotionActive = $_POST["PromotionActive"];
	$PromotionClose = $_POST["PromotionClose"];
	$PromotionOpen = $_POST["PromotionOpen"];
	addPromotion($name,$discount,$content,$PromotionActive,$PromotionClose,$PromotionOpen);
	echo '<script> alert("Insert success!");</script>';
	echo "<script>window.location.href='?page=promotion'</script>";

}
?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Add Promotion</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="POST" Promotion="form" >

		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Promotion name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Promotion" name="txtName"
				required autofocus />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDiscount">Discount:</label>
			<div class="col-md-10">
				<input type="text" name="txtDiscount" id="txtDiscount" class="form-control" placeholder="&#37;" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtContent">Details:</label>
			<div class="col-md-10">
				<textarea name="txtContent" id="txtContent" class="form-control"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="PromotionActive">Start:</label>
			<div class="col-md-10">
				<input type="date" name="PromotionActive" id="PromotionActive" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="PromotionClose">End:</label>
			<div class="col-md-10">
				<input type="date" name="PromotionClose" id="PromotionClose" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="PromotionOpen">Status:</label>
			<div class="col-md-10">
				<span class="form-group">
					<input type="radio" name="PromotionOpen" id="PromotionOpen" class="form-inline" value="0">Close
					<input type="radio" name="PromotionOpen" id="PromotionOpen" class="form-inline" value="1" checked>Open
				</span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Addd</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
			</div>
		</div>
	</form>
</div>

<!-- Begin javascript -->

<!-- Tích hợp TinyMCE -->
<script src="../Public/admin/extensions/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<!-- End javascript -->
