drop table if exists opportunity;
drop table if exists resource;

create table resource(
	resourceTitle varchar(64) not null,
	resourceDescription varchar(8000) not null,
	resourceCategory varchar(32) not null,
	resourceUrl varchar(255) not null,
	resourceApprovalStatus bit not null,
	index(resourceCategory),
	primary key(resourceTitle)
);

create table opportunity(

);