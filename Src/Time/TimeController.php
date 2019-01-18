<?php 
function addTime($ApplicationTime)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insertTime="INSERT INTO `time`(`ApplicationTime`) VALUES('$ApplicationTime')";
	mysqli_query($conn,$insertTime);
}
function deleteTime($TimeId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM `time` WHERE `TimeId`='$TimeId'";
	mysqli_query($conn,$delete);
}
function updateTime($TimeId,$applicationTime)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$update = 
	"UPDATE `time`
	SET ApplicationTime = '$applicationTime'
	WHERE TimeId='$TimeId'";
	mysqli_query($conn,$update);
}
function searchTimeeasy($TimeId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT TimeId,ApplicationTime
	FROM `time`
	WHERE TimeId='$TimeId'";
	return mysqli_query($conn,$select);
}
?>