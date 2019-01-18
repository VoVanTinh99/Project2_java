<?php
function deleteImageAbout($id){
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$ImgaboutId = $_GET["ImgaboutId"];
	$result= mysqli_query($conn,"SELECT * FROM imgabout WHERE ImgaboutId=$ImgaboutId");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$fileDelete = $row['ImgaboutId'];
	$AboutId = $row['AboutId'];
	unlink("../../public/admin/images_about/".$fileDelete);
	mysqli_query($conn,"DELETE FROM `imgabout` WHERE ImgaboutId=$ImgaboutId");
}
?>