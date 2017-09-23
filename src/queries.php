<?php

//added by mysql console

$queryCreateDatabase = "CREATE DATABASE LittleTwitter";

$queryCreateTableUsers = "
                        CREATE TABLE users(
                        id INT AUTO_INCREMENT UNIQUE ,
                        username VARCHAR (255),
                        email VARCHAR (255) UNIQUE,
                        hashed_password VARCHAR (60),
                        PRIMARY KEY (id)
                        )
";

$queryCreateTableTweet ="
                        CREATE TABLE tweet(
                        tweet_id INT NOT NULL AUTO_INCREMENT,
                        user_id INT NOT NULL,
                        text VARCHAR (140),
                        creation_date DATE,
                        PRIMARY KEY (tweet_id),
                        FOREIGN KEY (user_id) REFERENCES users(id)
                        )
";
