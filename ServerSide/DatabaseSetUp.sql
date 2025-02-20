-- Go to your phpmyadmin and create database name: masfo
-- when your database is ready, go to import and choose this file then click to get your tables ready

-- 1 students table
CREATE TABLE IF NOT EXISTS students(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified INT(11) DEFAULT 0,
    password VARCHAR(255) NOT NULL,
    passOTP INT(11) 
);