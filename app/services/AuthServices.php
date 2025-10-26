<?php
namespace App\Services;

use App\repository\UserRepositoryInterface;

class AuthServices {

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function registerUser(array $inputData){

        if ($this->userRepository->findUserbyEmailorNim($inputData['email'], $inputData['nim'])){
            throw new \Exception("Email atau NIM sudah terdaftar!");
        }

        if ($inputData['password'] != $inputData['konfirmasi_password']){
            throw new \Exception("Password tidak sama!");
        }

        $hashedPassword = password_hash($inputData['password'], PASSWORD_BCRYPT);


        //logika bisnisnya adalah rolenya default user dan statusnya pending
        $dataToSave = [
                'username' => $inputData['username'],
                'email' => $inputData['email'],
                'nim' => $inputData['nim'],
                'jurusan' => $inputData['jurusan'],
                'password' => $hashedPassword,
                'role' => 'user',
                'status' => 'pending'
        ];

        $newUser = $this->userRepository->createUser($dataToSave);

        if (!$newUser) {
            throw new \Exception("Gagal Mendaftarkan User");
        }

        return $newUser;
    }

    public function login($inputData){
        $user = $this->userRepository->findUserbyEmail($inputData['email']);

        if (!$user){
            throw new \Exception("Email Salah");
        }

        if (password_verify($inputData['password'], $user['password'])) {
            throw new \Exception("Password Salah");
        }

        if ($user['status'] !== 'active')
            throw new \Exception("Akun anda belum aktif, tunggu persetujuan admin");

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_username'] = $user['username'];

        unset($user['password']);
        return $user;
    }
}