CREATE DATABASE beyourownboss;

USE beyourownboss;

CREATE TABLE newsletters (
  id int(11) NOT NULL,
  email_id varchar(255) NOT NULL UNIQUE,
  name varchar(25) NOT NULL,
  email varchar(50) NOT NULL,
  PRIMARY KEY (id, email_id),
  UNIQUE INDEX (id)
);

CREATE TABLE team (
  id int(11) NOT NULL,
  name varchar(25) NOT NULL,
  surname varchar(25) NOT NULL,
  email varchar(100) NOT NULL UNIQUE,
  student_no int(11) NOT NULL,
  PRIMARY KEY (id, email, student_no),
  UNIQUE INDEX (id)
);

CREATE TABLE user_details (
  usersemail varchar(50) NOT NULL,
  first_name varchar(25) NOT NULL,
  last_name varchar(25) NOT NULL,
  gender varchar(20),
  ethinicity varchar(20),
  picture varchar(255),
  phone varchar(20) UNIQUE,
  emp_status varchar(25),
  PRIMARY KEY (usersemail)
);

CREATE TABLE user_setting (
  usersemail varchar(50) NOT NULL,
  phone_notifications varchar(3) DEFAULT 'yes' NOT NULL,
  email_notifications varchar(25) DEFAULT 'yes' NOT NULL,
  PRIMARY KEY (usersemail)
);

CREATE TABLE users (
  id int(11) NOT NULL UNIQUE,
  oath_provider varchar(10) NOT NULL,
  oath_id varchar(255) NOT NULL,
  email varchar(50) NOT NULL,
  created timestamp NOT NULL,
  updated timestamp NULL,
  code int(4),
  verified char(3) NOT NULL,
  PRIMARY KEY (email)
);

