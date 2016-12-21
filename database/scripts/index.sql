-- creating indexes

create index school_city on school(city);

create index student_school on student(school_id);
