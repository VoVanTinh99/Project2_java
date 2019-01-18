<?php

function blindSubjectList()
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlString="SELECT 'SubjectId', 'SubjectName' FROM 'subject'";
	$sqlresult = mysqli_query($conn, $sqlString);
	echo "<select name='slSubject' class='form-control'><option value='0'>Please select the topics you want to contact</option>";

	while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
		echo "<option value='".$row['SubjectId']."'>".$row['SubjectName']."</option>";

	}
	echo "</select>";

}
$name="";
$subject="";
$datewrite=date_default_timezone_set('Asia/Ho_Chi_Minh');
$information="";
$email="";
$phone="";
$address1="";
if(isset($_POST["btnContactUs"]))
{
	$name = $_POST["txtName"];
	$subject=$_POST["slSubject"];
	$datewrite=date('Y-m-d',  strtotime($_POST['txtDate']));
	$information=$_POST["message"];
	$email = $_POST["txtEmail"];
	$phone=$_POST["txtPhone"];
	$address1 = $_POST["txtAddress"];

	$insert =
	"INSERT INTO
	`contact`(
	`Subject`, `Names`,
	`ContactDate`, `Information`, `Email`,
	`Phone`, `Address`)
	VALUES
	('$subject','$name','$datewrite',
	'$information','$email','$phone',
	'$address1')";
	mysqli_query($conn,$insert);
	echo '<script> alert("Send Information Success");</script>';
	echo "<script>window.location.href='Index.php'</script>";
}
?>
<div class="jumbotron jumbotron-sm">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<h1 class="h1">
					<small class="text-center">Please contact us anytime you want</small></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="well well-sm">
					<form method="post"  name="frmForm">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="txtName">
									Full Name:</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
									</span>
									<input type="text" class="form-control" id="txtName" placeholder="Enter Your Full Name" required name="txtName" /></div>
								</div>
								<div class="form-group">
									<label for="email">
									Email Address:</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
									</span>
									<input type="email" class="form-control" id="txtEmail" placeholder="Enter your Email" required name="txtEmail" /></div>
								</div>
								<div class="form-group">
									<label for="txtName">
									Date:</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
									</span>
									<input type="date" class="form-control" id="txtDate" name="txtDate"
									required  value="<?php echo date('Y-m-d',  strtotime('01-01-2018'));?>"></div>
								</div>
								<div class="form-group">
									<label for="subject">
									Subject:</label>
									<?php
									blindSubjectList()
									?>

								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="txtName">
									Phone:</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-ok-sign"></span>
									</span>
									<input type="tel" class="form-control" id="txtPhone" placeholder="Enter your number phone" required name="txtPhone" /></div>
								</div>
								<div class="form-group">
									<label for="txtName">
									Address:</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-tree-conifer"></span>
									</span>
									<input type="text" class="form-control" id="txtAddress" placeholder="Enter your Address" required name="txtAddress" /></div>
								</div>
								<div class="form-group">
									<label for="name">
									Information Details:</label>
									<textarea name="message" id="message" class="form-control" rows="9" cols="25" required
									placeholder="Enter the information you want to send"></textarea>
								</div>

							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary pull-right" id="btnContactUs" name="btnContactUs">
								Send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<!-- //<form> -->
					<legend><span class="glyphicon glyphicon-globe"></span> Windsor</legend>
					<address>
						<strong>Can Tho University Campus III <br/>
						College of ICT <br/>
						Department of Software Engineering </strong> <br/>
						<strong title="Head of Department">
						Head of Department: </strong> M.Sc. Vo Huynh Tram<br/>
						<strong title="Mentor">
						Mentor: </strong> M.Sc. Truong Thi Thanh Tuyen<br/>
						<strong title="Phone"> Phone: </strong> (+84) 96346999<br/>
						<strong title="Email"> Email: </strong>
						<a href="mailto:#">ttttuyen@cit.ctu.edu.vn</a>
					</address>
					<!--    </form> -->
				</div>
			</div>
			<div class="contact-bottom">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22224.923711150917!2d105.76483220768182!3d10.029352498079145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ad8f3cd9bdf0a5d!2zQ8O0bmcgVHkgUsaw4bujdSBOYW0gQuG7mQ!5e0!3m2!1svi!2s!4v1520652135630" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
