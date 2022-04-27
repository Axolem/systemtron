CREATE TABLE blog (
  id        int(11) NOT NULL, 
  `date`    varchar(25), 
  category  varchar(25) NOT NULL, 
  headline  varchar(255) NOT NULL, 
  story     longtext, 
  tab       varchar(25) NOT NULL, 
  picture   varchar(50) NOT NULL, 
  teamid_no int(11) NOT NULL, 
  PRIMARY KEY (id), 
  INDEX (id));

CREATE TABLE subscribers (
  id    int(11) NOT NULL, 
  name  varchar(25) NOT NULL, 
  email varchar(25) NOT NULL UNIQUE, 
  PRIMARY KEY (id, 
  email), 
  INDEX (id));

CREATE TABLE team (
  name          varchar(255) NOT NULL, 
  id_no         int(11) NOT NULL AUTO_INCREMENT, 
  course        varchar(255) NOT NULL, 
  paragraph_one longtext NOT NULL, 
  paragraph_two longtext NOT NULL, 
  PRIMARY KEY (id_no), 
  UNIQUE INDEX (id_no));

CREATE TABLE users (
`id` int(11) NOT NULL PRIMARY KEY,
  `oauth_provider` varchar(50) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `picture` varchar(255) ,
  `created_at` varchar(50) ,
  `modified_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(), 
  ethnic_group   varchar(15), 
  emplopment_status    varchar(255), 
  phone varchar(13) UNIQUE,
  gender varchar(25),
  code int(11) NULL,
  verified char(3) NULL);

