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
                            <?php if(isset($_SESSION['user_id'])) {?>

                            <li><a href="Ranking_List_user.php">RANKING</a></li>
                            <li><a href="Announcement_Page_User.php">ANNOUNCEMENT</a></li>
                            <li><a href="productsNEWUSER.php">FOOD</a></li>
                            <li><a href="productsNEWCART.php">cart</a></li>
                            <li><a href="contactNEW.php">Contact</a></li>
                            <li><a href="logout.php">Logout</a></li>

                            <?php } 
                            elseif(isset($_SESSION['fs_owner_id'])) {
                            ?>

                            <li><a href="Ranking_List_user.php">RANKING</a></li>
                            <li><a href="Announcement_Page_User.php">ANNOUNCEMENT</a></li>
                            <li><a href="productsNEWADMIN.php">FOOD</a></li>
                            <li><a href="contactNEW.php">Contact</a></li>
                            <li><a href="logout_fs.php">Logout</a></li>

                            <?php } 
                             elseif(isset($_SESSION['Admin_ID'])) {
                            ?>
                            <li><a href="Ranking_List.php">RANKING</a></li>
                            <li><a href="Announcement_Page_Admin.php">ANNOUNCEMENT</a></li>
                            <li><a href="productsNEWUSERADMIN.php">FOOD</a></li>
                            <li><a href="productsNEWCARTADMIN.php">cart</a></li>
                            <li><a href="contactNEW.php">Contact</a></li>
                            <li><a href="logout_admin.php">Logout</a></li>
                            <?php }
                                else {
                            ?>

                            <li><a href="contactNEW.php">Contact</a></li>
                            <li><a href="Announcement_Page_User.php">ANNOUNCEMENT</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Login</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="MAGAPON_LOGIN_PAGE.php#tabs-1">Participants</a>
                                    <a class="dropdown-item" href="MAGAPON_LOGIN_PAGE.php#tabs-2">Foodstalls</a>
                                    <a class="dropdown-item" href="MAGAPON_LOGIN_PAGE.php#tabs-3">Admin</a>
                                    <a class="dropdown-item" href="MAGAPON_REGISTRATION_PAGE.php">Registration</a>
                                </div>
                            </li>
                            <?php }?>


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