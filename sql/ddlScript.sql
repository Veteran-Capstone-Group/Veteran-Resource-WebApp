drop table if exists useful;
drop table if exists opportunity;
drop table if exists resource;
drop table if exists catagory;
drop table if exists user;

create table user(
   userId binary(16) not null,
   userActivationToken char(32) not null,
   userEmail varchar(124) not null,
   userHash char(97) not null,
   userName varchar(64) not null,
   userUsername varchar(24) not null,
   unique(userUsername),
   unique(userEmail),
   primary key(userId)
);

create table category(
	categoryId binary(16) not null,
	categoryType varchar(16) not null,
	primary key(categoryId)
);

create table resource(
   resourceId binary(16) not null,
	resourceCategoryId binary(16) not null,
   resourceUserId binary(16) not null,
   resourceAddress varchar(124),
	-- resourceApprovalStatus is a bit 0 meaning not approved, 1 meaning approved
	resourceApprovalStatus boolean not null,
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
	foreign key(resourceCategoryId) references category(categoryId),
	foreign key(resourceUserId) references user(userId),
	primary key(resourceId)
);

create table useful(
  usefulResourceId binary(16) not null,
  usefulUserId binary(16) not null,
  foreign key(usefulUserId) references user(userId),
  foreign key(usefulResourceId) references resource(resourceId),
  primary key(usefulResourceId, usefulUserId)
);