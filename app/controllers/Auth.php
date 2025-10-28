<?php

use App\services\AuthServices;

class Auth extends Controller {

    public function registerForm(){
        $this->view('register/index');
    }

    public function index(){
        $this->view('login/index');
    }

    public function formLogin(){
        $this->view('login/index');
    }

    public function handleRegister(){
        try {

            if ($_POST['password'] != $_POST['confirmPassword']) {
                throw new Exception('Password tidak sama');
            }

            if (isset($_FILES['buktiKubaca'])) {
                $buktiKubaca =  uploadImage($_FILES['buktiKubaca'], 'storage/FotoBukti/');
            } else {
                throw new Exception('Mohon upload files');
            }


            $data = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'nomor_induk' => $_POST['nomor_induk'],
                'email' => $_POST['email'],
                'jurusan' => $_POST['jurusan'],
                'fotobukti' => $buktiKubaca,
                'suspend_count' => 0,
                'now' => date('Y-m-d H:i:s')
            ];

            if ($this->model('UserModel')->findUserByEmailorNomor_Induk($data['email'], $data['nomor_induk'])) {
                throw new Exception('Email atau NIM sudah terdaftar!');
            }
            

            $result = $this->model('UserModel')->createUser($data);
            if ($result <= 0) {
                throw new Exception('Something Went Wrong');
            }

            Flasher::setFlash('Sukses', 'Registrasi, Silahkan tunggu konfirmasi admin', 'success');
            header('Location: /auth/login');
            exit;

        } catch (\Exception $e ) {
            $error = $e->getMessage();
            Flasher::setFlash($error, 'Gagal Registrasi', 'danger');
            header('Location: /registerForm');
            exit;
        }
    }

    public function handleLogin(){
        try{
            $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
            ];
        $user = $this->model('UserModel')->findUserByEmail($data['email']);

        if (!$user) {
            throw new Exception('Email Salah');
        }

        if (!password_verify($data['password'], $user['password'])) {
            throw new Exception('Password Salah');
        }

        if ($user['status'] !== 'active') {
            throw new Exception('Akun anda belom AKtif!');
        }

        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

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