<?php 
session_start();
include ('assets/header.php'); 
include "mysqli_connect_MAGAPON.php";

// If no session value is present, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require('login_functions.php');
	redirect_user();
    
}


if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE cart_name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(cart_name, cart_price, cart_image, cart_quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
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
            <a href="productsNEWCART.php" style="float: right;"> <i class="fa fa-shopping-cart fa-4x"></i> Shopping Cart</a>
        </div>
    </div>
</div>
<!-- ***** Fleet Starts ***** -->

<div class="center">
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <div class="row">
                <?php 
        $sql = "SELECT * FROM foodstalls";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result))
        {  
            ?>
                <div class="col-lg-6">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <?php
                                    echo "<img src= 'imagesupload/" .$row['images']. "'>";
                                ?>
                        </div>
                        <div class="down-content">
                            <form action="" method="POST">
                                <span>
                                    <sup>RM</sup><?php echo $row["F_PRICE"]; ?>
                                    <input type="hidden" name="product_price" value="<?php echo $row['F_PRICE']; ?>">
                                </span>
                                <h4><?php echo $row["F_NAME"]; ?></h4>
                                <input type="hidden" name="product_name" value="<?php echo $row['F_NAME']; ?>">
                                <p><?php echo $row["F_DESCRIPTION"]; ?></p>
                                <input type="hidden" name="product_description"
                                    value="<?php echo $row['F_DESCRIPTION']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $row['images']; ?>">
                                <input type="hidden" name="FOOD_ID" value="<?php echo $id; ?>">
                                <button type="submit" id="form-submit" class="btn btn-info"
                                    name="add_to_cart">+Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                        if(isset($message)){
                    foreach($message as $message){
                    echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
                    };
                };} ?>
            </div>
        </div>
    </section>
</div>


<!-- ***** Fleet Ends ***** -->
<?php 
      
        include ('assets/footer.html');  
    ?>