-- creating indexes

create index school_district on school(district);

create index student_school on student(school_id);

create index applicants_in_school on applicant_priority(school_id);
