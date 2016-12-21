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

#-----------------------------------------------------------------------------------------------------------------------------

#-- Doesn't allow applicants to add to wrong type of schools

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

#--------------------------------------------------------------------------------------------------------------------------

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



#--------------------------------------------------------------------------------------------------------------------------------

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


