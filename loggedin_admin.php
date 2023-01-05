<?php 
// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['Admin_ID'])) {

	// Need the functions:
	require('login_functions.php');
	redirect_user();
    	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('assets/header.php');
?>


<?php
// Print a customized message:
echo '
<section class="contact section-padding" style="background-image: url(assets/images/Grey_back.jpg)">
          <div class="container">
               <div class="row">
			   <div class="col-lg-6 mx-auto col-md-7 col-12 py-5 mt-5 text-center" data-aos="fade-up">
				';

echo 
"<h1>Logged In!</h1>
<p>You are now logged in, {$_SESSION['Admin_fname']}!</p>";
//<p><a href=\"logout.php\">Logout</a></p>";

	echo '
				</div>
				</div>
				</div>
				</section>
				';

include ('assets/footer.html');
?>