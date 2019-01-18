<?php
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
// function listEmployees() {
//   $sql_query_list_employees = "SELECT * FROM employee";
//   $sql_result_list_employees = mysql_query($sql_query_list_employees);
//
//
//   echo "<select name='slEmpl' class='form-control'><option value='0'>Choice Employee</option>";
//   while ($row_employee = mysql_fetch_array($sql_result_list_employees)) {
//     echo "<option value='".$row_employee['EmployeeCode']."'>".$row_employee['EmployeeName']."</option>";
//   }
//   echo "</select>";
// }

function byEmployee($EmployeeCode) {
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
  $sql_query_employee = "SELECT * FROM employee WHERE EmployeeCode = '{$EmployeeCode}'";
  $sql_result_employee = mysqli_query($conn,$sql_query_employee);

  while ($row_employee = mysqli_fetch_array($sql_result_employee)) {
    echo '<input type="text" class="form-control" name="slEmpl" value="'.$row_employee['EmployeeName'].'" readonly />';
  }
}

$name = "";
$history = "";
$employeecode="";
if(isset($_POST['btnAdd']))
{
    $name = $_POST["txtName"];
    $history = $_POST["txtHistory"];
    $employeecode = $_POST["slEmpl"];
    $insert= "INSERT INTO `about`(`AboutName`, `AboutWinsor`, `EmployeeCode`)
            VALUE ('$name','$history','$employeecode')";
            mysqli_query($conn,$insert);
            echo '<script> alert("Insert Success");</script>';
	        echo "<script>window.location.href='?page=about'</script>";
}

?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">About Us</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >


		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">About:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Enter About" name="txtName"
				required autofocus >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtHistory">About Us:</label>
			<div class="col-md-10">

				<textarea name="txtHistory" id="txtHistory"
				placeholder="Enter Content" class="form-control" required></textarea>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-2" for="slEmpl">Employee:</label>
			<div class="col-md-10">
				<?php
				byEmployee($_SESSION['EmployeeCode']);
				?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Add</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> cancel</button>
			</div>
		</div>
	</form>
</div>
