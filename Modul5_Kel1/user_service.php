<?php

class user_service
{
    protected $username; // using protected so they can be accessed
    protected $password; // and overridden if necessary
    protected $dataUser; // dummy data
    protected $getRole; // stores the role data
    public function __construct($username, $password)
    {
        $this->dataUser = [
            (object) [
                'username' => "nama1kelompok??",
                'password' => "12345",
                'role' => "Super Admin"
            ],
            (object) [
                'username' => "nama2kelompok??",
                'password' => "4567",
                'role' => "User"
            ]
        ];
        $this->username = $username;
        $this->password = $password;
    }

    public function login()
    {
        $user = $this->checkCredentials();
        if ($user) {
            $this->getRole = $user->role;
            return $user->username;
        } else {
            return false;
        }
    }  

   protected function checkCredentials()
{
    foreach ($this->dataUser as $key => $value) {
        if ($value->username == $this->username && $value->password == $this->password) {
            return $value;
        }
    }
    return false;
}

    public function getRole()
    {
        return $this->getRole;
    }
}