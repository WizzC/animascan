<?php

class Users{
    private $idUsers;
    private $roleUsers;
    private $pseudo;
    private $email;
    private $passwordUsers;
    

    public function __construct($idUsers,$roleUsers,$pseudo,$email,$passwordUsers)
    {
        $this->idUsers=$idUsers;
        $this->roleUsers=$roleUsers;
        $this->pseudo=$pseudo;
        $this->email=$email;
        $this->passwordUsers=$passwordUsers;

    }

    public function getIdUsers(){return $this->idUsers;}
    public function setIdUsers($idUsers){$this->idUsers=$idUsers;}

    public function getRole(){return $this->roleUsers;}
    public function setRole($roleUsers){$this->roleUsers=$roleUsers;}

    public function getPseudo(){return $this->pseudo;}
    public function setPseudo($pseudo){$this->pseudo=$pseudo;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email=$email;}

    public function getPassword(){return $this->passwordUsers;}
    public function setPassword($passwordUsers){$this->passwordUsers=$passwordUsers;}

}

?>