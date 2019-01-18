<?php 

function addSubject($name,$details)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO Subject(SubjectName)
	VALUES ('$name')";
	mysqli_query($conn,$insert);
}
function deleteSubject($id)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM Subject WHERE SubjectId=$id";
	mysqli_query($conn,$delete);
}
function updateSubject($id,$name)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$update = 
	"UPDATE Subject 
	SET SubjectName = '$name'
	WHERE SubjectId='$id'";
	mysqli_query($conn,$update);
}
function searchSubject($id)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT SubjectId,SubjectName
	FROM Subject
	WHERE SubjectId='$id'";
	return mysqli_query($conn,$select);
}
?>