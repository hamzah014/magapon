<?php
include ('assets/header.php'); 
@include 'mysqli_connect_MAGAPON.php';

// Print any error messages, if they exist:
    if (isset($errors) && !empty($errors)) {
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p>';
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
                    <h2>Login and <em>Registration</em></h2>
                    <p>Login for participants, foodstall owners and admin in one page for simplicity</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Our Classes Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fa fa-user"></i> Participants</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-cutlery"></i> Foodstalls</a></a></li>
                    <li><a href='#tabs-3'><i class="fa fa-server"></i> Admin</a></a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <h4>Participants Login</h4>
                        <form action="login.php" method="post" class="contact-form" data-aos="fade-up"
                            data-aos-delay="300" role="form">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h5>Username: </h5>
                                    <br>
                                    <input type="text" class="form-control" name="username" placeholder="Username">

                                </div>

                                <div class="col-lg-6 col-12">
                                    <h5>Password: </h5>
                                    <br>
                                    <p><input type="password" class="form-control" name="pass" placeholder="password">
                                    </P>

                                </div>

                                <div class="col-lg-5 mx-auto col-7">
                                    <button type="submit" class="form-control" id="submit-button"
                                        name="Login"><b>LOGIN</b></button>
                                </div>
                            </div>
                        </form>
                    </article>
                    <article id='tabs-2'>
                        <h4>Foodstall Login</h4>
                        <form action="login_foodstall.php" method="post" class="contact-form" data-aos="fade-up"
                            data-aos-delay="300" role="form">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h5>Username: </h5>
                                    <br>
                                    <input type="text" class="form-control" name="username_food" placeholder="Username">

                                </div>

                                <div class="col-lg-6 col-12">
                                    <h5>Password: </h5>
                                    <br>
                                    <p><input type="password" class="form-control" name="pass_food" placeholder="password">
                                    </P>

                                </div>

                                <div class="col-lg-5 mx-auto col-7">
                                    <button type="submit" class="form-control" id="submit-button"
                                        name="Login"><b>LOGIN</b></button>
                                </div>
                            </div>
                        </form>
                    </article>
                    <article id='tabs-3'>
                        <h4>Admin Login</h4>
                        <form action="login_admin.php" method="post" class="contact-form" data-aos="fade-up"
                            data-aos-delay="300" role="form">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h5>Username: </h5>
                                    <br>
                                    <input type="text" class="form-control" name="username_admin" placeholder="Username">

                                </div>

                                <div class="col-lg-6 col-12">
                                    <h5>Password: </h5>
                                    <br>
                                    <p><input type="password" class="form-control" name="pass_admin" placeholder="password">
                                    </P>

                                </div>

                                <div class="col-lg-5 mx-auto col-7">
                                    <button type="submit" class="form-control" id="submit-button"
                                        name="Login"><b>LOGIN</b></button>
                                </div>
                            </div>
                        </form>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Our Classes End ***** -->

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action"
    style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <h2>Participants <em>Registration</em></h2>
                    <p>For participants who has not made an account, they can click the button below to redirect to the registration page</p>
                    <div class="main-button">
                        <a href="MAGAPON_REGISTRATION_PAGE.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<?php 
        include ('assets/footer.html');  
    ?>