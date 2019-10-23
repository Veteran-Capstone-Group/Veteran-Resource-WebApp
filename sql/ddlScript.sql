drop table if exists useful;
drop table if exists opportunity;
drop table if exists resource;
drop table if exists user;

create table user(
   userId binary(16) not null,
   userActivationToken not null,
   userEmail varchar(124) not null,
   userHash char(97) not null,
   userName varchar(32) not null,
   userUsername varchar(24) not null,
   unique(userUsername),
   unique(userEmail),
   primary key(userId)
);

create table resource(
   resourceId binary(16) not null,
   resourceUserId binary(16) not null,
   resourceAddress varchar(64),
	-- resourceApprovalStatus is a bit 0 meaning not approved, 1 meaning approved
	resourceApprovalStatus bit not null,
	-- resourceCategory will be selected from a drop down list in gui and will be checked if it's one of
	-- a limited selection of categories. Education, Healthcare, food, housing, ect.
	resourceCategory varchar(32) not null,
	-- resource description needs to be short brief and descriptive of what is provided and how
	resourceDescription varchar(300) not null,
	-- resourceImageUrl is an image to be used as a descriptive image or logo for resource for front end use.*/
	resourceEmail varchar(124),
	resourceImageUrl varchar(255),
	resourceOrganization varchar(124),
	resourcePhone char(11),
	resourceTitle varchar(64) not null,
	resourceUrl varchar(255) not null,
	index(resourceCategory),
	foreign key(resourceUserId) references user(userId),
	primary key(resourceId)
);

/*
create table opportunity(
	opportunityCompanyName varchar(64) not null,
	opportunityJobTitle varchar(144) not null,
	opportunityJobDescription varchar (3000) not null,
	opportunityJobRequirments varchar(500) not null,
	-- Job Types are full-time, part-time, temp, intern
	opportunityJobType varchar(10) not null,
	-- Phone numbers must be 11 digit phone numbers
	opportunityContactPhone char(11) not null,
	opportunityContactEmail varchar(64) not null,
	opportunityAddress varchar(124) not null,
	opportunityZipCode char(5) not null,
	opportunityImageUrl varchar(255) not null,
	opportunityApprovalStatus BIT not null,
	-- job type index for filtering jobs by type.
	index(opportunityJobType),
	-- Zipcode indexed for searching jobs by zipcode
	index(opportunityZipCode),
	primary key(opportunityCompanyName)
);
*/

create table useful(
  usefulResourceId
);