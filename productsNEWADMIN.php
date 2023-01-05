<?php 
$db = mysqli_connect("localhost", "root", "", "magapon");

if(isset($_POST['upload']))
{
    $target = "imagesupload/".basename($_FILES['image']['name']);

    $db = mysqli_connect("localhost", "root", "", "magapon");

    $F_NAME = $_POST['F_NAME'];
    $F_PRICE = $_POST['F_PRICE'];
    $F_TYPE = $_POST['F_TYPE'];
    $F_DESCRIPTION = $_POST['F_DESCRIPTION'];
    $image = $_FILES['image']['name'];


    $sql = "INSERT INTO foodstalls (F_NAME, F_PRICE, F_DESCRIPTION, F_TYPE, images) VALUES ('$F_NAME' , '$F_PRICE' , '$F_DESCRIPTION' , '$F_TYPE' , '$image')";
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

if(isset($_GET['delid']))
{
    $rid=intval($_GET['delid']);
    $profilepic=$_GET['ppic'];
    $ppicpath="imagesupload"."/".$profilepic;
    $sql=mysqli_query($db,"delete from foodstalls where FOOD_ID=$rid");
    unlink($ppicpath);
    echo "<script>alert('Data deleted');</script>"; 
    echo "<script>window.location.href = 'productsNEWADMIN.php'</script>";     
} 
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>MAGAPON: MONTEKI FISHING ECO RANGE WEBSITE</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/tweaked.css">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">MAGA<em>PON</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="Ranking_List.php">RANKING</a></li>
                            <li><a href="Announcement_Page_User.php">ANNOUNCEMENT</a></li>
                            <li><a href="productsNEWUSER.php">FOOD</a></li>
                            <li><a href="contactNEW.php">Contact</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>MENU
                            </em></h2>
                        <p>A Variety Of Delicacies Prepared And Served By the Selected Food Stalls</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <section class="section" id="contact-us-new" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="contact-form section-bg">
                    <form id="contact" action="productsNEWADMIN.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset>
                                    <input name="F_NAME" type="text" id="F_NAME" placeholder="Food Name*" required="">
                                </fieldset>
                            </div>
                            <div class="col-sm-12">
                                <fieldset>
                                    <input name="F_PRICE" type="text" id="F_PRICE" placeholder="Food Price*"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-sm-12">
                                <fieldset>
                                    <select name="F_TYPE" id="F_TYPE">
                                        <option value="FOOD">FOOD</option>
                                        <option value="BEVERAGES">BEVERAGES</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="F_DESCRIPTION" rows="6" id="F_DESCRIPTION"
                                        placeholder="Description*" required=""></textarea>
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
                                    <button type="submit" id="form-submit" class="main-button"
                                        name="upload">Submit</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>FOOD
                                <hr class="opacity-50">
                            </em></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Fleet Starts ***** -->
    <div class="center">
        <section class="section" id="trainers">
            <div class="container">
                <br>
                <?php 
                    include "mysqli_connect_MAGAPON.php";
                    $sql = "SELECT * FROM foodstalls WHERE F_TYPE='FOOD'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result))
                    {  
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <?php
                                    echo "<img src= 'imagesupload/" .$row['images']. "'>";
                                ?>
                            </div>
                            <div class="down-content">
                                <span>
                                    <sup>RM</sup><?php echo $row["F_PRICE"]; ?>
                                </span>
                                <h4><?php echo $row["F_NAME"]; ?></h4>
                                <p><?php echo $row["F_DESCRIPTION"]; ?></p>
                                <input type="hidden" name="FS_ID" value="<?php echo $id; ?>">
                                <ul class="social-icons">
                                    <li><a href="productUPDATE.php?id=<?php echo $row['FS_ID']; ?>">Edit</a></li>
                                    <li><a href="productsNEWADMIN.php?delid=<?php echo ($row['FS_ID']);?>&&ppic=<?php echo $row['images'];?>"
                                            class="delete" title="Delete" data-toggle="tooltip"
                                            onclick="return confirm('Do you really want to Delete ?');">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <!-- ***** Fleet Ends ***** -->
    <div class="center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>BEVERAGES
                                <hr class="opacity-50">
                            </em></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Fleet Starts ***** -->
    <div class="center">
        <section class="section" id="trainers">
            <div class="container">
                <br>
                <?php 
                    include "mysqli_connect_MAGAPON.php";
                    $sql2 = "SELECT * FROM foodstalls WHERE F_TYPE='BEVERAGES'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_array($result2))
                    {  
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trainer-item">
                            <div class="image-thumb">
                                <?php
                                    echo "<img src= 'imagesupload/" .$row2['images']. "'>";
                                ?>
                            </div>
                            <div class="down-content">
                                <span>
                                    <sup>RM</sup><?php echo $row2["F_PRICE"]; ?>
                                </span>
                                <h4><?php echo $row2["F_NAME"]; ?></h4>
                                <p><?php echo $row2["F_DESCRIPTION"]; ?></p>
                                <input type="hidden" name="FS_ID" value="<?php echo $id; ?>">
                                <ul class="social-icons">
                                    <li><a href="productUPDATE.php?id=<?php echo $row2['FS_ID']; ?>">Edit</a></li>
                                    <li><a href="productsNEWADMIN.php?delid=<?php echo ($row2['FS_ID']);?>&&ppic=<?php echo $row2['images'];?>"
                                            class="delete" title="Delete" data-toggle="tooltip"
                                            onclick="return confirm('Do you really want to Delete ?');">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <?php 
        include ('assets/footer.html');  
    ?>