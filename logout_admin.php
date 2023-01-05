<?php # Script 12.11 - logout.php #2
// This page lets the user logout.
// This version uses sessions.
session_start(); // Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['Admin_ID'])) {

	// Need the functions:
	require ('login_functions.php');
	redirect_user();	
	
} else { // Cancel the session:

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ('assets/header.php');
?>

<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/Grey_back.jpg); margin-bottom: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Logged <em>Out</em></h2>
                    <p>You Are Now Logged Out!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include ('assets/footer.html');
?>