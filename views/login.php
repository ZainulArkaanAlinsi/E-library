<?php

session_start();
require_once '../helpers/auth_helper.php';
requireGuest();


$errorMessage = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    $errorMessage = $authController->login($_POST['phone'], $_POST['password']);
}

include 'partials/header.php'; // Include the header file for the login page 
?>

<main class="class=" bg-light d-flex flex-column justify-content-center align-items-center vh-100">

    <div class="bg-white p-5 shadow rounded-5  d-flex flex-column gap-3 w-100" style="max-width: 400px;">
        <h1 class="text-center fw-bald fet-italic text-primary">Login</h1>
        <form METHOD="POST" class="gap-1">`
            <?php
            if (!empty($errorMessage)) {
            ?> <p><?php echo $errorMessage ?></p><?php } ?>

            <div class="form-floating mb-3">
                <input type="tel" name="phone" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg position-relative">
                    <span class="spinner-border spinner-border-sm me-2 d-none" role="status" id="loadingSpinner"></span>
                    Login
                </button>
                <p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
            </div>
    </div>

    </div>
</main>


<?php
include 'partials/footer.php'; // Include the footer file for the login page
?>

<!-- Kode JavaScript untuk menampilkan spinner saat form di submit -->
<script>
    const form = document.querySelector('form');
    const spinner = document.getElementById('loadingSpinner');

    form.addEventListener('submit', function(e) {
        // Tampilkan spinner
        spinner.classList.remove('d-none');

        // Nonaktifkan tombol selama loading
        this.querySelector('button[type="submit"]').disabled = true;

        // Proses form submission...
        // Setelah selesai, sembunyikan spinner dan aktifkan kembali tombol
    });
</script>