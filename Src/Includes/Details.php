
<?php 
$WineId = $_GET['WineId'];
if(isset($_POST['btnOrder']))
{
	$query = "Select wine.WineId, wine.WineName, wine.WineQuantity, publisher.PublisherName, time_wine.PurchasePrice, time_wine.SellingPrice from wine, publisher, time_wine WHERE wine.WineId = time_wine.WineId and publisher.PublisherId = wine.PublisherId and  wine.WineId = ".$WineId;
	$result = mysqli_query($conn,$query);
	while ($rowsql = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$coroi = false;
		foreach ($_SESSION["cart"] as $key => $row)
		{
			if($key==$WineId)
			{
				$_SESSION['cart'][$key]["quantity"] +=  $_POST['txtOrder'];
				$coroi = true;
			}
		}

		if(!$coroi)
		{
			$ten = $rowsql['WineName'];
			$nsx = $rowsql['PublisherName'];
			$price = $rowsql['SellingPrice'];
			$oriprice = $rowsql['PurchasePrice'];
			$cart = array(
				"ten" => $ten,
				"quantity" =>$_POST['txtOrder'],
				"gia" => $price,
				"giagoc" => $oriprice,
				"hang" => $nsx);
			$_SESSION['cart'][$WineId]=$cart;
		}
		echo "<script language='javascript'>
		alert('Added successfully!'); 
		window.location.href='?page=Cart'
		</script>";

	}
}

$result=mysqli_query($conn,"SELECT WineId, WineName, WineStrength, WineShortDetails, WineDetails, WineUpdateDate,WineQuantity, wine.CategoryId, wine.PublisherId, wine.CountryId FROM wine, category, country, publisher WHERE wine.CategoryId = category.CategoryId AND wine.PublisherId = publisher.PublisherId AND wine.CountryId = country.CountryId and wine.WineId =".$WineId);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	?>
	<div class="special-deals">
		<div class="container">
			<h2>Detail</h2>
			<div class="modal-body">
				<div class="col-md-5 modal_body_left">
					<div class="hs-wrapper hs-wrapper1">
						<?php
						$imgResult = mysqli_query($conn,"
							SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']);
						while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
							echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';

						} ?>
					</div>
				</div>
				<div class="col-md-7 modal_body_right">
					<h4><?=$row['WineName']?></h4>
					<p><?=$row['WineDetails']?></p>
					<div class="rating">
						<div class="rating-left">
							<img src="public/client/images/star-.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="public/client/images/star-.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="public/client/images/star-.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="public/client/images/star.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="public/client/images/star.png" alt=" " class="img-responsive" />
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="modal_body_right_cart simpleCart_shelfItem">
						<?php 
						$sqlSelect = "
						SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

						$resultPrice = mysqli_query($conn,$sqlSelect);
						while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
						{
							$sqlPromotion = "SELECT `PromotionDiscount` from promotion_wine, promotion WHERE promotion_wine.PromotionId = promotion.PromotionId and promotion_wine.WineId = ".$rowPrice['WineId'];
							$resulPromotion = mysqli_query($conn,$sqlPromotion);
							while ($rowPromotion=mysqli_fetch_array($resulPromotion,MYSQLI_ASSOC)) 
							{
								?>
						<p><span><?php echo "$"; echo  (($rowPromotion['PromotionDiscount']/100)*$rowPrice['SellingPrice'])+$rowPrice['SellingPrice'];?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
								<?php 
							}}

							?> 
						</div>
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
								<li><a href="#"><span></span>Red</a></li>
								<li><a href="#" class="brown"><span></span>Yellow</a></li>
								<li><a href="#" class="purple"><span></span>Purple</a></li>
								<li><a href="#" class="gray"><span></span>Violet</a></li>
							</ul>
						</div>
						<br/>
						<form name="frmOrder" id="frmOrder" method="post" action="#">
							<div class="form-group row">
								<label for="wine-quantity" class="col-sm-2 control-label">Quantity</label>
								<div class="col-sm-3">
									<div class="input-group bootstrap-touchspin">
										<input id="wine-quantity" class="form-control text-center" name="txtOrder" value="1"/>         
									</div>
								</div>
								<div class="col-sm-7">
									<div class="modal_body_right_cart simpleCart_shelfItem">
										<?php
										if ($row['WineQuantity'] > 0) 
										{
											?>
											<input class="btn btn-success item_add" type="submit" name="btnOrder" id="btnOrder" value="Add to Cart">
											<?php
										} else {
											?>
											<p><a class="item_add" href="#">Out of stock</a></p>
											<?php
										}
										?>
									</div>
								</div>
							</div>  
						</form>       
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<?php } ?>