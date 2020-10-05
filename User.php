<?php
class User{
    public $name;
    public $nickname;
    public $email;
    public $password;
    public $image;
    
    function __construct($name, $nickname, $email, $password, $image){
        $this -> name = $name;
        $this -> nickname = $nickname;
        $this -> email = $email;
        $this -> password = $password;
        $this -> image = $image;
    }
}

?>