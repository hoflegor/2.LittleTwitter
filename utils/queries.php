<?php

//added by mysql console

$queryCreateDatabase = "CREATE DATABASE LittleTwitter";

$queryCreateTableUsers = "
                        CREATE TABLE users(
                        id INT AUTO_INCREMENT UNIQUE ,
                        username VARCHAR (255) UNIQUE ,
                        email VARCHAR (255) UNIQUE,
                        hashed_password VARCHAR (60),
                        PRIMARY KEY (id)
                        )
";

$queryCreateTableTweet ="
                        CREATE TABLE tweet(
                        id_tweet INT NOT NULL AUTO_INCREMENT,
                        id_user INT NOT NULL,
                        text VARCHAR (140),
                        creation_date DATETIME,
                        PRIMARY KEY (id_tweet),
                        FOREIGN KEY (id_user) REFERENCES users(id)
                        )
";

$queryCreateTableComment = "
                        CREATE TABLE comment(
                          id_comment INT NOT NULL AUTO_INCREMENT,
                          id_user INT NOT NULL,
                          id_tweet INT NOT NULL,
                          text VARCHAR (60),
                          creation_date DATE,
                          PRIMARY KEY (id_comment),
                          FOREIGN KEY (id_tweet) REFERENCES tweet(id_tweet)
                            )
";
