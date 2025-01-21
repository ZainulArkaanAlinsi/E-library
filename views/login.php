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
<main class="bg-light min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow rounded-4 p-4" style="width: 360px;">
        <div class="text-center">
            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                <img src="../assets/buku eq.jpg" alt="Web Dev Logo" class="w-100 h-100 rounded-circle d-flex align-items-center ">
            </div>
            <h4 class="mb-1">Welcome User</h4>
            <p class="text-muted small mb-4"> to warehouse of knowledge books</p>
        </div>

        <form METHOD="POST" class="gap-1">
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
            <button type="submit" class="btn btn-primary btn-lg text-white w-100 py-2 rounded-3 mb-3">
                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" id="loadingSpinner"></span>Login</button>

            <div class="text-muted small text-center">
                Forgot password? or <a href="register.php" class="text-info text-decoration-none">Register</a>
            </div>
        </form>
    </div>
</main>



<?php
include 'partials/footer.php'; // Include the footer file for the login page
?>

Kode JavaScript untuk menampilkan spinner saat form di submit
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