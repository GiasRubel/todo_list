create database job;
use job;

create table jobs (
  id  int(11) auto_increment primary key,
  title varchar(30) not null,
  active boolean not null default 0
);