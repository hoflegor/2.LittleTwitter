<?php
$createTableImagesQuery = '
CREATE TABLE images(
    id int unsigned AUTO_INCREMENT PRIMARY KEY ,    
    offer_id int unsigned,
    src varchar(100),
    dimension varchar(10)
)
';

$createTableUsersCompaniesQuery = '
CREATE TABLE users_companies(
   id int unsigned AUTO_INCREMENT,
   user_id int unsigned,
   name varchar(30),
   nip int,
   street varchar(50),
   street_nr mediumint,
   phone char(9),
   post_code char(6),
   capital decimal(7,2),
   rate decimal(5,4),
   created_at datetime,
    PRIMARY KEY(id),
    UNIQUE KEY(user_id)
    )
';