<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Add your CSS links or styles here -->
    <link rel="stylesheet" href="/assets/css/my-profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
   form{
    margin-left: 600px;
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
    ?>
    <?php if ((isset($_SESSION['authenticated'])) && ($_SESSION['auth_user']['user_role'] == 'user'))  : ?>


        <form action="" method="post" style="justify-content: center;" autocomplete="off" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="type_projet">type_projet</label>
                    <input type="type_projet" class="form-control" id="type_projet" name="type_projet" placeholder="type_projet">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="montant_demande">montant_demande</label>
                    <input type="text" class="form-control" id="montant_demande" name="montant_demande" placeholder="montant_demande">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-5">
                <label for="besoin">besoin</label>
                <input type="text" class="form-control" id="besoin" name="besoin" placeholder="besoin">
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-5">
                <label for="adress_projet">adress_projet</label>
                <input type="text" class="form-control" id="adress_projet" name="adress_projet" placeholder="adress_projet">
            </div>
            </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="genre">genre</label>
                    <select name="genre" id="genre">
                        <option value="">choisir</option>
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="documents">documents</label>
                    <input type="file"  class="form-control"  name="documents" id="documents" accept=".jpg, .jpeg, .png, .pdf"> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="date_creation">date_creation</label>
                    <input type="date" class="form-control" name="date_creation" id="date_creation" >
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="add_demande" id="add_demande">ajouter votre demande</button>
        </form>
    <?php endif; ?>
    <?php include 'includes/footer.php'; ?>
</body>

</html>