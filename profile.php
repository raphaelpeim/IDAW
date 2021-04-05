<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php
      include_once('includes/head.php');
    ?>
  </head>

  <body>
    <?php
      include_once('includes/header.php');
    ?>

    <div class="container" id="profileContainer">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card text-center">
            <div class="card-header"></div>
              <div class="card-body">
                <img id="profilePicture" src="img/profile/profile.png" />

                <h1 id="profileName"></h1><br />

                <dl id="profileInformation" class="row"></dl><br />
                
                <a href="profileUpdate.php#form"><input class="btn btn-primary" type="submit" value="Modifier" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <?php
      include_once('includes/footer.php');
      include_once('includes/scripts.php');
    ?>
  </body>
</html>
