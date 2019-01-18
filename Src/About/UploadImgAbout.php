<?php
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
if (isset($_GET['AboutId']))
{
	$AboutId = $_GET['AboutId'];
	
	$sql="SELECT `AboutId`, `AboutName` FROM `About` WHERE `AboutId` = '$AboutId'";
	$rs = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($rs);
	$aboutname = $row[1];
}   
else 
{
	echo '<meta http-equiv="refresh" content="0: URL=About.php"/>';
}
// Genarate file name
function random_name() {
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'));
    // string length = 10
	for ($i = 0; $i < 10; $i++) {
		$key .= $keys[array_rand($keys)];
	}

	return $key;
}

if(isset($_POST['btnUpload']))
{
	$AboutId = $_GET['AboutId'];
	$file = $_FILES['fileToUpload'];
	if (is_array(getimagesize($file['tmp_name'])))
	{
      if ($file['size'] <= 5*1024*1024 ) // maximum file size 5MB
      {
      	list($width, $height) = getimagesize($file['tmp_name']);
      	$ratio = $height / $width;
      	if ($ratio < 1.5) {
      		$nw = 200;
      		$nh = ceil( $ratio * $nw );
      		$dst = imagecreatetruecolor( $nw, $nh );
              $ext = pathinfo($file['name'], PATHINFO_EXTENSION); // Get file extension
              $file_name = $_GET['AboutId']."_".random_name().".".$ext;
              copy($file['tmp_name'], "../Public/admin/images_about/".$file_name);
              unlink($file['tmp_name']);
              $cmd = "INSERT INTO `imgabout`(`Imgabout`, `aboutId`) VALUES('$file_name', ".$_GET['AboutId'].")";
              $rs = mysqli_query($conn,$cmd);
              if($rs)
              {
              	echo "<script>alert('Tải lên hình ảnh thành công!);</script>";
              }
              else 
              {
              	echo "<script>alert('Thao tác thất bại!');</script>";
              	echo '<meta http-equiv="refresh" content="0;URL='.$aboutId.'">';
              }
          }
          else {
          	echo "Please choose other image has lower ratio";
          }
      }
      else
      {
      	echo "hình có kích thước quá lớn";
      }

  }
  else
  {
  	echo "Hình không đúng định dạng";
  } 
}

?>
<div class="container">
	<form  id="frmHinhAnh" class="form-horizontal" name="frmHinhAnh" method="post" action="" enctype="multipart/form-data" role="form">
		<div class="form-group">
			<label for="aboutId" class="col-sm-2 control-label">Mã Bản Tin (*):  </label>
			<div class="col-sm-10">
				<input type="text" name="AboutId " id="AboutId " class="form-control" placeholder="Mã nhân viên" value='<?php echo $AboutId; ?>' readonly="readonly"/>
			</div>
		</div>  
		<div class="form-group">    
			<label for="aboutname" class="col-sm-2 control-label">Tên bản tin  (*):  </label>
			<div class="col-sm-10">
				<input type="text" name="aboutname" id="aboutname" class="form-control" placeholder="Nội dung bản tin" value='<?php echo $aboutname; ?>' readonly="readonly"/> 
			</div>
		</div>     
		<div class="form-group">    
			<div class="col-sm-10 pull-right">
				<input type="file" accept=".jpg, .png, .jpeg, .gif" name="fileToUpload" id="fileToUpload" class="form-control-file" onChange='hasExistfile()'/>
			</div>
		</div>  
		<button type="submit" class="btn btn-primary pull-right" name="btnUpload" disabled id="btnUploadImage">Tải ảnh</button>
		<script type="text/javascript">
			function hasExistfile(){
				document.getElementById('btnUploadImage').disabled = false;
			}
		</script> 
		<?php
		$query = "SELECT `ImgAboutId`, `ImgAbout`, `AboutId` FROM `imgabout` WHERE `AboutId`='".$_GET['AboutId']."'";
		$result = mysqli_query($conn,$query);
		$num = 1;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){  
			$ImgaboutId = $row['ImgAboutId'];
			?>
			<div class='col-sm-offset-2 col-sm-12'>
				<div class="row">

					<div class='col-sm-1'>
						<?php echo $num; ?>
					</div>
					<div class='col-sm-2'>
						<img src="<?php echo "../Public/admin/images_about/".$row['ImgAbout']; ?>" width="100px"/>
					</div>
					<a class='btn btn-danger' href="?page=DeleteAboutImage&&AboutId=<?=$_GET['AboutId'];?>&&ImgaboutId=<?php echo $ImgaboutId; ?>" onclick="return confirm('Bạn có chắc chắn xóa hình này không?')"><i class="fa fa-remove"></i></a>
				</div>
				<div class='col-sm-offset-2 col-sm-4'>
					<div><hr /></div>
				</div>
			</div>
			<?php
			$num++;
		}
		?>
	</form>
</div>
