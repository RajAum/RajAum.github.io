<?php
class Instructor{
    private $id;
    private $name;
    private $email;
    private $gender;
    private $password;
    private $address;
    private $dob;
    
    public function __construct($id,$name, $email,$password,$address,$dob,$gender){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->dob =$dob;
        $this->gender = $gender;
    }
    public function get_gender(){
        return $this->gender;
    }
    public function get_id(){
        return $this->id;
    }
    public function get_name(){
        return $this->name;
    }
    public function get_email(){
        return $this->email;
    }
    public function get_address(){
        return $this->address;
    }
    public function get_dob(){
        return $this->dob;
    }
    public function get_password(){
        return $this->password;
    }
}
?>

