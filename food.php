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

    <div class="container" id="foodContainer">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <table class="table table-striped table-dark">
            <thead>
                  <tr>
                    <th scope="col">
                      <a href="food.php#foodFormContainer"><img src="img/add.png" id="addButton"/></a>
                    </th>
                    <th scope="col">Aliment</th>
                    <th scope="col">Catégorie</th>
                  </tr>
            </thead>

            <tbody id="foodTBody"></tbody>
          </table>

          <div id="foodNav">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group mr-2" role="group" aria-label="First group">
                <?php
                  for ($i = 0; $i < ceil($foodPaging['quantity']/$rowsNumber); $i++) {
                    echo '
                      <a href="food.php?page=' . ($i+1) . '">
                        <button type="button" class="foodButton"';
                       
                    if (!$_GET['page'] && $i == 0 || ($i+1) == $_GET['page']) 
                      echo 'id="foodButtonActive"';
                      
                    echo '
                        >' . ($i+1) . '</button>
                      </a>
                    ';
                  }
                ?>
              </div>
            </div>
          </div><br />

          <div class="card text-center"  id="foodFormContainer">
            <div class="card-header"></div>
              <div class="card-body" id="profileInfo">
                <form id="foodForm" onsubmit="onFormSubmit()" enctype="multipart/form-data">
                  <h1>Ajouter un aliment</h1><br />
                  
                  <div id="error" style="color:red;"></div><br />

                  <div class="form-group row">
                    <label for="userfile" class="col-sm-3 col-form-label" style="text-align:left;">Photo</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="userfile">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label" style="text-align:left;">Nom</label>
                    <div class="col-sm-9">
                      <input 
                        type="text" 
                        class="form-control" 
                        name="name"
                        placeholder="Nom"
                        pattern="^[A-Z]{1}.+$"
                        required
                      >
                    </div>
                  </div>

                  <?php
                    foreach($foodFormInputs as $key => $value) {
                      echo '<div class="form-group row">
                        <label for="' . $key . '" class="col-sm-3 col-form-label" style="text-align:left;">' . $value . '</label>
                        <div class="col-sm-9">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="' . $key . '"
                            placeholder="' . $value . '"
                            pattern="^[0-9]+(\.[0-9]+)?$"
                            required
                          >
                        </div>
                      </div>';
                    }
                  ?>

                  <div class="form-group row">
                    <label for="category" class="col-sm-3 col-form-label" style="text-align:left;">Catégorie</label>
                    <div class="col-sm-9">
                      <select class="custom-select" name="category" required>
                        <option value="">Catégorie</option>

                        <?php
                          foreach ($categories as $category) {
                            echo '<option value="' . $category . '">' . $category . '</option>';
                          }
                        ?>
                      </select>
                    </div>
                  </div><br />

                  <input class="btn btn-primary" type="submit" name="foodButton" value="Ajouter" /><br /><br />
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
