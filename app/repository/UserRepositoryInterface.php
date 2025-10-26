<?php

namespace App\repository;

interface UserRepositoryInterface {

    public function findUserbyEmail($email);

    //cari user berdasarkan email atau nim
    //returnnya data user jika ketemu dan false jika tidak
    public function findUserbyEmailorNim($email, $nim);

    /*
    untuk membuat user baru di database 
    @param array $data (isinya username, email, password(hashed), nim, role, status = pending, created at, updated at )
    */
    public function createUser(array $data);
}