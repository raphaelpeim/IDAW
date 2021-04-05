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

    <div class="container" id="signupContainer">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card text-center">
            <div class="card-header"></div>
              <div class="card-body" id="profileInfo">
                <form id="signupForm" onsubmit="onFormSubmit();">
                  <h1>Inscription</h1><br />
                  <div id="error" style="color:red;"></div><br />

                  <?php
                    foreach ($userInformationInputs as $key => $value) {
                      echo '
                        <div class="form-group row">
                          <label for="' . $key . '" class="col-sm-3 col-form-label" style="text-align:left;">' . $value . '</label>
                          <div class="col-sm-9">
                            <input 
                              type="text" 
                              class="form-control" 
                              name="' . $key . '" 
                              placeholder="' . $value . '" 
                              required
                            >
                          </div>
                        </div>
                      ';
                    }
                  ?>

                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label" style="text-align:left;">Mot de passe</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="passwordAgain" class="col-sm-3 col-form-label" style="text-align:left;">Confirmation</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="passwordAgain" placeholder="Mot de passe" required>
                    </div>
                  </div>

                  <?php
                    foreach ($userInformationRadio as $key => $value) {
                      echo '
                        <fieldset class="form-group">
                          <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0" style="text-align:left;">' . $value[0] . '</legend>
                            <div class="col-sm-9">
                      ';

                      $formNotSent = empty($_POST);

                      foreach ($value[1] as $value2) {
                        echo '
                          <div class="form-check" style="text-align:left;">
                            <input 
                              class="form-check-input" 
                              type="radio" 
                              name="' . $key . '" 
                              id="' . $key .'" 
                              value="' . $value2 . '"';
                            
                        if ($formNotSent)
                          echo 'checked';

                        $formNotSent = false;
                            
                        echo '
                            >
                            <label class="form-check-label" for="' . $key . '">
                              ' . $value2 . '
                            </label>
                          </div>
                        ';
                      }

                      echo '
                            </div>
                          </div>
                        </fieldset>
                      ';
                    }
                  ?>

                  <input id="signupButton" class="btn btn-primary" type="submit" value="S'inscrire" /><br /><br />
                  <a href="index.php">Se connecter</a>
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
