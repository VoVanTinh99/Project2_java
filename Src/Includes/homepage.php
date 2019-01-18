<!-- banner-bottom -->
<div class="banner-bottom">
  <div class="container">
   <div class="col-md-5 wthree_banner_bottom_left">
    <div class="video-img">
     <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
      <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
    </a>
  </div>
  <!-- pop-up-box -->
  <link href="public/client/css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
  <script src="public/client/js/jquery.magnific-popup.js" type="text/javascript"></script>
  <!--//pop-up-box -->
  <div id="small-dialog" class="mfp-hide">
   <iframe src="https://player.vimeo.com/video/132524151?title=0&byline=0&portrait=0"></iframe>
 </div>
 <script>
   $(document).ready(function() {
    $('.popup-with-zoom-anim').magnificPopup({
     type: 'inline',
     fixedContentPos: false,
     fixedBgPos: true,
     overflowY: 'auto',
     closeBtnInside: true,
     preloader: false,
     midClick: true,
     removalDelay: 300,
     mainClass: 'my-mfp-zoom-in'
   });

  });
</script>
</div>
<div class="col-md-7 wthree_banner_bottom_right">
  <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
   <ul id="myTab" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home">Vodka</a></li>
    <li role="presentation"><a href="#skirts" role="tab" id="skirts-tab" data-toggle="tab" aria-controls="skirts">Whisky</a></li>
    <li role="presentation"><a href="#watches" role="tab" id="watches-tab" data-toggle="tab" aria-controls="watches">Chivas</a></li>
    <li role="presentation"><a href="#sandals" role="tab" id="sandals-tab" data-toggle="tab" aria-controls="sandals">Vietnam</a></li>
    <li role="presentation"><a href="#jewellery" role="tab" id="jewellery-tab" data-toggle="tab" aria-controls="jewellery">Fruit</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
     <div class="agile_ecommerce_tabs">
      <?php 
      $result = mysqli_query($conn, "
       SELECT wine.*
       FROM wine, category WHERE wine.CategoryId = category.CategoryId AND wine.CategoryId=1  ORDER BY WineUpdateDate 
       LIMIT 3");
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       ?>
       <div class="col-md-4 agile_ecommerce_tab_left">
        <div class="hs-wrapper">
         <?php
         $imgResult = mysqli_query($conn,"
          SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
         while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
          echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
        } ?>
        <div class="w3_hs_bottom">
          <ul>
           <li>
             <a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
           </li>
         </ul>
       </div>
     </div>
     <?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
     <div class="simpleCart_shelfItem">
       <?php 
       $sqlSelect = "
       SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

       $resultPrice = mysqli_query($conn, $sqlSelect);
       while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
       {
        ?>
        <p><span><?php echo  "$".$rowPrice['PurchasePrice']?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
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
    <!-- MODAL -->
    <div class="modal video-modal fade" id="view-detail" tabindex="-1" role="dialog" aria-labelledby="view-detail">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <section>
        <div class="modal-body">
         <div class="col-md-5 modal_body_left">
          <?php
          $imgResult = mysqli_query($conn,"
           SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 1");
          while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
           echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
         } ?>
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
         ?>
         <p><span><?php echo  "$".$rowPrice['PurchasePrice']?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
         <?php 
       }

       ?> 
     </div>
     <form class="form-horizontal" name="frmOrder" id="frmOrder" method="post" action="">
      <div class="form-group">
       <label for="wine-quantity" class="col-sm-2 control-label">Quantity</label>
       <div class="col-sm-3">
        <div class="input-group bootstrap-touchspin">
         <input id="wine-quantity" class="form-control text-center" name="txtOrder" value="1"/>         
       </div>
     </div>
     <div class="col-sm-6">
      <div class="modal_body_right_cart simpleCart_shelfItem">
       <?php
       if ($row['WineQuantity'] > 0) 
       {
        ?>
        <p><a class="item_add" href="?action=checkout&&WineId=<?php echo  $row['WineId']?>">Add to cart</a></p>
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
</section>
</div>
</div>
</div>
<!-- END MODAL -->
</div>
<?php }?>
<div class="clearfix"> </div>
</div>
</div>
<!-- End Tshirt -->
<div role="tabpanel" class="tab-pane fade" id="skirts" aria-labelledby="skirts-tab">
 <div class="agile_ecommerce_tabs">
  <?php 
  $result = mysqli_query($conn,"
   SELECT wine.*
   FROM wine, category WHERE wine.CategoryId = category.CategoryId AND wine.CategoryId=2  ORDER BY WineUpdateDate 
   LIMIT 3");
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
   ?>
   <div class="col-md-4 agile_ecommerce_tab_left">
    <div class="hs-wrapper">
     <?php
     $imgResult = mysqli_query($conn,"
      SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
     while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
      echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
    } ?>
    <div class="w3_hs_bottom">
      <ul>
       <li>
        <a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
      </li>
    </ul>
  </div>
</div>
<?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
<div class="simpleCart_shelfItem">
  <?php 
  $sqlSelect = "
  SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

  $resultPrice = mysqli_query($conn,$sqlSelect);
  while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
  {
   ?>
   <p><span><?php echo  "$".$rowPrice['PurchasePrice']?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
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
<?php } ?>
<div class="clearfix"> </div>
</div>
</div>
<!-- end Skirts tab -->
<div role="tabpanel" class="tab-pane fade" id="watches" aria-labelledby="watches-tab">
  <div class="agile_ecommerce_tabs">
   <?php 
   $result = mysqli_query($conn,"
    SELECT wine.*
    FROM wine, category WHERE wine.CategoryId = category.CategoryId AND wine.CategoryId=3  ORDER BY WineUpdateDate 
    LIMIT 3");
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    ?>
    <div class="col-md-4 agile_ecommerce_tab_left">
     <div class="hs-wrapper">
      <?php
      $imgResult = mysqli_query($conn,"
       SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
      while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
       echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
     } ?>
     <div class="w3_hs_bottom">
       <ul>
        <li>
         <a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
       </li>
     </ul>
   </div>
 </div>
 <?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
 <div class="simpleCart_shelfItem">
   <?php 
   $sqlSelect = "
   SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

   $resultPrice = mysqli_query($conn,$sqlSelect);
   while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
   {
    ?>
    <p><span><?php echo  "$".$rowPrice['PurchasePrice']?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
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
<?php } ?>
<div class="clearfix"> </div>
</div>
</div>
<!-- End watches tab -->
<div role="tabpanel" class="tab-pane fade" id="sandals" aria-labelledby="sandals-tab">
 <div class="agile_ecommerce_tabs">
  <?php 
  $result = mysqli_query($conn,"
   SELECT wine.*
   FROM wine, category WHERE wine.CategoryId = category.CategoryId AND wine.CategoryId=4  ORDER BY WineUpdateDate 
   LIMIT 3");
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
   ?>
   <div class="col-md-4 agile_ecommerce_tab_left">
    <div class="hs-wrapper">
     <?php
     $imgResult = mysqli_query($conn,"
      SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
     while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
      echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
    } ?>
    <div class="w3_hs_bottom">
      <ul>
       <li>
        <a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
      </li>
    </ul>
  </div>
</div>
<?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
<div class="simpleCart_shelfItem">
  <?php 
  $sqlSelect = "
  SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

  $resultPrice = mysqli_query($conn,$sqlSelect);
  while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
  {
   ?>
   <p><span><?php echo  "$".$rowPrice['PurchasePrice']?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
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
<?php } ?>
<div class="clearfix"> </div>
</div>
</div>
<!-- End scandals tab -->
<div role="tabpanel" class="tab-pane fade" id="jewellery" aria-labelledby="jewellery-tab">
 <div class="agile_ecommerce_tabs">
  <?php 
  $result = mysqli_query($conn,"
   SELECT wine.*
   FROM wine, category WHERE wine.CategoryId = category.CategoryId AND wine.CategoryId=5  ORDER BY WineUpdateDate 
   LIMIT 3");
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
   ?>

   
   <div class="col-md-4 agile_ecommerce_tab_left">
    <div class="hs-wrapper">
     <?php
     $imgResult = mysqli_query($conn,"
      SELECT ImgWine FROM imgwine, wine WHERE wine.WineId = imgwine.WineId and wine.WineId = ".$row['WineId']." LIMIT 6");
     while ($imgRow = mysqli_fetch_array($imgResult, MYSQLI_ASSOC)){
      echo'<img src="public/admin/images/products/'.$imgRow["ImgWine"].'" class="img-responsive" />';
    } ?>
    <div class="w3_hs_bottom">
      <ul>
       <li>
        <a href="index.php?page=Details&&WineId=<?=$row['WineId']?>" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
      </li>
    </ul>
  </div>
</div>
<?php echo  '<h5><a href="single.html">'.$row['WineName'].'</a></h5>';  ?>
<div class="simpleCart_shelfItem">
 <?php 
 $sqlSelect = "
 SELECT `WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note` FROM `time_wine` WHERE `WineId` ='".$row['WineId']."' order by `TimeId` desc limit 1";

 $resultPrice = mysqli_query($conn,$sqlSelect);
 while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
 {
  ?>
  <p><span><?php echo  "$".$rowPrice['PurchasePrice']?></span> <i class="item_price"><?php echo  "$".$rowPrice['SellingPrice']?></i></p>
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
<?php } ?>
<div class="clearfix"> </div>
</div>
</div>
<!-- ENd jebellery tab -->
</div>
</div>
<div class="clearfix"> </div>
</div>
<!-- //banner-bottom -->
</div>
</div>

<!-- banner-bottom1 -->
<div class="banner-bottom1">
  <div class="agileinfo_banner_bottom1_grids">
   <div class="col-md-7 agileinfo_banner_bottom1_grid_left">
   </div>
   <div class="col-md-5 agileinfo_banner_bottom1_grid_right">
    <h4>hot deal</h4>
    <div class="timer_wrap">
     <div id="counter"> </div>
   </div>
   <script src="public/client/js/jquery.countdown.js"></script>
   <script src="public/client/js/script.js"></script>
 </div>
 <div class="clearfix"> </div>
</div>
</div>
<!-- //banner-bottom1 -->
<!-- special-deals -->
<div class="special-deals">
  <div class="container">
   <h2>Special Deals</h2>
   <div class="w3agile_special_deals_grids">
    <div class="col-md-7 w3agile_special_deals_grid_left">
     <div class="w3agile_special_deals_grid_left_grid">
      <img src="public/client/images/26.jpg" alt=" " class="img-responsive" />
    </div>
    <div class="w3agile_special_deals_grid_left_grid">
      <img src="public/client/images/78.jpg" alt=" " class="img-responsive" />
    </div>
  </div>
  <div class="col-md-5 w3agile_special_deals_grid_right">
    <img src="public/client/images/80.jpg" alt=" " class="img-responsive" />
    <div class="w3agile_special_deals_grid_right_pos">
     <h4>Women's <span class="text-white">Special</span></h4>
     <h5 >5% off<span></h5>
     </div>
   </div>
   <div class="clearfix"> </div>
 </div>
</div>
</div>

<!-- //special-deals -->
<!-- new-products -->
<div class="new-products">
  <div class="container">
   <h3>New Products</h3>
   <div class="agileinfo_new_products_grids">
    <?php 
    $result = mysqli_query($conn,"
     SELECT wine.*
     FROM wine ORDER BY WineUpdateDate
     LIMIT 8");
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

     $resultPrice = mysqli_query($conn, $sqlSelect);
     while ($rowPrice=mysqli_fetch_array($resultPrice,MYSQLI_ASSOC)) 
     {
      $sqlPromotion = "SELECT `PromotionDiscount` from promotion_wine, promotion WHERE promotion_wine.PromotionId = promotion.PromotionId and promotion_wine.WineId = ".$rowPrice['WineId'];
      $resulPromotion = mysqli_query($conn,$sqlPromotion);
      while ($rowPromotion=mysqli_fetch_array($resulPromotion,MYSQLI_ASSOC)) 
      {
        ?>
        <p><span><?php echo  (($rowPromotion['PromotionDiscount']/100)*$rowPrice['SellingPrice'])+$rowPrice['SellingPrice'];?>
        </span> <i class="item_price"><?php echo  $rowPrice['SellingPrice']?></i>
      </p>
      <?php 
    }
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