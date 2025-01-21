<?php

session_start();

require_once '../helpers/auth_helper.php';
requireAuth();

$user = $_SESSION['user'];

if (isset($_POST['logout'])) {
    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    $authController->logout();
}
include 'partials/header.php'; // Include the header file for the dashboard page
?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold fs-3 text-primary" href="#">
            <img src="../assets/logo.jpg" alt="Logo" width="50" height="50" class=" rounded-circle d-inline-block align-text-top ">
            PERPUSTAKAAN
        </a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmLogout">
            Logout
        </button>

        <div class="modal fade" id="confirmLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to logout this account</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form method="POST">
                            <button type="submit" name="logout" class=" btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</nav>


<main class="row m-0">
    <!--- CAROSEL --->
    <div id="carouselExampleAutoplaying" class="carousel slide col-12 col-lg-8 p-0" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/buku_buku.jpg" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="../assets/buku_buku_2.jpg" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="../assets/buku_buku_3.jpg" class="d-block w-100" alt="Third slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="row  row-cols-2 rows-cols-lg-1 col-12 col-lg-4 p-0 m-0 ">
        <div class="col bg-primary d-flex  flex-column align-items-start justify-content-end fs-4">
            <h1>Welcome Admin bro, <?php echo $user['name']; ?></h1>
            <button class="btn btn-danger fs-4">Go to the Profile</button>
        </div>
        <div class="col bg-info fs-4">
            <h2>Welcome User bro , <?php echo $user['name']; ?></h2>
        </div>
    </div>
</main>





<!-- 
<h1>Dashboard</h1>
<h2>Welcome, <?php echo $user['name']; ?></h2> -->


<?php
include 'partials/footer.php'; // Include the footer file for the dashboard page
?>