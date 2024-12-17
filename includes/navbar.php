<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    nav {
      position: fixed;
    }

    .dropdown {
      float: right;

    }

    .element {
      color: aliceblue;
      text-decoration: none;
      padding: 10px;
      text-decoration: none;
      background-color: rgba(0, 0, 2, 0.1);
      /* Semi-transparent black background */
      border-radius: 5px;
      backdrop-filter: blur(9px);
      /* Apply blur effect */

    }

    .element:hover {
      color: #48D1CC;
      text-decoration: none;
    }

    .horizontal-list {
      list-style: none;
      /* Remove default list style */
      padding: 0;
      margin-bottom: -10px;
      /* Remove default padding */
    }

    .horizontal-list li {
      display: inline-block;
      /* Display list items horizontally */
      margin-right: 10px;
      /* Adjust spacing between list items */
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Gdemandes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php if ((isset($_SESSION['authenticated'])) && ($_SESSION['auth_user']['user_role'] == 'admin')) : ?>

          <ul class="horizontal-list" style="margin-top:5px;">
            <li><a class="element" href="<?= base_url('user-list.php') ?>">Liste Des Utilisateurs</a></li>
          </ul>
          <div class="dropdown" style="margin-left:800px;">
            <button class="btn btn-info dropdown-toggle btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_fullname'] . " " .  $_SESSION['auth_user']['user_id']; ?> </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="<?= base_url('my-profile.php') ?>">My Profile</a></li>
              <li>
                <form action="" method="POST">

                  <button type="submit" class="dropdown-item" name="logout_btn">LogOut</button>

                </form>
              </li>
            </ul>
          </div>

        <?php elseif ((isset($_SESSION['authenticated'])) && ($_SESSION['auth_user']['user_role'] == 'employee')) : ?>

          <ul class="horizontal-list" style="margin-top:5px;">
            <li><a class="element" href="<?= base_url('dashboard.php') ?>">Dashboard</a></li>
            <li><a class="element" href="<?= base_url('demandes-list.php') ?>">Liste des demandes</a></li>
          </ul>
          <div class="dropdown" style="margin-left:700px;">
            <button class="btn btn-info dropdown-toggle btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_fullname'] . " " . $_SESSION['auth_user']['user_id']; ?> </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="<?= base_url('my-profile.php') ?>">My Profile</a></li>
              <li>
                <form action="" method="POST">

                  <button type="submit" class="dropdown-item" name="logout_btn">LogOut</button>

                </form>
              </li>
            </ul>
          </div>

        <?php elseif ((isset($_SESSION['authenticated'])) && ($_SESSION['auth_user']['user_role'] == 'user')) : ?>
          <ul class="horizontal-list" style="margin-top:5px;">
           
            <li><a class="element" href="<?= base_url('add-demandes.php') ?>">Ajouter Demmande</a></li>
            <li><a class="element" href="<?= base_url('demandes-list.php') ?>">Listes de demandes</a></li>

          </ul>

          <div class="dropdown" style="margin-left:700px;">
            <button class="btn btn-info dropdown-toggle btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_fullname'] . " " . $_SESSION['auth_user']['user_id']; ?> </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="<?= base_url('my-profile.php') ?>">My Profile</a></li>
              <li>
                <form action="" method="POST">

                  <button type="submit" class="dropdown-item" name="logout_btn">LogOut</button>

                </form>
              </li>
            </ul>
          </div>


        <?php else : ?>
          <a class="nav-item nav-link active" href="<?= base_url('login.php') ?>">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="<?= base_url('register.php') ?>">Register</a>
      </div>
    </div>
  <?php endif; ?>
  </nav>
</body>

</html>