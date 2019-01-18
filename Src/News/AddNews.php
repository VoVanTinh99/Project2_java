<?php 
include_once('NewsController.php');
$Newsname = "";
$title = "";
$content="";
$employeecode="";
if(isset($_POST["btnAdd"]))
{
	$Newsname = $_POST['txtName'];
	$title = $_POST['txtTitle'];
	$content=$_POST['txtContent'];
	$employeecode=$_POST['slEmpl'];
	addNew($Newsname,$title,$content,$employeecode);
	echo '<script> alert("Insert Success");</script>';
	echo "<script>window.location.href='?page=news'</script>";
}
?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Add News</h2></label>
		</div>
	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >

		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">News Names:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Enter the News" name="txtName"
				required autofocus="" >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtTitle">Title:</label>
			<div class="col-md-10">          

				<input type="text" class="form-control" id="txtTitle" placeholder="Title" name="txtTitle"
				required  >
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-2" for="txtContent">Content:</label>
			<div class="col-md-10">          
				
				<textarea name="txtContent" id="txtContent" class="form-control" placeholder="Content"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slEmpl">Employee:</label>
			<div class="col-md-10">          
				<?php
				blindListEmployye();
				?>
			</div>
		</div>
		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Add</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel</button>
			</div>
		</div>
	</form>
</div>