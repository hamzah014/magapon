<?php 
// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the functions:
	require('login_functions.php');
	redirect_user();
    	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('assets/header.php');
?>


<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/banner-image-1-1920x500.jpg); margin-bottom: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Logged <em>In</em></h2>
                    <p>Welcome <?php echo $_SESSION['user_fname'] ?>!! You Are Now Logged In!</p>
                </div>
            </div>
        </div>
    </div>
</section>




<?php
include ('assets/footer.html');
?>