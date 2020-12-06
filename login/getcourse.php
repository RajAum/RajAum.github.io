<?php
include_once('../model/database.php');
include_once('../model/instructor.php');
include_once('../model/instructordb.php');
$insDb = new InstructorDB();
$instructor = $insDb->get_profile_byid($_COOKIE['id']);
$courses = $insDb->get_courses($_COOKIE['id']);
include('../login/mycourse.php');
?>

