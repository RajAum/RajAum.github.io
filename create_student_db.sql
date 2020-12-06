DROP DATABASE IF EXISTS studentdb; 
CREATE DATABASE studentdb; 
USE studentdb;

-- creating the student table
CREATE TABLE students (
  id                INT             PRIMARY KEY   AUTO_INCREMENT,
  name              VARCHAR(255)    NOT  NULL,
  gender            VARCHAR(12)     NOT NULL,
  birth_date        DATETIME       DEFAULT NULL,
  address           VARCHAR(255)   NOT NULL, 
  email             VARCHAR(255)    NOT NULL      UNIQUE,
  password          VARCHAR(60)    NOT NULL
);

-- creating the instructor table
CREATE TABLE instructors (
  id                INT             PRIMARY KEY   AUTO_INCREMENT,
  name              VARCHAR(255)    NOT  NULL,
  gender            VARCHAR(12)     NOT NULL,
  birth_date        DATETIME       DEFAULT NULL,
  address           VARCHAR(255)   DEFAULT NULL, 
  email             VARCHAR(255)    NOT NULL      UNIQUE,
  password          VARCHAR(60)    NOT NULL
);

CREATE TABLE courses (
  course_id         VARCHAR(10)    PRIMARY KEY UNIQUE,
  course_name       VARCHAR(255)    NOT NULL,
  time              VARCHAR(32)    NOT NULL,
  classroom         VARCHAR(32)    NOT NULL,
  semester          VARCHAR(32)    NOT NULL,
  instructor_id     INT    NOT NULL,
  CONSTRAINT courses_fk_instructors
    FOREIGN KEY (instructor_id)
    REFERENCES instructors (id)
);

CREATE TABLE enrolled(
  student_id        INT         NOT NULL,
  course_id         VARCHAR(10) NOT NULL,
  instructor_id     INT    NOT NULL,
  CONSTRAINT enrolled_pk
    PRIMARY KEY (student_id,course_id),
  CONSTRAINT enrolled_fk_students
    FOREIGN KEY (student_id)
    REFERENCES students(id),
  CONSTRAINT enrolled_fk_courses
    FOREIGN KEY (course_id)
    REFERENCES courses (course_id), 
  CONSTRAINT enrolled_fk_instructors
    FOREIGN KEY (instructor_id)
    REFERENCES instructors (id)
);


-- Insert data into the tables
INSERT INTO students (id,name,gender,birth_date,address,email,password) VALUES
(1,'Rev','Male', NULL, NULL, 'rev@email.com', 'SESAME' ),
(2,'Sha Mathine','Female',NULL,NULL,'shamathine@email.com','SESAME');

INSERT INTO instructors (id,name,gender,birth_date,address,email,password) VALUES
(1111,'Belinda Casmir','Female',NULL,NULL,'belindacasmir@mail.com','SESAME'),
(1112,'Jasfer Mike','Male',NULL,NULL,'jasfermike@aum.com','SESAME');


INSERT INTO courses (course_id, course_name, classroom, semester , time, instructor_id) VALUES
('CNIT 445','Cloud Computing','TuTh 10:30 AM', 'E1-S10','FALL',1111),
('CPSC 1233','Data Structures and Algorithms','Fr 2:00 PM','E2-F01','SPRING',1112),
('CSCI 767', 'Algorithms', 'Mon 11:45AM', 'E3-A7', 'SUMMER', 1112),
('CNCP 155', 'Advance Database', 'Mon 2:50PM', 'E2-A8', 'FALL', 1111 );

INSERT INTO enrolled (student_id,course_id,instructor_id) VALUES
(1,'CPSC 1233',1112),
(1,'CNIT 445',1111),
(2,'CPSC 1233',1112),
(2,'CNIT 445',1111),
(2,'CSCI 767',1112);

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO myuser@localhost
IDENTIFIED BY 'myPassword';
