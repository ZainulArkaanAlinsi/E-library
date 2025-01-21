<?php

require_once '../models/User.php';

class AuthController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register($name, $phone, $password, $address)
    {
        // Validate the inputs
        if (empty($name) || empty($phone) || empty($password) || empty($address)) {
            return "All fields are required";
        }


        // check if phone is registered 
        if ($this->userModel->getUserByPhone($phone)) {
            return "Phone number is already registered";
        }

        $user = $this->userModel->register($name, $phone, $password, $address);

        if ($user) {
            //REGISTRASI BERHASIL
            $LoggedUser = $this->userModel->getUserByPhone($phone);
            session_Start();
            $_SESSION['user'] = $LoggedUser;
            header('location: ../views/dashboard.php');
            exit();
        } else {
            //REGISTRASI GAGAL
            return "Registration failed";
        }
    }



    public function logout()
    {
        session_start();
        session_destroy();
        header('location: ../views/login.php');
        exit();
    }



    public function login($phone, $password)
    {
        $user = $this->userModel->login($phone, $password);


        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('location: ../views/dashboard.php');
            exit();
        }
        return "Invalid phone or password";
    }
}
