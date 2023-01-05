<?php
session_start();
include ('assets/header.php'); 
@include 'mysqli_connect_MAGAPON.php';

?>

<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Easy <em>Checkout</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>First Name:</label>
                                <input type="text">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Last Name:</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>Email:</label>
                                <input type="text">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Phone:</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>Participants ID:</label>
                                <input type="text">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Payment method</label>

                                <select>
                                    <option value="">-- Choose --</option>
                                    <option value="bank">Bank account</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-button">
                                    <div class="float-left">
                                        <a href="productsNEWCART.php">Back to Shopping Cart</a>
                                    </div>

                                    <div class="float-right">
                                        <a href="#">Finish</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <br>
            </div>


            <div class="col-md-4">
                <ul class="list-group list-group-no-border">
                    <li class="list-group-item" style="margin:0 0 -1px">
                        <div class="row">
                            <div class="col-6">
                                <h4><strong>Total</strong></h4>
                            </div>

                            <div class="col-6">
                                <?php
                                    $grand_total = $_GET['grandtotal'];
                                        ?>
                                <h4 class="text-right">RM
                                    <?php echo $grand_total; ?>
                                </h4>
                            </div>
                        </div>
                    </li>
                </ul>
                <br>
            </div>
        </div>
    </div>
</section>


<?php 
        include ('assets/footer.html');  
    ?>