<?php 
function addPaymentMethod($name,$description)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO `PaymentMethod`(`PaymentMethodName`, `PaymentMethodDetails`) VALUES ('$name','$description')";
	mysqli_query($conn,$insert);
}
function deletePaymentMethod($PaymentMethodId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM PaymentMethod WHERE PaymentMethodId=$PaymentMethodId";
	mysqli_query($conn,$delete);
}
function updatePaymentMethod($PaymentMethodId,$name,$description)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$update = 
	"UPDATE PaymentMethod 
	SET PaymentMethodName = '$name',PaymentMethodDetails='$description'
	WHERE PaymentMethodId='$PaymentMethodId'";
	mysqli_query($conn,$update);
}
function searchPaymentMethod($PaymentMethodId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT PaymentMethodId,PaymentMethodName,PaymentMethodDetails
	FROM PaymentMethod
	WHERE PaymentMethodId='$PaymentMethodId'";
	return mysqli_query($conn,$select);
}
?>