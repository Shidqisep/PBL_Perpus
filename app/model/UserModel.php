<?php 

class UserModel {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findUserByEmail($email){
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    return $this->db->singleSet();
    }

    public function findUserByEmailorNomor_Induk($email, $nomor_induk){
        $this->db->query("SELECT * FROM users WHERE email = :email or nomor_induk = :nomor_induk");
        $this->db->bind(':email', $email);
        $this->db->bind(':nomor_induk', $nomor_induk);
    }

    public function loginUserByEmailorNomor_Induk($input){
        $this->db->query("SELECT * FROM users WHERE email = :input or nomor_induk = :input");
        $this->db->bind(':input', $input);
        return $this->db->singleSet();
    }

    public function createUser($data){
        $this->db->query(
            "INSERT INTO users (username, nomor_induk, email, password, jurusan, fotobukti, updated_at, created_at) 
            VALUES (:username, :nomor_induk, :email, :password, :jurusan, :fotobukti, :now, :now)"
        );

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nomor_induk', $data['nomor_induk']);
        $this->db->bind(':fotobukti', $data['fotobukti']);
        $this->db->bind(':jurusan', $data['jurusan']);
        $this->db->bind('suspend_count', $data['suspend_count']);
        $this->db->bind(':now', $data['now']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}