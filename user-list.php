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


  include 'includes/header.php';
  include 'includes/navbar.php';

  if (isset($_SESSION['authenticated'])) : ?>
    <br><br><br>
    <table class="table table-striped" style="width: 85%; margin-left: auto;margin-right: auto;">
      <thead>
        <tr>
          <th>user_id</th>
          <th>user_fullname</th>
          <th>user_email</th>
          <th>user_phone</th>
          <th>user_role</th>
          <th></th>




        </tr>
      </thead>
      <tbody>
        <?php

        $users = new adminController();
        $result = $users->getdata();
        if ($result) {
          foreach ($result as $row) {
        ?>
            <tr>
              <td><?= $row['user_id'] ?></td>
              <td><?= $row['fullname'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['role'] ?></td>
              <td>
                <form action="codes/users-codes.php" method="POST">
                  <button type="submit" name="delete-btn" class="btn" value="<?= $row['user_id']; ?>" style="background-color:RGB(188, 36, 60);color:white;">Delete</button>
              </td>
              </form>

              <td>

                <button type="submit" class="btn btn-warning"><a class="edit" href="edit-user.php?user_id=<?= $row['user_id']; ?>">Edit</a></button>
              </td>



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
  <div class="mt-5 text-center"><button  class="btn btn-info profile-button" name="edit_btn" id="edit_btn" type="submit"><a style="text-decoration: none;color:white;" href="add-user.php">add Employee</a></button></div>


  <?php include 'includes/footer.php'; ?>

</body>

</html>