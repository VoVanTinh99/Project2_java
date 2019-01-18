<?php 
function addNew($Newsname,$title,$content,$employeecode)

{
	$insert = "INSERT INTO 
				`news`(`NewsNames`, `Title`, `NewsContent`, `EmployeeCode`) 
				VALUES ('$Newsname','$title','$content','$employeecode')";
	mysql_query($insert);
}

//Update News
function searchNews($NewsId)

{
	$sqlSelect = "
	SELECT `NewsId`, `NewsNames`, `Title`, `NewsContent`, `EmployeeCode` 
	FROM `news` 
	WHERE NewsId='$NewsId'";
	return mysql_query($sqlSelect);
}

function blindListEmployye() 
{ 
  $sqlString="SELECT `EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `Role` FROM `employee`"; 
  $sqlresult = mysql_query($sqlString); 
  echo "<select name='slEmpl' class='form-control'><option value='0'>Vui lòng chọn nhân viên thêm News cho thống</option>"; 
 
  while ($row = mysql_fetch_array($sqlresult,MYSQL_ASSOC)) { 
    echo "<option value='".$row['EmployeeCode']."'>".$row['EmployeeName']."</option>"; 
 
  } 
  echo "</select>"; 
} 

function UpdateNews($NewsId,$NewsName,$title,$content,$employeecode)
{
	$sqlUpdate = "UPDATE `news` SET 
	NewsNames = '$NewsName',
	Title = '$title',
	NewsContent = '$content',
	EmployeeCode = '$employeecode'
	WHERE	NewsId = '$NewsId'";
	mysql_query($sqlUpdate);
}
function DeleteNews($NewsId)
{
	$delete = "DELETE FROM news WHERE NewsId='$NewsId' ";
	mysql_query($delete);

}
function deleteImageNews($id){
	$Imageid = $_GET["ImgNewsId"];
	$result= mysql_query("SELECT * FROM imgnews WHERE ImgNewsId=$Imageid");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$fileDelete = $row['ImgNewsId'];
	$WineId = $row['NewsId'];
	unlink("../../public/admin/images_news/".$fileDelete);
	mysql_query("DELETE FROM `imgnews` WHERE ImgNewsId=$Imageid");
}
?>