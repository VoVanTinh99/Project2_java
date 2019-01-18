<?php 
function addCountry($name,$details)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO Country(CountryName,CountryDetails)
	VALUES ('$name','$details')";
	mysqli_query($conn,$insert);
}
function deleteCountry($CountryId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM Country WHERE CountryId=$CountryId";
	mysqli_query($conn,$delete);
}

function updateCountry($CountryId,$name,$details)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$update = 
	"UPDATE Country 
	SET CountryName = '$name',CountryDetails='$details'
	WHERE CountryId='$CountryId'";
	mysqli_query($conn,$update);
}
function searchCountry($CountryId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT CountryId,CountryName,CountryDetails
	FROM Country
	WHERE CountryId='$CountryId'";
	return mysqli_query($conn,$select);
}
?>