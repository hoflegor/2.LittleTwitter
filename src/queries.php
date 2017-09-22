<?php

//added by mysql console

$queryCreateDatabase = "CREATE DATABASE LittleTwitter";

$quryCreateTableUsers = "
                        CREATE TABLE users(
                        id INT AUTO_INCREMENT UNIQUE ,
                        username VARCHAR (255),
                        email VARCHAR (255) UNIQUE,
                        hashed_password VARCHAR (60),
                        PRIMARY KEY (id)
                        )
";

