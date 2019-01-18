
<?php 
include_once("SubjectController.php");
$name= "";
if(isset($_POST["btnAdd"]))
{
	$name = $_POST["txtName"];

	addSubject($name);
	echo '<script> alert("Insert success!");</script>';
	echo "<script>window.location.href='?page=subject'</script>";

}
?>


<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Add Subject Contact</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >


		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Subject Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Enter the Subject" name="txtName"
				required autofocus >
			</div>
		</div>
		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Add</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cencel</button>
			</div>
		</div>
	</form>
</div>
