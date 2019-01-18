<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['btnUpdate']))
{
    //Check if value is null
  if($_POST['txtDeliverAddress'] != "" && $_POST['txtDeliverDate'] != "" && $_POST['slPaymentMethod'] != "0")
  {
        //Get Value
    $CreateDate = date("Y-m-d H:i:s");
    $DeliverDate = $_POST['txtDeliverDate'];
    $DeliverAddress = $_POST['txtDeliverAddress'];
    $PaymentMethod = $_POST['slPaymentMethod'];
    $Username = $_SESSION['username'];
    if($DeliverDate < date('Y-m-d',strtotime(date('Y-m-d') . "+1 days"))){
      echo "<script>alert('Deliver date must be after today!');</script>";
    }else{
            //Create query
      $query = "INSERT INTO `order`(`OrderCreateDate`, `OrderDeliverDate`, `OrderDeliverPlace`, `OrderStatus`, `Username`, `PaymentMethodId`)
      VALUES ('".$CreateDate."','".$DeliverDate."','".$DeliverAddress."',0,'".$Username."','".$PaymentMethod."')";
      mysqli_query($conn,$query);
        //Lấy mã tự tăng của đơn đặt hàng
      $order_id = mysqli_insert_id($conn);
        //Lấy từng sản phẩm trong giỏ hàng lưu vào CSDL
      foreach ($_SESSION["cart"] as $key => $row)
      {

        $quantity = $_SESSION['cart'][$key]['quantity'];
        $price = ($_SESSION['cart'][$key]['quantity'] * $_SESSION['cart'][$key]['gia']);
        $ori_price = ($_SESSION['cart'][$key]['quantity'] * $_SESSION['cart'][$key]['giagoc']);
        $query = "INSERT INTO `orderwinedetails`(`WineOrderId`, `OrderId`, `WineOrderQuantity`, `WineSoldPrice`, `WineOriginalPrice`)
        VALUES (".$key.",".$order_id.",".$quantity.",'".$price."','". $ori_price."')";
        mysqli_query($conn,$query);
        $query_update_stock = "UPDATE wine
        SET WineQuantity = WineQuantity - ".$row['quantity'].
        ", WineSold = WineSold + ".$row['quantity']." WHERE WineId=".$key;
        mysqli_query($conn,$query_update_stock);
      }
        //Xóa giỏ hàng sau khi thêm
      unset($_SESSION["cart"]);
        //Thông báo thêm giỏ hàng thành công
      echo "<script>alert('Order Completed Successfully!');</script>";
      echo "<script>window.location='index.php';</script>"; 
    }

  }
  else
  {
    echo "<script>
    $.toast({
      text: 'Please fill up required fields!',
      heading: 'Error',
      icon: 'error',
      showHideTransition: 'fade',
      allowToastClose: true,
      hideAfter: 2000,
      stack: 5,
      position: 'top-center',
      textAlign: 'left',
      loader: true,
      bgColor: '#ff0000',
    });
    </script>";
  }
}

function bindHTTTList()
{
  $conn = mysqli_connect("localhost","root","","a_huy");
  mysqli_set_charset($conn,'utf8');
     // include 'database.php';
  $query = "SELECT PaymentMethodId, PaymentMethodName from PaymentMethod";
  $result = mysqli_query($conn,$query);
  echo "<select name='slPaymentMethod' class='form-control'>
  <option value='0'>Chọn hình thức thanh toán</option>";
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    echo "<option value='".$row['PaymentMethodId']."'>".$row['PaymentMethodName']."</option>";
  }
  echo "</select>";
}
?>
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
  <div class="container">
    <ul>
      <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
      <li>Checkout</li>
    </ul>
  </div>
</div>
<!-- //breadcrumbs -->

<!-- about -->
<div class="about">
  <div class="container">
    <div class="col col-md-9 col-md-offset-3">
      <form id="form1" class="form-horizontal" name="form1" method="POST" action="">
        <div class="form-group">
          <label for="lblNoiGiaoHang" class="col-sm-3 control-label">Deliver Address:(*):  </label>
          <div class="col-sm-9">
            <input type="text" name="txtDeliverAddress" id="txtDeliverAddress" class="form-control" placeholder="Nơi giao hàng" value=""/>
          </div>
        </div>

        <div class="form-group">
          <label for="lblDeliverDate" class="col-sm-3 control-label">Deliver Date(*):  </label>
          <div class="col-sm-9">
            <input class="form-control" id="txtDeliverDate"  name="txtDeliverDate" type="date" value="<?=date('Y-m-d')?>" id="example-date-input">
          </div>
        </div>

        <div class="form-group">
          <label for="lblPaymentMethod" class="col-sm-3 control-label">Payment method(*):  </label>
          <div class="col-sm-9">
            <?php bindHTTTList() ?>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <input type="submit" name="btnUpdate"  class="btn btn-primary" id="btnUpdate" value="Check out"/>
            <input name="btnCancel" type="button" class="btn btn-primary" id="btnCancel" value="Cancel" onclick="window.location='../../Index.php'" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
