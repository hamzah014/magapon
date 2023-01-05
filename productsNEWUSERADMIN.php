<?php 
session_start();
include ('assets/header.php'); 
include "mysqli_connect_MAGAPON.php";

// If no session value is present, redirect the user:
if (!isset($_SESSION['Admin_ID'])) {

	// Need the functions:
	require('login_functions.php');
	redirect_user();
    
}


if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart_admin` WHERE cart_admin_name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart_admin`(cart_admin_name, cart_admin_price, cart_admin_image, cart_admin_quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
       $message[] = 'product added to cart succesfully';
    }

 }
?>

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Our <em>Menu</em></h2>
                    <p>A Variety Of Delicacies Prepared And Served By the Selected Food Stalls</p>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<!-- ***** Call to Action End ***** -->
<div class="row">
    <div class="col-lg-11">
        <div class="right">
            <a href="productsNEWCARTADMIN.php" style="float: right;"> <i class="fa fa-shopping-cart fa-4x"></i> Shopping
                Cart</a>
        </div>
    </div>
</div>
<!-- ***** Fleet Starts ***** -->

<div class="center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em>FOOD
                            <hr class="opacity-50">
                        </em></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Fleet Starts ***** -->
<div class="center">
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <?php 
                    include "mysqli_connect_MAGAPON.php";
                    $sql = "SELECT * FROM foodstalls WHERE F_TYPE='FOOD'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {  
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <?php
                                    echo "<img src= 'imagesupload/" .$row['images']. "'>";
                                ?>
                            <input type="hidden" name="product_image" value="<?php echo $row['images']; ?>">
                        </div>
                        <div class="down-content">
                            <form action="productsNEWUSERADMIN.php" method="POST">
                                <span>
                                    <sup>RM</sup><?php echo $row["F_PRICE"]; ?>
                                    <input type="hidden" name="product_price" value="<?php echo $row['F_PRICE']; ?>">
                                </span>
                                <h4><?php echo $row["F_NAME"]; ?></h4>
                                <input type="hidden" name="product_name" value="<?php echo $row['F_NAME']; ?>">
                                <p><?php echo $row["F_DESCRIPTION"]; ?></p>
                                <input type="hidden" name="FS_ID" value="<?php echo $id; ?>">
                                <ul class="social-icons">
                                    <button type="submit" id="form-submit" class="btn btn-info"
                                        name="add_to_cart">+Cart</button>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>
<!-- ***** Fleet Ends ***** -->
<div class="center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em>BEVERAGES
                            <hr class="opacity-50">
                        </em></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Fleet Starts ***** -->
<div class="center">
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <?php 
                    include "mysqli_connect_MAGAPON.php";
                    $sql2 = "SELECT * FROM foodstalls WHERE F_TYPE='BEVERAGES'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_array($result2))
                    {  
                ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <?php
                                    echo "<img src= 'imagesupload/" .$row2['images']. "'>";
                                ?>
                            <input type="hidden" name="product_price" value="<?php echo $row2['images']; ?>">
                        </div>
                        <div class="down-content">
                            <span>
                                <sup>RM</sup><?php echo $row2["F_PRICE"]; ?>
                                <input type="hidden" name="product_price" value="<?php echo $row2['F_PRICE']; ?>">
                            </span>
                            <h4><?php echo $row2["F_NAME"]; ?></h4>
                            <input type="hidden" name="product_price" value="<?php echo $row2['F_NAME']; ?>">
                            <p><?php echo $row2["F_DESCRIPTION"]; ?></p>
                            <input type="hidden" name="FS_ID" value="<?php echo $id; ?>">
                            <ul class="social-icons">
                                <button type="submit" id="form-submit" class="btn btn-info"
                                    name="add_to_cart">+Cart</button>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>
<!-- ***** Fleet Ends ***** -->
<?php 
      
        include ('assets/footer.html');  
    ?>