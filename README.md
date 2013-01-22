Fat Tuts
========

Database Setup
--------------

CREATE DATABASE fattut

CREATE TABLE users (
    uid BIGINT(20) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    salt VARCHAR(3) NOT NULL,
    PRIMARY KEY(uid)
);

CREATE TABLE posts (
	post_id	BIGINT(20) NOT NULL AUTO_INCREMENT,
	uid BIGINT(20) NOT NULL,
	post_body LONGTEXT COLLATE utf8_general_ci NOT NULL,
	post_title TEXT COLLATE utf8_general_ci NOT NULL,
	datetime DATETIME NOT NULL DEFAULT '0000-00-00 00:00',
	PRIMARY KEY(post_id),
	FOREIGN KEY(uid) REFERENCES users(uid)
);
