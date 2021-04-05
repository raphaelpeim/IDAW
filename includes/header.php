<?php
    if (isset($_COOKIE['IMMUserId']))
        include_once('navigation.php');
?>

<header class="masthead" <?php echo 'style="background-image: url(\'img/background.jpg\')"'; ?> >
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php echo $headerContent[$pageName][0]; ?></h1>
                    <span class="subheading"><?php echo $headerContent[$pageName][1]; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>