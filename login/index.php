<?php
include_once('../model/database.php');
include_once('../model/instructor.php');
include_once('../model/course.php');
include_once('../model/instructordb.php');

#handle to access MySQL data base for instructors table
$insDb = new InstructorDB();

$action = filter_input(INPUT_POST, 'action');

# If already loggined, then display direct profile
if (isset($_COOKIE['id'])){
   $id = $_COOKIE['id'];
   if ($action == NULL)
      $action = 'show_profile';
}

#controller part for taking decision
if ($action  == NULL ){
   include('../login/login.php');
}
#Submitted login form 
else if ( $action == 'show_form'){
   $email  = filter_input(INPUT_POST, 'email');
   $password  = filter_input(INPUT_POST, 'passwd');

   #Empty Form submitted 
   if ($email == NULL || $password == NULL ){
      $error = "Empty email id or password, Check all fields and try again.";
      include('../errors/error.php');
   }
   else{
      #If user doesn't Exit
      $instructor = $insDb->get_profile_byemail($email);
      if ($instructor == NULL ){
         $error = "In instructors table, could not find the entry";
         include('../errors/error.php');
      }
      else if ($instructor->get_password() == $password ){
         setcookie('id',$instructor->get_id(),time() +1000 , '../');
         include('../login/profile.php'); 
      }
      else{
         $error = $instructor->get_password() . " == " . $password . "Invalid email id or password, Check all fields and try again.";
         include('../errors/error.php');
      }
   }
}

#if submitted logout form 
else if ( $action == 'logout_form'){
   setcookie('id','',time()-1000, '../');
   header('Location: ../index.php');
}


#already logged in
else if ($action == 'show_profile'){
   $instructor = $insDb->get_profile_byid($id);
   include('../login/profile.php');
}

#student list 
else if ($action == 'slist'){
   $course_id  = filter_input(INPUT_POST, 'course_id');
   $instructor_id  = filter_input(INPUT_POST, 'instructor_id');

   #Empty Form submitted 
   if ($course_id == NULL || $instructor_id == NULL ){
      $error = "Empty course_id or instructor_id, Check all fields and try again.";
      include('../errors/error.php');
   }
   else{
      $students = $insDb->get_students($instructor_id,$course_id);
      include('../login/mystudents.php');
   }
}

# other choice
else {
   $error = "OTHER CHOICE";
   include('../errors/error.php');
   header('Location: ../index.php');
}

?>
