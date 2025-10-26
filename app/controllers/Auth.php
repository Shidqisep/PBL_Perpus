<?php

use App\services\AuthServices;

class Auth extends Controller {

    private $authService;

    public function __construct(AuthServices $authService) {
        $this->authService = $authService;
    }

    public function registerForm(){
        $this->view('register/index');
    }

    public function formLogin(){
        $this->view('login/index');
    }

    public function handleRegister(){
        try {
            $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nim' => $_POST['nim'],
                'email' => $_POST['email'],
                'jurusan' => $_POST['jurusan']
            ];
            $user = $this->authService->registerUser($data);

            Flasher::setFlash('Sukses', 'Registrasi, Silahkan tunggu konfirmasi admin', 'success');
            header('Location: /login');
            exit;

        } catch (\Exception $e ) {
            $error = $e->getMessage();
            Flasher::setFlash($error, 'Gagal Registrasi', 'danger');
            header('Location: /register');
            exit;
        }
    }

    public function handleLogin(){
        try{
            $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
            ];
        $user = $this->authService->login($data);

        Flasher::setFlash('Berhasil', 'login', 'success');
        header('location: /dashboard');
        exit;
        } catch(\Exception $e) {
             Flasher::setFlash($e->getMessage(), 'Gagal login', 'danger');
            header('Location: /auth/formLogin');
            exit;
        }
    }

    public function handleLogout(){
        session_unset();
        session_destroy();
        header('location: /auth/formLogin');
        exit;
    }
}