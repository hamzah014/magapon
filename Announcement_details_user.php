<?php 
session_start();
include ('assets/header.php'); 
include "mysqli_connect_MAGAPON.php";
$AID = $_GET['id'];

?>
<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/announcement_page.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>EVENT <em>DETAILS</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <section class='tabs-content'>
            <?php                
                $sql = "SELECT * FROM announcement WHERE AID='$AID'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result))
                {  
            ?>
            <article>
                <h4><?php echo $row['A_Title']; ?></h4>

                <p><i class="fa fa-user"></i> <?php echo $row['A_Author']; ?> &nbsp;|&nbsp; <i
                        class="fa fa-calendar"></i> <?php echo $row['Event_Date']; ?> 

                <div>
                    <?php
                             echo "<img src= 'AnnouncementImage/" .$row['A_Image']. "' width='1920' height='700'>";
                        ?>
                </div>

                <br>

                <p><?php echo $row['A_Description']; ?></p>

                <ul class="social-icons">
                    <li>Share this:</li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
            </article>
            <?php } ?>
        </section>

        <br>
        <br>
        <br>

        <?php 
        if(isset($_POST['submit']))
            {
                $C_Name = $_POST['C_Name'];
                $C_Message = $_POST['C_Message'];
                $C_Date = date('Y-m-d');
                $AID = $_POST['id'];


                $sql1 = "INSERT INTO comment (AID, C_Name, C_Message, C_Date) VALUES ('$AID' , '$C_Name' , '$C_Message' , '$C_Date')";
                mysqli_query($conn, $sql1);

                header("location: Announcement_Page_Admin.php");

            }
        
        ?>

        <section class='tabs-content'>
            <div class="row">
                <div class="col-md-8">
                    <h4>Comments</h4>
                    <ul class="features-items">
                        <?php                
                            $sql2 = "SELECT * FROM comment WHERE AID='$AID'";
                            $result = mysqli_query($conn, $sql2);
                            while ($row = mysqli_fetch_array($result))
                            {  
                        ?>
                        <li class="feature-item" style="margin-bottom:15px;">
                            <div class="right-content">
                                <h4><?php echo $row['C_Name']; ?> <small><?php echo $row['C_Date']; ?></small></h4>
                                <p><em>"<?php echo $row['C_Message']; ?>"</em>
                                </p>
                            </div>
                        </li>
                        <br>
                        <?php } ?>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4>Leave a comment</h4>
                    <div class="contact-form">
                        <form action="Announcement_details_user.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="C_Name" type="text" id="C_Name" placeholder="Your Name*"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="C_Message" rows="6" id="C_Message" placeholder="Message"
                                            required=""></textarea>
                                    </fieldset>
                                </div>
                                <input type="hidden" id="id" name="id" value="<?php echo $AID; ?>" />
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button"
                                            name="submit">Submit</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<!-- ***** Blog End ***** -->

<!-- ***** Footer Start ***** -->
<?php 
        
        include ('assets/footer.html');  
    ?>