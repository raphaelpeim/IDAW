<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php
      include_once('includes/head.php');

      $foodPaging = $sqli->query("SELECT COUNT(*) as quantity FROM `food`");
      $foodPaging = $foodPaging->fetch_assoc();
    ?>
  </head>

  <body>
    <?php
      include_once('includes/header.php');
    ?>

    <div class="container" id="diaryContainer">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <table class="table table-striped table-dark">
            <thead>
                  <tr>
                    <th scope="col">
                      <a href="diary.php#diaryFormContainer"><img src="img/add.png" id="addButton"/></a>
                    </th>
                    <th scope="col">Aliment</th>
                    <th scope="col">Date</th>
                  </tr>
            </thead>
            <tbody id="diaryTBody">
            </tbody>
          </table>

          <div id="diaryNav">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group mr-2" role="group" aria-label="first group">
                <?php
                  for ($i = 0; $i < ceil($diaryPaging['quantity']/$rowsNumber); $i++) {
                    echo '
                      <a href="diary.php?page=' . ($i+1) . '">
                        <button type="button" class="diaryButton"';
                       
                    if (!$_GET['page'] && $i == 0 || ($i+1) == $_GET['page']) 
                      echo 'id="diaryButtonActive"';
                      
                    echo '
                        >' . ($i+1) . '</button>
                      </a>
                    ';
                  }
                ?>
              </div>
            </div>
          </div><br />

          <div class="card text-center"  id="diaryFormContainer">
            <div class="card-header"></div>
              <div class="card-body">
                <form id="diaryForm" onsubmit="onFormSubmit()">
                  <h1>Mettre à jour votre journal</h1><br />

                  <div id="error" style="color:red;"></div><br />

                  <div class="form-group row">
                    <label for="food" class="col-sm-3 col-form-label" style="text-align:left;">Aliment</label>
                    <div class="col-sm-9">
                      <select class="custom-select" name="food" required>
                        <option value="">Aliment</option>

                        <?php
                          foreach ($categories as $category) {
                            $foodByCategory = $sqli->query(
                              " SELECT * 
                                FROM `food` 
                                WHERE `category` = '" . $category . "' 
                                ORDER BY `category`, `name` "
                            );
                            
                            echo '<option disabled></option>
                                  <option disabled>- ' . $category .' -</option>';

                            while ($item = $foodByCategory->fetch_assoc()) {
                              echo '<option value="' . $item['id'] . '"';
                              
                              echo '>' . $item['name'] . '</option>';
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="quantity" class="col-sm-3 col-form-label" style="text-align:left;">Quantité</label>
                    <div class="col-sm-9">
                      <input 
                        type="text" 
                        class="form-control" 
                        name="quantity"
                        placeholder="Quantité (g)" 
                        pattern="^[0-9]+$"
                        required
                      >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label" style="text-align:left;">Date</label>
                    <div class="col-sm-9">
                      <input 
                        type="text" 
                        class="form-control" 
                        name="date"
                        placeholder="Date (AAAA-MM-JJ)" 
                        pattern="^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$"
                        required
                      >
                    </div>
                  </div><br />

                  <input class="btn btn-primary" type="submit" id="diaryButton" value="Ajouter" /><br /><br />
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
