-- Create database
CREATE DATABASE IF NOT EXISTS myproject;

-- Use the database
USE myproject;

-- Create student users table
CREATE TABLE IF NOT EXISTS student_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    student_id VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    Department VARCHAR(255) NOT NULL,
    section VARCHAR(255) NOT NULL
);

-- Create admin users table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    profession VARCHAR(255) NOT NULL
);

INSERT INTO admin_users (username, password, first_name, last_name, mobile, mail, profession)
VALUES 
    ('admin1', 'password1', 'John', 'Doe', '1234567890', 'john.doe@example.com', 'Administrator'),
    ('admin2', 'password2', 'Jane', 'Smith', '0987654321', 'jane.smith@example.com', 'Developer'),
    ('admin3', 'password3', 'Michael', 'Johnson', '1112223333', 'michael.johnson@example.com', 'Manager');