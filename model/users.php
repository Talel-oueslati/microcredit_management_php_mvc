<?php

class Users
{
    private $user_id;
    private $fullname;
    private $email;
    private $phone;
    private $role;
    private $password;

  
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getPassword()
    {
        return $this->password;
    }

  
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

?>
