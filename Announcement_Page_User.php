<?php 
session_start();
include ('assets/header.php'); 
$db = mysqli_connect("localhost", "root", "", "magapon");

?>
<!-- ***** Header Area End ***** -->

<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>ANNOUNCE<em>MENT</em></h2>
                    <p>Where all the upcoming events and other news regarding Monteki Eco Fishing Range is being
                        announced</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Post View Section ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <?php 
                            include "mysqli_connect_MAGAPON.php";
                            $sql = "SELECT * FROM announcement ORDER BY AID DESC";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {  
                        ?>
                    <article>
                        <?php
                             echo "<img src= 'AnnouncementImage/" .$row['A_Image']. "' width='940' height='460'>";
                        ?>
                        <h4><?php echo $row['A_Title']; ?></h4>

                        <p><i class="fa fa-user"></i> <?php echo $row['A_Author']; ?> &nbsp;|&nbsp; <i
                                class="fa fa-calendar"></i> <?php echo $row['Event_Date']; ?> 
                            </p>

                        <p><?php echo $row['A_Description']; ?></p>
                        <div class="main-button">
                            <input type="hidden" name="AID" value="<?php echo $id; ?>">
                            <a href="Announcement_details_user.php?id=<?php echo $row['AID']; ?>">Continue Reading</a>
                        </div>
                    </article>
                    <br>
                    <br>
                    <?php } ?>
                </section>
            </div>

            <div class="col-lg-4">
                <h5 class="h5">Recent posts</h5>

                <ul>
                    <?php 
                            include "mysqli_connect_MAGAPON.php";
                            $sql = "SELECT * FROM announcement ORDER BY AID DESC";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {  
                        ?>
                    <li>
                        <p><a href="Announcement_details_user.php?id=<?php echo $row['AID']; ?>"><?php echo $row['A_Title']; ?></a>
                        </p>
                        <small><i class="fa fa-user"></i> <?php echo $row['A_Author']; ?> &nbsp;|&nbsp; <i
                                class="fa fa-calendar"></i>
                            <?php echo $row['Event_Date']; ?></small>
                    </li>

                    <li><br></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<!-- ***** Footer Start ***** -->
<?php 
        
        include ('assets/footer.html');  
    ?>