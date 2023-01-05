<?php 
session_start();
include('assets/header.php');
$db = mysqli_connect("localhost", "root", "", "magapon");

if(isset($_POST['post']))
{
    $target = "AnnouncementImage/".basename($_FILES['image']['name']);

    $db = mysqli_connect("localhost", "root", "", "magapon");

    $A_Title = $_POST['A_Title'];
    $A_Author = $_POST['A_Author'];
    $Event_Date = $_POST['Event_Date'];
    $A_Description = $_POST['A_Description'];
    $image = $_FILES['image']['name'];


    $sql = "INSERT INTO announcement (A_Title, A_Author, Event_Date, A_Description, A_Image) VALUES ('$A_Title' , '$A_Author' , '$Event_Date' , '$A_Description' , '$image')";
    mysqli_query($db, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
        $msg = "Image Uploaded";
    }
    else
    {
        $msg = "Not Uploaded";
    }
}

?>
<!-- ***** Header Area End ***** -->

<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/announcement_page.jpg)">
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

<!-- ***** Posting Section ***** -->
<section class="section" id="contact-us-new" style="margin-top: 0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="contact-form section-bg">
                <form id="contact" action="Announcement_Page_Admin.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset>
                                <input name="A_Title" type="text" id="A_Title" placeholder="Title" required="">
                            </fieldset>
                        </div>
                        <div class="col-sm-12">
                            <fieldset>
                                <input name="A_Author" type="text" id="A_Author" placeholder="Author" required="">
                            </fieldset>
                        </div>
                        <div class="col-sm-12">
                            <fieldset>
                                <input type="datetime-local" id="Event_Date" name="Event_Date"
                                    placeholder="Date Of Event">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="A_Description" rows="6" id="A_Description" placeholder="Description*"
                                    required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-sm-12">
                            <fieldset>
                                <input type="file" name="image">
                            </fieldset>
                        </div>
                        <div>
                            <input type="hidden" name="size" value="1000000">
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button" name="post">Post</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
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
                                class="fa fa-calendar"></i> <?php echo $row['Event_Date']; ?> &nbsp;|&nbsp; <i
                                class="fa fa-comments"></i> 15 comments</p>

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
                        <p><a href="blog-details.html"><?php echo $row['A_Title']; ?></a>
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