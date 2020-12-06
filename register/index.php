<?php
require('../model/database.php');
require('../model/instructor.php');
require('../model/instructordb.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
   $action = 'register';
}

//Creating handle to access the instructors table
$idb = new InstructorDB();

if ($action == 'register'){
      include('../register/register.php');
}
else if ($action == 'register_form'){
   $id  = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
   $name  = filter_input(INPUT_POST, 'name');
   $gender = filter_input(INPUT_POST, 'gender');
   $birthdate  = filter_input(INPUT_POST, 'birth_date');
   $address  = filter_input(INPUT_POST, 'address');
   $email  = filter_input(INPUT_POST, 'email');
   $password  = filter_input(INPUT_POST, 'password');
   if ($id == null ||  $email == NULL || $password == NULL  || $name == NULL  || $gender == NULL ) {
      $error = "Invalid details, Please check all fields and try again.";
      include('../register/register.php');
   }
   else{
      #adding into instructors table
      $idb->insert_into_instructors($id, $name,$gender,$email,$password,$birthdate,$address);
      
      #take it to home page after registration for login
      header('Location: ../index.php');
   }
}
else{
   header('Location: ../index.php');
}
?>
