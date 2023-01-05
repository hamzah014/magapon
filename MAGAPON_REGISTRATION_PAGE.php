<?php
include ('assets/header.php'); 
@include 'mysqli_connect_MAGAPON.php';

if (isset($_POST['register']))
{
     $errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['f_name'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your first name.
					 </div>';
	} else {
		$fn = trim($_POST['f_name']);
	}
	
	// Check for a last name:
	if (empty($_POST['l_name'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your last name.
					 </div>';
	} else {
		$ln = trim($_POST['l_name']);
	}

     // Check for an email
	if (empty($_POST['email'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your email.
					 </div>';
	} else {
		$email = trim($_POST['email']);
	}

     // Check for an username
	if (empty($_POST['username'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your username.
					 </div>';
	} else {
		$username = trim($_POST['username']);
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     Your password does not match.
					 </div>';
		} else {
			$p = trim($_POST['pass1']);
		}
	} else {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your password.</div>
					 ';
	}

     // Check for an mobile phone
	if (empty($_POST['mobilehp'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your phone number.
					 </div>';
	} else {
		$hp = trim($_POST['mobilehp']);
	}

     // Check for an participants id
	if (empty($_POST['part_id'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your participants id.
					 </div>';
	} else {
		$part_id = trim($_POST['part_id']);
	} 

     if (empty($errors)) { // If everything's OK. ($fn && $ln && $e)
	

		// Make the query:
		$q = "INSERT INTO users (user_fname, user_lname, user_email, user_username, user_pass, user_hp, user_part_id) VALUES ('$fn', '$ln', '$email', '$username' , '$p', '$hp' , '$part_id')";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<div class="col-lg-6 mx-auto col-md-7 col-12 py-5 mt-5 text-center" data-aos="fade-up">
                      <b>You Are Now Registered!!</b>
                    </div>	';

						

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($conn); // Close the database connection.
		exit();
		
	} else { // Report the errors.
	
		echo '<div class="col-lg-6 col-md-7 col-12">
              <h4 class="my-5 pt-3" data-aos="fade-up" data-aos-delay="100">The following error(s) occurred:</h4>
			  </div>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

}

elseif (isset($_POST['back']))
{
     header('location: MAGAPON_LOGIN_PAGE.php');
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
                    <h2>Participants <em>Registration</em></h2>
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
            <div class="col-2"></div>
            <div class="col-8">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>First Name:</label>
                                <input type="text" class="form-control" name="f_name" placeholder="First Name">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Last Name:</label>
                                <input type="text" class="form-control" name="l_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>Email:</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Username:</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>Password:</label>
                                <input type="Password" class="form-control" name="pass1" placeholder="Password">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Confrim Password:</label>
                                <input type="password" class="form-control" name="pass2" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <label>Phone Number:</label>
                                <input type="text" class="form-control" name="mobilehp" placeholder="Phone Number">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <label>Participants ID:</label>
                                <input type="text" class="form-control" name="part_id" placeholder="Participants ID">
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-button">
                                    <div class="float-left">
                                        <button type="submit" class="btn btn-outline-info" id="submit-button"
                                            name="back">Back</button>
                                    </div>

                                    <div class="float-right">
                                        <button type="submit" class="btn btn-outline-info" id="submit-button"
                                            name="register">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <br>
            </div>


        </div>
    </div>
</section>

<?php 
        include ('assets/footer.html');  
    ?>