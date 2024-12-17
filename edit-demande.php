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
        form {
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
    <?php if ((isset($_SESSION['authenticated'])) && ($_SESSION['auth_user']['user_role'] == 'employee')) : ?>

        <?php

        if (isset($_GET['demande_id'])) {

            $demande_id = validateInput($db->conn, $_GET['demande_id']);
            $demande = new usersController();
            $result = $demande->editDemande($demande_id);
            if ($result) {
        ?>
                <form action="" method="post" style="justify-content: center;">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="type_projet">type_projet</label>
                            <input disabled type="type_projet" class="form-control" id="type_projet" name="type_projet" value="<?= $result['type_projet'] ?>" placeholder="type_projet">
                        </div>

                    </div>
                    <div class="form-row">
    <div class="form-group col-md-5">
        <label for="montant_demande">montant_demande </label>
        <input disabled type="range" min="0" max="5000" id="montant_demande" name="montant_demande" value="<?= $result['montant_demande'] ?>" placeholder="montant_demande">
        <span id="rangeValue" style="display: none;"></span>(<?= $result['montant_demande'] ?>) Dt
    </div>
</div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="besoin">besoin</label>
                            <input disabled type="text" class="form-control" id="besoin" name="besoin" value="<?= $result['besoin'] ?>" placeholder="besoin">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="adress_projet">adress_projet</label>
                            <input disabled type="text" class="form-control" id="adress_projet" name="adress_projet" value="<?= $result['adress_projet'] ?>" placeholder="adress_projet">
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="genre">genre</label>
                            <input type="text"  disabled value="<?= $result['genre'] ?>" name="genre" id="genre">
                         

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="documents">documents</label>
                            <td>
                                <a href=><img style="width: 250px; height: 200px; cursor: pointer;" src="<?php echo $result["documents"]; ?>" ></a>
                            </td>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="date_creation">date_creation</label>
                            <input disabled type="date" class="form-control" value="<?= $result['date_creation'] ?>" name="date_creation" id="date_creation">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="acceptBtn" id="add_demande">accepter</button>
                    <button type="submit" class="btn btn-danger" name="refuseBtn" id="add_demande">Refuser</button>

                </form>
                <br><br><br>
        <?php
            } else {
                echo 'no data found';
            }
        } else {
            echo 'something wrong';
        }



        ?>

    <?php endif; ?>
    <?php include 'includes/footer.php'; ?>
    <script>
    function openImage(imageUrl) {
        window.open(imageUrl, '_blank');
    }
</script>

<script>
    const rangeInput = document.getElementById('montant_demande');
    const rangeValueDisplay = document.getElementById('rangeValue');

    rangeInput.addEventListener('input', function() {
        rangeValueDisplay.textContent = this.value;
        rangeValueDisplay.style.display = 'inline'; // Show the value when updated
    });

    // Hide the value display when mouse leaves the range input
    rangeInput.addEventListener('mouseleave', function() {
        rangeValueDisplay.style.display = 'none';
    });
</script>
</body>

</html>