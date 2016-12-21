
DROP DATABASE IF EXISTS `ministry_of_education`;

CREATE DATABASE ministry_of_education;

USE ministry_of_education;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE user
(
	id             INT NOT NULL auto_increment PRIMARY KEY,
	user_name      VARCHAR(255) NOT NULL,
	password       VARCHAR(255) NOT NULL,
	user_type      VARCHAR(10) NOT NULL,
	remember_token VARCHAR(100) DEFAULT NULL,
	UNIQUE (user_name)
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE applicant
(
	applicant_id INT NOT NULL PRIMARY KEY,
	first_name   VARCHAR(255) NOT NULL,
	last_name    VARCHAR(255),
	sex          VARCHAR(6) NOT NULL,
	medium       VARCHAR(7) NOT NULL,
	religion     VARCHAR(12) NOT NULL,
	birth_day    DATE NOT NULL,
	age          INT,
	FOREIGN KEY(applicant_id) REFERENCES user(id) ON DELETE CASCADE
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE applicant_guardian
(
	applicant_id          INT NOT NULL,
	guardian_id           INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	guardian_type         VARCHAR(11) NOT NULL,
	first_name            VARCHAR(255) NOT NULL,
	last_name             VARCHAR(255),
	national_id_no        VARCHAR(10) NOT NULL UNIQUE,
	nationality_srilankan BOOLEAN NOT NULL,
	district 							VARCHAR(20) NOT NULL,
	religion              VARCHAR(11),
	address_no            VARCHAR(8) NOT NULL,
	address_street        VARCHAR(50) NOT NULL,
	address_city          VARCHAR(20) NOT NULL,
	tele_no               INT(10),
	div_sec_area          VARCHAR(50) NOT NULL,
	grama_nil_res_no      INT(20) NOT NULL,
	FOREIGN KEY(applicant_id) REFERENCES applicant(applicant_id) ON DELETE
	CASCADE
)
	engine = innodb
	DEFAULT charset = utf8;

--------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE school
(
	school_id      INT NOT NULL PRIMARY KEY,
	school_name    VARCHAR(50) NOT NULL,
	school_type    VARCHAR(6) NOT NULL,
	street         VARCHAR(50),
	city           VARCHAR(20) NOT NULL,
	district       VARCHAR(20) NOT NULL,
	max_no_student INT,
	FOREIGN KEY(school_id) REFERENCES user(id) ON DELETE CASCADE
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE applicant_priority
(
	applicant_id       INT NOT NULL,
	school_id          INT NOT NULL,
	priority           INT(5) NOT NULL,
	marks              INT,
	distance           DOUBLE NOT NULL,
	num_between_school INT NOT NULL,
	confirmed          BOOLEAN DEFAULT 0,
	FOREIGN KEY(applicant_id) REFERENCES applicant(applicant_id) ON DELETE
	CASCADE,
	FOREIGN KEY(school_id) REFERENCES school(school_id) ON DELETE CASCADE,
	UNIQUE (applicant_id, priority)
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE student
(
	school_id       INT NOT NULL,
	admission_no    INT NOT NULL auto_increment PRIMARY KEY,
	first_name      VARCHAR(255) NOT NULL,
	last_name       VARCHAR(255),
	registered_date DATE,
	FOREIGN KEY (school_id) REFERENCES school(school_id) ON DELETE CASCADE
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE present_student
(
	present_stu_id INT NOT NULL PRIMARY KEY REFERENCES student (admission_no)
)
	engine = innodb
	DEFAULT charset = utf8;

--------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE past_student
(
	past_stu_id      INT NOT NULL PRIMARY KEY REFERENCES student (admission_no),
	membership_id    INT NOT NULL PRIMARY KEY,
	school_left_date DATE,
	membership_date  DATE
)
	engine = innodb
	DEFAULT charset = utf8;

--------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE applicant_sibling
(
	applicant_id   INT NOT NULL,
	present_stu_id INT NOT NULL REFERENCES present_student (present_stu_id),
	FOREIGN KEY (applicant_id) REFERENCES applicant (applicant_id) ON DELETE
	CASCADE,
	primary key(applicant_id,present_stu_id)
)
	engine = innodb
	DEFAULT charset = utf8;

--------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE guardian_past_pupil
(
	guardian_id INT NOT NULL,
	past_stu_id INT NOT NULL,
	FOREIGN KEY(guardian_id) REFERENCES applicant_guardian(guardian_id),
	FOREIGN KEY(past_stu_id) REFERENCES past_student(past_stu_id),
	primary key(guardian_id,past_stu_id)
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE session
(
	session_id    INT NOT NULL auto_increment PRIMARY KEY,
	year_boundary DATE NOT NULL,
	activate      BOOLEAN NOT NULL DEFAULT 0
)
	engine = innodb
	DEFAULT charset = utf8;

-------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE district (
	city VARCHAR(20) PRIMARY KEY NOT NULL
)
	engine = innodb
	DEFAULT charset = utf8;


/////////////updates//////////////////////////
--added a new field remember_token to user--

#district is added to applicant_guardian table
#confirmed is added to applicant priority
#user_id changed to id in user table
#applicant_sibling and guardian_past_pupil changed