-- -----------------------------------------------
--                GENERAL NOTES
--
-- - DATETIME is a MySQL data type only
-- - All pictures will be stored as relative path to pic on filesystem
-- -----------------------------------------------
-- Drop all tables if they already exist to rebuild schema

DROP DATABASE dtbase;
CREATE DATABASE dtbase;
USE dtbase;


DROP TABLE IF EXISTS Idea CASCADE;
DROP TABLE IF EXISTS Keywords CASCADE;
DROP TABLE IF EXISTS User;


CREATE TABLE User(
	username VARCHAR(40) PRIMARY KEY,
	password VARCHAR(40) NOT NULL

);



CREATE TABLE Idea(
	Iid INTEGER AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(40) REFERENCES User,
	title VARCHAR(100) NOT NULL,
	market ENUM('health','technology','education','finance','travel'),
	description TEXT,
	dateOfInit DATETIME NOT NULL
);


CREATE TABLE Keywords(
	Iid INTEGER REFERENCES Idea,
	keyword VARCHAR(40)
);

CREATE TABLE Likes(
	username VARCHAR(40) NOT NULL,
	Iid INTEGER NOT NULL,
	attitude INTEGER NOT NULL DEFAULT 0
);