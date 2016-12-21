----------------------------Generating Age------------------------------------------------------------------

drop function if exists generate_age;

delimiter @

create function generate_age(birthday date) returns real
	begin
		declare age real;
		set age =(select datediff((select year_boundary from session_date),birthday)/365);
		return age;
	end@

delimiter ;

--------------------------Calculating Past Pupil Guardian Marks--------------------------------------------------------------

drop function if exists guardian_mark;

delimiter @

create function guardian_mark(applicant_id int,school_id int) returns int
begin

	declare guardian_mark int;
	declare guardian_school_id int;
	declare guardian_past_id int;
	declare left_date date;
	declare start_date date;
	declare guardian_years int;

	select past_stu_id from guardian_past_pupil,applicant_guardian where (guardian_past_pupil.guardian_id,applicant_id)=(applicant_guardian.guardian_id,applicant_guardian.applicant_id) into guardian_past_id;
	select school_id from student where student.admission_no=guardian_past_id into guardian_school_id;

	if(guardian_school_id=school_id) then

		select school_left_date from past_student where past_student.past_stu_id=guardian_past_id into left_date;
		select registered_date from student where student.admission_no=guardian_past_id into start_date;
		select floor(datediff(left_date,start_date)/365) into guardian_years;
		select guardian_years*2 into guardian_mark;

	else

		if(guardian_school_id!=school_id) then
			select (0) into guardian_mark;
		end if;

	end if;

	return guardian_mark;

	end @

delimiter ;

------------------------Calculating Marks for the siblings in the school---------------------------------------------------------

delimiter @

create function sibling_mark(applicant_id int,school_id int) returns int
begin
	declare sibling_mark int;
	declare sibling_school_id int;
	declare sibling_pre_id int;
	declare sib_reg_date date;
	declare today_date date;
	declare sibling_years int;

	select present_stu_id from  applicant_sibling,student where (applicant_sibling.present_stu_id,applicant_sibling.applicant_id)=(student.admission_no,applicant_id) into sibling_pre_id;
	select school_id from student where admission_no=sibling_pre_id into sibling_school_id;

    if(sibling_school_id=school_id) then

		select registered_date from student where admission_no=sibling_pre_id into sib_reg_date;
		select CURDATE() into today_date;

		select floor(datediff(current_date,sib_reg_date)/365) into sibling_years;

		select sibling_years*3 into sibling_mark;

	else

	if(sibling_school_id!=school_id) then
			select 0 into sibling_mark;
		end if;

	end if;

	return sibling_mark;

end@

delimiter ;

-----------------------Calculating marks for the schools in between the applicant's residence and the school------------------

drop function if exists location_mark;

delimiter @

create function location_mark(applicant_id int,school_id int) returns int
begin
	declare location_mark int;
	declare num_school int;

	select num_between_school from applicant_priority where (applicant_priority.applicant_id,applicant_priority.school_id)=(applicant_id,school_id) into num_school;
	select num_school*4 into location_mark;

	return location_mark;

end@

delimiter ;

---------------------Calculating final marks for an applicant----------------------------------------------------------------

delimiter @

create function calculate_marks(applicant_id int,school_id int) returns int
begin

	declare marks int;
	declare guardian_mark int;
	declare sibling_mark int;
	declare location_mark int;

	select guardian_mark(applicant_id,school_id) into guardian_mark;
	select guardian_mark(applicant_id,school_id) into sibling_mark;
	select location_mark(applicant_id,school_id) into location_mark;

	select guardian_mark+sibling_mark-location_mark+35 into marks;

	return marks;

end@

delimiter ;
