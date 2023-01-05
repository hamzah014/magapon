<?php 
// This page defines two functions used by the login/logout process.

/* This function determines an absolute URL and redirects the user there.
 * The function takes one argument: the page to be redirected to.
 * The argument defaults to index.php.
 */
function redirect_user ($page = 'contactNEW.php') {

	// Start defining the URL...
	// URL is http:// plus the host name plus the current directory:
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	// Remove any trailing slashes:
	$url = rtrim($url, '/\\'); 
	
	// Add the page:
	$url .= '/' . $page; 
	
	// Redirect the user:
	header("Location: $url");
	exit(); // Quit the script.

} // End of redirect_user() function.


/* This function validates the form data (the email address/username and password).
 * If both are present, the database is queried.
 * The function requires a database connection.
 * The function returns an array of information, including:
 * - a TRUE/FALSE variable indicating success
 * - an array of either errors or the database result
 */

 //This is checking LOGIN for admin
function check_login_admin($conn, $username = '', $pass = '') {

	$errors = array(); // Initialize error array.

	// Validate the email address:
	if (empty($username)) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$u = mysqli_real_escape_string($conn, trim($username)); 
	}

	// Validate the password:
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($conn, trim($pass));
	}

	if (empty($errors)) { // If everything's OK.

		// Retrieve the user_id and first_name for that email/password combination:
		$q = "SELECT Admin_ID, Admin_username, Admin_fname FROM admin1 WHERE Admin_username='$u' AND Admin_password='$p'";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		
		// Check the result:
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
			// Return true and the record:
			return array(true, $row);
			
		} else { // Not a match!
			$errors[] = 'The username and password entered do not match those on file.';
		}
		
	} // End of empty($errors) IF.
	
	// Return false and the errors:
	return array(false, $errors);

} // End of check_login() function.

 //This is checking LOGIN for user
function check_login($conn, $username = '', $pass = '') {

	$errors = array(); // Initialize error array.

	// Validate the username:
	if (empty($username)) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$u = mysqli_real_escape_string($conn, trim($username)); 
	}

	// Validate the password:
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($conn, trim($pass));
	}

	if (empty($errors)) { // If everything's OK.

		// Retrieve the user_id and first_name for that email/password combination:
		$q = "SELECT user_id, user_username, user_fname FROM users WHERE user_username='$u' AND user_pass='$p'";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		
		// Check the result:
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
			// Return true and the record:
			return array(true, $row);
			
		} else { // Not a match!
			$errors[] = 'The username and password entered do not match those on file.';
		}
		
	} // End of empty($errors) IF.
	
	// Return false and the errors:
	return array(false, $errors);

} // End of check_login() function.

 //This is checking LOGIN for foodstalls
 function check_login_foodstall($conn, $username = '', $pass = '') {

	$errors = array(); // Initialize error array.

	// Validate the username:
	if (empty($username)) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$u = mysqli_real_escape_string($conn, trim($username)); 
	}

	// Validate the password:
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($conn, trim($pass));
	}

	if (empty($errors)) { // If everything's OK.

		// Retrieve the user_id and first_name for that email/password combination:
		$q = "SELECT fs_owner_id, fs_owner_username, fs_owner_name, fs_owner_password FROM foodstallowner owner WHERE fs_owner_username='$u' AND fs_owner_password='$p'";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		
		// Check the result:
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
			// Return true and the record:
			return array(true, $row);
			
		} else { // Not a match!
			$errors[] = 'The username and password entered do not match those on file.';
		}
		
	} // End of empty($errors) IF.
	
	// Return false and the errors:
	return array(false, $errors);

} // End of check_login_foodstall() function.