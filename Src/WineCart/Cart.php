    <script language="javascript">
        function confirmDelete(){
            if(confirm("Are you sure want to delete it?")){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "del") {
            $id = $_GET["id"];
            unset($_SESSION["cart"][$id]);
            echo "<script>window.location.href='?page=Cart'</script>";
        }
    }

    if (isset($_POST['btnYes'])) {
        $arrayName = array();
        foreach ($_SESSION['cart'] as $key => $wine) {
          $_SESSION['cart'][$key]['quantity'] = $_POST['Wine'.$key];
          $wineName = $_SESSION['cart'][$key]['ten'];
          $wineQuantity = $_SESSION['cart'][$key]['quantity'];
          $sql_check_quantity = "SELECT * FROM wine WHERE WineName = '{$wineName}'";
          $row_check_quantity = mysqli_fetch_array(mysqli_query($conn,$sql_check_quantity));
          $checkQuantity = $row_check_quantity['WineQuantity'];
          
          if($wineQuantity > $checkQuantity) {
              echo "<script>alert('Không đủ số lượng ".$wineName." cần mua. Vui lòng mua ít hơn!');</script>";
              array_push($arrayName, false);
          } else {
              if (isset($_SESSION['username'])) {
                  foreach ($_SESSION["cart"] as $key => $row) {
                      $_SESSION['cart'][$key]['quantity'] = $_POST['Wine'.$key];
                  }
              } else {
                  echo "<script>alert('Please Login to Checkout');</script>";
              }
              array_push($arrayName, true);
          }
      }

      if(!in_array(false, $arrayName)){
        echo "<script>window.location.href='?page=Checkout'</script>";
    }

}

?>

<!-- breadcrumbs -->
<div class="breadcrumb_dress">
    <div class="container">
        <ul>
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
            <li>Cart</li>
        </ul>
    </div>
</div>
<!-- //breadcrumbs -->

<!-- about -->
<div class="about">
    <div class="container">
       <?php
       if ($_SESSION["cart"] != null)
       {
        ?>
        <form id="form-1" name="form1" method="post" action="">
            <div class="row">
                <table class="table table-responsive table-sm table-striped table-hover">
                    <tr class="bg-inverse">
                        <th>No</th>
                        <th>Product Names</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                       <?php
                       $total = 0;
                       $i = 1;
                       foreach ($_SESSION["cart"] as $key => $row)
                       {
                        ?>
                        <tr class='item'>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['ten'] ?></td>
                            <td><?php echo $row["hang"] ?></td>
                            <td class="winePrice"><?php echo $row['gia'] ?></td>
                            <td class="wineQuantity" style="width: 12%"> <span class="input-group bootstrap-touchspin text-center">
                                <input type='text' class="wine-quantity" id="wine-quantity" name='Wine<?php echo $key ?>' value='<?php echo $row["quantity"] ?>' class='form-control text-center'/>
                            </span></td>
                            <td class="wineTotal"><?php echo number_format($row["gia"] * $row["quantity"], 0, ",", ".") ?></td>
                            <td><a onclick='return confirmDelete()' href="?page=Cart&action=del&id=<?php echo $key ?>">REMOVE</a></td>
                        </tr>
                        <?php
                        $total += $row["gia"] * $row["quantity"];
                    } ?>
                </tbody>
            </table>
        </div>
        <?php

        echo "<div class='row'>
        <div class='pull-right text-right'><h1>Total: <city>$</city><span class='text-danger' id='totalCart'>".number_format($total, 0, ",", ".") . "</span></h1></div></div><br/>";
        echo '<div class="row">
        <input type="submit" value="Check out" name="btnYes" id="btnXoa" class="btn btn-primary pull-right btn-lg"/>
        </div>';
    } else {
        echo "<div class='row'><div class='col-sm-12'><h1 class='text-danger text-center'>There are not any wine in cart</h1></div></div>";
    }
    ?>

</form>
<script type="text/javascript">
    $(document).ready(function(){
        $(".bootstrap-touchspin-up, .bootstrap-touchspin-down").click(function(){
           var total;
           $("tr.item").each(function() {
             $this = $(this);
             var winePrice = $this.find("td.winePrice").html();
             var wineQuantity = $this.find("input.wine-quantity").val();
             total = winePrice * wineQuantity;
             $this.find("td.wineTotal").html(total);
         });
           var totalCart = 0;
           $('td.wineTotal').each(function() {
            totalCart = totalCart + parseInt($(this).text());
        });

           $("#totalCart").html(totalCart);
       });
    });
</script>
</div>
</div>
