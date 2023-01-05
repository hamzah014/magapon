<?php 
// This page processes the login form submission.
// The script now uses sessions.

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Need two helper files:
	require ('login_functions.php');
	require ('mysqli_connect_MAGAPON.php');
		
	// Check the login:
	list ($check, $data) = check_login_admin($conn, $_REQUEST['username_admin'], $_REQUEST['pass_admin']);
	
	if ($check) { // OK!
		
		// Set the session data:
		session_start();
		$_SESSION['Admin_ID'] = $data['Admin_ID'];
		$_SESSION['Admin_fname'] = $data['Admin_fname'];
		
		// Redirect:
		redirect_user('loggedin_admin.php');
			
	} else { // Unsuccessful!

		// Assign $data to $errors for login_page.inc.php:
		$errors = $data;

	}
		
	mysqli_close($conn); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('MAGAPON_LOGIN_PAGE.php');
?>