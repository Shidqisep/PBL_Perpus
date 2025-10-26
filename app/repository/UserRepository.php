<?php
namespace App\repository;

use App\repository\UserRepositoryInterface;
use Database;
use Flasher;

class UserRepository implements UserRepositoryInterface {

     private $db;

     public function __construct(Database $db)
     {
        $this->db = $db;
     }

    public function findUserByEmail($email) {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    return $this->db->singleSet(); // Mengembalikan satu baris data user
    }

     public function findUserbyEmailorNim($email, $nim)
     {
        $this->db->query("SELECT * FROM users WHERE email = :email or nim = :nim");
        $this->db->bind(':email', $email);
        $this->db->bind(':nim', $nim);
        return $this->db->singleSet();
     }

     public function createUser(array $data)
     {
        $this->db->query(
            "INSERT INTO users (username, nim, email, password, jurusan, role, status) 
            VALUES (:username, :nim, :email, :password, :jurusan, :role, :status)"
        );


        //bind data
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nim', $data['nim']);
        $this->db->bind(':jurusan', $data['jurusan']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':role', $data['role']);

        //eksekusi
        try {
            $this->db->execute();
            $id = $this->db->lastInsertId();

            return [
            'id'       => $id,
            'username' => $data['username'],
            'email'    => $data['email'],
            'nim'      => $data['nim'],
            'jurusan'  => $data['jurusan'],
            'status'   => $data['status'],
            'role'     => $data['role']
        ];


        } catch (\Exception $th) {
            //gagal insert
            return false;
        }
     }


}