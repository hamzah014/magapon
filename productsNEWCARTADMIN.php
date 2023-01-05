<?php
session_start();
include ('assets/header.php'); 
@include 'mysqli_connect_MAGAPON.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart_admin` SET cart_admin_quantity = '$update_value' WHERE cart_admin_id = '$update_id'");
   if($update_quantity_query){
      header('location:productsNEWCARTADMIN.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart_admin` WHERE cart_admin_id = '$remove_id'");
   header('location:productsNEWCARTADMIN.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart_admin`");
   header('location:productsNEWCARTADMIN.php');
}

?>
<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>SHOPPING <em>CART</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="margin-top: 50px;">
    <div class="container" style="margin-bottom: 300px;">
        <br>
        <br>
        <div class="row">
            <h1 class="heading" style="margin-bottom: 30px;">Your Item</h1>

            <table class="table table-hover" style="width: 100%;">

                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>

                <tbody>

                    <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart_admin`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

                    <tr>
                        <td><img src="imagesupload/<?php echo $fetch_cart['cart_admin_image']; ?>" height="100" alt=""></td>
                        <td><?php echo $fetch_cart['cart_admin_name']; ?></td>
                        <td>RM<?php echo ($fetch_cart['cart_admin_price']); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id"
                                    value="<?php echo $fetch_cart['cart_admin_id']; ?>">
                                <input type="number" name="update_quantity" min="1"
                                    value="<?php echo $fetch_cart['cart_admin_quantity']; ?>">
                                <input type="submit" value="update" name="update_update_btn">
                            </form>
                        </td>
                        <td>RM<?php echo $sub_total = ($fetch_cart['cart_admin_price'] * $fetch_cart['cart_admin_quantity']); ?>
                        </td>
                        <td><a href="productsNEWCART.php?remove=<?php echo $fetch_cart['cart_admin_id']; ?>"
                                onclick="return confirm('remove item from cart?')" class="delete-btn"> <i
                                    class="fa fa-minus"></i> remove</a></td>
                    </tr>
                    <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
                    <tr class="table-bottom">
                        <td><a href="productsNEWUSERADMIN.php" class="option-btn" style="margin-top: 30px;">Continue
                                Shopping</a>
                        </td>
                        <td colspan="3" style="padding-left: 520px;"><b>Grand Total</b></td>
                        <td><b>RM<?php echo $grand_total; ?></b></td>
                        <td><a href="productsNEWCARTADMIN.php?delete_all"
                                onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i
                                    class="fa fa-trash"></i> delete all </a></td>
                    </tr>

                </tbody>

            </table>

            <div class="checkout-btn">
                <a href="productsNEWCHECKOUTADMIN.php?grandtotal=<?php echo $grand_total ?>">Procced to Checkout</a>
            </div>
        </div>
    </div>
</section>








<?php 
        include ('assets/footer.html');  
    ?>