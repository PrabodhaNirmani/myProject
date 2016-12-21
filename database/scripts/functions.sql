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
delimiter @

create function guardian_mark(applicant_id int,school_id int) returns int
begin
	declare guardian_mark int;
	declare guardian_school_id int;
	declare guardian_past_id int;

	set guardian_past_id=(select past_stu_id from guardian_past_pupil,applicant_guardian where (guardian_past_pupil.guardian_id,applicant_id)=(applicant_guardian.guardian_id,applicant_guardian.applicant_id);)
	set guardian_school_id = (select school_id from student where admission_no=guardian_past_id;)

	if(guardian_school_id=school_id) then

		declare past_date date;
		declare start_date date;

		set past_date =(select school_left_date from past_student where past_stu_id=guardian_past_id;)
		set start_date = (select registered_date from student where admission_no=guardian_past_id;)

		declare guardian_years int;
		set guardian_years = (select floor(select datediff(past_date,start_date)/365);)

		set guardian_mark = (select guardian_years*2;)

	else
		if (guardian_school_id!=school_id) then

			set guardian_mark = select 0;

	end if;

	return guardian_mark;

end@

delimiter ;

------------------------Calculating Marks for the siblings in the school---------------------------------------------------------

delimiter @

create function sibling_mark_mark(applicant_id int,school_id int) returns int
begin
	declare sibling_mark int;
	declare sibling_school_id int;
	declare sibling_pre_id int;

	set sibling_pre_id =(select present_stu_id from  applicant_sibling,student where (applicant_sibling.present_stu_id,applicant_sibling.applicant_id)=(student,admission_no,applicant_id);)
	set sibling_school_id = (select school_id from student where admission_no=sibling_pre_id;)

    if(sibling_school_id=school_id) then

	declare sib_reg_date date;
	declare current_date date;

	set sib_reg_date =(select registered_date from student where admission_no=sibling_pre_id;)
	set current_date =(select CURDATE();)

	declare sibling_years int;
	set sibling_years= (select floor(select datediff(current_date,sib_reg_date)/365);)

	set sibling_mark = (select sibling_years*3;)

	else
		if(sibling_school_id!=school_id) then
			set sibling_mark=(select 0;)

	end if;

	return sibling_mark;

end@

delimiter ;

-----------------------Calculating marks for the schools in between the applicant's residence and the school------------------

delimiter @

create function location_mark(applicant_id int,school_id int) returns int
begin
	declare location_mark int;
	declare num_school int;

	set num_school = (select num_between_school from applicant_priority where (applicant.applicant_id,applicant.school_id)=(applicant_id,school_id);)
	set location_mark = (select num_school*4;)

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

	set guardian_mark=(select guardian_mark(applicant_id,school_id);)
	set sibling_mark=(select guardian_mark(applicant_id,school_id);)
	set location_mark =(select location_mark(applicant_id,school_id);)

	set marks =(select guardian_mark+sibling_mark-location_mark+35;)

	return marks;
end@

delimiter ;
