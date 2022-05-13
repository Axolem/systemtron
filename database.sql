CREATE DATABASE beyourownboss;

USE beyourownboss;

CREATE TABLE newsletters (
  id       int(11) NOT NULL, 
  email_id varchar(255) NOT NULL UNIQUE, 
  name     varchar(25) NOT NULL, 
  email    int(11) NOT NULL, 
  PRIMARY KEY (id, 
  email_id), 
  UNIQUE INDEX (id));

CREATE TABLE team (
  id         int(11) NOT NULL, 
  name       varchar(25) NOT NULL, 
  surname    varchar(25) NOT NULL, 
  email      varchar(100) NOT NULL UNIQUE, 
  student_no int(11) NOT NULL, 
  PRIMARY KEY (id, 
  email, 
  student_no), 
  UNIQUE INDEX (id));

CREATE TABLE user_details (
  usersemail varchar(50) NOT NULL, 
  first_name varchar(25) NOT NULL, 
  last_name  varchar(25) NOT NULL, 
  gender     varchar(20), 
  ethinicity varchar(20), 
  picture    varchar(255), 
  phone      varchar(20) UNIQUE, 
  emp_status varchar(25), 
  PRIMARY KEY (usersemail));

CREATE TABLE user_setting (
  usersemail          varchar(50) NOT NULL, 
  phone_notifications varchar(3) DEFAULT 'yes' NOT NULL, 
  email_notifications varchar(25) DEFAULT 'yes' NOT NULL, 
  PRIMARY KEY (usersemail));

CREATE TABLE users (
  id            int(11) NOT NULL UNIQUE, 
  oath_provider varchar(10) NOT NULL, 
  oath_id       varchar(255) NOT NULL, 
  email         varchar(50) NOT NULL, 
  created       timestamp NOT NULL, 
  updated       timestamp NULL, 
  code          int(4), 
  verified      char(3) NOT NULL, 
  PRIMARY KEY (email));

ALTER TABLE user_setting ADD CONSTRAINT FKuser_setti76755 FOREIGN KEY (usersemail) REFERENCES users (email) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE user_details ADD CONSTRAINT FKuser_detai856920 FOREIGN KEY (usersemail) REFERENCES users (email) ON UPDATE Cascade ON DELETE Cascade;

CREATE USER 'update'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT UPDATE, CREATE USER ON *.* TO 'update'@'%' REQUIRE NONE WITH GRANT OPTION 
MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;