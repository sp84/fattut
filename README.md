Fat Tuts
========

Database Setup
--------------

CREATE DATABASE fattut

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    salt VARCHAR(3) NOT NULL,
    PRIMARY KEY(id)
);
