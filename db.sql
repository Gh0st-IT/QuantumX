/* Create the database */
CREATE DATABASE interviewdb;

/* Switch to the created database */
USE interviewdb;

/* Create the applicant_table */
CREATE TABLE applicant_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birthdate DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    cellphone_no VARCHAR(20) NOT NULL,
    address VARCHAR(150)
);