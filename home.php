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

    <div class="container">
      <div class="row">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">Catégorie</th>
              <th scope="col">Quantité (g)</th>
              <th scope="col">Calories (kcal)</th>
              <th scope="col">Lipides (g)</th>
              <th scope="col">Sodium (mg)</th>
              <th scope="col">Potassium (mg)</th>
              <th scope="col">Glucides (g)</th>
              <th scope="col">Protéines (g)</th>
            </tr>
          </thead>
          <tbody id="homeTBody">
          </tbody>
        </table>
      </div>
    </div>

    <hr>

    <?php
      include_once('includes/footer.php');
      include_once('includes/scripts.php');
    ?>
  </body>
</html>
