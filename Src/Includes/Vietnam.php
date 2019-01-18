			<!-- new-products -->
			<div class="new-products">
				<div class="container">
					<h3>Vietnam</h3>
					<div class="agileinfo_new_products_grids">
						<?php 
						$result = mysqli_query($conn,"
							SELECT wine.*
							FROM wine, publisher WHERE wine.PublisherId = publisher.PublisherId AND wine.PublisherId=1  ORDER BY WineUpdateDate 
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
											?>
											<p><span><?php echo  "$".$rowPrice['PurchasePrice']?>

											</span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
											<?php 
										}
										if ($row['WineQuantity'] > 0) 
										{
											?>
											<p><a class="item_add" href="?action=checkout&&WineId=<?php echo  $row['WineId']?>">Add to card</a></p>
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