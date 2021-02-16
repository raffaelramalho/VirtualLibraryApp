<?php

namespace Src\Model;

class UserModel implements UserModelInterface
{
    private $userId;
    private $name;
    private $email;
    private $password;
    private $con;

    public function __construct(\PDO $con) 
    {
        $this->con = $con;
    }

    public function login(){
        $stmt = $this->con->prepare("SELECT * FROM users WHERE email = ?;");
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        $row = $stmt->fetchObject();

        if(is_object($row) && password_verify($this->password, $row->password)){
            return $row;
        }else{
            throw new \Exception("Email or Password is incorrect");
        }
        
    }

    public function get(){
        $stmt = $this->con->prepare("SELECT * FROM users WHERE user_id = ?;");
        $stmt->bindParam(1, $this->userId);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function create()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE email = ?;");
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        $row = $stmt->fetchAll();
        if(!count($row) >= 1){
            $stmt = $this->con->prepare("INSERT INTO users VALUES(NULL, ?, ?, ?);");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->email);
            $stmt->bindParam(3, $this->password);
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->execute();
        }else{
            throw new \Exception("this email has already been registered");
        }
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}