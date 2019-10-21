drop table if exists opportunity;
drop table if exists resource;

create table resource(
	resourceTitle varchar(64) not null,
	resourceDescription varchar(8000) not null,
	/*resourceCategory will be selected from a drop down list in gui and will be checked if it's one of
	  a limited selection of categories. Education, Healthcare, food, housing, ect.*/
	resourceCategory varchar(32) not null,
	resourceUrl varchar(255) not null,
	/*resourceImageUrl is an image to be used as a descriptive image or logo for resource for front end use.*/
	resourceImageUrl varchar(255) not null,
	/*resourceApprovalStatus is a bit 0 meaning not approved, 1 meaning approved*/
	resourceApprovalStatus bit not null,
	index(resourceCategory),
	primary key(resourceTitle)
);

create table opportunity(
	opportunityCompanyName varchar(64) not null,
	opportunityJobTitle varchar(144) not null,
	opportunityJobDescription varchar (3000) not null,
	opportunityJobRequirments varchar(500) not null,
	/*Job Types are full-time, part-time, temp, intern */
	opportunityJobType varchar(10) not null,
	/*Phone numbers must be 11 digit phone numbers*/
	opportunityContactPhone char(11) not null,
	opportunityContactEmail varchar(64) not null,
	opportunityAddress varchar(124) not null,
	opportunityZipCode char(5) not null,
	opportunityImageUrl varchar(255) not null,
	opportunityApprovalStatus BIT not null,
	/*job type index for filtering jobs by type. */
	index(opportunityJobType),
	/*Zipcode indexed for searching jobs by zipcode */
	index(opportunityZipCode),
	primary key(opportunityCompanyName)
);