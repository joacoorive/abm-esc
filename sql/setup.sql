DROP DATABASE IF EXISTS abmorive;

CREATE DATABASE abmorive;

USE abmorive;

CREATE TABLE abm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone_number VARCHAR(255)
);

INSERT INTO abm (name, phone_number) VALUES ("pepe", "258309249");
