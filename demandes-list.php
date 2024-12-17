<?php
include_once 'controllers/adminController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <!-- Add your CSS links or styles here -->
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .edit {
      text-decoration: none;
      color: black;
    }

    .edit:hover {
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body>

  <?php
  include('config/app.php');
  include('codes/authentication.php');
  include 'codes/users-codes.php';

  include 'includes/header.php';
  include 'includes/navbar.php';

  if (isset($_SESSION['authenticated'])) : ?>
  
    <br><br><br>
    <h1 style=" margin-left: 30px;
  margin-right: auto;">Listes des Demandes</h1><br><br>
    <table class="table table-striped" cellspacing = 0 cellpadding = 10 style="width: 85%; margin-left: auto;margin-right: auto;">
      <thead>
        <tr>
          <th>demande_id</th>
          <th>type_projet</th>
          <th>montant_demande</th>
          <th>etat</th>
          <th>adress_projet</th>
          <th>genre</th>
          <th>besoin</th>
          <th>documents</th>
          <th>date_creation</th>
          <th></th>


        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION['auth_user']['user_id'];
        $demandes = new usersController();
        if ($_SESSION['auth_user']['user_role'] == 'employee') {
          $result = $demandes->getdemandes();
        } else {
          $result = $demandes->getYourDemandes($_SESSION['auth_user']['user_id']);
        }

        if ($result) {
          foreach ($result as $row) {
        ?>
            <tr>
              <td><?= $row['demande_id'] ?></td>
              <td><?= $row['type_projet'] ?></td>
              <td><?= $row['montant_demande'] ?></td>
              <?php
              if ($row['etat'] == 'refuser') {


              ?>
                <td><button class="btn btn-danger"> <?= $row['etat'] ?> </button> </td>
              <?php } elseif ($row['etat'] == 'accepter') {

              ?>
                <td> <button class="btn btn-success"> <?= $row['etat'] ?> </button> </td>
              <?php } else{

             ?>
               <td> <button class="btn btn-secondary"> <?= $row['etat'] ?> </button> </td>
              <?php } ?>

              <td><?= $row['adress_projet'] ?></td>
              <td><?= $row['genre'] ?></td>
              <td><?= $row['besoin'] ?></td>
              <td> <img style="width: 100px;height:50px;" href="<?php echo $row["documents"]; ?>"title="<?php echo $row['documents']; ?>" src="./assets/<?php echo $row["documents"]; ?>"title="<?php echo $row['documents']; ?>"><input style="display: block;" type="submit" value="Read PDF" name="readpdf" /></td>
              
              <td><?= $row['date_creation'] ?></td>
              <?php 
              if ($_SESSION['auth_user']['user_role'] == 'employee') {
              ?>
              <td><button type="submit" class="btn"><a href="edit-demande.php?demande_id=<?= $row['demande_id']; ?>"><i style="font-size:30px;color:darkcyan;" class="material-icons" style="font-size:36px;cursor:pointer;">remove_red_eye</i></a></button></td>
              <?php } ?>
            </tr>
        <?php
          }
        } else {
          echo 'No data found';
        }

        ?>
      </tbody>
    </table>
  <?php endif; ?>
<br><br><br>

  <?php include 'includes/footer.php'; ?>

</body>

</html>