create table memeber(
id char(16) not null,
pass char(16) not null,
name char(10) not null,
ph_num char(16),
raise_cat tinyint(1),
primary key(id)
);

create table board(
num int not null auto_increment,
subject char(100) not null,
id char(16) not null,
content text not null,
register_day char(20) not null,
click int not null,
catagory char(15) not null,
primary key(num));

create table gallery(
num int not null auto_increment,
id char(16) not null,
subject char(100) not null,
context text not null,
register_day char(20) not null,
click int not null,
file_name char(50),
file_copied char(50),
primary key(num));