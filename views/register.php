<?php

session_start();
require_once '../helpers/auth_helper.php';
requireGuest();

$errorMessage = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    $errorMessage = $authController->register($_POST['name'], $_POST['phone'], $_POST['password'], $_POST['address']);
}

include 'partials/header.php'; // Include the header file for the login page
?>

<!-- <div class="container mt-5">
    <h1 class="text-center">REGISTER</h1>
    <form method="POST" class="mt-4">

        <?php
        if (!empty($errorMessage)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage ?>
            </div>
        <?php
        }
        ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="Name" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" placeholder="Address" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
</div> -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center mb-4">REGISTER</h1>
            <form method="POST" class="mt-4 p-5 bg-light rounded shadow">
                <?php if (!empty($errorMessage)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $errorMessage ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control form-control-lg placeholder col-12 bg-secondary" name="name" placeholder="Name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control form-control-lg placeholder col-12 bg-secondary " name="phone" placeholder="Phone" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control form-control-lg placeholder col-12 bg-secondary" name="password" placeholder="Password" required>
                </div>

                <div class="form-group mb-4">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control form-control-lg placeholder col-12 bg-secondary" name="address" placeholder="Address" required>
                </div>


                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg position-relative">
                        <span class="spinner-border spinner-border-sm me-2 d-none" role="status" id="loadingSpinner"></span>
                        Register
                    </button>
                    <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
                </div>
        </div>

        </form>
    </div>
</div>
</div>

<?php
include 'partials/footer.php'; // Include the footer file for the login page
?>

<script>
    const form = document.querySelector('form');
    const spinner = document.querySelector('#loadingSpinner');
    const submitButton = document.querySelector('button[type="submit"]');

    form.addEventListener('submit', function(e) {
        spinner.classList.remove('d-none');
        submitButton.disabled = true;
    });
   

</script>