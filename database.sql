--This is School Management Application
CREATE DATABASE school_management;
USE school_management;
-- For Creating Table User
CREATE TABLE users(
u_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
u_name VARCHAR(25) NOT NULL,
u_fname VARCHAR(150), 
u_lname VARCHAR(150),
u_password VARCHAR(256) NOT NULL,
u_birthdate DATE,
u_email VARCHAR(150),
u_phone VARCHAR(15),
u_address VARCHAR(150),
u_district VARCHAR(150),
u_country VARCHAR(150),
u_image VARCHAR(100),
u_isadded DATETIME DEFAULT NOW(),
u_role ('admin', 'student','teacher' ) DEFAULT admin
);


INSERT INTO users(u_name, u_fname, u_lname, u_password, u_birthdate, u_email, u_phone, u_address, u_district, u_country, u_image, u_role) VALUES ("Iam'Rajesh","Rajesh","Pangeni","admin","1998-01-05","rajpa2073@gmail.com","9866005481","Pokhara","Kaski","Nepal","something.jpg","admin");