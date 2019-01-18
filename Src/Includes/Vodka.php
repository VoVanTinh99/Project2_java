			<!-- new-products -->
			<div class="new-products">
				<div class="container">
					<h3>VODKA</h3>
					<div class="agileinfo_new_products_grids">
						<?php 
						// include("../../Library/connect.php");
						$result = mysqli_query($conn,"
							SELECT wine.*
							FROM wine, category WHERE wine.CategoryId = category.CategoryId AND wine.CategoryId=1  ORDER BY WineUpdateDate 
							LIMIT 12");
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							?>
							<div class="col-md-3 agileinfo_new_products_grid">
								<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
									<div class="hs-wrapper hs-wrapper1">
										<?php
										$imgResult = mysqli_query($conn,"
											SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
										while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
											echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
										} ?>

										<div class="w3_hs_bottom w3_hs_bottom_sub">
											<ul>
												<li>
													<a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
												</li>
											</ul>
										</div>
									</div>
									<!-- <h5><a href="single.html">Skirts</a></h5> -->
									<?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
									<div class="simpleCart_shelfItem">
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
												<p><span><?php echo  "$"; echo (($rowPromotion['PromotionDiscount']/100)*$rowPrice['SellingPrice'])+$rowPrice['SellingPrice']?>

												</span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
												<?php 
											}}
											if ($row['WineQuantity'] > 0) 
											{
												?>
												<p><a class="item_add" href="?func=dathang&ma=<?php echo  $row['WineId']?>">Add to card</a></p>
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
								<?php } ?>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				<!-- //new-products -->