
<?php
function addPromotion($name,$discount,$content,$Promotionacctive,$Promotionclose,$Promotionopen)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert="INSERT INTO `Promotion`(`PromotionName`, `PromotionDiscount`, `PromotionContent`, `PromotionActive`, `PromotionClose`, `PromotionOpen`) VALUES ('$name','$discount','$content','$Promotionacctive','$Promotionclose','$Promotionopen')";
	mysqli_query($conn,$insert);
}
function deletePromotion($PromotionId)
{	
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM Promotion WHERE PromotionId=$PromotionId";
	mysqli_query($conn,$delete);
}
function changeActive($PromotionId,$do)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	if ($do == "OK") {
		$Promotionopen = '1';
	} else if ($do == "Remove") {
		$Promotionopen = '0';
	}

	$update = "UPDATE Promotion	SET PromotionOpen='$Promotionopen' WHERE PromotionId='$PromotionId'";
	mysqli_query($conn,$update);
}
function updatePromotion($PromotionId,$name,$discount,$content,$Promotionacctive,$Promotionclose,$Promotionopen)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$update =
	"UPDATE Promotion
	SET PromotionName = '$name',PromotionDiscount='$discount',PromotionContent='$content',PromotionActive='$Promotionacctive',PromotionClose='$Promotionclose',PromotionOpen='$Promotionopen'
	WHERE PromotionId='$PromotionId'";
	mysqli_query($conn,$update);
}
function searchPromotion($PromotionId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select =
	"SELECT PromotionId,PromotionName,PromotionDiscount,PromotionContent,PromotionActive,PromotionClose,PromotionOpen
	FROM Promotion
	WHERE PromotionId='$PromotionId'";
	return mysqli_query($conn,$select);
}
?>
