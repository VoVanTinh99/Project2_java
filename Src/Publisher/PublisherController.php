<?php 
function addPublisher($name,$description)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO `Publisher`(`PublisherName`, `PublisherDescription`) VALUES ('$name','$description')";
	mysqli_query($conn,$insert);
}
function deletePublisher($PublisherId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM Publisher WHERE PublisherId=$PublisherId";
	mysqli_query($conn,$delete);
}
function updatePublisher($PublisherId,$name,$description)
{
	$update = 
	"UPDATE Publisher 
	SET PublisherName = '$name',PublisherDescription='$description'
	WHERE PublisherId='$PublisherId'";
	mysqli_query($conn,$update);
}
function searchPublisher($PublisherId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT `PublisherId`, `PublisherName`, `PublisherDescription`
	FROM Publisher
	WHERE PublisherId='$PublisherId'";
	return mysqli_query($conn,$select);
}
?>