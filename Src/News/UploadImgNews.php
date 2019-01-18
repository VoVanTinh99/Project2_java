<?php
if (isset($_GET['NewsId']))
{
	$NewsId = $_GET['NewsId'];
	
	$sql="SELECT `NewsId` FROM `news` WHERE `NewsId` = '$NewsId'";
	$rs = mysql_query($sql);
	$row = mysql_fetch_array($rs);
	$Newsname = $row[0];
}   
else 
{
	echo '<meta http-equiv="refresh" content="0: URL=News.php"/>';
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
	$NewsId = $_POST['NewsId'];
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
              $file_name = $_GET['NewsId']."_".random_name().".".$ext;
              copy($file['tmp_name'], "../Public/admin/images_news/".$file_name);
              unlink($file['tmp_name']);
              $cmd = "INSERT INTO `imgnews`(`ImgNews`, `NewsId`) VALUES('$file_name', '$NewsId')";

              //INSERT INTO `imgnews`(`ImgNews`, `NewsId`) VALUES
              $rs = mysql_query($cmd);
              if($rs)
              {
              	echo "<script>alert('Tải lên hình ảnh thành công!);</script>";
              }
              else 
              {
              	echo "<script>alert('Thao tác thất bại!');</script>";
              	echo '<meta http-equiv="refresh" content="0;URL='.$NewsId.'">';
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
			<label for="NewsId" class="col-sm-2 control-label">News Code (*):  </label>
			<div class="col-sm-10">
				<input type="text" name="NewsId" id="NewsId" class="form-control" placeholder="Mã nhân viên" value='<?php echo $NewsId; ?>' readonly="readonly"/>
			</div>
		</div>  
		<div class="form-group">    
			<label for="Newsname" class="col-sm-2 control-label">News  (*):  </label>
			<div class="col-sm-10">
				<input type="text" name="Newsname" id="Newsname" class="form-control" placeholder="Nội dung bản tin" value='<?php echo $Newsname; ?>' readonly="readonly"/> 
			</div>
		</div>     
		<div class="form-group">    
			<div class="col-sm-10 pull-right">
				<input type="file" accept=".jpg, .png, .jpeg, .gif" name="fileToUpload" id="fileToUpload" class="form-control-file" onChange='hasExistfile()'/>
			</div>
		</div>  
		<button type="submit" class="btn btn-primary pull-right" name="btnUpload" disabled id="btnUploadImage">Updaload</button>
		<script type="text/javascript">
			function hasExistfile(){
				document.getElementById('btnUploadImage').disabled = false;
			}
		</script> 
		<?php
		$query = "SELECT `ImgNewsId`, `ImgNews` FROM `imgnews` WHERE `NewsId`='".$_GET['NewsId']."'";
		//SELECT `ImgNewsId`, `ImgNews`, `NewsId` FROM `imgnews`
		$result = mysql_query($query) or trigger_error(mysql_error().$query);
		$num = 1;
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){  
			$ImgNewsId = $row['ImgNewsId'];
			?>
			<div class='col-sm-offset-2 col-sm-12'>
				<div class="row">

					<div class='col-sm-1'>
						<?php echo $num; ?>
					</div>
					<div class='col-sm-2'>
						<img src="<?php echo "../Public/admin/images_news/".$row['ImgNews']; ?>" width="100px"/>
					</div>
					<a class='btn btn-danger' href="?page=DeleteNewsImage&&NewsId=<?=$_GET['NewsId'];?>&&ImgNewsId=<?php echo $ImgNewsId; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
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
