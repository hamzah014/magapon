<?php
session_start(); // Start the session.
include('assets/header.php');
@include 'mysqli_connect_MAGAPON.php';

if (isset($_POST['Submit']))
{
     $errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['user_part_id'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your first name.
					 </div>';
	} else {
		$user_part_id = trim($_POST['user_part_id']);
	}
	
	// Check for a last name:
	if (empty($_POST['fish_weight'])) {
		$errors[] = '<div class="col-lg-6 col-md-7 col-12">
                     You forgot to enter your last name.
					 </div>';
	} else {
		$fish_weight = trim($_POST['fish_weight']);
	}

     if (empty($errors)) { 
	

		// Make the query:
		$q = "INSERT INTO ranking (user_part_id, fish_weight) VALUES ('$user_part_id' , '$fish_weight')";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		if ($r) { // If it ran OK.

			header("Location: Ranking_List.php");
            exit();
						

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
		
	} 
}

else if(isset($_POST['Delete']))
{
    $sql=mysqli_query($conn,"truncate ranking");
    header("Location: Ranking_List.php");
    exit();
}
?>


<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/MackeralFish.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Participants <em>Ranking</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <br>
        <br>
            <?php echo "Date:" . date("Y-m-d") . ""; ?>
            &nbsp;&nbsp;&nbsp;
            &nbsp;
            <?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
            <?php echo "Time:" . date("h:i:sa") . "<br>"; ?>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="table-Primary">
                        <tr>
                            <th scope="col">Participants ID</th>
                            <th scope="col">Fish Weight (KG)</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        <?php 
                                        include "mysqli_connect_MAGAPON.php";
                                        $sql = "SELECT user_part_id, fish_weight FROM ranking ORDER BY fish_weight DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result))
                                        {  
                                        ?>
                        <?php echo "<tr><td>" . $row["user_part_id"] . "</td><td>" . $row["fish_weight"] . "</td></tr>";
                                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <a href="pdf.php" class="btn btn-danger">Invoice PDF</a>
            </div>
        </div>
    </div>
    <br>
</section>
<?php
include('assets/footer.html');
?>