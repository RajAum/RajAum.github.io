<?php
class InstructorDB{
      public $db;
      public function __construct(){
            $this->db = new Database();
      }
      public function insert_into_instructors($id, $name,$gender,$email,$password,$birth_date,$address){
            $sql = 'INSERT INTO instructors 
                  (id, name, gender, email, password, birth_date, address )
                  VALUES
                  ("' . $id . '","'. $name . '","' . $gender . '","' . $email . '","' . $password . '","' . $birth_date . '","' . $address . '")' ;
            $result = $this->db->runQuery($sql);
      }
      public function get_profile_byemail($email){
            $sql = 'SELECT * FROM instructors
                    WHERE email = "' . $email .  '"'  ;
            $result = $this->db->runQuery($sql);
            $value = $result->fetch_assoc();
            $instructor = new Instructor($value['id'],$value['name'],$value['email'],$value['password'],$value['address'],$value['birth_date'],$value['gender']);
            return $instructor;
      }

      public function get_profile_byid($id){
            $sql = 'SELECT * FROM instructors
                    WHERE id = "' . $id .  '"'  ;
            $result = $this->db->runQuery($sql);
            $value = $result->fetch_assoc();
            $instructor = new Instructor($value['id'],$value['name'],$value['email'],$value['password'],$value['address'],$value['birth_date'],$value['gender']);
            return $instructor;
      }
      public function get_courses($id){
            $sql = 'SELECT * FROM courses 
                    WHERE instructor_id = ' . $id  ;
            $result = $this->db->runQuery($sql);

             // include('../errors/error.php');
            $courses = array();
            while ($row = $result->fetch_assoc()) {
                  array_push($courses,$row);
            }
            return $courses;
      }
      public function get_students($instructor_id,$course_id){
            $sql = 'SELECT s.id, s.name FROM students s
                        JOIN enrolled e
                              ON  s.id = e.student_id
                        JOIN courses c
                              On e.course_id = c.course_id
                        WHERE c.instructor_id = ' . $instructor_id .  ' and c.course_id =' . '"' . $course_id . '"' ;
            $result = $this->db->runQuery($sql);
            $students = array();
            while ($row = $result->fetch_assoc()) {
                  array_push($students,$row);
            }
            return $students;
      }
}
?>

