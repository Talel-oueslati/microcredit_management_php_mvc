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
    <link rel="stylesheet" href="/assets/css/my-profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php
    include('config/app.php');
    include('codes/users-codes.php');

    include 'includes/header.php';
    include 'includes/navbar.php';
    if (isset($_SESSION['authenticated'])) : ?>

    
    <?php 
    
    if(isset($_GET['user_id'])) {

        $user_id = validateInput($db->conn, $_GET['user_id']);
        $user = new adminController();
        $result = $user->edit($user_id);
        if ($result) {
    ?>
            <form action="" method="post">

                <div class="container rounded bg-white mt-5 mb-6">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></span><span class="text-black-50"></span><span> </span></div>
                        </div>

                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Informations</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">user_id</label><input type="text" class="form-control" placeholder="" id="user_id" name="user_id" value="<?=$result['user_id']?>"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Fullname</label><input type="text" class="form-control" placeholder="first name" id="fullname" name="fullname" value="<?= $result['fullname']?>"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone" id="phone" placeholder="r" value="<?=$result['phone']?>"></div>
                                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email" id="email" placeholder="" value="<?=$result['email']?>"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Tunisie</label><input type="text" class="form-control" placeholder="tunisie" value="tunisie" disabled></div>
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-warning profile-button" name="edit_btn" id="edit_btn" type="submit">Edit User</button></div>
                            </div>
                        </div>

                    </div>
            </form>

    <?php
        } else {
            echo 'no data found';
        }
    } else {
        echo 'something wrong';
    }


    ?>
    <?php endif; ?>


    </div>
    </div>
    </div>
    <?php include 'includes/footer.php'; ?>

</body>

</html>