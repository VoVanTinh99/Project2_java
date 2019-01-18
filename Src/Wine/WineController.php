<?php 
function addWine($name,$strength,$shortdetails,$details,$wineupdate,$quantity,$idCat, $idPub,$idCountry)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO 
	`wine`(`WineName`, `WineStrength`,
	`WineShortDetails`, `WineDetails`, `WineUpdateDate`,
	`WineQuantity`, `CategoryId`, 
	`PublisherId`, `CountryId`)
	VALUES('$name','$strength','$shortdetails','$details','$wineupdate','$quantity','$idCat', '$idPub','$idCountry')";
	return mysqli_query($conn,$insert);
}

function addWinePromotion($WineId, $PromotionId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO 
	`promotion_wine`(`WineId`, `PromotionId`)
	VALUES('$WineId','$PromotionId')";
	return mysqli_query($conn,$insert);
}

function addWinePrice($WineId,$TimeId,$PurchasePrice,$SellingPrice,$Note)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO `time_wine`(`WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note`)
	VALUES('$WineId','$TimeId','$PurchasePrice','$SellingPrice','$Note')";
	return mysqli_query($conn,$insert);
}

function blindListCountry()
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlString="SELECT `CountryId`, `CountryName`, `CountryDetails` FROM `country`";
	$sqlresult = mysqli_query($conn,$sqlString);
	echo "<select name='slCountry' class='form-control'><option value='0'>Please select origin </option>";
	while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
		echo "<option value='".$row['CountryId']."'>".$row['CountryName']."</option>";
	}
	echo "</select>";
}
function blindListCategory()
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlString="SELECT `CategoryId`, `CategoryName`, `CategoryDescription` FROM `category`";
	$sqlresult = mysqli_query($conn,$sqlString);
	echo "<select name='slCategory' class='form-control'><option value='0'>Please select the category of wine </option>";
	while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
		echo "<option value='".$row['CategoryId']."'>".$row['CategoryName']."</option>";
	}
	echo "</select>";
}
function blindListPublisher()
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlString="SELECT `PublisherId`, `PublisherName`, `PublisherDescription` FROM `publisher`";
	$sqlresult = mysqli_query($conn,$sqlString);
	echo "<select name='slPublisher' class='form-control'><option value='0'>Please select winemakers</option>";
	while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
		echo "<option value='".$row['PublisherId']."'>".$row['PublisherName']."</option>";
	}
	echo "</select>";
}
function searchWine($WineId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlSelect = "
	SELECT 
	`WineId`, `WineName`, `WineStrength`, `WineShortDetails`, `WineDetails`, 
	`WineUpdateDate`, `WineQuantity`, `CategoryId`, 
	`PublisherId`, `CountryId` 
	FROM `wine` 
	WHERE WineId='$WineId'";
	return mysqli_query($conn,$sqlSelect);
}

function searchWineWithQuantityEqualsZero($WineId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlSelect = "
	SELECT 
	`WineId`, `WineName` 
	FROM `wine` 
	WHERE WineId='$WineId'";
	return mysqli_query($conn,$sqlSelect);
}

function searchWineTime($WineId, $TimeId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlSelect = "
	SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine`
	WHERE TimeId='$TimeId' and WineId ='$WineId'";
	return mysqli_query($conn,$sqlSelect);
}

function searchTime($TimeId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlSelect = "
	SELECT 
	`TimeId`, `ApplicationTime`
	FROM `time` 
	WHERE TimeId='$TimeId'";
	return mysqli_query($conn,$sqlSelect);
}

function updateWine($WineId,$name,$strength,$shortdetails,$details,$wineupdate,$quantity,$idCat, $idPub,$idCountry)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlUpdate = "UPDATE wine SET 
	WineName = '$name',
	WineStrength = '$strength',
	WineShortDetails = '$shortdetails',
	WineDetails = '$details',
	WineUpdateDate = '$wineupdate',
	WineQuantity = '$quantity',
	CategoryId = '$idCat',
	PublisherId = '$idPub',
	CountryId = '$idCountry'
	WHERE WineId = '$WineId'";
	mysqli_query($conn,$sqlUpdate);
}

function updateQuantityWine($WineId,$quantity)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlUpdate = "UPDATE wine SET 
	WineQuantity = '$quantity'
	WHERE WineId = '$WineId'";
	mysqli_query($conn,$sqlUpdate);
}

function updateWinePrice($WineId,$TimeId,$PurchasePrice,$SellingPrice,$Note)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlUpdate = "UPDATE time_wine SET 
	WineId = '$WineId',
	TimeId = '$TimeId',
	PurchasePrice = '$PurchasePrice',
	SellingPrice = '$SellingPrice',
	Note = '$Note',
	WHERE WineId = '$WineId'
	and TimeId ='$TimeId'";
	mysqli_query($conn,$sqlUpdate);
}
// Delete
function deleteWine($WineId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqldelete = "DELETE FROM `wine` WHERE WineId='$WineId'";
	mysqli_query($conn,$sqldelete);
}

function DeleteWinePrice($WineId, $TimeId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqldelete = "DELETE FROM `time_wine` WHERE WineId='$WineId' and TimeId = '$TimeId'";
	mysqli_query($conn,$sqldelete);
}
function deleteImageWine($ImgWineId){
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$result= mysqli_query($conn,"SELECT * FROM imgwine WHERE ImgWineId=$ImgWineId");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$fileDelete = $row['ImgWine'];
	unlink("../Public/admin/images/products/".$fileDelete);
	mysqli_query($conn,"DELETE FROM `imgwine` WHERE ImgWineId=$ImgWineId");
}

function remove_vietnamese_accents($str)
{
$accents_arr=array(
"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
"ế","ệ","ể","ễ",
"ì","í","ị","ỉ","ĩ",
"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
"ờ","ớ","ợ","ở","ỡ",
"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
"ỳ","ý","ỵ","ỷ","ỹ",
"đ",
"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
"Ằ","Ắ","Ặ","Ẳ","Ẵ",
"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
"Ì","Í","Ị","Ỉ","Ĩ",
"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ",
"Ờ","Ớ","Ợ","Ở","Ỡ",
"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
"Đ"
);
$no_accents_arr=array(
"a","a","a","a","a","a","a","a","a","a","a",
"a","a","a","a","a","a",
"e","e","e","e","e","e","e","e","e","e","e",
"i","i","i","i","i",
"o","o","o","o","o","o","o","o","o","o","o","o",
"o","o","o","o","o",
"u","u","u","u","u","u","u","u","u","u","u",
"y","y","y","y","y",
"d",
"A","A","A","A","A","A","A","A","A","A","A","A",
"A","A","A","A","A",
"E","E","E","E","E","E","E","E","E","E","E",
"I","I","I","I","I",
"O","O","O","O","O","O","O","O","O","O","O","O",
"O","O","O","O","O",
"U","U","U","U","U","U","U","U","U","U","U",
"Y","Y","Y","Y","Y",
"D"
);
	return str_replace($accents_arr,$no_accents_arr,$str);
}
?>