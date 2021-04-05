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

    <div class="container" id="connectionContainer">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card text-center">
            <div class="card-header"></div>
              <div class="card-body" id="profileInfo">
                <form id="indexForm" onsubmit="onFormSubmit();">
                  <h1>Connexion</h1><br />
                  <div id="error" style="color:red;"></div><br />

                  <div class="form-group row">
                    <label for="pseudo" class="col-sm-3 col-form-label" style="text-align:left;">Pseudo</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label" style="text-align:left;">Mot de passe</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>
                  </div><br />

                  <input id="indexButton" class="btn btn-primary" type="submit" value="Se connecter" /><br /><br />
                  <a href="signup.php">S'inscrire</a>
                </form>
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
