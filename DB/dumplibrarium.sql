DROP DATABASE IF EXISTS librarium;
CREATE DATABASE librarium;
USE librarium;

CREATE TABLE users(
user_id int unsigned auto_increment,
name varchar(120) not null,
email varchar(200) not null unique,
password char(60) not null,
primary key(user_id)
);

select * from users;