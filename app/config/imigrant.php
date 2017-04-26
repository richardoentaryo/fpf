<?php

    return array(
        "UP" => array(
            /*
             * Create table(s) using mysql table creation command string
             * you can also add insert statement here
             */
            "CREATE TABLE IF NOT EXISTS user(
                id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                fullname    VARCHAR(30) NOT NULL,
                username    VARCHAR(30) NOT NULL,
                password    VARCHAR(30) NOT NULL,
                email       VARCHAR(50),
                regdate     TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS role(
                id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                role        VARCHAR(30) NOT NULL
            )"
        ),
        "DOWN" => array(
            /*
             * Mention the table(s) you want to terminate from database
             */
            "DROP TABLE IF EXISTS user",
            "DROP TABLE IF EXISTS role"
        )
    );
