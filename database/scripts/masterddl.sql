

DROP DATABASE IF EXISTS `ministry_of_education`;

CREATE DATABASE ministry_of_education;

USE ministry_of_education;

CREATE TABLE user
(
	id   INT NOT NULL auto_increment PRIMARY KEY,
	user_name VARCHAR(255) NOT NULL,
	password  VARCHAR(255) NOT NULL,
	user_type VARCHAR(10) NOT NULL,
	UNIQUE (user_name)
)
	engine = innodb
	DEFAULT charset = utf8;

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

CREATE TABLE applicant_guardian
(
	applicant_id          INT NOT NULL,
	guardian_id           INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	guardian_type         VARCHAR(11) NOT NULL,
	first_name            VARCHAR(255) NOT NULL,
	last_name             VARCHAR(255),
	national_id_no        VARCHAR(10) NOT NULL UNIQUE,
	nationality_srilankan BOOLEAN NOT NULL,
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

CREATE TABLE school
(
	school_id      INT NOT NULL PRIMARY KEY,
	school_name    VARCHAR(50) NOT NULL,
	school_type    VARCHAR(6) NOT NULL,
	street         VARCHAR(50),
	city           VARCHAR(20) NOT NULL,
	max_no_student INT,
	FOREIGN KEY(school_id) REFERENCES user(id) ON DELETE CASCADE
)
	engine = innodb
	DEFAULT charset = utf8;

CREATE TABLE applicant_priority
(
	applicant_id       INT NOT NULL,
	school_id          INT NOT NULL,
	priority           INT NOT NULL,
	marks              INT,
	distance           DOUBLE NOT NULL,
	num_between_school INT NOT NULL,
	FOREIGN KEY(applicant_id) REFERENCES applicant(applicant_id) ON DELETE
	CASCADE,
	FOREIGN KEY(school_id) REFERENCES school(school_id) ON DELETE CASCADE,
	UNIQUE (applicant_id, priority)
)
	engine = innodb
	DEFAULT charset = utf8;

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

CREATE TABLE present_student
(
	present_stu_id INT NOT NULL PRIMARY KEY REFERENCES student (admission_no)
)
	engine = innodb
	DEFAULT charset = utf8;

CREATE TABLE past_student
(
	past_stu_id      INT NOT NULL PRIMARY KEY REFERENCES student (admission_no),
	membership_id    INT NOT NULL,
	school_left_date DATE,
	membership_date  DATE
)
	engine = innodb
	DEFAULT charset = utf8;

CREATE TABLE applicant_sibling
(
	applicant_id   INT NOT NULL,
	present_stu_id INT NOT NULL REFERENCES present_student (present_stu_id),
	FOREIGN KEY (applicant_id) REFERENCES applicant (applicant_id) ON DELETE
	CASCADE
)
	engine = innodb
	DEFAULT charset = utf8;

CREATE TABLE guardian_past_pupil
(
	guardian_id INT NOT NULL,
	past_stu_id INT NOT NULL,
	FOREIGN KEY(guardian_id) REFERENCES applicant_guardian(guardian_id),
	FOREIGN KEY(past_stu_id) REFERENCES past_student(past_stu_id)
)
	engine = innodb
	DEFAULT charset = utf8;


drop trigger if exists validate_birthday ;

delimiter @
create trigger validate_birthday before insert on applicant
for each row
	begin
		declare msg varchar(128);
		declare age real;
		set age =(select generate_age(new.birth_day));
		if(age<5 or age>6) then
			set msg = concat('Invalid Applicant');
			signal sqlstate '45000' set message_text = msg;
		else
			set new.age = 5;
		end if;
	end@
delimiter ;



-- Doesn't allow applicants to add to wrong type of schools

drop trigger if exists validate_school;

delimiter @
create trigger validate_school before insert on applicant_priority
for each row
	begin
		declare msg varchar(128);
		declare gender VARCHAR(7);
		declare s_type VARCHAR(7);
		
		set gender =(select sex from applicant where applicant_id=new.applicant_id);
		set s_type=(select school_type from school where school_id= new.school_id);
		set msg = "Invalid_school";		
		
		if gender="Male" and s_type="girls" then
			signal sqlstate '45000' set message_text = msg;
		else 
			if gender="female" and s_type="boys" then
				signal sqlstate '45000' set message_text = msg;
			end if;
		end if;
	end@
delimiter ;

--applicant_guardian -> national_id_no


drop trigger if exists validate_birthday_update;

delimiter @
create trigger validate_birthday_update before update on applicant
for each row
	begin
		declare msg varchar(128);
		declare age real;
		set age =(select generate_age(new.birth_day));
		if(age<5 or age>6) then
			set msg = concat('Invalid Applicant');
			signal sqlstate '45000' set message_text = msg;
		else
			set new.age = 5;
		end if;
	end@
delimiter ;



drop trigger if exists validate_school_update;

delimiter @
create trigger validate_school_update before update on applicant_priority
for each row
	begin
		declare msg varchar(128);
		declare gender VARCHAR(7);
		declare s_type VARCHAR(7);
		
		set gender =(select sex from applicant where applicant_id=new.applicant_id);
		set s_type=(select school_type from school where school_id= new.school_id);
		set msg = "Invalid_school";		
		
		if gender="Male" and s_type="girls" then
			signal sqlstate '45000' set message_text = msg;
		else 
			if gender="female" and s_type="boys" then
				signal sqlstate '45000' set message_text = msg;
			end if;
		end if;
	end@
delimiter ;


-- creating indexes

create index school_city on school(city);

create index student_school on student(school_id);

--creating functions

drop function if exists generate_age;

delimiter @

create function generate_age(birthday date) returns real
begin
	declare age real;
	set age =(select datediff((select year_boundary from session_date),birthday)/365);
	return age;
end@

delimiter ;


CREATE TABLE district (
	city VARCHAR(20) NOT NULL
)


engine = innodb
DEFAULT charset = utf8;

insert into district (city) values('Matara'),('Galle'),('Hambantota'),('Colombo'),('Gampaha'),('Kaluthara'),('Monaragala'),('Badulla'),('Kandy'),('Matale'),('Nuwara Eliya'),('Ampara'),('Anuradhapura'),('Batticaloa'),('Jaffna'),('Kegalle'),('Kilinochchi'),('Kurunegala'),('Mannar'),('Mullaitivu'),('Polonnaruwa'),('Puttalam'),('Rathnapura'),('Trincomalee'),('Vavniya');
