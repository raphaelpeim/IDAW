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

    <div class="container" id="profileUpdateContainer">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card text-center">
            <div class="card-header"></div>
              <div class="card-body" id="profileInfo">
                <div id="error" style="color:red;"></div><br />

                <form id="profileUpdateForm" onsubmit="onFormSubmit();">
                  <div class="form-group row">
                    <label for="userfile" class="col-sm-3 col-form-label" style="text-align:left;">Photo</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="userfile">
                    </div>
                  </div>

                  <?php
                    foreach ($userInformationInputs as $key => $value) {
                      echo '
                        <div class="form-group row">
                          <label for="' . $key . '" class="col-sm-3 col-form-label" style="text-align:left;">' . $value . '</label>
                          <div class="col-sm-9">
                            <input 
                              type="text" 
                              class="form-control" 
                              name="' . $key . '"';
                        
                      echo empty($_POST) ? 'value="' . $_SESSION[$key] . '"' : 'value="' . $_POST[$key] . '"';

                      echo '
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
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe (non requis)">
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label for="passwordAgain" class="col-sm-3 col-form-label" style="text-align:left;">Confirmation</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Mot de passe">
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

                        foreach ($value[1] as $value2) {
                          echo '
                            <div class="form-check" style="text-align:left;">
                              <input 
                                class="form-check-input" 
                                type="radio" 
                                name="' . $key . '"
                                value="' . $value2 . '"';
                              
                          if (empty($_POST) && $_SESSION[$key] == $value2 || !empty($_POST) && $_POST[$key] == $value2)
                            echo 'checked';
                              
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

                  <input class="btn btn-primary" type="submit" value="Modifier" /><br /><br />
                  <a href="profile.php#profileContainer">Retour</a>
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
